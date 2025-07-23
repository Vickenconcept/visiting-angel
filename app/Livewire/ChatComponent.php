<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\On;

class ChatComponent extends Component
{
    public $activeTab = 'compose';
    public $message = '';
    public $successMessage = '';
    public $errorMessage = '';
    public $draftId = null;
    public $drafts = [];

    public function mount()
    {
        $this->drafts = [];
        if ($this->activeTab === 'drafts') {
            $this->loadDrafts();
        }
    }

    public function continueDraft($id)
    {
        $draft = Post::find($id);
        if ($draft && $draft->user_id === (Auth::user()?->id)) {
            $this->activeTab = 'compose';
            $this->message = $draft->content;
            $this->draftId = null;
            $draft->delete();
        }
    }

    public function setTab($tab)
    {
        // If leaving compose and editing a draft, save as draft again
        if ($this->activeTab === 'compose' && $tab !== 'compose' && $this->draftId && !empty($this->message)) {
            $draft = Post::find($this->draftId);
            if ($draft && $draft->user_id === (Auth::user()?->id)) {
                $draft->content = $this->message;
                $draft->status = 'draft';
                $draft->save();
            }
        }
        $this->activeTab = $tab;
        if ($tab === 'drafts') {
            $this->loadDrafts();
        }
    }

    public function loadDrafts()
    {
        $user = Auth::user();
        if ($user) {
            $this->drafts = Post::where('user_id', $user->id)
                ->where('status', 'draft')
                ->orderBy('updated_at', 'desc')
                ->get();
        } else {
            $this->drafts = [];
        }
    }

    public function updatedMessage($value)
    {
        $user = Auth::user();
        if (!$user) return;
        $content = trim($value);
        if ($content === '') {
            // Optionally, delete the draft if message is cleared
            if ($this->draftId) {
                Post::where('id', $this->draftId)->where('user_id', $user->id)->delete();
                $this->draftId = null;
            }
            return;
        }
        // Only one active draft per user
        $draft = Post::where('user_id', $user->id)->where('status', 'draft')->whereNull('in_reply_to_post_id')->first();
        if ($draft) {
            $draft->content = $content;
            $draft->save();
            $this->draftId = $draft->id;
        } else {
            $draft = Post::create([
                'user_id' => $user->id,
                'content' => $content,
                'media' => null,
                'in_reply_to_post_id' => null,
                'status' => 'draft',
            ]);
            $this->draftId = $draft->id;
        }
    }

    public function savePost()
    {
        $this->validate([
            'message' => 'required|string|max:2800', // allow up to 10 tweets worth
        ]);

        $parts = preg_split('/\n{3,}/', $this->message);
        $user = Auth::user();
        if (!$user) {
            $this->errorMessage = 'You must be logged in to post.';
            return;
        }
        $prevPost = null;
        foreach ($parts as $i => $part) {
            $part = trim($part);
            if ($part === '') continue;
            if ($i === 0 && $this->draftId) {
                // Update the existing draft as the first post in the thread
                $post = Post::find($this->draftId);
                if ($post) {
                    $post->content = $part;
                    $post->status = 'sent';
                    $post->save();
                    $prevPost = $post;
                    continue;
                }
            }
            $post = Post::create([
                'user_id' => $user->id,
                'content' => $part,
                'media' => null, // media support can be added later
                'in_reply_to_post_id' => $prevPost ? $prevPost->id : null,
                'status' => 'sent',
            ]);
            $prevPost = $post;
        }
        $this->message = '';
        $this->draftId = null;
        $this->successMessage = count($parts) > 1 ? 'Thread created successfully!' : 'Post created successfully!';
        $this->errorMessage = '';
    }

    public function render()
    {
        return view('livewire.chat-component', [
            'activeTab' => $this->activeTab,
            'drafts' => $this->drafts,
        ]);
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class ConnectXModal extends Component
{
    public $showModal = true;

    public function mount()
    {
        $user = Auth::user();
        $this->showModal = !$user || !$user->isTwitterConnected();
    }

    public function connectXAccount()
    {
        return redirect()->route('twitter.connect');
    }

    public function render()
    {
        return view('livewire.connect-x-modal', [
            'showModal' => $this->showModal,
        ]);
    }
}

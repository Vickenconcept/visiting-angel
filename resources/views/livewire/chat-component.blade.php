@php
    use Illuminate\Support\Str;
@endphp
<div class="flex flex-col h-full w-full bg-white rounded-lg shadow-md">
    <!-- Tabs -->
    <div class="flex items-center border-b px-4 pt-4">
        <button wire:click="setTab('compose')" class="px-4 py-2 font-semibold focus:outline-none {{ $activeTab === 'compose' ? 'text-blue-700 border-b-2 border-blue-700' : 'text-gray-500 hover:text-blue-700' }}">Compose</button>
        <button wire:click="setTab('drafts')" class="px-4 py-2 focus:outline-none {{ $activeTab === 'drafts' ? 'text-blue-700 border-b-2 border-blue-700' : 'text-gray-500 hover:text-blue-700' }}">Drafts</button>
        <button wire:click="setTab('scheduled')" class="px-4 py-2 focus:outline-none {{ $activeTab === 'scheduled' ? 'text-blue-700 border-b-2 border-blue-700' : 'text-gray-500 hover:text-blue-700' }}">Scheduled</button>
        <button wire:click="setTab('sent')" class="px-4 py-2 focus:outline-none {{ $activeTab === 'sent' ? 'text-blue-700 border-b-2 border-blue-700' : 'text-gray-500 hover:text-blue-700' }}">Sent</button>
    </div>

    <!-- Main Content Area -->
    <div class="flex-1 flex flex-col px-6 py-4">
        @if ($activeTab === 'compose')
            @if ($successMessage)
                <div class="mb-2 p-2 bg-green-100 text-green-700 rounded">{{ $successMessage }}</div>
            @endif
            @if ($errorMessage)
                <div class="mb-2 p-2 bg-red-100 text-red-700 rounded">{{ $errorMessage }}</div>
            @endif
            <form wire:submit.prevent="savePost">
                <div class="flex items-center justify-between mb-2">
                    <span class="font-semibold text-gray-700">Your content</span>
                    <a href="#" class="text-blue-600 text-sm hover:underline">+ New draft</a>
                </div>
                <div class="relative mb-2">
                    <textarea
                        wire:model="message"
                        rows="4"
                        maxlength="2800"
                        placeholder="Write here.\n\nSkip 3 lines to start a thread."
                        class="w-full rounded-lg border border-gray-300 px-4 py-3 focus:outline-none focus:ring-2 focus:ring-blue-400 resize-none text-gray-800 bg-white shadow-sm"
                    ></textarea>
                    <div class="absolute bottom-2 right-4 text-xs text-gray-400">
                        {{ strlen($message ?? '') }} / 2800 saved <span class="text-green-500">&#10003;</span>
                    </div>
                </div>
                <div class="flex items-center space-x-2 mb-4">
                    <button class="p-2 text-gray-500 hover:text-blue-600" type="button"><i class='bx bx-image text-xl'></i></button>
                    <button class="p-2 text-gray-500 hover:text-blue-600" type="button"><i class='bx bx-smile text-xl'></i></button>
                    <button class="p-2 text-gray-500 hover:text-blue-600" type="button"><i class='bx bx-gif text-xl'></i></button>
                    <button class="p-2 text-gray-500 hover:text-blue-600" type="button"><i class='bx bx-font text-xl'></i></button>
                </div>
                <div class="flex items-center space-x-2">
                    <button type="submit" class="bg-white border border-blue-600 text-blue-600 rounded-lg px-4 py-2 font-semibold shadow hover:bg-blue-50 disabled:opacity-50" @if(empty($message)) disabled @endif>Tweet now</button>
                    <div class="relative">
                        <button type="button" class="bg-blue-900 text-white rounded-lg px-4 py-2 font-semibold shadow flex items-center">
                            Add to Queue
                            <span class="ml-2 text-xs">Jul 9th, 2025, 7:00 PM</span>
                            <i class='bx bx-chevron-down ml-1'></i>
                        </button>
                        <!-- Dropdown for queue actions could go here -->
                    </div>
                    <a href="#" class="text-blue-700 text-sm hover:underline ml-2">Edit queue</a>
                </div>
                <!-- Advanced Options -->
                <div class="mt-4">
                    <button type="button" class="flex items-center text-gray-600 hover:text-blue-700 focus:outline-none" onclick="document.getElementById('adv-options').classList.toggle('hidden')">
                        <span class="mr-2">Advanced Options</span>
                        <span class="text-xs bg-gray-100 px-2 py-0.5 rounded">enabled: auto-retweet, auto-plug</span>
                        <i class='bx bx-chevron-right ml-2'></i>
                    </button>
                    <div id="adv-options" class="hidden mt-2 text-sm text-gray-500">
                        <ul class="list-disc ml-6">
                            <li>Auto-retweet: Enabled</li>
                            <li>Auto-plug: Enabled</li>
                            <!-- Add more advanced options here -->
                        </ul>
                    </div>
                </div>
            </form>
        @elseif ($activeTab === 'drafts')
            <div>Draft count: {{ count($drafts) }}</div>
            @if (count($drafts) > 0)
                <div class="space-y-4">
                    @foreach ($drafts as $draft)
                        <button wire:click="continueDraft({{ $draft->id }})" type="button" class="w-full text-left p-4 bg-gray-50 rounded shadow flex flex-col hover:bg-blue-50 focus:outline-none transition">
                            <div class="text-gray-800 mb-2 line-clamp-3">{{ Str::limit($draft->content, 180) }}</div>
                            <div class="flex items-center justify-between text-xs text-gray-500">
                                <span>Last updated: {{ $draft->updated_at->diffForHumans() }}</span>
                                <span class="bg-yellow-100 text-yellow-700 px-2 py-0.5 rounded">Draft</span>
                            </div>
                        </button>
                    @endforeach
                </div>
            @else
                <div class="flex flex-col items-center justify-center h-full text-gray-500">
                    <i class='bx bx-file text-5xl mb-2'></i>
                    <span class="text-lg font-semibold">No drafts yet</span>
                    <span class="text-sm">Your saved drafts will appear here.</span>
                </div>
            @endif
        @elseif ($activeTab === 'scheduled')
            <div class="flex flex-col items-center justify-center h-full text-gray-500">
                <i class='bx bx-calendar text-5xl mb-2'></i>
                <span class="text-lg font-semibold">No scheduled messages</span>
                <span class="text-sm">Your scheduled messages will appear here.</span>
            </div>
        @elseif ($activeTab === 'sent')
            <div class="flex flex-col items-center justify-center h-full text-gray-500">
                <i class='bx bx-send text-5xl mb-2'></i>
                <span class="text-lg font-semibold">No sent messages</span>
                <span class="text-sm">Your sent messages will appear here.</span>
            </div>
        @endif
    </div>
</div>

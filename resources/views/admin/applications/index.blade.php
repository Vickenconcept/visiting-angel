@section('title', 'Applications')
<x-app-layout>
<div class="p-6">
    <div class="flex items-center justify-between">
        <h1 class="text-2xl font-bold">Applications</h1>
        <form method="GET" class="flex items-center gap-2">
            <select name="status" class="border rounded-lg p-2">
                <option value="">All statuses</option>
                @foreach(['pending','reviewed','shortlisted','rejected','hired'] as $opt)
                    <option value="{{ $opt }}" {{ (request('status') === $opt) ? 'selected' : '' }}>{{ ucfirst($opt) }}</option>
                @endforeach
            </select>
            <button class="bg-black text-white px-3 py-2 rounded-lg">Filter</button>
        </form>
    </div>
    <div class="mt-6 bg-white border rounded-xl overflow-hidden">
        <div x-data="{ open:false, url:null, isPdf:false }" @keydown.escape.window="open=false" class="relative">
        <table class="w-full">
            <thead>
                <tr class="bg-gray-50 text-left">
                    <th class="p-3">Applicant</th>
                    <th class="p-3">Opening</th>
                    <th class="p-3">Status</th>
                    <th class="p-3">Applied</th>
                    <th class="p-3"></th>
                </tr>
            </thead>
            <tbody>
                @foreach($applications as $app)
                <tr class="border-t">
                    <td class="p-3">
                        <div class="font-semibold">{{ $app->name }}</div>
                        <div class="text-gray-500 text-sm">{{ $app->email }} · {{ $app->phone }}</div>
                        @if($app->resume_path)
                        @php $resumeUrl = \Illuminate\Support\Facades\Storage::disk('public')->url($app->resume_path); @endphp
                        <button type="button" class="text-indigo-600 text-sm underline" @click="url='{{ $resumeUrl }}'; isPdf = url.toLowerCase().endsWith('.pdf'); open=true;">View resume</button>
                        @endif
                    </td>
                    <td class="p-3">{{ $app->opening->title }}</td>
                    <td class="p-3">{{ ucfirst($app->status) }}</td>
                    <td class="p-3">{{ $app->created_at->diffForHumans() }}</td>
                    <td class="p-3 text-right">
                        <form action="{{ route('admin.applications.update', $app) }}" method="POST" class="inline-flex items-center gap-2">
                            @csrf
                            @method('PUT')
                            <select name="status" class="border rounded-lg p-1">
                                @foreach(['pending','reviewed','shortlisted','rejected','hired'] as $status)
                                    <option value="{{ $status }}" {{ $app->status === $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                                @endforeach
                            </select>
                            <button class="bg-black text-white px-3 py-1 rounded-lg">Update</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Modal -->
        <div x-show="open" x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black/60">
            <div class="bg-white rounded-xl w-11/12 lg:w-3/4 h-[80vh] shadow-xl overflow-hidden" @click.outside="open=false">
                <div class="flex items-center justify-between px-4 py-3 border-b">
                    <h3 class="font-semibold">Resume Preview</h3>
                    <button class="text-gray-500 hover:text-gray-700" @click="open=false"><i class='bx bx-x text-2xl'></i></button>
                </div>
                <div class="w-full h-full">
                    <template x-if="isPdf">
                        <iframe :src="url" class="w-full h-full" type="application/pdf"></iframe>
                    </template>
                    <template x-if="!isPdf">
                        <div class="h-full flex flex-col items-center justify-center gap-4 p-6">
                            <p class="text-gray-600">This file type cannot be previewed inline. Open in a new tab:</p>
                            <a :href="url" target="_blank" class="bg-black text-white px-4 py-2 rounded-lg">Open Document</a>
                        </div>
                    </template>
                </div>
            </div>
        </div>

        <div class="p-3">{{ $applications->links() }}</div>
        </div>
    </div>
 </div>
</x-app-layout>


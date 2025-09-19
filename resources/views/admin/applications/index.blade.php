@section('title', 'Applications')
<x-app-layout>
<div class="p-6 bg-gradient-to-br from-gray-50 to-white min-h-screen">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Job Applications Management</h1>
                <p class="text-gray-600 text-lg">Review and manage job applications from candidates</p>
            </div>
            <form method="GET" class="flex items-center gap-3">
                <input type="date" name="start_date" value="{{ request('start_date') }}" class="border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-colors duration-300" />
                <span class="text-gray-500">to</span>
                <input type="date" name="end_date" value="{{ request('end_date') }}" class="border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-colors duration-300" />
                <select name="status" class="border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-colors duration-300">
                    <option value="">All Statuses</option>
                    @foreach(['pending','reviewed','shortlisted','rejected','hired'] as $opt)
                        <option value="{{ $opt }}" {{ (request('status') === $opt) ? 'selected' : '' }}>{{ ucfirst($opt) }}</option>
                    @endforeach
                </select>
                <button class="bg-gradient-to-r from-cyan-600 to-blue-600 text-white px-6 py-2 rounded-xl font-semibold hover:from-cyan-700 hover:to-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                    <i class='bx bx-filter text-lg mr-2'></i>
                    Filter
                </button>
                <a href="{{ route('admin.applications.index') }}" class="px-4 py-2 rounded-xl border border-gray-300 text-gray-700 hover:bg-gray-100 transition-colors duration-300">Reset</a>
            </form>
        </div>
    </div>

    <!-- Applications Table -->
    <div class="bg-white rounded-3xl shadow-2xl shadow-gray-200 overflow-hidden relative">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-cyan-600 to-blue-600"></div>
        <div class="p-6">
            <div x-data="{ open:false, url:null, isPdf:false, tryGoogleViewer:false, tryOfficeViewer:false }" @keydown.escape.window="open=false" class="relative">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="text-left">
                                <th class="p-4 font-semibold text-gray-900 text-lg">Applicant</th>
                                <th class="p-4 font-semibold text-gray-900 text-lg">Position</th>
                                <th class="p-4 font-semibold text-gray-900 text-lg">Status</th>
                                <th class="p-4 font-semibold text-gray-900 text-lg">Applied</th>
                                <th class="p-4 font-semibold text-gray-900 text-lg text-right">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($applications as $app)
                            <tr class="border-t border-gray-100 hover:bg-gray-50 transition-colors duration-200">
                                <td class="p-4">
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-gradient-to-br from-cyan-100 to-blue-100 rounded-lg flex items-center justify-center mr-4">
                                            <i class='bx bx-user-check text-cyan-600 text-lg'></i>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-gray-900">{{ $app->name }}</div>
                                            <div class="text-sm text-gray-500">{{ $app->email }} · {{ $app->phone }}</div>
                                            @if($app->resume_path)
                                            <button type="button" class="text-cyan-600 text-sm underline hover:text-cyan-700 transition-colors duration-300" @click="url='{{ $app->resume_path }}'; isPdf = url.toLowerCase().includes('.pdf') || url.toLowerCase().endsWith('.pdf'); open=true;">
                                                <i class='bx bx-file text-xs mr-1'></i>
                                                View Resume
                                            </button>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="p-4">
                                    <span class="bg-cyan-100 text-cyan-800 px-3 py-1 rounded-full text-sm font-medium">
                                        {{ $app->opening->title }}
                                    </span>
                                </td>
                                <td class="p-4">
                                    <span class="px-3 py-1 rounded-full text-sm font-medium {{ 
                                        $app->status === 'hired' ? 'bg-green-100 text-green-800' : 
                                        ($app->status === 'rejected' ? 'bg-red-100 text-red-800' : 
                                        ($app->status === 'shortlisted' ? 'bg-yellow-100 text-yellow-800' : 
                                        ($app->status === 'reviewed' ? 'bg-blue-100 text-blue-800' : 'bg-gray-100 text-gray-800'))) 
                                    }}">
                                        {{ ucfirst($app->status) }}
                                    </span>
                                </td>
                                <td class="p-4 text-gray-600">{{ $app->created_at->diffForHumans() }}</td>
                                <td class="p-4 text-right">
                                    <div class="flex items-center gap-3">
                                        <form action="{{ route('admin.applications.update', $app) }}" method="POST" class="inline-flex items-center gap-3">
                                            @csrf
                                            @method('PUT')
                                            <select name="status" class="border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-cyan-500 focus:border-transparent transition-colors duration-300">
                                                @foreach(['pending','reviewed','shortlisted','rejected','hired'] as $status)
                                                    <option value="{{ $status }}" {{ $app->status === $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                                                @endforeach
                                            </select>
                                            <button class="bg-gradient-to-r from-cyan-600 to-blue-600 text-white px-4 py-2 rounded-lg font-medium hover:from-cyan-700 hover:to-blue-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center gap-2">
                                                <i class='bx bx-check text-sm mr-1'></i>
                                                Update
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.applications.destroy', $app) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this application? This action cannot be undone.')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-gradient-to-r from-red-600 to-red-700 text-white px-4 py-2 rounded-lg font-medium hover:from-red-700 hover:to-red-800 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 flex items-center gap-2">
                                                <i class='bx bx-trash text-sm mr-1'></i>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- Enhanced Modal -->
                <div x-show="open" x-transition class="fixed inset-0 z-50 flex items-center justify-center bg-black/60 backdrop-blur-sm">
                    <div class="bg-white rounded-3xl w-11/12 lg:w-4/5 h-[85vh] shadow-2xl overflow-hidden" @click.outside="open=false">
                        <div class="flex items-center justify-between px-6 py-4 border-b border-gray-200 bg-gradient-to-r from-cyan-50 to-blue-50">
                            <h3 class="font-bold text-xl text-gray-900">Resume Preview</h3>
                            <button class="text-gray-500 hover:text-gray-700 transition-colors duration-300" @click="open=false">
                                <i class='bx bx-x text-3xl'></i>
                            </button>
                        </div>
                        <div class="w-full h-full">
                            <template x-if="isPdf">
                                <iframe :src="url + '#toolbar=1&navpanes=1&scrollbar=1'" class="w-full h-full" type="application/pdf"></iframe>
                            </template>
                            <template x-if="!isPdf">
                                <iframe :src="'https://docs.google.com/gview?url=' + encodeURIComponent(url) + '&embedded=true'" class="w-full h-full" frameborder="0"></iframe>
                            </template>
                        </div>
                    </div>
                </div>

                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100">
                    {{ $applications->onEachSide(1)->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
</x-app-layout>


<x-guest-layout>
    <div class="min-h-screen bg-white">
        <section class="bg-gray-50 border-b">
            <div class="max-w-3xl mx-auto px-4 py-12">
                <h1 class="text-3xl font-bold text-black">{{ $opening->title }}</h1>
                <div class="flex items-center text-gray-500 text-sm mt-2 gap-4">
                    <span>{{ $opening->employment_type }}</span>
                    <span>{{ $opening->location }}</span>
                </div>
                <div class="flex items-center text-gray-700 gap-4 mt-4">
                    @if($opening->salary)
                        <span class="inline-flex items-center px-3 py-1 bg-green-50 text-green-700 rounded-full text-sm">Salary: {{ $opening->salary }}</span>
                    @endif
                </div>
                <div class="prose max-w-none mt-6">
                    {!! $opening->description !!}
                </div>

                @if($opening->is_active)
                    <div class="mt-10 p-6 bg-white border rounded-xl">
                        <h2 class="text-xl font-semibold text-black mb-4">Apply for this opening</h2>
                        <form action="{{ route('openings.apply', $opening->slug) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                            @csrf
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm text-gray-700">Name</label>
                                    <input type="text" name="name" class="mt-1 w-full border rounded-lg p-2" required>
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-700">Email</label>
                                    <input type="email" name="email" class="mt-1 w-full border rounded-lg p-2" required>
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-700">Phone</label>
                                    <input type="text" name="phone" class="mt-1 w-full border rounded-lg p-2">
                                </div>
                                <div>
                                    <label class="block text-sm text-gray-700">Resume (PDF/DOC)</label>
                                    <input type="file" name="resume" class="mt-1 w-full border rounded-lg p-2" accept=".pdf,.doc,.docx">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm text-gray-700">Message</label>
                                <textarea name="message" rows="4" class="mt-1 w-full border rounded-lg p-2"></textarea>
                            </div>
                            <button class="bg-orange-500 text-white px-5 py-2 rounded-lg hover:bg-orange-600">Submit Application</button>
                        </form>
                    </div>
                @else
                    <div class="mt-10 p-6 bg-yellow-50 border border-yellow-200 rounded-xl text-yellow-800">
                        This job opening has been closed.
                    </div>
                @endif
            </div>
        </section>
    </div>
</x-guest-layout>
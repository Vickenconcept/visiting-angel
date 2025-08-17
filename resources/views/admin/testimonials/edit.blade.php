@section('title', 'Edit Testimonial')
<x-app-layout>
<div class="p-6">
    <h1 class="text-2xl font-bold">Edit Testimonial</h1>
    <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" class="mt-6 grid md:grid-cols-2 gap-6">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-sm">Name</label>
            <input type="text" name="name" value="{{ old('name', $testimonial->name) }}" class="w-full border rounded-lg p-2 mt-1" required>
        </div>
        <div>
            <label class="block text-sm">Role/Title (optional)</label>
            <input type="text" name="role" value="{{ old('role', $testimonial->role) }}" class="w-full border rounded-lg p-2 mt-1">
        </div>
        <div class="md:col-span-2">
            <label class="block text-sm">Quote</label>
            <textarea name="quote" rows="5" class="w-full border rounded-lg p-2 mt-1" required>{{ old('quote', $testimonial->quote) }}</textarea>
        </div>
        <div class="md:col-span-2">
            <label class="block text-sm">Image URL (optional)</label>
            <input type="url" name="image_url" value="{{ old('image_url', $testimonial->image_url) }}" class="w-full border rounded-lg p-2 mt-1">
        </div>
        <div class="md:col-span-2">
            <label class="block text-sm mb-2">Published</label>
            <input type="hidden" name="is_published" value="0">
            <div class="flex items-center gap-3">
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_published" value="1" class="sr-only peer" {{ $testimonial->is_published ? 'checked' : '' }}>
                    <div class="w-12 h-7 bg-gray-200 rounded-full peer peer-checked:bg-blue-500 transition"></div>
                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition peer-checked:translate-x-5"></div>
                </label>
                <span class="text-sm text-gray-700">Published</span>
            </div>
        </div>
        <div class="md:col-span-2">
            <button class="bg-black text-white px-5 py-2 rounded-lg">Save Changes</button>
        </div>
    </form>
</div>
</x-app-layout>
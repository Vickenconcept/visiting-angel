@section('title', 'Edit Testimonial')
<x-app-layout>
<div class="p-6 bg-gradient-to-br from-gray-50 to-white min-h-screen">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Edit Testimonial</h1>
                <p class="text-gray-600 text-lg">Update client testimonial information</p>
            </div>
            <a href="{{ route('admin.testimonials.index') }}" class="bg-gray-100 text-gray-700 px-6 py-3 rounded-xl font-semibold hover:bg-gray-200 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                <span class="flex items-center">
                    <i class='bx bx-arrow-back text-xl mr-2'></i>
                    Back to Testimonials
                </span>
            </a>
        </div>
    </div>

    <!-- Form Section -->
    <div class="bg-white rounded-3xl shadow-2xl shadow-gray-200 overflow-hidden relative">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-pink-600 to-rose-600"></div>
        <div class="p-8">
            <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data" class="grid md:grid-cols-2 gap-8">
                @csrf
                @method('PUT')
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Client Name *</label>
                    <input type="text" name="name" value="{{ old('name', $testimonial->name) }}" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-colors duration-300" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Role/Title (Optional)</label>
                    <input type="text" name="role" value="{{ old('role', $testimonial->role) }}" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-colors duration-300" placeholder="e.g., Family Member, Facility Director">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Testimonial Quote *</label>
                    <textarea name="quote" rows="5" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-colors duration-300 resize-none" placeholder="Share what the client said about your services..." required>{{ old('quote', $testimonial->quote) }}</textarea>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Client Photo (Optional)</label>
                    <div class="relative">
                        <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-pink-500 focus:border-transparent transition-colors duration-300" onchange="previewImage(this)">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i class='bx bx-image text-gray-400 text-xl'></i>
                        </div>
                    </div>
                    <div class="mt-3">
                        <p class="text-sm text-gray-600 mb-2">Image Preview:</p>
                        <div class="w-40 h-40 bg-gray-100 rounded-xl border-2 border-dashed border-gray-300 flex items-center justify-center overflow-hidden">
                            <img id="current-img" src="{{ $testimonial->image_url ?? '/placeholder-image.png' }}" alt="Current client photo" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-4">Publication Settings</label>
                    <div class="flex items-center gap-3">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="checkbox" name="is_published" value="1" class="sr-only peer" {{ $testimonial->is_published ? 'checked' : '' }}>
                            <div class="w-14 h-8 bg-gray-200 rounded-full peer peer-checked:bg-pink-500 transition-all duration-300 shadow-inner"></div>
                            <div class="absolute left-1 top-1 w-6 h-6 bg-white rounded-full transition-all duration-300 shadow-md peer-checked:translate-x-6"></div>
                        </label>
                        <span class="text-sm font-medium text-gray-700">Publish Testimonial</span>
                    </div>
                </div>
                <div class="md:col-span-2 flex justify-end gap-4">
                    <a href="{{ route('admin.testimonials.index') }}" class="bg-gray-100 text-gray-700 px-8 py-3 rounded-xl font-semibold hover:bg-gray-200 transition-all duration-300">
                        Cancel
                    </a>
                    <button type="submit" class="bg-gradient-to-r from-pink-600 to-rose-600 text-white px-8 py-3 rounded-xl font-semibold hover:from-pink-700 hover:to-rose-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        <span class="flex items-center">
                            <i class='bx bx-save text-xl mr-2'></i>
                            Save Changes
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
<script>
    // Image preview functionality
    function previewImage(input) {
        if (input.files && input.files[0]) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('current-img').src = e.target.result;
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
@endpush
</x-app-layout>
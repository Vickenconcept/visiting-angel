@section('title', 'Create Post')
<x-app-layout>
<div class="p-6 bg-gradient-to-br from-gray-50 to-white min-h-screen">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Create New Blog Post</h1>
                <p class="text-gray-600 text-lg">Share healthcare insights and industry updates</p>
            </div>
            <a href="{{ route('admin.blog.index') }}" class="bg-gray-100 text-gray-700 px-6 py-3 rounded-xl font-semibold hover:bg-gray-200 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                <span class="flex items-center">
                    <i class='bx bx-arrow-back text-xl mr-2'></i>
                    Back to Blog
                </span>
            </a>
        </div>
    </div>

    <!-- Form Section -->
    <div class="bg-white rounded-3xl shadow-2xl shadow-gray-200 overflow-hidden relative">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-purple-600 to-indigo-600"></div>
        <div class="p-8">
            <form action="{{ route('admin.blog.store') }}" method="POST" enctype="multipart/form-data" class="grid md:grid-cols-2 gap-8">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Post Title *</label>
                    <input type="text" name="title" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-300" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Featured Image</label>
                    <div class="relative">
                        <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-300" onchange="previewImage(this)">
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <i class='bx bx-image text-gray-400 text-xl'></i>
                        </div>
                    </div>
                    <div id="image-preview" class="mt-3 hidden">
                        <div class="w-40 h-40 bg-gray-100 rounded-xl border-2 border-dashed border-gray-300 flex items-center justify-center overflow-hidden">
                            <img id="preview-img" class="w-full h-full object-cover">
                        </div>
                    </div>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Excerpt</label>
                    <input type="text" name="excerpt" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-300" placeholder="Brief summary of the post">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Post Content</label>
                    <div id="blog-editor" class="bg-white border border-gray-300 rounded-xl min-h-[400px]"></div>
                    <input type="hidden" name="content" id="blog-content">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-4">Publication Settings</label>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="flex items-center gap-3">
                            <label for="is_published" class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="is_published" name="is_published" value="1" class="sr-only peer">
                                <div class="w-14 h-8 bg-gray-200 rounded-full peer peer-checked:bg-green-500 transition-all duration-300 shadow-inner"></div>
                                <div class="absolute left-1 top-1 w-6 h-6 bg-white rounded-full transition-all duration-300 shadow-md peer-checked:translate-x-6"></div>
                            </label>
                            <span class="text-sm font-medium text-gray-700">Publish Now</span>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Schedule Publication</label>
                            <input type="datetime-local" name="published_at" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:border-transparent transition-colors duration-300">
                        </div>
                    </div>
                </div>
                <div class="md:col-span-2 flex justify-end gap-4">
                    <a href="{{ route('admin.blog.index') }}" class="bg-gray-100 text-gray-700 px-8 py-3 rounded-xl font-semibold hover:bg-gray-200 transition-all duration-300">
                        Cancel
                    </a>
                    <button type="submit" class="bg-gradient-to-r from-purple-600 to-indigo-600 text-white px-8 py-3 rounded-xl font-semibold hover:from-purple-700 hover:to-indigo-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        <span class="flex items-center">
                            <i class='bx bx-plus text-xl mr-2'></i>
                            Create Post
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
                document.getElementById('preview-img').src = e.target.result;
                document.getElementById('image-preview').classList.remove('hidden');
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    // Quill editor setup
    var toolbarBlogOptions = [
        [{ 'font': [] }],                       
        [{ 'size': ['small', false, 'large', 'huge'] }],  
        ['bold', 'italic', 'underline', 'strike'],        
        [{ 'color': [] }, { 'background': [] }],          
        [{ 'script': 'sub'}, { 'script': 'super' }],     
        [{ 'header': 1 }, { 'header': 2 }],          
        ['blockquote', 'code-block'],                   
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],     
        [{ 'indent': '-1'}, { 'indent': '+1' }],          
        [{ 'direction': 'rtl' }],                         
        [{ 'align': [] }],                               
        ['link', 'image', 'video'],                      
        ['clean']                                        
    ];
    
    const quillBlog = new Quill('#blog-editor', { 
        theme: 'snow',
        modules: {
            toolbar: toolbarBlogOptions
        }
    });
    
    // Toggle button functionality
    document.querySelector('input[name="is_published"]').addEventListener('change', function() {
        console.log('Publish status:', this.checked);
    });
    
    document.querySelector('label[for="is_published"]').addEventListener('click', function(e) {
        e.preventDefault();
        const checkbox = document.querySelector('input[name="is_published"]');
        checkbox.checked = !checkbox.checked;
        checkbox.dispatchEvent(new Event('change'));
    });
    
    const form = document.querySelector('form');
    form.addEventListener('submit', function() {
        document.getElementById('blog-content').value = quillBlog.root.innerHTML;
    });
</script>
@endpush
</x-app-layout>


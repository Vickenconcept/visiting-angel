@section('title', 'Create Service')
<x-app-layout>
<div class="p-6 bg-gradient-to-br from-gray-50 to-white min-h-screen">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Create New Service</h1>
                <p class="text-gray-600 text-lg">Add a new healthcare service to your offerings</p>
            </div>
            <a href="{{ route('admin.services.index') }}" class="bg-gray-100 text-gray-700 px-6 py-3 rounded-xl font-semibold hover:bg-gray-200 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                <span class="flex items-center">
                    <i class='bx bx-arrow-back text-xl mr-2'></i>
                    Back to Services
                </span>
            </a>
        </div>
    </div>

    <!-- Form Section -->
    <div class="bg-white rounded-3xl shadow-2xl shadow-gray-200 overflow-hidden relative">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-green-600 to-emerald-600"></div>
        <div class="p-8">
            <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="grid md:grid-cols-2 gap-8">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Service Title *</label>
                    <input type="text" name="title" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors duration-300" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Service Image</label>
                    <div class="relative">
                        <input type="file" name="image" accept="image/*" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors duration-300" onchange="previewImage(this)">
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
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Short Excerpt</label>
                    <input type="text" name="excerpt" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-green-500 focus:border-transparent transition-colors duration-300" placeholder="Brief description of the service">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Service Description</label>
                    <div id="service-editor" class="bg-white border border-gray-300 rounded-xl min-h-[300px]"></div>
                    <input type="hidden" name="body" id="service-body">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-4">Service Status</label>
                    <div class="flex items-center gap-6">
                        <div class="flex items-center gap-3">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_active" value="1" class="sr-only peer" checked>
                                <div class="w-14 h-8 bg-gray-200 rounded-full peer peer-checked:bg-green-500 transition-all duration-300 shadow-inner"></div>
                                <div class="absolute left-1 top-1 w-6 h-6 bg-white rounded-full transition-all duration-300 shadow-md peer-checked:translate-x-6"></div>
                            </label>
                            <span class="text-sm font-medium text-gray-700">Active Service</span>
                        </div>
                    </div>
                </div>
                <div class="md:col-span-2 flex justify-end gap-4">
                    <a href="{{ route('admin.services.index') }}" class="bg-gray-100 text-gray-700 px-8 py-3 rounded-xl font-semibold hover:bg-gray-200 transition-all duration-300">
                        Cancel
                    </a>
                    <button type="submit" class="bg-gradient-to-r from-green-600 to-emerald-600 text-white px-8 py-3 rounded-xl font-semibold hover:from-green-700 hover:to-emerald-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        <span class="flex items-center">
                            <i class='bx bx-plus text-xl mr-2'></i>
                            Create Service
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
    var toolbarOptions = [
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
        ['link'],                      
        ['clean']                                        
    ];
    
    const quillService = new Quill('#service-editor', { 
        theme: 'snow',
        modules: {
            toolbar: toolbarOptions
        }
    });
    
    document.querySelector('form').addEventListener('submit', function() {
        document.getElementById('service-body').value = quillService.root.innerHTML;
    });
</script>
@endpush
</x-app-layout>


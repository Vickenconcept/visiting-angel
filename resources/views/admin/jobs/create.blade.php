@section('title', 'Create Opening')
<x-app-layout>
<div class="p-6 bg-gradient-to-br from-gray-50 to-white min-h-screen">
    <!-- Header Section -->
    <div class="mb-8">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h1 class="text-4xl font-bold text-gray-900 mb-2">Create New Job Opening</h1>
                <p class="text-gray-600 text-lg">Add a new career opportunity to your listings</p>
            </div>
            <a href="{{ route('admin.openings.index') }}" class="bg-gray-100 text-gray-700 px-6 py-3 rounded-xl font-semibold hover:bg-gray-200 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                <span class="flex items-center">
                    <i class='bx bx-arrow-back text-xl mr-2'></i>
                    Back to Openings
                </span>
            </a>
        </div>
    </div>

    <!-- Form Section -->
    <div class="bg-white rounded-3xl shadow-2xl shadow-gray-200 overflow-hidden relative">
        <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-orange-600 to-yellow-600"></div>
        <div class="p-8">
            <form action="{{ route('admin.openings.store') }}" method="POST" class="grid md:grid-cols-2 gap-8">
                @csrf
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Job Title *</label>
                    <input type="text" name="title" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-colors duration-300" required>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Location</label>
                    <input type="text" name="location" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-colors duration-300" placeholder="City, State">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Salary (Optional)</label>
                    <input type="text" name="salary" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-colors duration-300" placeholder="$25/hr or $50,000/yr">
                </div>
                <div>
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Employment Type *</label>
                    <select name="employment_type" class="w-full border border-gray-300 rounded-xl px-4 py-3 focus:outline-none focus:ring-2 focus:ring-orange-500 focus:border-transparent transition-colors duration-300">
                        <option value="full-time">Full-time</option>
                        <option value="part-time">Part-time</option>
                        <option value="per-diem">Per-diem</option>
                        <option value="contract">Contract</option>
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-2">Job Description *</label>
                    <div id="opening-editor" class="bg-white border border-gray-300 rounded-xl min-h-[300px]"></div>
                    <input type="hidden" name="description" id="opening-description">
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-semibold text-gray-700 mb-4">Publication Settings</label>
                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="flex items-center gap-3">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_active" value="1" class="sr-only peer" checked>
                                <div class="w-14 h-8 bg-gray-200 rounded-full peer peer-checked:bg-orange-500 transition-all duration-300 shadow-inner"></div>
                                <div class="absolute left-1 top-1 w-6 h-6 bg-white rounded-full transition-all duration-300 shadow-md peer-checked:translate-x-6"></div>
                            </label>
                            <span class="text-sm font-medium text-gray-700">Active Opening</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" name="is_published" value="1" class="sr-only peer" checked>
                                <div class="w-14 h-8 bg-gray-200 rounded-full peer peer-checked:bg-orange-500 transition-all duration-300 shadow-inner"></div>
                                <div class="absolute left-1 top-1 w-6 h-6 bg-white rounded-full transition-all duration-300 shadow-md peer-checked:translate-x-6"></div>
                            </label>
                            <span class="text-sm font-medium text-gray-700">Published</span>
                        </div>
                    </div>
                </div>
                <div class="md:col-span-2 flex justify-end gap-4">
                    <a href="{{ route('admin.openings.index') }}" class="bg-gray-100 text-gray-700 px-8 py-3 rounded-xl font-semibold hover:bg-gray-200 transition-all duration-300">
                        Cancel
                    </a>
                    <button type="submit" class="bg-gradient-to-r from-orange-600 to-yellow-600 text-white px-8 py-3 rounded-xl font-semibold hover:from-orange-700 hover:to-yellow-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                        <span class="flex items-center">
                            <i class='bx bx-plus text-xl mr-2'></i>
                            Create Opening
                        </span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@push('scripts')
<script>
      var toolbarOpeningOptions = [
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
    const quillOpening = new Quill('#opening-editor', { theme: 'snow',
        modules: {
            toolbar: toolbarOpeningOptions
        }
     });
    document.querySelector('form').addEventListener('submit', function() {
        document.getElementById('opening-description').value = quillOpening.root.innerHTML;
    });
    </script>
@endpush
</x-app-layout>


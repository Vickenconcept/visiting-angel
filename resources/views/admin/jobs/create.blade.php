@section('title', 'Create Opening')

<x-app-layout>
<div class="p-6">
    <h1 class="text-2xl font-bold">Create Opening</h1>
    <form action="{{ route('admin.openings.store') }}" method="POST" class="mt-6 grid md:grid-cols-2 gap-6">
        @csrf
        <div>
            <label class="block text-sm">Title</label>
            <input type="text" name="title" class="w-full border rounded-lg p-2 mt-1" required>
        </div>
        <div>
            <label class="block text-sm">Location</label>
            <input type="text" name="location" class="w-full border rounded-lg p-2 mt-1">
        </div>
        <div>
            <label class="block text-sm">Salary (optional)</label>
            <input type="text" name="salary" class="w-full border rounded-lg p-2 mt-1" placeholder="$25/hr or $50,000/yr">
        </div>
        <div>
            <label class="block text-sm">Employment Type</label>
            <select name="employment_type" class="w-full border rounded-lg p-2 mt-1">
                <option value="full-time">Full-time</option>
                <option value="part-time">Part-time</option>
                <option value="per-diem">Per-diem</option>
                <option value="contract">Contract</option>
            </select>
        </div>
        <div class="md:col-span-2 mb-6">
            <label class="block text-sm">Description</label>
            <div id="opening-editor" class="bg-white border rounded-lg mt-1"></div>
            <input type="hidden" name="description" id="opening-description">
        </div>
        <div class="md:col-span-2">
            <label class="block text-sm mb-2">Status</label>
            <input type="hidden" name="is_active" value="0">
            <div class="flex items-center gap-3">
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" class="sr-only peer" checked>
                    <div class="w-12 h-7 bg-gray-200 rounded-full peer peer-checked:bg-green-500 transition"></div>
                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition peer-checked:translate-x-5"></div>
                </label>
                <span class="text-sm text-gray-700">Open</span>
            </div>
        </div>
        <div class="md:col-span-2">
            <label class="block text-sm mb-2">Published</label>
            <input type="hidden" name="is_published" value="0">
            <div class="flex items-center gap-3">
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_published" value="1" class="sr-only peer" checked>
                    <div class="w-12 h-7 bg-gray-200 rounded-full peer peer-checked:bg-blue-500 transition"></div>
                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition peer-checked:translate-x-5"></div>
                </label>
                <span class="text-sm text-gray-700">Published</span>
            </div>
        </div>
        <div class="md:col-span-2">
            <button class="bg-black text-white px-5 py-2 rounded-lg">Create</button>
        </div>
    </form>
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


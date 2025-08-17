@section('title', 'Edit Service')
<x-app-layout>
<div class="p-6">
    <h1 class="text-2xl font-bold">Edit Service</h1>
    <form action="{{ route('admin.services.update', $service) }}" method="POST" class="mt-6 grid md:grid-cols-2 gap-6">
        @csrf
        @method('PUT')
        <div>
            <label class="block text-sm">Title</label>
            <input type="text" name="title" value="{{ old('title', $service->title) }}" class="w-full border rounded-lg p-2 mt-1" required>
        </div>
        <div>
            <label class="block text-sm">Image URL</label>
            <input type="url" name="image_url" value="{{ old('image_url', $service->image_url) }}" class="w-full border rounded-lg p-2 mt-1">
        </div>
        <div class="md:col-span-2 mb-6">
            <label class="block text-sm">Short Excerpt</label>
            <input type="text" name="excerpt" value="{{ old('excerpt', $service->excerpt) }}" class="w-full border rounded-lg p-2 mt-1">
        </div>
        <div class="md:col-span-2">
            <label class="block text-sm">Body</label>
            <div id="service-editor" class="bg-white border rounded-lg mt-1"></div>
            <input type="hidden" name="body" id="service-body">
        </div>
        <div class="md:col-span-2">
            <label class="block text-sm mb-2">Active</label>
            <input type="hidden" name="is_active" value="0">
            <div class="flex items-center gap-3">
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="is_active" value="1" class="sr-only peer" {{ $service->is_active ? 'checked' : '' }}>
                    <div class="w-12 h-7 bg-gray-200 rounded-full peer peer-checked:bg-green-500 transition"></div>
                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition peer-checked:translate-x-5"></div>
                </label>
                <span class="text-sm text-gray-700">Active</span>
            </div>
        </div>
        <div class="md:col-span-2">
            <button class="bg-black text-white px-5 py-2 rounded-lg">Save Changes</button>
        </div>
    </form>
 </div>
@push('scripts')
<script>
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
    const quillService = new Quill('#service-editor', { theme: 'snow',
        modules: {
            toolbar: toolbarOptions
        }
     });
    quillService.root.innerHTML = @json(old('body', $service->body));
    document.querySelector('form').addEventListener('submit', function() {
        document.getElementById('service-body').value = quillService.root.innerHTML;
    });
</script>
@endpush
</x-app-layout>


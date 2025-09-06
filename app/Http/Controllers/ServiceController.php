<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Cloudinary\Cloudinary;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::query()->where('is_active', true)->latest()->paginate(9);
        return view('services.index', compact('services'));
    }

    public function show(Service $service)
    {
        return view('services.show', compact('service'));
    }

    public function adminIndex()
    {
        $services = Service::latest()->paginate(15);
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'body' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'in:0,1',
        ]);
        
        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_active'] = $request->boolean('is_active');

        // Handle image upload to Cloudinary
        if ($request->hasFile('image')) {
            $cloudinary = new Cloudinary();
            $cloudinaryResponse = $cloudinary->uploadApi()->upload($request->file('image')->getRealPath(), [
                'resource_type' => 'image',
                'folder' => 'visiting-angels/services'
            ]);
            $validated['image_url'] = $cloudinaryResponse['secure_url'];
        }

        Service::create($validated);
        return redirect()->route('admin.services.index')->with('success', 'Service created');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'excerpt' => 'nullable|string|max:500',
            'body' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_active' => 'in:0,1',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_active'] = $request->boolean('is_active');

        // Handle image upload to Cloudinary
        if ($request->hasFile('image')) {
            $cloudinary = new Cloudinary();
            $cloudinaryResponse = $cloudinary->uploadApi()->upload($request->file('image')->getRealPath(), [
                'resource_type' => 'image',
                'folder' => 'visiting-angels/services'
            ]);
            $validated['image_url'] = $cloudinaryResponse['secure_url'];
        }

        $service->update($validated);
        return redirect()->route('admin.services.index')->with('success', 'Service updated');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')->with('success', 'Service deleted');
    }

    public function toggle(Service $service)
    {
        $service->is_active = !$service->is_active;
        $service->save();
        return back()->with('success', 'Service status updated');
    }
}


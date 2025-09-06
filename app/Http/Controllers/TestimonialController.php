<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(15);
        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'quote' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_published' => 'in:0,1',
        ]);

        $validated['is_published'] = $request->boolean('is_published');

        // Handle image upload to Cloudinary
        if ($request->hasFile('image')) {
            $cloudinary = new Cloudinary();
            $cloudinaryResponse = $cloudinary->uploadApi()->upload($request->file('image')->getRealPath(), [
                'resource_type' => 'image',
                'folder' => 'visiting-angels/testimonials'
            ]);
            $validated['image_url'] = $cloudinaryResponse['secure_url'];
        }

        Testimonial::create($validated);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial created');
    }

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'role' => 'nullable|string|max:255',
            'quote' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'is_published' => 'in:0,1',
        ]);
        
        $validated['is_published'] = $request->boolean('is_published');

        // Handle image upload to Cloudinary
        if ($request->hasFile('image')) {
            $cloudinary = new Cloudinary();
            $cloudinaryResponse = $cloudinary->uploadApi()->upload($request->file('image')->getRealPath(), [
                'resource_type' => 'image',
                'folder' => 'visiting-angels/testimonials'
            ]);
            $validated['image_url'] = $cloudinaryResponse['secure_url'];
        }

        $testimonial->update($validated);
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial updated');
    }

    public function destroy(Testimonial $testimonial)
    {
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted');
    }

    public function toggle(Testimonial $testimonial)
    {
        $testimonial->is_published = !$testimonial->is_published;
        $testimonial->save();
        return back()->with('success', 'Publish status updated');
    }
}


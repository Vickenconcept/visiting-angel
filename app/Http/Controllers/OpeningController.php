<?php

namespace App\Http\Controllers;

use App\Models\Opening;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class OpeningController extends Controller
{
    public function index()
    {
        $openings = Opening::query()->where('is_published', true)->latest()->paginate(9);
        return view('openings.index', compact('openings'));
    }

    public function show(Opening $opening)
    {
        return view('openings.show', compact('opening'));
    }

    public function adminIndex()
    {
        $openings = Opening::latest()->paginate(20);
        return view('admin.jobs.index', compact('openings'));
    }

    public function create()
    {
        return view('admin.jobs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'nullable|string|max:255',
            'salary' => 'nullable|string|max:255',
            'employment_type' => 'required|in:full-time,part-time,per-diem,contract',
            'is_active' => 'in:0,1',
            'is_published' => 'in:0,1',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_active'] = $request->boolean('is_active');
        $validated['is_published'] = $request->boolean('is_published');

        Opening::create($validated);
        return redirect()->route('admin.openings.index')->with('success', 'Opening created');
    }

    public function edit(Opening $opening)
    {
        return view('admin.jobs.edit', compact('opening'));
    }

    public function update(Request $request, Opening $opening)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'nullable|string|max:255',
            'salary' => 'nullable|string|max:255',
            'employment_type' => 'required|in:full-time,part-time,per-diem,contract',
            'is_active' => 'in:0,1',
            'is_published' => 'in:0,1',
        ]);

        $validated['slug'] = Str::slug($validated['title']);
        $validated['is_active'] = $request->boolean('is_active');
        $validated['is_published'] = $request->boolean('is_published');

        $opening->update($validated);
        return redirect()->route('admin.openings.index')->with('success', 'Opening updated');
    }

    public function destroy(Opening $opening)
    {
        $opening->delete();
        return redirect()->route('admin.openings.index')->with('success', 'Opening deleted');
    }
}


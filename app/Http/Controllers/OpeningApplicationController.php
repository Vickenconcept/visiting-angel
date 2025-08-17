<?php

namespace App\Http\Controllers;

use App\Models\Opening;
use App\Models\OpeningApplication;
use Illuminate\Http\Request;

class OpeningApplicationController extends Controller
{
    public function store(Request $request, Opening $opening)
    {
        if (!$opening->is_active) {
            return back()->with('error', 'This opening is closed and no longer accepting applications.');
        }
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'nullable|string|max:50',
            'resume' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
            'message' => 'nullable|string',
        ]);

        $resumePath = null;
        if ($request->hasFile('resume')) {
            $resumePath = $request->file('resume')->store('resumes', 'public');
        }

        OpeningApplication::create([
            'job_id' => $opening->id,
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'resume_path' => $resumePath,
            'message' => $validated['message'] ?? null,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Application submitted successfully');
    }

    public function adminIndex()
    {
        $status = request('status');
        $applications = OpeningApplication::with('opening')
            ->when($status, fn($q) => $q->where('status', $status))
            ->latest()
            ->paginate(20)
            ->appends(['status' => $status]);
        return view('admin.applications.index', compact('applications', 'status'));
    }

    public function updateStatus(OpeningApplication $application, Request $request)
    {
        $request->validate([
            'status' => 'required|in:pending,reviewed,shortlisted,rejected,hired',
        ]);
        $application->update(['status' => $request->input('status')]);
        return back()->with('success', 'Application status updated');
    }
}


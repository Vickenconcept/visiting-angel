<?php

namespace App\Http\Controllers;

use App\Models\Opening;
use App\Models\OpeningApplication;
use Illuminate\Http\Request;
use Cloudinary\Cloudinary;
use Illuminate\Support\Facades\Mail;

class OpeningApplicationController extends Controller
{
    // public function store(Request $request, Opening $opening)
    // {
    //     if (!$opening->is_active) {
    //         return back()->with('error', 'This opening is closed and no longer accepting applications.');
    //     }
    //     $validated = $request->validate([
    //         'name' => 'required|string|max:255',
    //         'email' => 'required|email|max:255|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
    //         'phone' => 'nullable|string|max:50',
    //         'resume' => 'nullable|file|mimes:pdf,doc,docx|max:10000',
    //         'message' => 'nullable|string|max:1000',
    //     ], [
    //         'email.required' => 'Email address is required.',
    //         'email.email' => 'Please enter a valid email address.',
    //         'email.regex' => 'Please enter a valid email address format.',
    //         'name.required' => 'Full name is required.',
    //         'name.max' => 'Name cannot exceed 255 characters.',
    //         'email.max' => 'Email address cannot exceed 255 characters.',
    //         'message.max' => 'Message cannot exceed 1000 characters.',
    //     ]);

    //     $resumeUrl = null;
    //     if ($request->hasFile('resume')) {
    //         $file = $request->file('resume');
    //         $cloudinary = new Cloudinary();
            
    //         // Get file extension and name for proper handling
    //         $extension = $file->getClientOriginalExtension();
    //         $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            
    //         $cloudinaryResponse = $cloudinary->uploadApi()->upload($file->getRealPath(), [
    //             'resource_type' => 'raw',
    //             'folder' => 'visiting-angels/resumes',
    //             'public_id' => $fileName,
    //             'format' => $extension,
    //             'use_filename' => true,
    //             'unique_filename' => true
    //         ]);
    //         $resumeUrl = $cloudinaryResponse['secure_url'];
    //     }

    //     OpeningApplication::create([
    //         'job_id' => $opening->id,
    //         'name' => $validated['name'],
    //         'email' => $validated['email'],
    //         'phone' => $validated['phone'] ?? null,
    //         'resume_path' => $resumeUrl,
    //         'message' => $validated['message'] ?? null,
    //         'status' => 'pending',
    //     ]);

    //     return back()->with('success', 'Application submitted successfully');
    // }

    public function store(Request $request, Opening $opening)
{
    if (!$opening->is_active) {
        return back()->with('error', 'This opening is closed and no longer accepting applications.');
    }

    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255|regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/',
        'phone' => 'nullable|string|max:50',
        'resume' => 'nullable|file|mimes:pdf,doc,docx|max:10000',
        'message' => 'nullable|string|max:1000',
    ]);

    $resumeUrl = null;
    if ($request->hasFile('resume')) {
        $file = $request->file('resume');
        $cloudinary = new Cloudinary();

        $extension = $file->getClientOriginalExtension();
        $fileName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);

        $cloudinaryResponse = $cloudinary->uploadApi()->upload($file->getRealPath(), [
            'resource_type' => 'raw',
            'folder' => 'visiting-angels/resumes',
            'public_id' => $fileName,
            'format' => $extension,
            'use_filename' => true,
            'unique_filename' => true
        ]);
        $resumeUrl = $cloudinaryResponse['secure_url'];
    }

    // ✅ Save and capture the created application
    $application = OpeningApplication::create([
        'job_id' => $opening->id,
        'name' => $validated['name'],
        'email' => $validated['email'],
        'phone' => $validated['phone'] ?? null,
        'resume_path' => $resumeUrl,
        'message' => $validated['message'] ?? null,
        'status' => 'pending',
    ]);

    // Send email to admin
    $recipient = env('MAIL_CONTACT_RECIPIENT');

    if (!empty($recipient)) {
        $subject = 'New Job Application for: ' . $opening->title;
        $lines = [
            'Job Title: ' . ($opening->title ?? ''),
            'Applicant Name: ' . ($application->name ?? 'N/A'),
            'Applicant Email: ' . ($application->email ?? 'N/A'),
            'Phone: ' . ($application->phone ?? 'N/A'),
            'Message: ' . ($application->message ?? 'N/A'),
            'Resume: ' . ($application->resume_path ?? 'N/A'),
            'Submitted At: ' . $application->created_at->format('Y-m-d H:i:s'),
        ];

        $body = "A new application has been submitted for a job opening.\n\n"
            . implode("\n", $lines)
            . "\n\nView Application: " . route('openings.show', $application->id);

        Mail::raw($body, function ($message) use ($recipient, $subject) {
            $message->to($recipient)->subject($subject);
        });
    }

    return back()->with('success', 'Application submitted successfully');
}


    public function adminIndex()
    {
        $status = request('status');
        $startDate = request('start_date');
        $endDate = request('end_date');

        $applications = OpeningApplication::with('opening')
            ->when($status, fn($q) => $q->where('status', $status))
            ->when($startDate, fn($q) => $q->whereDate('created_at', '>=', $startDate))
            ->when($endDate, fn($q) => $q->whereDate('created_at', '<=', $endDate))
            ->latest()
            ->paginate(20)
            ->appends([
                'status' => $status,
                'start_date' => $startDate,
                'end_date' => $endDate,
            ]);

        return view('admin.applications.index', compact('applications', 'status', 'startDate', 'endDate'));
    }

    public function updateStatus(OpeningApplication $application, Request $request)
    {
        $request->validate([
            'status' => 'required|in:pending,reviewed,shortlisted,rejected,hired',
        ]);
        $application->update(['status' => $request->input('status')]);
        return back()->with('success', 'Application status updated');
    }

    public function destroy(OpeningApplication $application)
    {
        $application->delete();
        return back()->with('success', 'Application deleted successfully');
    }
}


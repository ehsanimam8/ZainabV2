<?php

use Illuminate\Support\Facades\Route;

use App\Models\Program;
use App\Models\Event;

Route::get('/', function () {
    $programs = Program::active()->take(3)->get();
    $events = Event::published()->orderBy('start_date', 'asc')->take(3)->get();
    $totalPrograms = Program::active()->count();
    $totalEvents = Event::published()->count();
    return view('welcome', compact('programs', 'events', 'totalPrograms', 'totalEvents'));
});
Route::get('/admin-static', function () { return view('admin'); });
Route::middleware(['auth'])->group(function () {
    Route::get('/portal', \App\Livewire\PortalDashboard::class)->name('portal.dashboard');
    Route::get('/portal/course/{sectionId}', \App\Livewire\CourseViewer::class)->name('portal.course-viewer');
    Route::get('/teacher', \App\Livewire\TeacherDashboard::class)->name('teacher.dashboard');
});

Route::get('/enroll', \App\Livewire\EnrollmentFlow::class)->name('enroll');
Route::get('/donate', \App\Livewire\DonationFlow::class)->name('donate');
Route::get('/events', \App\Livewire\PublicEvents::class)->name('events');
Route::get('/programs', \App\Livewire\PublicPrograms::class)->name('programs');

Route::get('/certificates/{id}', function ($id) {
    $enrollment = \App\Models\Enrollment::with(['user', 'program'])->findOrFail($id);
    if ($enrollment->status !== 'Completed') abort(403, 'Certificate not earned yet.');
    
    return view('certificates.download', compact('enrollment'));
})->name('certificates.download');

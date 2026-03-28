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
Route::get('/portal', \App\Livewire\PortalDashboard::class);
Route::get('/enroll', \App\Livewire\EnrollmentFlow::class);
Route::get('/teacher', \App\Livewire\TeacherDashboard::class);
Route::get('/donate', \App\Livewire\DonationFlow::class);
Route::get('/events', \App\Livewire\PublicEvents::class);
Route::get('/programs', \App\Livewire\PublicPrograms::class);

Route::get('/certificates/{id}', function ($id) {
    $enrollment = \App\Models\Enrollment::with(['user', 'program'])->findOrFail($id);
    if ($enrollment->status !== 'Completed') abort(403, 'Certificate not earned yet.');
    
    return view('certificates.download', compact('enrollment'));
})->name('certificates.download');

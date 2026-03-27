<?php

use Illuminate\Support\Facades\Route;

use App\Models\Program;
use App\Models\Event;

Route::get('/', function () {
    $programs = Program::where('status', 'active')->take(3)->get();
    $events = Event::where('status', 'published')->orderBy('start_date', 'asc')->take(3)->get();
    return view('welcome', compact('programs', 'events'));
});
Route::get('/admin-static', function () { return view('admin'); });
Route::get('/portal', \App\Livewire\PortalDashboard::class);
Route::get('/enroll', \App\Livewire\EnrollmentFlow::class);
Route::get('/teacher', \App\Livewire\TeacherDashboard::class);
Route::get('/donate', \App\Livewire\DonationFlow::class);
Route::get('/events', \App\Livewire\PublicEvents::class);
Route::get('/programs', \App\Livewire\PublicPrograms::class);

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;
use App\Models\Job;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\JobApplicationController;
use App\Http\Controllers\JobSeekerProfileController;
use App\Http\Controllers\PasswordController;

use Illuminate\Support\Facades\Mail;

// Route::get('/', function () {
//     return view('home');      
// });

Route::get('test',function()
{
    $job= Job::first();
    TranslateJob::dispatch($job);
    return 'done';
});

Route::view('/','home');
Route::view('/contact','contact');
Route::get('/jobs', [JobController::class,'index']);
Route::get('/jobs/create',[JobController::class, 'create'])->middleware('auth');
Route::get('/jobs/{job}', [JobController::class,'show']);
Route::post('/jobs',[JobController::class,'store'])->middleware('auth');

Route::get('/jobs/{job}/edit', [JobController::class,'edit'])
    ->middleware('auth')
    ->can('update','job');

Route::patch('/jobs/{job}',[JobController::class,'update'])->name('update')
    ->middleware('auth')
    ->can('update', 'job');

Route::delete('/jobs/{job}', [JobController::class,'destroy'])
    ->middleware('auth')
    ->can('delete','job');

//auth routes

Route::get('/register',[RegisteredUserController::class,'create']);
Route::post('/register',[RegisteredUserController::class,'store']);

Route::get('/login',[SessionController::class,'create'])->name(('login'));
Route::post('/login',[SessionController::class,'store']);
Route::post('/logout',[SessionController::class,'destroy']);


Route::get('/profile', [ProfileController::class, 'show'])->middleware('auth');


Route::post('/jobs/{job}/apply', function (Job $job) {
    // later we’ll save applications here
        return back()->with('success', 'Applied successfully!');
    })  ->middleware('auth')
        ->can('apply', 'job');

Route::post('/jobs/{job}/apply', [JobApplicationController::class, 'store'])
    ->middleware('auth');

Route::get('/profile/password', [PasswordController::class, 'edit'])
    ->middleware('auth')
    ->name('password.edit');

Route::post('/profile/password', [PasswordController::class, 'update'])
    ->middleware('auth')
    ->name('password.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [RegisteredUserController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [RegisteredUserController::class, 'update'])->name('profile.update');
});

Route::middleware('auth')->group(function () {
    Route::get('/jobseeker/profile', [JobSeekerProfileController::class, 'edit'])
        ->name('jobseeker.profile.edit');
    Route::post('/jobseeker/profile', [JobSeekerProfileController::class, 'update'])
        ->name('jobseeker.profile.update');
});

Route::get('/jobseekers/{user}', [JobSeekerProfileController::class, 'show'])
    ->name('jobseeker.show');

Route::get('/jobs/{job}/applications', [JobApplicationController::class, 'index'])
    ->middleware('auth');

Route::patch('/applications/{application}/status', 
    [JobApplicationController::class, 'updateStatus']
)->middleware('auth');







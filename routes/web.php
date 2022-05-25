<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [FrontController::class, 'index'])->name('index');
Route::get('/resume', [FrontController::class, 'resume'])->name('resume');
Route::get('/portfolio', [FrontController::class, 'portfolio'])->name('portfolio');
Route::get('/blog', [FrontController::class, 'blog'])->name('blog');
Route::get('/contact', [FrontController::class, 'contact'])->name('contact');

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/education-list', [EducationController::class, 'list'])->name('admin.education.list');
    Route::post('/education-change-status', [EducationController::class, 'changeStatus'])->name('admin.education.changeStatus');
    Route::post('/education-delete', [EducationController::class, 'delete'])->name('admin.education.delete');
    Route::get('/education-add', [EducationController::class, 'addShow'])->name('admin.education.add');
    Route::post('/education-add', [EducationController::class, 'add']);

    Route::get('/experience-list', [ExperienceController::class, 'list'])->name('admin.experience.list');
    Route::get('/experience-add', [ExperienceController::class, 'addShow'])->name('admin.experience.add');
    Route::post('/experience-add', [ExperienceController::class, 'add']);
    Route::post('/experience-change-status', [ExperienceController::class, 'changeStatus'])->name('admin.experience.changeStatus');
    Route::post('/experience-change-active', [ExperienceController::class, 'activeStatus'])->name('admin.experience.activeStatus');
    Route::post('/experience-delete', [ExperienceController::class, 'delete'])->name('admin.experience.delete');
});






Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

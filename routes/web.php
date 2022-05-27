<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\PersonalInformationController;

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

    Route::prefix('/education')->group(function () {
        Route::get('/list', [EducationController::class, 'list'])->name('admin.education.list');
        Route::post('/change-status', [EducationController::class, 'changeStatus'])->name('admin.education.changeStatus');
        Route::post('/delete', [EducationController::class, 'delete'])->name('admin.education.delete');
        Route::get('/add', [EducationController::class, 'addShow'])->name('admin.education.add');
        Route::post('/add', [EducationController::class, 'add']);
    });

    Route::prefix('/experience')->group(function () {
        Route::get('/list', [ExperienceController::class, 'list'])->name('admin.experience.list');
        Route::get('/add', [ExperienceController::class, 'addShow'])->name('admin.experience.add');
        Route::post('/add', [ExperienceController::class, 'add']);
        Route::post('/change-status', [ExperienceController::class, 'changeStatus'])->name('admin.experience.changeStatus');
        Route::post('/change-active', [ExperienceController::class, 'activeStatus'])->name('admin.experience.activeStatus');
        Route::post('/delete', [ExperienceController::class, 'delete'])->name('admin.experience.delete');
    });

    Route::get('personal_information', [PersonalInformationController::class, 'index'])->name('personalInformation.index');
    Route::get('personal_add', [PersonalInformationController::class, 'create']);
    Route::post('personal_add', [PersonalInformationController::class, 'add'])->name('personal_add');
    Route::get('personal_edit/{id}', [PersonalInformationController::class, 'edit'])->name('personal_edit');
    Route::patch('personal_information/{id}', [PersonalInformationController::class, 'update'])->name('personal_update');
    Route::delete('personal_sil/{id}', [PersonalInformationController::class, 'destroy'])->name('personal_delete');
});






Route::get('logs', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index']);

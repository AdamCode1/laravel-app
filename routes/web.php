<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use App\Models;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
// */

//Route Welcome

Route::get('/laravel', function (){return view('welcome');});

//Route auth

Route::get('/', [LoginController::class,'index'])->name('login.index');

Route::get('/login/register', [LoginController::class,'register'])->name('login.register');

Route::post('/login/save', [LoginController::class,'save'])->name('login.save');

Route::post('/login/check', [LoginController::class,'check'])->name('login.check');

Route::get('/logout', [LoginController::class,'logout'])->name('logout');







Route::group(['middleware'=>['login']],function(){
 


        //Route Cours

    Route::get('/home', function () { return view('layouts.app');})->name('home');

    Route::get('/courses',[CourseController::class,'index'])->name('courses.index');

    Route::get('/courses/create',[CourseController::class,'create'])->name('courses.create');

    Route::post('/courses',[CourseController::class,'store'])->name('courses.store');

    Route::get('/courses/{id}/edit',[CourseController::class,'edit'])->name('courses.edit');

    Route::put('/courses/{id}', [CourseController::class,'update'])->name('courses.update');

    Route::delete('/courses/{id}', [CourseController::class,'destroy'])->name('courses.destroy');

    Route::get('/courses/search', [CourseController::class,'search'])->name('courses.search');
    
    Route::get('/courses/{id}',[CourseController::class,'show'])->name('courses.show');






    //Route Etudiants

    Route::get('/students/Statistique', [StatistiqueController::Class,'Statistique'])->name('statistique');

    Route::get('/students', [StudentController::class,'index'])->name('students.index');

    Route::get('/students/create',[StudentController::class,'create'])->name('students.create');

    Route::post('/students',[StudentController::class,'store'])->name('students.store');

    Route::get('/students/{student}/edit',[StudentController::class,'edit'])->name('students.edit');

    Route::put('/students/{student}',[StudentController::class,'update'])->name('students.update');

    Route::delete('/students/{student}',[StudentController::class,'destroy'])->name('students.destroy');

    Route::get('/students/search',[StudentController::class,'search'])->name('students.search');

    Route::get('/students/{student}',[StudentController::class,'show'])->name('students.show');



});
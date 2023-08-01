<?php
use App\Http\Controllers\Student;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('edit');
});

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('student',[Student::class,'index']);
Route::get('add-student',[Student::class,'create']);
Route::post('add-student', [Student::class, 'store']);
Route::get('edit-student/{id}',[Student::class,'edit']);
Route::put('update-student/{id}',[Student::class,'updateStudent']);
 Route::delete('delete-student/{id}',[Student::class,'destroy']);
//Route::put('update-student/{id}', 'Student@updateStudent'); 
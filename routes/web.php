<?php

use App\Http\Controllers\SubjectController;
use App\Admin\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    return view('welcome');
});

Auth::routes();

Route::post('/home', [SubjectController::class, 'save'])->name('proposeSubject');

Route::post('/random', [SubjectController::class, 'randomSubject'])->name('randomSubject');

Route::get('/home', function(){
    $subjects = new SubjectController;
    return view('home', ['subjects' => $subjects->subjectList()]);
}
)->name('home');

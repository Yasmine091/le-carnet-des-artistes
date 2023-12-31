<?php

use App\Http\Controllers\SubjectController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\AdherentController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    $events = new EventController;
    $adherents = new AdherentController;
    return view('welcome', [
        'events' => $events->eventList(),
        'adherents' => $adherents->adherentList()
    ]);
});

Auth::routes();

Route::post('/home', [SubjectController::class, 'save'])->name('proposeSubject');

Route::post('/random', [SubjectController::class, 'randomSubject'])->name('randomSubject');

Route::get('/home', function(){
    $subjects = new SubjectController;
    return view('home', ['subjects' => $subjects->subjectList()]);
}
)->name('home');

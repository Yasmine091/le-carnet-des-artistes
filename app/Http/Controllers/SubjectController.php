<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function subjectList(){
        $subjects = DB::table('subjects')
        ->where('allow', 1)
        ->get();

        return view('home', ['subjects' => $subjects]);
    }

    public function save(Request $form){
        DB::table('subjects')->insert([
            'user_id' => $form->input('user_id'),
            'content' => $form->input('subject'),
            'allow' => 0,
            'status' => 0
            ]);
        return view('home', ['alert' => 'Succès! Votre proposition à bien été prise en compte.']);
    }
}

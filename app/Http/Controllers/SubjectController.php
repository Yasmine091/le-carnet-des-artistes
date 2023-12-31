<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    public function subjectList()
    {
        $subjects = DB::table('subjects')
            ->select(DB::raw('subjects.id, subjects.content, subjects.status, users.first_name, users.last_name'))
            ->join('users', 'users.id', '=', 'subjects.user_id')
            ->where('subjects.allow', 1)
            ->get();

        return $subjects;
    }

    public function save(Request $form)
    {
        DB::table('subjects')->insert([
            'user_id' => $form->input('user_id'),
            'content' => $form->input('subject'),
            'allow' => 0,
            'status' => 0
        ]);

        $subjects = $this->subjectList();

        return view('home', [
            'alert' => 'Succès! Votre proposition à bien été prise en compte.',
            'subjects' => $subjects
        ]);
    }

    public function randomSubject()
    {
        $random = DB::table('subjects')
            ->select(DB::raw('subjects.id, subjects.content, subjects.status, users.first_name, users.last_name'))
            ->join('users', 'users.id', '=', 'subjects.user_id')
            ->where('subjects.allow', 1)
            ->where('subjects.status', 0)
            ->inRandomOrder()
            ->limit(1)
            ->get();

            //dd($random['0']);

            DB::table('subjects')
            ->where('id', $random['0']->id)
            ->update(['status' => 1]);

            $subjects = $this->subjectList();

            return view('home', [
                'alert' => 'Succès! Le tirage au sort a bien été réalisé.',
                'subjects' => $subjects,
                'random' => $random
            ]);
    }
}

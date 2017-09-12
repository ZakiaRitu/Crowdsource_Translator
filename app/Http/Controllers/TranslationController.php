<?php

namespace App\Http\Controllers;
use DB;
use App\Translation;
use Illuminate\Http\Request;

class TranslationController extends Controller
{
    public function create()
    {
        $trans = Translation::where('user_id', \Auth::user()->id)->pluck('id')->all();
        $sentence = \App\Sentence::whereNotIn('id',$trans )->inRandomOrder()->first();
        return view('translation', compact('sentence'))->with('title', "New Translation");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $translation= new Translation();
        $translation->translate = $request->translate;
        $translation->user_id = \Auth::user()->id;
        $translation->sentence_id = $request->sentence_id;
        if ($translation->save()) {
            return redirect()->back()->with('success', 'Translation Successfully Submitted');
        } else {
            return redirect()->back()->with('error', 'Something went wrong, Please Try Again');
        }
    }




    public function leaderBoard(){
          $leader = Translation::select('id','user_id', \DB::raw('count(*) as total'))
            ->groupBy('user_id')
            ->get();
          $leaderboard = $leader->sortByDesc('total');

        return view('leaderboard', compact('leaderboard'))->with('title', "Leader Board");
    }



    public function history(){
        $history = Translation::where('user_id', \Auth::user()->id)->get();
        return view('history', compact('history'))->with('title', "History");
    }


}

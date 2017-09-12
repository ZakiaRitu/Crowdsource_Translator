<?php

namespace App\Http\Controllers;

use App\Http\Requests\SentenceRequest;
use Illuminate\Http\Request;
use App\Sentence;
class SentenceController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $sentences = Sentence::all();
        return view('sentence.index', compact('sentences'))->with('title', "Sentence List");
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('sentence.create')->with('title', "Create New Sentence");
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $sentence = new Sentence();
        $sentence->sentence = $request->sentence;
        if ($sentence->save()) {
            return redirect()->back()->with('success', 'Sentence Successfully Created');
        } else {
            return redirect()->back()->with('error', 'Something went wrong, Please Try Again');
        }

    }


    /**
     * For Showing Single Content
     * @param $id
     */
    public  function show($id){
        $sentence = Sentence::findOrFail($id);
        return view('sentence.show', compact('sentence'))->with('title', 'Single Content');
    }







    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sentence = Sentence::findOrFail($id);
        return view('sentence.edit', compact('sentence'))->with('title', "Edit Sentence");
    }


    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $sentence = Sentence::findOrFail($id);
        $sentence->sentence = $request->sentence;
        $sentence->save();
        return redirect()->back()->with('success', 'Sentence Successfully Updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Sentence::destroy($id);
        return redirect()->route('sentence.index')->with('success', "Sentence Successfully deleted");
    }

}

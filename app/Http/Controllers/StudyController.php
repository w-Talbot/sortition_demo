<?php

namespace App\Http\Controllers;

use App\Study;
use App\Randomisation;
use Illuminate\Http\Request;
use App\Http\Requests\StoreStudyRequest;
use App\Http\Requests\UpdateStudyRequest;

class StudyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('studies.index',[
            'studies' => Study::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('studies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudyRequest $request)
//    public function store(Request $request)
    {
        dd($request);
        $formFields = $request->validate([
            'study_name' => 'required',
            'study_description' => 'required'
        ]);

        //item-to-check : this is for initial testing:
        $formFields['logo'] = $request['logo'];



        Study::create($formFields);
        return redirect('/studies/index')->withStatus('Study successfully created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function show(Study $study)
    {

        $randomisations = Randomisation::all()->where('study_id','=',$study->id);

        return view('studies.show', ['study' => $study ,'randomisations' => $randomisations]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function edit(Study $study)
    {
        return view('studies.edit', ['study' => $study ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudyRequest  $request
     * @param  \App\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudyRequest $request, Study $study)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Study  $study
     * @return \Illuminate\Http\Response
     */
    public function destroy(Study $study)
    {
        //
    }
}

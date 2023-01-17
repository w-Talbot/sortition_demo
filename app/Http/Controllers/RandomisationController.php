<?php

namespace App\Http\Controllers;

use App\Randomisation;
use App\Study;
use Illuminate\Http\Request;

class RandomisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Study $study)
    {
        return view('randomisations.create', ['study' => $study ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Study $study)
    {
//        dd($request);

        //item-to-check : this will need to call the currently non-existent randomisation module

        //Temp fields:
        $formFields = $request->validate([
            'participant_id' => 'required'
        ]);
        $formFields['study_id'] = $study->id;
        $formFields['allocation'] = 'Intervention';
        $formFields['randomised_by'] = 'superuser';
        $formFields['randomisation_date'] = new \DateTime('today');
    //END Temp fields


        Randomisation::create($formFields);
        return redirect('/studies/' . $study->id)->withStatus('Participant successfully randomised.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Randomisation  $randomisation
     * @return \Illuminate\Http\Response
     */
    public function show(Study $study, Randomisation $randomisation)
    {
//        item-to-check : want to display study_name in the url
        return view('randomisations.show', ['study' => $study, 'randomisation' => $randomisation ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Randomisation  $randomisation
     * @return \Illuminate\Http\Response
     */
    public function edit(Randomisation $randomisation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Randomisation  $randomisation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Randomisation $randomisation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Randomisation  $randomisation
     * @return \Illuminate\Http\Response
     */
    public function destroy(Randomisation $randomisation)
    {
        //
    }
}

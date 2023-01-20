<?php

namespace App\Http\Controllers;

use App\Study;
use App\Site;
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
//        item-to-check : not sure about which Request option here is better. Above or below?
//    public function store(Request $request)
    {
//        dd($request);

        //Study Info:
        $formFields = $request->validate([
            'study_name' => 'required',
            'study_description' => 'required'
        ]);

        //item-to-check : this is for initial testing need to add real logo path
        $formFields['logo'] = $request['logo'];

        Study::create($formFields);

        //END Study Info

        //Site Info:

        //Get most recent study ID (the one just made):
        $study_id = Study::orderBy('id', 'desc')->first();

        //Collects from $request all site variables (ex: site_name_0 and site_value_0)
        $site_array = array();
        foreach($request->except('_token') as $key => $value){
            $needle = substr($key,0 , 4);
            if( $needle === 'site'){
                $site_array[$key] = $request->input($key);
            }
        }
        //Stores each site, referencing the study_id
        if(!empty($site_array)){
            //number_of_sites is all sites info, divided by two categories per site:
            $number_of_sites = (sizeof($site_array)/2);
            for($i = 0; $i < $number_of_sites; $i++){
                $tmp_array = [
//                    item-to-check : this values should not be hardcoded
                    'study_id' => $study_id->id,
                    'site_name' => $site_array['site_name_' . $i],
                    'site_value' => $site_array['site_value_' . $i]
                ];
                Site::create($tmp_array);
            }
        }

        //END : Site Info

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
        $sites = Site::all()->where('study_id','=',$study->id);

        return view('studies.show', ['study' => $study ,'randomisations' => $randomisations, 'sites' => $sites]);
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

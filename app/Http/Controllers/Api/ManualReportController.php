<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\ManualReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManualReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ManualReport = ManualReport::all();      
        return response()->json($ManualReport);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function operation()
    {
        $ManualReport = ManualReport::select('id', 'date')
 
        ->withSum('male', 'female','paeds_male','paeds_female')

        ->get()

        ->toArray();



dd($ManualReport);
    }


    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $ManualReport = new ManualReport;
        $ManualReport->date =  $request ->        date;
        $ManualReport->time =  $request ->    time;
        $ManualReport->pkrc =  $request ->    pkrc;
        $ManualReport->male =  $request ->        male;
        $ManualReport->female =  $request ->      female;
        $ManualReport->paeds_male =  $request ->    paeds_male;
        $ManualReport->paeds_female =  $request ->    paeds_female;
        $ManualReport->carer =  $request ->       carer;
        $ManualReport->local =  $request ->    local;
        $ManualReport->non_local =  $request ->    non_local;
        $ManualReport->bor =  $request ->    bor;
        $ManualReport->stage_1 =  $request ->    stage_1;
        $ManualReport->stage_2 =  $request ->    stage_2;
        $ManualReport->staff =  $request ->       staff;
        $ManualReport->notes =  $request ->    notes;

        $ManualReport->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ManualReport  $ManualReport
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ManualReport = DB::table('manual_reports')->where('id',$id)->first();
        return response()->json($ManualReport);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ManualReport  $ManualReport
     * @return \Illuminate\Http\Response
     */
    public function edit(ManualReport $ManualReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ManualReport  $ManualReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['date'] = $request -> date;
        $data['time'] = $request -> time;
        $data['male'] = $request ->  male;
        $data['female'] = $request -> female;
        $data['paeds_male'] = $request -> paeds_male;
        $data['paeds_female'] = $request -> paeds_female;
        $data['carer'] = $request ->carer;
        $data['local'] = $request -> local;
        $data['non_local'] = $request -> non_local;
        $data['bor'] = $request -> bor;
        $data['stage_1'] = $request -> stage_1;
        $data['stage_2'] = $request -> stage_2;
        $data['staff'] = $request -> staff;
        $data['notes'] = $request -> notes;


        DB::table('manual_reports')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ManualReport  $ManualReport
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('manual_reports')->where('id',$id)->delete();
    }
}

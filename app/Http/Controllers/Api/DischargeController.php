<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\discharge;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dischargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discharge = discharge::all();      
        return response()->json($discharge);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        $discharge = new discharge;
        $discharge->reg_number = $request ->  reg_number;
        $discharge->date = $request    ->  date;
        $discharge->duration = $request    ->  duration;
        $discharge->type_dc = $request    ->  type_dc;
        $discharge->notes = $request    ->  notes;    
        $discharge->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\discharge  $discharge
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $discharge = DB::table('discharges')->where('id',$id)->first();
        return response()->json($discharge);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\discharge  $discharge
     * @return \Illuminate\Http\Response
     */
    public function edit(discharge $discharge)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\discharge  $discharge
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = array();
        $data['reg_number']= $request->   reg_number;
        
        $data['date'] = $request -> date;
        $data['duration'] = $request -> duration;
        $data['type_dc'] = $request -> type_dc;
        $data['notes'] = $request ->   notes;
        DB::table('discharges')->where('id',$id)->update($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\discharge  $discharge
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('discharges')->where('id',$id)->delete();
    }
}

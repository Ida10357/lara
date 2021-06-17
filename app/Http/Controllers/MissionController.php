<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Mission;
use App\Models\Direction;
use App\Models\recommandation;

class MissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->groupe_id===1)
            $mission = DB::table('missions')->selectRaw('
            missions.id as id, intitule, debut, fin,directions.libelle as direction, directions.id'
    
            )->join('directions', 'directions.id', '=', 'missions.direction_id')
            ->get();
            //return redirect()->route('mission.index');
    return view('mission.index', compact('mission'));
    }

    /**                                            
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $direction_list=Direction::all();
        return view('mission.create',[
            'direction_list'=>$direction_list,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $Request)
    {
        DB::beginTransaction();
        $mission =  Mission::create([
             'intitule' => $Request->intitule,
             'debut' => $Request->debut,
             'fin' => $Request->fin,
             'direction_id' => $Request->direction,
             ]);
             DB::commit();
        //Mission::create($request->all());
        return redirect()->route('mission.index');
//return back()->withStatus(__('mission ajoutée avec succès'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mis=Mission::find($id);
        $direction=Direction::find($mis->id);
        $direction_list=Direction::all();
        //dd($direction);
        return view('mission.edit',[
            'mis'=>$mis,
            'direction'=>$direction,
            'direction_list'=>$direction_list,
        ]);
    }

    public function recommendations($id)
    {
        $mis=Mission::find($id);
        $recom=recommandation::where('mission_id',$mis->id)->get();
        //dd($mis);
        return view('recommendation.index',compact('recom','mis'));
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Mission::findOrFail($id)->update($request->all());
        return redirect()->route('mission.index');
        //return back()->withStatus(__('Mission modifié avec succès'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mission::destroy($id);
        return redirect()->route('mission.index');
    }
}

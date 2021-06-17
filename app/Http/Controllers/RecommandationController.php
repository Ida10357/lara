<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recommandation;
use App\Models\Mission;
use DB;
use Illuminate\Support\Facades\Auth;

class RecommandationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rec = DB::table('recommandations')->selectRaw('
            id, libelle, echeance, statut')
            ->get();
    
    return view('recommendation.index', compact('rec'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recommendation.create');
    }
    public function createrecom($id)
    {
        return view('recommendation.create',compact('id'));
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
        $rec =  Recommandation::create([
             'libelle' => $Request->libelle,
             'echeance' => $Request->echeance,
             'statut' => 'non traitée',
             'mission_id' => $Request->id,
             'auditeur_id'=>Auth::user()->id,
             ]);
        DB::commit();
             $mis=Mission::where('id',$rec->mission_id)->first();
            $recom=recommandation::where('mission_id',$mis->id)->get();
        //Mission::create($request->all());
        return view('recommendation.index', compact('recom','mis'));
        //return back();
    }
    public function recommendations(Request $Request, $id)
    {
        DB::beginTransaction();
        $rec =  Recommandation::create([
             'libelle' => $Request->libelle,
             'echeance' => $Request->echeance,
             'statut' => $Request->statut,
             'mission_id' => $Request->id,
             'auditeur_id'=>Auth::user()->id,
             ]);
             DB::commit();
        $mis=Mission::find($id);
        return back();
        //return view('recommendation.index',compact('mis'));
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
        $rec=recommandation::find($id);
        return view('recommendation.edit',compact('rec'));
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
        $reco=recommandation::find($id);

        $mis=Mission::where('id',$reco->mission_id)->first();
        $recom=recommandation::where('mission_id',$mis->id)->get();
        recommandation::findOrFail($id)->update($request->all());
        return view('recommendation.index',compact('mis','recom'));
    }

    /**
     * Remove the specified resource from storage..
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $rec=recommandation::find($id);
        $mis=Mission::where('id',$rec->mission_id)->first();
        $recom=recommandation::where('mission_id',$mis->id)->get();
        recommandation::destroy($id);
        return view('recommendation.index',compact('mis','recom'));
    }
}

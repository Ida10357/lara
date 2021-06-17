<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use DB;
use App\Http\Requests\UserRequest;
use App\Models\groupe;
use Illuminate\Support\Facades\Hash;
use phpDocumentor\Reflection\Types\This;

class UserController extends Controller
{
    /**
     * Display a listing of the users
     *
     * @param  \App\Models\User  $model
     * @return \Illuminate\View\View
     */
    public function index(User $model)
    {
        //return view('users.index', ['users' => $model->paginate(15)]);
        $user = DB::table('users')->selectRaw('
        users.id as id, nom, prenom, email, groupes.libelle as groupe'
        )->join('groupes', 'groupes.id', '=', 'users.groupe_id')
        ->get();

return view('users.index', compact('user'));
    }
    public function create()
    {
        $groupe_list=Groupe::all();
        return view('users.create',[
            'groupe_list'=>$groupe_list,
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
        $user =  User::create([
             'nom' => $Request->nom,
             'prenom' => $Request->prenom,
             'email' => $Request->email,
             'groupe_id' => $Request->groupe,
             'password'=>Hash::make('00000000'),
             ]);
             DB::commit();
             return redirect()->route('user.index');
        //Mission::create($request->all());
//return back()->withStatus(__('Utilisateur ajouté avec succès'));
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
        $user=User::find($id);
        $groupe=Groupe::find($user->id);
        $groupe_list=Groupe::all();
        //dd($direction);
        return view('users.edit',[
            'user'=>$user,
            'groupe'=>$groupe,
            'groupe_list'=>$groupe_list,
        ]);
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
        User::findOrFail($id)->update($request->all());
        
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect()->route('user.index');
        //return view('users.index');
    }
}

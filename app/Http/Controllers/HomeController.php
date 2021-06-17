<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index(User $user, Request $request)
    {
        //$isadmin=($user->groupe_id);
        $isadmin=$request->user()->groupe_id;
        if ($isadmin == 2) {
            $user = DB::table('users')->selectRaw('
        users.id as id, nom, prenom, email, groupes.libelle as groupe'
        )->join('groupes', 'groupes.id', '=', 'users.groupe_id')
        ->get();

return view('users.index', compact('user'));
        } elseif ($isadmin == 3) {
            
            //return view('dashdirecteur');
        } elseif ($isadmin==1) {
            return view('dashauditeur');
        } else {
            return dd('l\'utilisateur n\'existe pas');
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Utilisateur;
use Illuminate\Http\Request;
use App\Http\Controllers\UtilisateurController;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        // dd($request->all());
        $user = Utilisateur::where('email',$request->email)->first();
        // dd($user);
        if($user){
            if ($user->password===$request->pass) {
                session()->flush();
                session()->put('id_user',$user->id);

                return redirect()->action([UtilisateurController::class, 'index']);
            }
            else{
                return back()->with("messagedanger","le mot de passe est incorrect");
            }
        }
        else
        {
            return back()->with("messagedanger","aucun utilisateur trouver avec cet email");
        }
        
    }

}

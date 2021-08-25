<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserDataCollection;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_promotion;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class APiUserController extends Controller
{
    /*
     * $id int
     * Permet de lister tous les exeams d'un user
     */
    function ListExam (Request $request){

        $user = User::where('token', $request->token)->first();
        if(!$user){
            return [
                "error"   => true,
                "message" => "l'élève n'existe plus"
            ];
        }
        $user->promotion;
        return new UserDataCollection($user);

    }

}

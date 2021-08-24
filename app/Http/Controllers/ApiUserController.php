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
    function ListExam ($id){

        $user = User::find($id);
        $user->promotion;
        return new UserDataCollection($user);

    }

}

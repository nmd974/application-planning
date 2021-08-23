<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\User_promotion;
use App\Http\Controllers\UserPromotionController;
use App\Http\Controllers\PromotionController;
use App\Models\Role;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
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
        //
        $validator = Validator::make($request->all(),
        [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255|email',
            'birthday' => 'required|date',
        ]);

        if($validator->fails()){
            return $validator->errors();
        }

        $user = new User();
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->email = $request['email'];
        $user->birthday = $request['birthday'];
        $user->role_id = 1;
        // $user->archived = false;

        if($user->save()){
            $user_promotion = new UserPromotionController();
            $user_promotion->store($user->id, $request['promotion_id']);
            if($user_promotion){
                return redirect()->route('usersByPromotion', $request['promotion_id'])->with(['messageSuccess' => "Elève ajouté avec succès"]);
            }
        }
        return redirect()->route('usersByPromotion', $request['promotion_id'])->with(['messageError' => "Echec lors de l'ajout de l'élève"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(),
        [
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|max:255|email',
            'birthday' => 'required|date',
        ]);

        if($validator->fails()){
            return $validator->errors();
        }

        $user = User::find($id);
        $user->first_name = $request['first_name'];
        $user->last_name = $request['last_name'];
        $user->email = $request['email'];
        $user->birthday = $request['birthday'];

        if($user->update()){
            return redirect()->route('usersByPromotion', $request['promotion_id'])->with(['messageSuccess' => "Elève modifié avec succès"]);
        }
        return redirect()->route('usersByPromotion', $request['promotion_id'])->with(['messageError' => "Echec lors de la modification de l'élève"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        // $user = User::find($id);
        // $user->archived = true;

        // if($user->update()){
        //     return redirect()->route('users.index')->with(['messageSuccess' => "Utilisateur supprimé avec succès"]);
        // }
        // return redirect()->route('users.index')->with(['messageError' => "Echec lors de la suppression de l'utilisateur"]);
    }
}

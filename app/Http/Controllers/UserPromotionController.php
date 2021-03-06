<?php

namespace App\Http\Controllers;

use App\Models\User_promotion;
use Illuminate\Http\Request;

class UserPromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    public function store($user_id, $promotion_id)
    {
        $verify = User_promotion::where([['user_id', $user_id],['promotion_id', $promotion_id]])->first();
        if($verify) {
            return false;
        }
        //
        $user_promotion = new User_promotion();
        $user_promotion->promotion_id = $promotion_id;
        $user_promotion->user_id = $user_id;
        // $user_promotion->archived = false;

        if($user_promotion->save()){
            return true;
        }
        return false;

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User_promotion  $user_promotion
     * @return \Illuminate\Http\Response
     */
    public function show(User_promotion $user_promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User_promotion  $user_promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(User_promotion $user_promotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User_promotion  $user_promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User_promotion $user_promotion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User_promotion  $user_promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy($user_id, $promotion_id)
    {

        $user_promotion = User_promotion::where(["user_id" => $user_id, "promotion_id" => $promotion_id])->get()->first();
        $user_promotion->archived = true;

        if($user_promotion->update()){
            return redirect()->route('usersByPromotion', $promotion_id)->with(['messageSuccess' => "El??ve supprim?? de la promotion"]);
        }
        return redirect()->route('usersByPromotion', $promotion_id)->with(['messageSuccess' => "Echec de la suppression de l'??l??ve de cette promotion"]);
    }
}

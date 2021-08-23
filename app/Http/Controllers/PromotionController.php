<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use PhpParser\JsonDecoder;
use Illuminate\Http\Request;
use App\Http\Resources\PromotionResource;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\PromotionCollection;

class PromotionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($vue = "promoEnCours")
    {
        if ($vue === "promoArchived") {
            return $this->listPromotionArchived();
        } else {
            return $this->listPromotionData();
        }
    }

    public function  listPromotionData()
    {
        $promotionsNotArchived = Promotion::where("archived", 0)->get();
        return
            view("promotions.promotionData")
            ->with('promotions', $promotionsNotArchived);
    }

    public function listPromotionArchived()
    {
        $promotionArchived = Promotion::where("archived", 1)->get();
        return
            view("promotions.promotionData")
            ->with('promotions', $promotionArchived);
    }

    public function dataPromotion($id)
    {
        $dataPromotion = Promotion::find($id);
        dd($dataPromotion->users);
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
        $validator = Validator::make(
            $request->all(),
            [
                'label' => 'required|string|max:100',
            ]
        );

        if ($validator->fails()) {
            return $this->listPromotionData()->with('messageError', 'test');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Promotion $promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Promotion $promotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promotion $promotion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promotion $promotion)
    {
        //
    }
}

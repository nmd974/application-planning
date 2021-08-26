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

    public function  listPromotionData($msg = null)
    {
        $promotionsNotArchived = Promotion::where("archived", 0)->get();
        // dd($promotionsNotArchived);
        return
            view("promotions.promotionData")
            ->with('promotions', $promotionsNotArchived)
            ->with(['messageSuccess' => $msg]);
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
// dd($dataPromotion->users);
        return
        view("users.userData")
        ->with(['users' => $dataPromotion->users, 'promotion_id' => $id, "label" => $dataPromotion->label]);
    }

    public function dataPromotionExam($id)
    {
        $dataPromotion = Promotion::find($id);
        // dd($dataPromotion->exams);
        return
        view("exams.examData")
        ->with(['promotion' => $dataPromotion, 'promotion_id' => $id, "label" => $dataPromotion->label]);
    }

    public function getInfoPromotion($id){
        $dataPromotion = Promotion::find($id);
        return json_encode($dataPromotion);
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
            return $this->listPromotionData('Echec lors de la modification de la promotion');
        }

        $promotion = New Promotion ;

        $promotion->label = $request->label;

        if($promotion->save()){
            return $this->listPromotionData("Promotion créée avec succès");
        }
        return $this->listPromotionData("Echec lors de la modification de la promotion");
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
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make(
            $request->all(),
            [
                'label' => 'required|string|max:100',
            ]
        );

        if ($validator->fails()) {
            return $this->listPromotionData('Echec lors de la modification de la promotion');
        }

        $promotion = Promotion::find($id);

        $promotion->label = $request->label;

        if($promotion->update()){
            return $this->listPromotionData("Promotion modifée avec succès");
        }
        return $this->listPromotionData("Echec lors de la modification de la promotion");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promotion  $promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy($promotion)
    {
        $promotionArchived = Promotion::find($promotion);
        $promotionArchived->archived = true;
        $promotionArchived->save();

        return $this->listPromotionData('promo archivée');
    }
}

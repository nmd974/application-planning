<?php

namespace App\Http\Controllers;

use App\Models\Exam_promotion;
use Illuminate\Http\Request;

class ExamPromotionController extends Controller
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
    public function store($exam_id, $promotion_id)
    {
        //
        $exam_promotion = new Exam_promotion();
        $exam_promotion->promotion_id = $promotion_id;
        $exam_promotion->exam_id = $exam_id;
        // $user_promotion->archived = false;

        if($exam_promotion->save()){
            return true;
        }
        return false;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam_promotion  $exam_promotion
     * @return \Illuminate\Http\Response
     */
    public function show(Exam_promotion $exam_promotion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam_promotion  $exam_promotion
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam_promotion $exam_promotion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exam_promotion  $exam_promotion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam_promotion $exam_promotion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam_promotion  $exam_promotion
     * @return \Illuminate\Http\Response
     */
    public function destroy($promotion_id,$exam_id)
    {

        $exam_promotion = Exam_promotion::where(["exam_id" => $exam_id, "promotion_id" => $promotion_id])->get()->first();
        $exam_promotion->archived = true;

        // dd($user_promotion->first());
        if($exam_promotion->update()){
            return redirect()->route('examsByPromotion', $promotion_id)->with(['messageSuccess' => "Examen supprimé de la promotion"]);
        }
        return redirect()->route('examsByPromotion', $promotion_id)->with(['messageSuccess' => "Echec de la suppression de l'examen de cette promotion"]);
    }
}

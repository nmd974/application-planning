<?php

namespace App\Http\Controllers;

use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ExamPromotionController;

class ExamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $exams = Exam::All() ;
        return view('exams.index')->with('exams',$exams );
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
        //

        $validator = Validator::make($request->all(),
        [
            'label' => 'required|max:255',
            'start_date' => 'required|date',
            'start_time' => 'required',
        ]);

        if($validator->fails()){
            return $validator->errors();
        }
        $date = date("Y-m-d H:i:s", strtotime($request["start_date"] . " " . $request["start_time"] . ":00"));
        $exam = new Exam();
        $exam->label = $request['label'];
        $exam->token = bcrypt("".$request['label'].",".$date."");
        // $exam = new Exam();
        // $exam->label = $request['label'];
        $exam->date_start = date("Y-m-d H:i:s", strtotime($request["start_date"] . " " . $request["start_time"] . ":00"));

        if($exam->save()){
            $exam_promotion = new ExamPromotionController();
            $exam_promotion->store($exam->id, $request['promotion_id']);
            if($exam_promotion){
                return redirect()->route('examsByPromotion', $request['promotion_id'])->with(['messageSuccess' => "Examen ajouté avec succès"]);
            }
        }
        return redirect()->route('examsByPromotion', $request['promotion_id'])->with(['messageError' => "Echec lors de l'ajout de l'examen"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function show(Exam $exam)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam $exam)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $validator = Validator::make($request->all(),
        [
            'label' => 'required|max:255',
            'start_date' => 'required|date',
            'start_time' => 'required',
        ]);

        if($validator->fails()){
            return $validator->errors();
        }
        $date = date("Y-m-d H:i:s", strtotime($request["start_date"] . " " . $request["start_time"] . ":00"));
        $exam = Exam::find($id);
        $exam->label = $request['label'];
        $exam->token = bcrypt("".$request['label'].",".$date."");
        $exam->date_start = date("Y-m-d H:i:s", strtotime($request["start_date"] . " " . $request["start_time"] . ":00"));

        if($exam->update()){
            return redirect()->route('examsByPromotion', $request['promotion_id'])->with(['messageSuccess' => "Examen modifié avec succès"]);
        }
        return redirect()->route('examsByPromotion', $request['promotion_id'])->with(['messageError' => "Echec lors de la modification de l'examen"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam  $exam
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam $exam)
    {
        //
    }
}

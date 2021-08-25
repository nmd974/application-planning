<?php

namespace App\Http\Controllers;

use App\Models\Activitie;
use App\Http\Controllers\ActivitieController;
use App\Models\Exam;
use App\Models\Exam_activitie;
use Illuminate\Http\Request;

class ExamActivitieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($exam_id)
    {
        $exam_activities = Exam::find($exam_id);
        $exam = Exam::find($exam_id);
        $list_activities = Activitie::where("archived", 0)->get();
        return
        view("activities.activitiesData")
        ->with(['activities' => $exam_activities->activities, "exam" => $exam, 'list_activities' => $list_activities]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($activitie_id, $duration, $order, $exam_id)
    {
        //
        $exam_activitie = new Exam_activitie();
        $exam_activitie->exam_id = $exam_id;
        $exam_activitie->activitie_id = $activitie_id;
        $exam_activitie->order = $order;
        $exam_activitie->duration = $duration;
        if($exam_activitie->save()){
            return true;
        }
        return false;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Exam_activitie  $exam_activitie
     * @return \Illuminate\Http\Response
     */
    public function show($exam_id,$activitie_id)
    {
        //
        $exam_activitie = Exam_activitie::where(["activitie_id" => $activitie_id, "exam_id" => $exam_id])->get()->first();
        $activitie = Activitie::find($activitie_id)->first();
        $exam_activitie->activities;
        $exam_activitie->exams;
        if($exam_activitie){
            $response = json_encode($exam_activitie);
            // $response = json_decode($exam_activitie);
            // dd($response);
            return $response;
        }else{
            $response = array("error" => "Cette activité n'existe pas");
            return json_encode($response);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exam_activitie  $exam_activitie
     * @return \Illuminate\Http\Response
     */
    public function update($activitie_id, $duration, $order, $exam_id)
    {
        //
        $exam_activitie = Exam_activitie::where(["activitie_id" => $activitie_id, "exam_id" => $exam_id])->get()->first();
        $exam_activitie->exam_id = $exam_id;
        $exam_activitie->activitie_id = $activitie_id;
        $exam_activitie->order = $order;
        $exam_activitie->duration = $duration;
        if($exam_activitie->save()){
            return true;
        }
        return false;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam_activitie  $exam_activitie
     * @return \Illuminate\Http\Response
     */
    public function destroy($exam_id, $activitie_id)
    {
        //
        $exam_activitie = Exam_activitie::where(["exam_id" => $exam_id, "activitie_id" => $activitie_id])->get()->first();
        $exam_activitie->archived = true;

        if($exam_activitie->update()){
            return redirect()->route('getActivitiesByExam', $exam_id)->with(['messageSuccess' => "Activité supprimée avec succès"]);
        }
        return redirect()->route('getActivitiesByExam', $exam_id)->with(['messageError' => "Echec lors de la suppression de l'activité"]);

    }

    public function getExamActivitieExample($id){
        $response = Exam_activitie::where('activitie_id', $id)->get()->first();
        $response->activities;
        return json_encode($response);
    }
}

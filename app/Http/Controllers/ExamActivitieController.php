<?php

namespace App\Http\Controllers;

use App\Models\Activitie;
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
        //
        // $exam_activities = Exam_activitie::where("exam_id", $exam_id)->orderBy('order', 'ASC')->get();
        // dd($exam_activities);
        // $exam = Exam::find($exam_id);
        // $activitie = Activitie::find($exam_activities->activitie_id);
        // return
        // view("activities.activitiesData")
        // ->with(['activities' => $exam_activities, 'activitiy' => $activitie, "exam" => $exam]);

        $exam_activities = Exam::find($exam_id);
        // dd($exam_activities->activities);
        $exam = Exam::find($exam_id);
        return
        view("activities.activitiesData")
        ->with(['activities' => $exam_activities->activities, "exam" => $exam]);
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
    public function show(Exam_activitie $exam_activitie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Exam_activitie  $exam_activitie
     * @return \Illuminate\Http\Response
     */
    public function edit(Exam_activitie $exam_activitie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Exam_activitie  $exam_activitie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Exam_activitie $exam_activitie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Exam_activitie  $exam_activitie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Exam_activitie $exam_activitie)
    {
        //
    }
}

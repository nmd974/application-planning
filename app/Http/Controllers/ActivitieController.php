<?php

namespace App\Http\Controllers;

use App\Models\Activitie;
use App\Http\Controllers\ExamActivitieController;
use App\Models\Exam_activitie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
class ActivitieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $activities = Activitie::where('archived', 0)->get();
        return
        view("activities.activitiesData")
        ->with('activities', $activities);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $exam_id)
    {
        //
        $validator = Validator::make($request->all(),
        [
            'label' => 'required|max:255',
            'duration' => 'required',
            'order' => 'required'
        ]);

        if($validator->fails()){
            return $validator->errors();
        }

        $activitie = new Activitie();
        $activitie->label = $request['label'];
        $hours = intval(substr($request["duration"],0,2)) * 60;
        $duration = $hours + intval(substr($request["duration"],3,2));
        $order = $request['order'];

        if($activitie->save()){
            $exam_activitie = new ExamActivitieController();
            $exam_activitie->store($activitie->id, $duration, $order, $exam_id);
            if($exam_activitie){
                return redirect()->route('getActivitiesByExam', $exam_id)->with(['messageSuccess' => "Activité ajoutée avec succès"]);
            }
        }
        return redirect()->route('getActivitiesByExam', $request['promotion_id'])->with(['messageError' => "Echec lors de l'ajout de l'activité"]);
    }

    /**
     * Display all activities
     *  @param  \App\Models\Activitie  $activitie
     *
     */
    public function getAllActivities(){
        $activities = Activitie::where("archived", 0)->get();
        return $activities;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activitie  $activitie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        // $activitie = Activitie::find($id)->first();
        $activities = Activitie::where("archived", 0)->get();
        if($activities){
            return json_encode($activities);
        }else{
            $response = '{"error":"Cette activité n\'existe pas"}';
            return json_encode($response);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activitie  $activitie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $exam_id, $activitie_id)
    {
        //
        $validator = Validator::make($request->all(),
        [
            'label' => 'required|max:255',
            'duration' => 'required',
            'order' => 'required'
        ]);

        if($validator->fails()){
            return $validator->errors();
        }

        $activitie = Activitie::find($activitie_id);
        $activitie->label = $request['label'];
        $hours = intval(substr($request["duration"],0,2)) * 60;
        $duration = $hours + intval(substr($request["duration"],3,2));
        $order = $request['order'];

        if($activitie->save()){
            $exam_activitie = new ExamActivitieController();
            $exam_activitie->update($activitie->id, $duration, $order, $exam_id);
            if($exam_activitie){
                return redirect()->route('getActivitiesByExam', $exam_id)->with(['messageSuccess' => "Activité modifiée avec succès"]);
            }
        }
        return redirect()->route('getActivitiesByExam', $request['promotion_id'])->with(['messageError' => "Echec lors de la modification de l'activité"]);


    }
}

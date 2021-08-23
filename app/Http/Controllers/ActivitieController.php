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
        // dd();
        $timestamp = mktime(substr($request["duration"],0,2),substr($request["duration"],3,2),substr($request["exam_date"],0,2),substr($request["exam_date"],3,2),substr($request["exam_date"],6,2));

        $order = $request['order'];

        if($activitie->save()){
            $exam_activitie = new ExamActivitieController();
            $exam_activitie->store($activitie->id, $timestamp, $order, $exam_id);
            if($exam_activitie){
                return redirect()->route('getActivitiesByExam', $exam_id)->with(['messageSuccess' => "Activité ajoutée avec succès"]);
            }
        }
        return redirect()->route('getActivitiesByExam', $request['promotion_id'])->with(['messageError' => "Echec lors de l'ajout de l'activité"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activitie  $activitie
     * @return \Illuminate\Http\Response
     */
    public function show(Activitie $activitie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activitie  $activitie
     * @return \Illuminate\Http\Response
     */
    public function edit(Activitie $activitie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activitie  $activitie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activitie $activitie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activitie  $activitie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Activitie $activitie)
    {
        //
    }
}

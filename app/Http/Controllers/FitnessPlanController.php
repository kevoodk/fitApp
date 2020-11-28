<?php

namespace App\Http\Controllers;

use App\Models\FitnessPlan;
use App\Models\FitnessPlanExcercise;
use App\Models\Excercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;

class FitnessPlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $fitnessPlan = fitnessplan::get()->where('user_id', Auth::id());

        return view('fitnessplan.index', ['kevoos' => $fitnessPlan]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $excercises = Excercise::all();

        return view('fitnessplan.create', ['excercises' => $excercises]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'workout_day' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            dd('Something went wrong - remember to fill out all the inputs');
        }

        $userId = Auth::id();

        $fitnessPlan = new fitnessplan([
            'name' => $request->input('name'),
            'workout_day' => $request->input('workout_day')
        ]);

        $fitnessPlan->user_id = $userId;
        $fitnessPlan->save();

        foreach ($request->input('excercises') as $excercise) {
            $fitnessExcercises = new FitnessPlanExcercise([
                    'workout_id' => $fitnessPlan->id,
                    'excercise_id' => $excercise,

            ]);

            $fitnessExcercises->save();
        }


        return view('fitnessplan.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FitnessPlan  $fitnessPlan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $fitnessPlan = fitnessplan::get()->where('id', $id AND 'user_id', Auth::id());

        if (empty($fitnessPlan)) {
            return view('fitnessplan.create');
        }

        $FitnessPlanExcercise = FitnessPlanExcercise::get()->where('workout_id', $id);
        $excercises = [];

        foreach ($FitnessPlanExcercise as $key) {
            $excercise = Excercise::find($key);
            $excercises[] = $excercise;
        }

        return view('fitnessplan.show', [
            'fitness' => $fitnessPlan,
            'excercises' => $excercises
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FitnessPlan  $fitnessPlan
     * @return \Illuminate\Http\Response
     */
    public function edit(FitnessPlan $fitnessPlan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FitnessPlan  $fitnessPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FitnessPlan $fitnessPlan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FitnessPlan  $fitnessPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy(FitnessPlan $fitnessPlan)
    {
        //
    }
}

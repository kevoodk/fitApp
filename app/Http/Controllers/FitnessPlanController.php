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

        return view('fitnessplan.index', ['fitness' => $fitnessPlan]);
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
            'workout_day' => 'required|array|max:255',
        ]);

        if ($validator->fails()) {
            dd('Something went wrong - remember to fill out all the inputs');
        }

        $userId = Auth::id();
        $workoutDays =implode(',', $request->input('workout_day'));
        $fitnessPlan = new fitnessplan([
            'name' => $request->input('name'),
            'workout_day' => $workoutDays,
        ]);


        $fitnessPlan->user_id = $userId;
        $fitnessPlan->save();

        foreach ($request->input('excercises') as $excercise) {
            $fitnessExcercises = new FitnessPlanExcercise([
                    'reps' => $request->input('reps'),
                    'sets' => $request->input('sets'),
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
    public function edit($id)
    {
        $fitnessPlan = fitnessplan::find($id);
        $excercises = Excercise::all();

        return view('fitnessplan.edit', ['fitness' => $fitnessPlan, 'excercises' => $excercises]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FitnessPlan  $fitnessPlan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $fitnessPlan =  fitnessplan::find($id);
        $workoutDays =implode(',', $request->input('workout_day'));

        $fitnessPlan->update([
            'name' => $request->input('name'),
            'workout_day' => $workoutDays
        ]);

        $fitnessExcercises = FitnessPlanExcercise::get()->where('workout_id', $id);


        return redirect()->route('fitnessplan')
            ->with('success', 'Fitnessplan has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FitnessPlan  $fitnessPlan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $fitnessPlan = fitnessplan::find($id);
        $fitnessPlan->delete();

        return redirect()->route('fitnessplan')
            ->with('success', 'Fitnessplan has been deleted successfully');
    }
}

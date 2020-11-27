<?php

namespace App\Http\Controllers;

use App\Models\Excercise;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Tags;
use App\Models\ExcerciseTags;

class ExcerciseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $excercise = Excercise::all();

        return view('excercise.index', ['excercises' => $excercise]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tags::all();

        return view('excercise.create', ['tags' => $tags]);
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
            'body_pos' => 'required|string|max:255',
            'description' => 'required|string|'
        ]);

        if ($validator->fails()) {
            d('something went wrong. Try again later');
        }

        $excercise = new Excercise([
            'name' => $request->input('name'),
            'body_pos' => $request->input('body_pos'),
            'description' => $request->input('description'),
        ]);


        $excercise->save();

        foreach ($request->input('tags') as $test) {
            $excerciseTag = new ExcerciseTags([
                'excercise_id' => $excercise->id,
                'tag_id' => $test
            ]);

            $excerciseTag->save();
        }


        return view('excercise.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Excercise  $excercise
     * @return \Illuminate\Http\Response
     */
    public function show(Excercise $excercise)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Excercise  $excercise
     * @return \Illuminate\Http\Response
     */
    public function edit(Excercise $excercise)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Excercise  $excercise
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Excercise $excercise)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Excercise  $excercise
     * @return \Illuminate\Http\Response
     */
    public function destroy(Excercise $excercise)
    {
        //
    }
}

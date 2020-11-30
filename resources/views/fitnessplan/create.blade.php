@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <form method="POST" action="/fitnessplan/store">
                        @csrf
                        <input name="name" type="text" />
                        <input name="workout_day" type="text" />
                        @foreach($excercises as $excercise)
                        <label for="excercises"> {{$excercise['name']}}
                            <input type="checkbox" name="excercises[]" value="{{$excercise['id']}}"/>
                        </label>
                        <label for="reps">Antal reps</label>
                            <select name="reps" id="reps">
                            @for ($i = 1; $i < 21; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                            </select>
                        <label for="sets">Antal sets</label>
                            <select name="sets" id="sets">
                            @for ($i = 1; $i < 21; $i++)
                                <option value="{{$i}}">{{$i}}</option>
                            @endfor
                            </select>
                        @endforeach
                        <input type="submit" class="btn btn-primary"/>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


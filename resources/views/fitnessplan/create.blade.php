@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <form method="POST" action="/fitnessplan/store">
                @csrf

                        <div class="form-row">
                            <div class="col">
                                <label for="fitName">Name of the plan</label>
                                <input name="name" class="form-control" type="text" id="fitName" placeholder="Name of the fitness plan..."/>
                            </div>
                            <div class="col">
                                <label for="fitDay">What day would you start the program</label>
                               <select class="form-control" multiple name="workout_day[]" data-max-options="2">
                                    <option value="monday">Monday</option>
                                    <option value="tuesday">Tuesday</option>
                                    <option value="wednesday">Wednesday</option>
                                    <option value="thursday">Thursdag</option>
                                    <option value="friday">Friday</option>
                                    <option value="saturday">Saturday</option>
                                    <option value="sunday">Sunday</option>
                                </select>
                                <!-- <input name="workout_day" id="fitDay" class="form-control" type="text" placeholder="Workout day.." /> -->
                            </div>
                        </div>

                        @foreach($excercises as $excercise)
                        <div class="form-row">
                            <div class="col">
                                <label>{{$excercise['name']}}</label>
                                <input type="checkbox" class="form-control" name="excercises[]" value="{{$excercise['id']}}"/>
                            </div>
                            <div class="col">
                                <label>Antal reps</label>
                                <select class="form-control" name="reps" id="reps">
                                    <option disabled selected value> -- select an option -- </option>
                                @for ($i = 1; $i < 21; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                                </select>
                            </div>
                            <div class="col">
                                <label for="sets">Antal sets</label>
                                <select class="form-control" name="sets" id="sets">
                                    <option disabled selected value> -- select an option -- </option>
                                @for ($i = 1; $i < 21; $i++)
                                    <option value="{{$i}}">{{$i}}</option>
                                @endfor
                                </select>
                            </div>
                        </div>
                        @endforeach
                        <input type="submit" class="btn btn-primary"/>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


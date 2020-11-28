@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                @foreach($fitness as $fit)
                    {{$fit['name']}}

                @endforeach
                <div class="card-body">
                @foreach($excercises as $excercise)
                    @foreach($excercise as $excer)
                    <p>{{$excer['name']}}</p>
                    @endforeach
                @endforeach
                    <a href="{{url('/fitnessplan/create/')}}" class="btn btn-primary">Opret ny program</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

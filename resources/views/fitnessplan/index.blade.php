@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                @foreach($kevoos as $plan)
                    <a href="{{url('/fitnessplan/'. $plan['id'])}}">{{$plan['name']}}</a>
                @endforeach
                <div class="card-body">
                    <a href="{{url('/fitnessplan/create/')}}" class="btn btn-primary">Opret ny program</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">My workouts</div>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">Program name</th>
                            <th scope="col">Weekday(s)</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Remove</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($fitness as $plan)
                        <tr>
                            <td><a href="{{url('/fitnessplan/'. $plan['id'])}}">{{$plan['name']}}</a></td>
                            <td></td>
                            <td>  <a href="{{url('/fitnessplan/edit/'. $plan['id'])}}">
                            <i class="fa fa-edit  fa-lg"></i>
                            </a></td>
                            <td><form action="{{url('/fitnessplan/delete/'. $plan['id'])}}" method="POST">
                        @csrf

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fa fa-trash fa-lg text-danger"></i>
                        </button>
                    </form></td>
                    @endforeach
                    </tbody>
                </table>
                <div class="card-body">
                    <a href="{{url('/fitnessplan/create/')}}" class="btn btn-primary">Create new program</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

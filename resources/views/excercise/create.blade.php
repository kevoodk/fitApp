@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Create excercise') }}</div>

                <div class="card-body">
                    <form method="POST" action="/excercise/store">
                        @csrf
                        <input name="name" type="text"  required/>
                        <input name="body_pos" type="text" required/>
                        <input name="description" type="text" required>
                        @foreach($tags as $tag)
                            <label for="tags">{{$tag['name']}}
                                <input type="checkbox" name="tags[]" value="{{$tag['id']}}"/>
                            </label>
                        @endforeach
                        <input type="submit" class="btn btn-primary"/>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


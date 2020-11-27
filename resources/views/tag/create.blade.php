@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tag create') }}</div>

                <div class="card-body">
                    <form method="POST" action="/tag/store">
                        @csrf
                        <input name="name" type="text" />
                        <input type="submit" class="btn btn-primary"/>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection


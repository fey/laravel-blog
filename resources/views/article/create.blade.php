<!-- resources/views/article/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-10">
                {!! form($form) !!}
            </div>
        </div>
    </div>
@endsection

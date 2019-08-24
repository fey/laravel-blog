<!-- resources/views/tag/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            {{-- {!! form($form) !!} --}}
            {{ Form::model($tag, ['url' =>route('tags.store')]) }}
            @include('tags.form')
            {{ Form::submit('Создать', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection

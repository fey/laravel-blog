<!-- resources/views/tag/create.blade.php -->

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-md-center">
        <div class="col-md-10">
            {{-- {!! form($form) !!} --}}
            {{ Form::model($tag, ['url' =>route('tags.update', $tag), 'method' => 'patch']) }}
            @include('tags.form')
            {{ Form::hidden('id', $tag->id) }}
            {{ Form::submit('обновить', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection

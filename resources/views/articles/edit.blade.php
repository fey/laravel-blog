<!-- resources/views/article/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-md-10">
                {{-- {!! form($form) !!} --}}
                {{ Form::model($article, ['url' =>route('articles.update', $article), 'method' => 'patch']) }}
                @include('articles.form')
                {{ Form::hidden('id', $article->id) }}
                {{ Form::submit('обновить', ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

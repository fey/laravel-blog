
@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-md-center">

            <div class="col-md-10">
                <h1>Список категорий</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Slug</th>
                            <th scope="col">Name</th>
                            <th>Count articles</th>
                            <th scope="col">
                                <a href="{{ route('categories.create') }}">Create new</a>
                                </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->id}}</td>
                                <td>
                                    <a href="{{ route('categories.show', $category) }}">{{$category->name}}</a>
                                </td>
                                <td>
                                    {{ $category->slug }}
                                </td>
                                <td>
                                    {{ $category->articles->count() }}
                                </td>
                                <td>
                                    <a href="{{ route('categories.edit', $category) }}">Edit</a>
                                    <a href="{{ route('categories.destroy', $category) }}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{$categories->links()}}
            </div>
        </div>
    </div>

    <div>

        <div>
    @endsection

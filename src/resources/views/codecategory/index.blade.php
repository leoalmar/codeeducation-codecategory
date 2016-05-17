@extends('layouts.app')


@section('content')

    <div class="container">

        <h3>Categories</h3>

        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach(Leoalmar\CodeCategory\Models\Category::all() as $key => $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->active }}</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>




@endsection
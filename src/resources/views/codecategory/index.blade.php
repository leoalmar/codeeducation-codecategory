@extends('layouts.app')


@section('content')

    <div class="container">

        <div class="row">
            <div class="col-xs-12">
                <h3>
                    Create Category
                    <div class="form-group pull-right">
                        <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">Create Category</a>
                    </div>
                </h3>
            </div>
        </div>

        <table class="table table-striped table-hover table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Parent</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $key => $category)
                <tr>
                    <td>{{ $category->id }}</td>
                    <td>{{ $category->parent_id }}</td>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->active }}</td>
                    <td></td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>

@endsection
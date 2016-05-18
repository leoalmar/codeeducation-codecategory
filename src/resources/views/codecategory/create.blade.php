@extends('layouts.app')


@section('content')

    <div class="container">

        <h3>Create Category</h3>

        {!! Form::open(['route'=>'admin.categories.store','method'=>'post']) !!}

            <div class="form-group">
                {!! Form::label('parent_id','Parent:') !!}
                {!! Form::select('parent_id',array_merge([ 0 =>' -- None --'] , $categories), null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('active','Active:') !!}
                {!! Form::checkbox('active','1',false) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}

    </div>

@endsection
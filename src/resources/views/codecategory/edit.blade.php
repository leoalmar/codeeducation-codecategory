@extends('layouts.app')

@section('content')

    <div class="container">

        <h3>Create Category</h3>

        {!! Form::model($category, ['route'=> ['admin.categories.update',$category->id],'method'=>'PUT']) !!}

            <div class="form-group">
                {!! Form::label('parent_id','Parent:') !!}
                {!! Form::select('parent_id',array_merge([ 0 =>' -- None --'], $categories), null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('name','Name:') !!}
                {!! Form::text('name',null,['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('active','Active:') !!}
                {!! Form::checkbox('active','1',null) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Submit', ['class'=>'btn btn-primary']) !!}
            </div>

        {!! Form::close() !!}

    </div>

@endsection
@extends('layout')

@section('content')
    <div class="panel-heading container-fluid">
        <div class="form-group">
            <div class="centered-child col-md-11 col-sm-10 col-xs-10"><b>Find followers</b></div>
        </div>
    </div>
    <div class="panel-body">
        {!! Form::open(['action'=>'FollowersController@getFollowersFromLink']) !!}
        <div class="form-group">
            {!!Form::label('link', 'Enter link') !!}
            {!!Form::text('link', null, ['class' => 'form-control']) !!}
            <div class="form-group">
                {!! Form::button('Find', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>

        {!! Form::open(['action'=>'FollowersController@getFollowersFromName']) !!}
        <div class="form-group">
            {!!Form::label('name', 'Enter name') !!}
            {!!Form::text('name', null, ['class' => 'form-control']) !!}
            <div class="form-group">
                {!! Form::button('Find', ['type' => 'submit', 'class' => 'btn btn-primary']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection

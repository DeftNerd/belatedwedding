@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Create New Invitation</h1>
    <hr/>

    {!! Form::open(['url' => '/invitations', 'class' => 'form-horizontal']) !!}

    <div class="form-group {{ $errors->has('primary') ? 'has-error' : ''}}">
        {!! Form::label('primary', 'Primary Guest', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-9 input-group">
          <input class="form-control" name="primary" type="text" id="primary">
          {!! $errors->first('primary', '<p class="help-block">:message</p>') !!}
          <p class="help-block">The primary guest. You can add additional guest names on the next screen</p>
        </div>
    </div>

    <div class="form-group {{ $errors->has('guests_allowed') ? 'has-error' : ''}}">
        {!! Form::label('guests_allowed', 'Additional Guests', ['class' => 'col-sm-3 control-label']) !!}
        <div class="col-sm-9 input-group">
          <input class="form-control" name="guests_allowed" type="text" id="guests_allowed">
          {!! $errors->first('guests_allowed', '<p class="help-block">:message</p>') !!}
          <p class="help-block">How many additional guests will be allowed for this person?</p>
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Create', ['class' => 'btn btn-primary form-control']) !!}
        </div>
    </div>
    {!! Form::close() !!}

    @if ($errors->any())
        <ul class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

</div>
@endsection

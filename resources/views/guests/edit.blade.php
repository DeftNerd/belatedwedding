@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit Guest {{ $guest->id }}</h1>

    {!! Form::model($guest, [
        'method' => 'PATCH',
        'url' => ['/guests', $guest->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('invitation_id') ? 'has-error' : ''}}">
                {!! Form::label('invitation_id', trans('guests.invitation_id'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('invitation_id', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('invitation_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('name') ? 'has-error' : ''}}">
                {!! Form::label('name', trans('guests.name'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('name', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('name', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('phone') ? 'has-error' : ''}}">
                {!! Form::label('phone', trans('guests.phone'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('phone', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('email') ? 'has-error' : ''}}">
                {!! Form::label('email', trans('guests.email'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('email', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('email', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('is_attending_ceremony') ? 'has-error' : ''}}">
                {!! Form::label('is_attending_ceremony', trans('guests.is_attending_ceremony'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                                <div class="checkbox">
                <label>{!! Form::radio('is_attending_ceremony', '1') !!} Yes</label>
            </div>
            <div class="checkbox">
                <label>{!! Form::radio('is_attending_ceremony', '0', true) !!} No</label>
            </div>
                    {!! $errors->first('is_attending_ceremony', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('is_attending_reception') ? 'has-error' : ''}}">
                {!! Form::label('is_attending_reception', trans('guests.is_attending_reception'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                                <div class="checkbox">
                <label>{!! Form::radio('is_attending_reception', '1') !!} Yes</label>
            </div>
            <div class="checkbox">
                <label>{!! Form::radio('is_attending_reception', '0', true) !!} No</label>
            </div>
                    {!! $errors->first('is_attending_reception', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('meal_id') ? 'has-error' : ''}}">
                {!! Form::label('meal_id', trans('guests.meal_id'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('meal_id', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('meal_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('comment') ? 'has-error' : ''}}">
                {!! Form::label('comment', trans('guests.comment'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('comment', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('comment', '<p class="help-block">:message</p>') !!}
                </div>
            </div>


    <div class="form-group">
        <div class="col-sm-offset-3 col-sm-3">
            {!! Form::submit('Update', ['class' => 'btn btn-primary form-control']) !!}
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
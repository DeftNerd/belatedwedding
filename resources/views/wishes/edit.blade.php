@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit Wish {{ $wish->id }}</h1>

    {!! Form::model($wish, [
        'method' => 'PATCH',
        'url' => ['/wishes', $wish->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('guest_id') ? 'has-error' : ''}}">
                {!! Form::label('guest_id', trans('wishes.guest_id'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::number('guest_id', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('guest_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('from') ? 'has-error' : ''}}">
                {!! Form::label('from', trans('wishes.from'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('from', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('from', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('message') ? 'has-error' : ''}}">
                {!! Form::label('message', trans('wishes.message'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('message', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('message', '<p class="help-block">:message</p>') !!}
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
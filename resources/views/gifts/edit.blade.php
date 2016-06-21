@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit Gift {{ $gift->id }}</h1>

    {!! Form::model($gift, [
        'method' => 'PATCH',
        'url' => ['/gifts', $gift->id],
        'class' => 'form-horizontal'
    ]) !!}

                <div class="form-group {{ $errors->has('description') ? 'has-error' : ''}}">
                {!! Form::label('description', trans('gifts.description'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('description', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('description', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('is_thanked') ? 'has-error' : ''}}">
                {!! Form::label('is_thanked', trans('gifts.is_thanked'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                                <div class="checkbox">
                <label>{!! Form::radio('is_thanked', '1') !!} Yes</label>
            </div>
            <div class="checkbox">
                <label>{!! Form::radio('is_thanked', '0', true) !!} No</label>
            </div>
                    {!! $errors->first('is_thanked', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('thanked_at') ? 'has-error' : ''}}">
                {!! Form::label('thanked_at', trans('gifts.thanked_at'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::input('datetime-local', 'thanked_at', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('thanked_at', '<p class="help-block">:message</p>') !!}
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
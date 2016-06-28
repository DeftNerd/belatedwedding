@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Edit Invitation for {{ $invitation->guests()->first()->name }} and Guests</h1>

    {!! Form::model($invitation, [
        'method' => 'PATCH',
        'url' => ['/invitations', $invitation->id],
        'class' => 'form-horizontal'
    ]) !!}

            <div class="form-group {{ $errors->has('user_id') ? 'has-error' : ''}}">
                {!! Form::label('user_id', 'Invited By', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::select('user_id', App\User::all()->lists('name', 'id'), $invitation->user_id, ['class' => 'form-control']) !!}
                    {!! $errors->first('user_id', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('code') ? 'has-error' : ''}}">
                {!! Form::label('code', trans('invitations.code'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('code', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('code', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('guests_allowed') ? 'has-error' : ''}}">
                {!! Form::label('guests_allowed', 'Total Invited', ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('guests_allowed', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('guests_allowed', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('invitation_method') ? 'has-error' : ''}}">
                {!! Form::label('invitation_method', trans('invitations.invitation_method'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::text('invitation_method', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('invitation_method', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <div class="form-group {{ $errors->has('visited_at') ? 'has-error' : ''}}">
                {!! Form::label('visited_at', trans('invitations.visited_at'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::input('datetime-local', 'visited_at', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('visited_at', '<p class="help-block">:message</p>') !!}
                </div>
            </div>
            <div class="form-group {{ $errors->has('rsvp_at') ? 'has-error' : ''}}">
                {!! Form::label('rsvp_at', trans('invitations.rsvp_at'), ['class' => 'col-sm-3 control-label']) !!}
                <div class="col-sm-6">
                    {!! Form::input('datetime-local', 'rsvp_at', null, ['class' => 'form-control']) !!}
                    {!! $errors->first('rsvp_at', '<p class="help-block">:message</p>') !!}
                </div>
            </div>

            <h2>Known Guests</h2>
            @foreach ($invitation->guests as $guest)
                <div class="well">
                  <div class="form-group {{ $errors->has('guest['.$guest->id.'][name]') ? 'has-error' : ''}}">
                      {!! Form::label('guest['.$guest->id.'][name]', 'Name', ['class' => 'col-sm-3 control-label']) !!}
                      <div class="col-sm-6">
                          {!! Form::text('guest['.$guest->id.'][name]', $guest->name, ['class' => 'form-control']) !!}
                          {!! $errors->first('guest['.$guest->id.'][name]', '<p class="help-block">:message</p>') !!}
                      </div>
                  </div>

                <div class="form-group {{ $errors->has('guest['.$guest->id.'][email]') ? 'has-error' : ''}}">
                    {!! Form::label('guest['.$guest->id.'][email]', 'Email', ['class' => 'col-sm-3 control-label']) !!}
                    <div class="col-sm-6">
                        {!! Form::text('guest['.$guest->id.'][email]', $guest->email, ['class' => 'form-control']) !!}
                        {!! $errors->first('guest['.$guest->id.'][email]', '<p class="help-block">:message</p>') !!}
                    </div>
                </div>

              </div>
            @endforeach

            @if ($invitation->guests()->count() < $invitation->guests_allowed)
              <h2>Available Guest Slots</h2>
              @for ($i = $invitation->guests()->count() + 1; $i <= $invitation->guests_allowed; $i++)
                <div class="well">
                  <div class="form-group">
                      {!! Form::label('new['.$i.'][name]', 'Name', ['class' => 'col-sm-3 control-label']) !!}
                      <div class="col-sm-6">
                          {!! Form::text('new['.$i.'][name]', NULL, ['class' => 'form-control']) !!}
                      </div>
                  </div>
                </div>
              @endfor
            @endif

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

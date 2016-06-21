@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Invitation
      <a href="{{ url('invitations/' . $invitation->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Invitation"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
      {!! Form::open([
          'method'=>'DELETE',
          'url' => ['invitations', $invitation->id],
          'style' => 'display:inline'
      ]) !!}
          {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                  'type' => 'submit',
                  'class' => 'btn btn-danger btn-xs',
                  'title' => 'Delete Invitation',
                  'onclick'=>'return confirm("Confirm delete?")'
          ));!!}
      {!! Form::close() !!}
    </h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                  <th>Invite URL</th>
                  <td>{{ config('app.url') }}/invite/{{ $invitation->code }}</td>
                </tr>
                <tr>
                  <th>Guests</th>
                  <td>{{ $invitation->guests()->count() }} out of {{ $invitation->guests_allowed }}</td>
                </tr>
                <tr>
                  <th>Invitation Sent Via</th>
                  <td>{{$invitation->invitation_method or 'Not Sent Yet'}}</td>
                </tr>
                <tr>
                  <th>URL Visited</th>
                  <td>{{$invitation->visited_at or 'Never'}}</td>
                </tr>
                <tr>
                  <th>RSVP Made</th>
                  <td>{{$invitation->rsvp_at or 'Not Yet'}}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <h2>Guests</h2>
    @foreach ($invitation->guests as $guest)
      <div class="table-responsive">
          <table class="table table-bordered table-striped table-hover">
              <tbody>
                  <tr>
                    <th>Name</th>
                    <td>{{ $guest->name }}</td>
                  </tr>
                  <tr>
                    <th>Phone</th>
                    <td>{{ $guest->phone or 'Unknown' }}</td>
                  </tr>
                  <tr>
                    <th>Email</th>
                    <td>{{ $guest->email or 'Unknown' }}</td>
                  </tr>
                  <tr>
                    <th>Is a child?</th>
                    <td>@if ($guest->is_child == TRUE) Yes @elseif ($guest->is_child == NULL) Unknown @else No @endif</td>
                  </tr>
                  <tr>
                    <th>Attending Ceremony?</th>
                    <td>@if ($guest->is_attending_ceremony == TRUE) Yes @elseif ($guest->is_attending_ceremony == NULL) Unknown @else No @endif</td>
                  </tr>
                  <tr>
                    <th>Attending Party?</th>
                    <td>@if ($guest->is_attending_reception == TRUE) Yes @elseif ($guest->is_attending_reception == NULL) Unknown @else No @endif</td>
                  </tr>
              </tbody>
          </table>
      </div>
    @endforeach

</div>
@endsection

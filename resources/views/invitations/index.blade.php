@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Invitations <a href="{{ url('/invitations/create') }}" class="btn btn-primary btn-xs" title="Add New Invitation"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover table-condensed">
            <thead>
                <tr>
                    <th>URL</th>
                    <th>Primary</th>
                    <th>Guests</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
            @foreach($invitations as $invitation)
                <tr>
                    <td>{{ config('app.url') }}/invite/{{ $invitation->code }}</td>
                    <td>{{ $invitation->guests()->first()->name }}</td>
                    <td>{{ $invitation->guests()->count() }} / {{ $invitation->guests_allowed }}</td>
                    <td>
                      @if($invitation->is_sent == TRUE) Invites Emailed @else Invites Not Emailed @endif <br />
                      @if(empty($invitation->rsvp_at)) No response to RSVP @else Responded to RSVP @endif <br />
                      @if(!empty($invitation->rsvp_at) && $invitation->is_attending == TRUE) Is Attending @endif <br />
                    </td>
                    <td>
                        <a href="{{ url('/invitations/' . $invitation->id . '/send') }}" class="btn btn-info btn-xs" title="Send Invitation"><span class="glyphicon glyphicon-envelope" aria-hidden="true"/></a>
                        <a href="{{ url('/invitations/' . $invitation->id) }}" class="btn btn-success btn-xs" title="View Invitation"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/invitations/' . $invitation->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Invitation"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/invitations', $invitation->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Invitation" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Invitation',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $invitations->render() !!} </div>
    </div>

</div>
@endsection

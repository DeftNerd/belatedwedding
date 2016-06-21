@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Guest {{ $guest->id }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $guest->id }}</td>
                </tr>
                <tr><th> {{ trans('guests.invitation_id') }} </th><td> {{ $guest->invitation_id }} </td></tr><tr><th> {{ trans('guests.name') }} </th><td> {{ $guest->name }} </td></tr><tr><th> {{ trans('guests.phone') }} </th><td> {{ $guest->phone }} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ url('guests/' . $guest->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Guest"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['guests', $guest->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Guest',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            </tfoot>
        </table>
    </div>

</div>
@endsection
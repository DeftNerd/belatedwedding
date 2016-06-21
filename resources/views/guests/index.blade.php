@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Guests <a href="{{ url('/guests/create') }}" class="btn btn-primary btn-xs" title="Add New Guest"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('guests.invitation_id') }} </th><th> {{ trans('guests.name') }} </th><th> {{ trans('guests.phone') }} </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($guests as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->invitation_id }}</td><td>{{ $item->name }}</td><td>{{ $item->phone }}</td>
                    <td>
                        <a href="{{ url('/guests/' . $item->id) }}" class="btn btn-success btn-xs" title="View Guest"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/guests/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Guest"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/guests', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Guest" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Guest',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $guests->render() !!} </div>
    </div>

</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Wishes <a href="{{ url('/wishes/create') }}" class="btn btn-primary btn-xs" title="Add New Wish"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('wishes.guest_id') }} </th><th> {{ trans('wishes.from') }} </th><th> {{ trans('wishes.message') }} </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($wishes as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->guest_id }}</td><td>{{ $item->from }}</td><td>{{ $item->message }}</td>
                    <td>
                        <a href="{{ url('/wishes/' . $item->id) }}" class="btn btn-success btn-xs" title="View Wish"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/wishes/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Wish"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/wishes', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Wish" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Wish',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $wishes->render() !!} </div>
    </div>

</div>
@endsection

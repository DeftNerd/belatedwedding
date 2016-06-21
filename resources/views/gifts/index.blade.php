@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Gifts <a href="{{ url('/gifts/create') }}" class="btn btn-primary btn-xs" title="Add New Gift"><span class="glyphicon glyphicon-plus" aria-hidden="true"/></a></h1>
    <div class="table">
        <table class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <th>S.No</th><th> {{ trans('gifts.description') }} </th><th> {{ trans('gifts.is_thanked') }} </th><th> {{ trans('gifts.thanked_at') }} </th><th>Actions</th>
                </tr>
            </thead>
            <tbody>
            {{-- */$x=0;/* --}}
            @foreach($gifts as $item)
                {{-- */$x++;/* --}}
                <tr>
                    <td>{{ $x }}</td>
                    <td>{{ $item->description }}</td><td>{{ $item->is_thanked }}</td><td>{{ $item->thanked_at }}</td>
                    <td>
                        <a href="{{ url('/gifts/' . $item->id) }}" class="btn btn-success btn-xs" title="View Gift"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"/></a>
                        <a href="{{ url('/gifts/' . $item->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Gift"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['/gifts', $item->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true" title="Delete Gift" />', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Gift',
                                    'onclick'=>'return confirm("Confirm delete?")'
                            ));!!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="pagination"> {!! $gifts->render() !!} </div>
    </div>

</div>
@endsection

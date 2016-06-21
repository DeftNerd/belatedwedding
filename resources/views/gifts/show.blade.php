@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Gift {{ $gift->id }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $gift->id }}</td>
                </tr>
                <tr><th> {{ trans('gifts.description') }} </th><td> {{ $gift->description }} </td></tr><tr><th> {{ trans('gifts.is_thanked') }} </th><td> {{ $gift->is_thanked }} </td></tr><tr><th> {{ trans('gifts.thanked_at') }} </th><td> {{ $gift->thanked_at }} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ url('gifts/' . $gift->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Gift"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['gifts', $gift->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Gift',
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
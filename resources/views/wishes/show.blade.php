@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Wish {{ $wish->id }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $wish->id }}</td>
                </tr>
                <tr><th> {{ trans('wishes.guest_id') }} </th><td> {{ $wish->guest_id }} </td></tr><tr><th> {{ trans('wishes.from') }} </th><td> {{ $wish->from }} </td></tr><tr><th> {{ trans('wishes.message') }} </th><td> {{ $wish->message }} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ url('wishes/' . $wish->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Wish"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['wishes', $wish->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Wish',
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
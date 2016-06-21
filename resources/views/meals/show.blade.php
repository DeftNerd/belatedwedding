@extends('layouts.app')

@section('content')
<div class="container">

    <h1>Meal {{ $meal->id }}</h1>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover">
            <tbody>
                <tr>
                    <th>ID.</th><td>{{ $meal->id }}</td>
                </tr>
                <tr><th> {{ trans('meals.name') }} </th><td> {{ $meal->name }} </td></tr><tr><th> {{ trans('meals.description') }} </th><td> {{ $meal->description }} </td></tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="2">
                        <a href="{{ url('meals/' . $meal->id . '/edit') }}" class="btn btn-primary btn-xs" title="Edit Meal"><span class="glyphicon glyphicon-pencil" aria-hidden="true"/></a>
                        {!! Form::open([
                            'method'=>'DELETE',
                            'url' => ['meals', $meal->id],
                            'style' => 'display:inline'
                        ]) !!}
                            {!! Form::button('<span class="glyphicon glyphicon-trash" aria-hidden="true"/>', array(
                                    'type' => 'submit',
                                    'class' => 'btn btn-danger btn-xs',
                                    'title' => 'Delete Meal',
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
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                  <ul>
                    <li><a href="/gifts">Gifts</a></li>
                    <li><a href="/guests">Guests</a></li>
                    <li><a href="/invitations">Invitations</a></li>
                    <li><a href="/meals">Meals</a></li>
                    <li><a href="/users">Users</a></li>
                  </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

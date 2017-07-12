@extends('layouts.app')

@section('content')
    <h1>Truckers</h1>
    <h3>Click on a trucker to see details</h3>
    <ul>
        @foreach($truckers as $trucker)
            <li>
                <a href="{{route('truckers.show', $trucker->id)}}">{{$trucker->name}}</a>
            </li>
            @endforeach
    </ul>

    <h1>Create a trucker</h1>

    <form method="post" action="/truckers">
        <input type="text" name="name" placeholder="Enter Trucker Name">
        {{csrf_field()}}<br><br>
        <input type="submit" name="submit" value="create">
    </form>

    @endsection
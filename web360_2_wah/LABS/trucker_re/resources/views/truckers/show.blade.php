@extends('layouts.app')

@section('content')
    <h1>Trucker information</h1>
    <h3>Click on a link to edit or delete</h3>

    <h3>
        <a href="{{route('trucker.edit', $trucker->id)}}">{{$trucker->name}}</a>
    </h3>

    @foreach($trucker->trips as $trips)
        <a href="{{route('trip.edit', $trips->id)}}">{{$trips-> name}}</a><br>
        Miles {{$trips -> miles}}<br>
        Minutes{{$trips -> minutes}}<br>
        Speed is {{$trips->comment}}<br><br>
        @endforeach
    <h1> Create a trip for {{$trucker->name}}</h1>

    <form method="post" action="/storetrip">
        <input type="text" name="name" placeholder ="Enter Trip Name">
        <input type="text" name="miles" placeholder="Enter trip miles">
        <input type="text" name="minutes" placeholder="enter trip minutes" >
        {{csrf_field()}}<br><br>
        <input type="hidden" name="id" value={{$trucker->id}}>
        <input type="submit" name="submit" value="Create">
    </form>

    <br>

    <a href="{{route('truckers.index')}}">home</a>

    @endsection

@extends('layouts.app')

@section('content')

    <h1>Edit Trip</h1>

    <form method = "post" action = "/tripupdate/{{$trip->id}}">
        {{crsf_field()}}
        <input type="hidden" name="_method" value="PUT">
        <input type="text" name="name" placeholder="Enter Name" value = "{{$trip -> name}}"><br>
        <input type="text" name="miles" placeholder="Enter trip miles" value = "{{$trip -> miles}}"><br>
        <input type="text" name="minutes" placeholder="Enter trip minutes" value = "{{$trip -> minutes}}"><br>
        <input type="hidden" name="trucker_id" value="{{$trip->trucker_id}}">
        {{csrf_field()}}<br><br>
        <input type="submit" name="submit" value="UPDATE"><br>
    </form>

    <form method="post" action="/tripdelete/{{$trip->id}}">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" name="submit" value="DELETE">
    </form>
    <br>
    <a href = "{{route('truckers.index')}}"> home</a>

    @endsection
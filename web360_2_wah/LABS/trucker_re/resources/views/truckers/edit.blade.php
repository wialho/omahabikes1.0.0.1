@extends('layouts.app')

@section('content')

    <h1>Edit Trucker</h1>

    <form method="post" action="/truckers/{{$trucker->id}}">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="PUT">
        <input type="text" name="name" placeholder="Enter name" value="{{$trucker->name}}">
        {{csrf_field()}}<br><br>
        <input type="submit" name="submit" value="UPDATE"><br>
    </form>

    <h1>Delete Trucker</h1>

    <form method="post" action="/truckers/{{$trucker->id}}">
        {{csrf_field()}}
        <input type="hidden" name="_method" value="DELETE">
        <input type="submit" name="submit" value="DELETE">
    </form>

    <br>
    <a href="{{route('truckers.index')}}">Home</a>

@endsection
<!DOCTYPE>
<html>
<head>


</head>

<body>

<ul>
    @foreach($states as $state)
        <li>{{$state->state_name}}</li>
        @endforeach
</ul>

</body>

</html>
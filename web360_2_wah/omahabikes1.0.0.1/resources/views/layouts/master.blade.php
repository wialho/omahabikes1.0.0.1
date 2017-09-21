<html>
<head>
<title>@yield('title')</title>
    <meta charset="UTF-8">
    <meta name="description" content="Omaha Bike Valet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.css">
    <link rel="stylesheet" href = {{asset('style.css')}}>
    <script src="https://ajax.googleapis.com/ajax/libs/jquerymobile/1.4.5/jquery.mobile.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
</head>
<body>
<div data-role="page">
    <div data-role="header">
        <@section('headerSection')
             @show
    </div><!-- /header -->

    <div role="main" class="ui-content">
        @section('mainContent')
            @show
    </div><!-- /content -->

    <div data-role="footer">
    </div><!-- /footer -->
</div>
</body>
</html>
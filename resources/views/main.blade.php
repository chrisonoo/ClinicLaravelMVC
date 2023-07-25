<!DOCTYPE HTML>
<html lang="pl">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>{{$title ?? 'Clinic'}}</title>
    <link href="/images/favicon.png" type="image/png" rel="icon" sizes="16x16"/>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    @yield('style')
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col s12">
            <h1>{{$title ?? '🏥 Clinic'}}</h1>
        </div>
    </div>

    @yield('menu')

</div>
<hr/>

@yield('content')

<script src="/js/app.js">

</script>

@yield('scripts')

</body>
</html>

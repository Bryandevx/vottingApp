<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNA votaciones</title>
    <link href="https://fonts.googleapis.com/css?family=Pattaya|Poppins:400,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">
</head>

<body>
    <header class="main-header">
        <nav>
            <h1 id="logo">Universidad Nacional</h1>
            <ul class="nav-links">
                <li><a href="#"></a><img src="{{ URL::asset('assets/icons/instagram.png') }}" alt=""></li>
                <li><a href="#"></a><img src="{{ URL::asset('assets/icons/linkdin.png') }}" alt=""></li>
                <li><a href="#"></a><img src="{{ URL::asset('assets/icons/twitter.png') }}" alt=""></li>
                <li><a href="{{ url('login') }}">Login</a></li> <!--redirects to login page-->
            </ul>
        </nav>
    </header>


    <section id="first-section">
        @yield('first-content-index')
    </section>


    <section id="second-section">
        @yield('second-section-index')
    </section>


</body>

</html>
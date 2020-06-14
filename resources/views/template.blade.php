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
                <li><a href="{{ URL::to('https://www.instagram.com/una.ac.cr/?hl=es-la') }}" target="_blank"><img src="{{ URL::asset('assets/icons/instagram.png') }}" alt="instagram icon"></a></li>
                <li><a href="{{ URL::to('https://cr.linkedin.com/') }}" target="_blank"><img src="{{ URL::asset('assets/icons/linkdin.png') }}" alt="linkdin icon"></a></li>
                <li><a href="{{ URL::to('https://twitter.com/comunidadUNACR?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor') }}" target="_blank"><img src="{{ URL::asset('assets/icons/twitter.png') }}" alt="twitter icon"></a></li>
                @if (Auth::guest())
                <li><a href="{{ url('login') }}">Login</a></li>
                <!--redirects to login page-->
                @else
                <li> {{ Auth::user()->name }} </li>
                <li><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        {{ __('Logout') }}
                    </a></li>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
                @endif
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
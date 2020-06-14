@extends('../template')

@section('first-content-index')

    <div id="home-container">

    <div id="inner">
        <img src="{{ URL::asset('assets/icons/MIT.png') }}" alt="" id="fsection-logo">
        <h1>UNA elecciones de rector 2020</h1>
        <p class="subtitle">Pagina oficial para emitir su voto digital
            de una manera segura
            desde la comodidad de su casa.</p>
            <div class="boxAdd">
                <a href="{{ url('results') }}" class="btnAdd btnAdd-white btnAdd-animation-1">Ver Estadisticas</a> 
            </div>

    </div>


    <div id="illustration">
        <img src="{{ URL::asset('assets/icons/review.png') }}" alt="icono de review" id="review" class="icons">
        <img src="{{ URL::asset('assets/icons/lock.png') }}" alt="icono de candado" id="lock" class="icons">
        <img src="{{ URL::asset('assets/icons/question.png') }}" alt="icono de pregunta" id="question" class="icons">
        <img src="{{ URL::asset('assets/icons/democracy.png') }}" alt="icono de democracia" id="democracy" class="icons">
        <img src="{{ URL::asset('assets/icons/monitor.png') }}" alt="icono de monitor" id="monitor" class="">

    </div>

    </div>


@endsection





@section('second-section-index')

<div class="cards">

            <div class="card">
                <div class="card-icon">
                    <img src="{{ URL::asset('assets/icons/lock.png') }}" alt="imagen de candado">
                </div>
                <h4>Seguridad</h4>
                <p>Garantizamos la completa confidencialidad de su voto y sus datos personales</p>
            </div>

            <div class="card">
                <div class="card-icon">
                    <img src="{{ URL::asset('assets/icons/election.png') }}" alt="icono de formulario elecci">
                </div>
                <h4>Elecciones</h4>
                <p>La plataforma digital brinda la facilidad de poder llevar a cabo el proceso de elecciones de manera remota <br></p>
            </div>

            <div class="card">
                <div class="card-icon">
                    <img src="{{ URL::asset('assets/icons/graph.png') }}" alt="icono de democracia">
                </div>
                <h4>Graficas</h4>
                <p>Se cuenta con un avanzado sistema de visualizacion grafica sobre los resultados en tiempo real</p>
            </div>

        </div>



@endsection
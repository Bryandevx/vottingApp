@extends('../template')

@section('first-content-index')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <img src="{{ URL::asset('assets/img/robot.svg') }}" alt="Whoops you already vote!" width="512px" height="512px">
        </div>
        <div class="col-sm">
            <h5>Acceso denegado! </br>
                Su voto ya fue registrado, acceda a la seccion de estadisticas para ver el estado actual de la votacion.
            </h5>
            <div class="d-flex justify-content-center">

                <a class="btnAdd btnAdd-white btnAdd-animation-1" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    {{ __('Regresar') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>


            </div>
        </div>
    </div>
</div>

<style>
    .btnAdd{
        margin-top: 30px;
    }
</style>

@endsection
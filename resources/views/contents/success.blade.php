@extends('../template')

@section('first-content-index')
<div class="container">
    <div class="row">
        <div class="col-sm">
            <img src="{{ URL::asset('assets/img/check.png') }}" alt="Ok vote imgage" width="256px" height="256px">
        </div>
        <div class="col-sm">
            <h2>Su voto fue emitido de manera exitosa!</h2>
        </div>
    </div>
</div>
<div class="d-flex justify-content-center">

    <a class="btnAdd btnAdd-white btnAdd-animation-1" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
        {{ __('Logout') }}
    </a>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>


</div>


@endsection
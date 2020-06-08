@extends('../layouts.app')

@section('content')




<table class="table">
    <thead>
        <tr>
            <th scope="col">Posicion</th>
            <th scope="col">Nombre</th>
            <th scope="col">Puntos</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach($results as $result)
        <?php $num = (string)$loop->iteration . ".png";
        ?>
            <tr>
                <td><img src="{{ URL::asset('assets/img/medal-'.$num) }}" alt="medal img" width="45px" height="45px"></td>
                <td>{{$result->name}}</td>
                <td>{{$result->points}}</td>
            </tr>


        @endforeach

    </tbody>
</table>
@endsection
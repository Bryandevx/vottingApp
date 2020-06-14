@extends('../candidateCardTemplate')


@section('candidate-info')

<div class="wrapper">
        <div class="cards_wrap">
            <div class="card_item">
                <div class="card_inner">
                    <div class="card-top">
                        <img src="{{ URL::asset('assets/img/putin.png') }}" alt="Vladimir imgage">
                    </div>
                    <div class="card_bottom">
                        <div class="card_category">
                            Vladimir Putin
                        </div>
                        <div class="card_info">
                            <p class="title">
                                Vladímir Vladímirovich Putin es el actual presidente de la Federación Rusa.
                                Es abogado y político de profesión.
                            </p>
                        </div>
                    </div>
                    <form action="{{url('/votes')}}" method="post">
                        {{ csrf_field() }} <!-- security token -->
                        <input type="hidden" name="id-candidate" value="cand-1">
                        <input type="hidden" name="user-rol" value="{{ Auth::user()->rol }}">
                        <input type="hidden" name="user-id" value="{{ Auth::user()->id }}">
                        <button type="submit" class="submit-vote">Votar</button>

                    </form> 
                </div>
            </div>


            <div class="card_item">
                <div class="card_inner">
                    <div class="card-top">
                        <img src="{{ URL::asset('assets/img/trump.png') }}" alt="Donald trump image">
                    </div>
                    <div class="card_bottom">
                        <div class="card_category">
                            Donald Trump
                        </div>
                        <div class="card_info">
                            <p class="title">
                                Donald John Trump, ​​​​ empresario y actual presidente de USA
                                y personalidad mediatica en diversos sectores
                            </p>
                        </div>
                    </div>
                    <form action="{{url('/votes')}}" method="post">
                        {{ csrf_field() }} <!-- security token -->
                        <input type="hidden" name="id-candidate" value="cand-2">
                        <input type="hidden" name="user-rol" value="{{ Auth::user()->rol }}">
                        <input type="hidden" name="user-id" value="{{ Auth::user()->id }}">
                        <button type="submit" class="submit-vote">Votar</button>

                    </form> 
                </div>
            </div>
            
            

            <div class="card_item">
                <div class="card_inner">
                    <div class="card-top">
                        <img src="{{ URL::asset('assets/img/elon.png') }}" alt="Elon musck image">
                    </div>
                    <div class="card_bottom">
                        <div class="card_category">
                            Elon Musk
                        </div>
                        <div class="card_info">
                            <p class="title">
                                Elon Reeve Musk, ​​Musk es un inventor,fisico,empresario y magnate sudafricano
                                llamo a su hija X Æ A-Xii Musk
                            </p>
                        </div>
                    </div>
                    <form action="{{url('/votes')}}" method="post">
                        {{ csrf_field() }} <!-- security token -->
                        <input type="hidden" name="id-candidate" value="cand-3">
                        <input type="hidden" name="user-rol" value="{{ Auth::user()->rol }}">
                        <input type="hidden" name="user-id" value="{{ Auth::user()->id }}">
                        <button type="submit" class="submit-vote">Votar</button>

                    </form>                   
                </div>
            </div>    

        </div>
    </div>





@endsection
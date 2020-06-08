<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\User;
use App\Votes;
use Illuminate\Http\Request;

class VotesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        //$this->middleware('auth');
    }


    public function index()
    {
        //
        return view('contents.voteView');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Cambiando el estado del usuario a 1 indicando que ya realizo su voto
        $user_id = (int)request()->input('user-id'); 
        $user = User::find($user_id); 
        $user->vote_state = 1; 
        $user->save();

        //Agrega el nuevo voto a la base de datos
        $vote = new Votes();
        $id_candidate = request()->input('id-candidate');
        $userRol = request()->input('user-rol');
        $vote->id_candidate = $id_candidate;
        $vote->user_rol = $userRol;
        $vote->save();

        /*$allVotesData = Votes::all();

        foreach($allVotesData as $current_vote){
            $new_candidate_points = 7;

            $current_user_rol = $current_vote->user_rol;
            $current_candidate_id = $current_vote->id_candidate;

            $candidate = Candidate::find($current_vote->id_candidate);
            $actual_points =  floatval($candidate->points);
            $candidate->points = $actual_points + $new_candidate_points;
            $candidate->save();

            //dd($candidate);
            
            //echo $current_user_rol . '</br>';
            //echo $current_candidate_id . '</br>';

        }

         $can = Candidate::orderBy('points','desc')->get();
         echo $can . '</br>';
     /*   $vote = new Votes();
        $id_candidate = request()->input('id-candidate');
        
        $userRol = request()->input('user-rol');
        $vote->id_candidate = $id_candidate;
        $vote->user_rol = $userRol;
        $vote->save();
        $user->save();
        dd($user);*/

        /*
        $info = request()->all();
        $vote = new Votes();
        $id_candidate = request()->input('id-candidate');
        $userRol = request()->input('user-rol');
        $vote->id_candidate = $id_candidate;
        $vote->user_rol = $userRol;
        //$vote->save();
        
        $vote2 = Votes::where('id_candidate','cand-1')->get();
        

        foreach($vote2 as $vote_min){
            $candidate = Candidate::find('cand-1');
            $candidate->points = 1;
       } 

       $total = Votes::all();
       $votesTotal = $total->count();
       var_dump($votesTotal);
       $academicPoints = $votesTotal * 0.60;
       var_dump($academicPoints);
       $candidate->save();

        dd($vote2);
        //return response()->json($info);
        //return $name;

        */

        return view('contents.success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Votes  $votes
     * @return \Illuminate\Http\Response
     */
    public function show(Votes $votes)
    {
        $getCandidates=Candidate::all();
        $getTotalVotes = Votes::all()->count();
        $allVotesData = Votes::all();

        //limpiando la cantidad de puntos anterior para que no afecte el nuevo calculo
        foreach($getCandidates as $current_candidate){
            $current_candidate->points = 0.00;
            $current_candidate->save();
        }

        //agregando la puntuacion actual para cada candidato segun los votos
        foreach($allVotesData as $current_vote){
            $new_candidate_points = 0;

            $current_user_rol = $current_vote->user_rol;
            $current_candidate_id = $current_vote->id_candidate;

            if($current_user_rol == 'academico'){
                $new_candidate_points = $getTotalVotes * 0.60;
            }

            if($current_user_rol == 'estudiante'){
                $new_candidate_points = $getTotalVotes * 0.25;
            }

            if($current_user_rol == 'administrativo'){
                $new_candidate_points = $getTotalVotes * 0.15;
            }

            $candidate = Candidate::find($current_candidate_id);
            $actual_points =  floatval($candidate->points);
            $candidate->points = $actual_points + $new_candidate_points;
            $candidate->save();

            //dd($candidate);
            
            //echo $current_user_rol . '</br>';
            //echo $current_candidate_id . '</br>';
        }

        $query['results']=Candidate::orderBy('points','desc')->get();

        return view('/contents.results',$query);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Votes  $votes
     * @return \Illuminate\Http\Response
     */
    public function edit(Votes $votes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Votes  $votes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Votes $votes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Votes  $votes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Votes $votes)
    {
        //
    }
}

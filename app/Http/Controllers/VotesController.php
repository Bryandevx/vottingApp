<?php

namespace App\Http\Controllers;
use Auth;
use App\Mail\VoteConfirmed;
use App\Candidate;
use App\User;
use App\Votes;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

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
        $user_email = 
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

        Mail::to(Auth::user()->email)->send(new VoteConfirmed);

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

        $totalAcademicVotes = 0;
        $totalStudentVotes = 0;
        $totalAdminVotes = 0;

        foreach($allVotesData as $vote_rol){
            $current_user_rol = $vote_rol->user_rol;

            if($current_user_rol == 'academico'){
                $totalAcademicVotes += 1;
            }

            if($current_user_rol == 'estudiante'){
                $totalStudentVotes += 1;
            }

            if($current_user_rol == 'administrativo'){
                $totalAdminVotes += 1;
            }            
        }

        if($totalAcademicVotes > 0){
            $setPercentageAcademic = (float)(60 / $totalAcademicVotes);
        }else{
            $setPercentageAcademic = 0;
        }
        if($totalStudentVotes > 0){
            $setPercentageStudent = (float) (25 / $totalStudentVotes);
        } else{
            $setPercentageStudent = 0;
        }
        if($totalAdminVotes > 0){
            $setPercentageAdmin = (float)( 15 / $totalAdminVotes);
        } else{
            $setPercentageAdmin = 0;
        }

      //  dd($setPercentageAcademic, $totalAcademicVotes);

        //agregando la puntuacion actual para cada candidato segun los votos
        foreach($allVotesData as $current_vote){
            $new_candidate_points = 0;

            $current_user_rol = $current_vote->user_rol;
            $current_candidate_id = $current_vote->id_candidate;

            if($current_user_rol == 'academico'){
                //$new_candidate_points = $getTotalVotes * 0.60;
                $new_candidate_points = $setPercentageAcademic;
            }

            if($current_user_rol == 'estudiante'){
                //$new_candidate_points = $getTotalVotes * 0.25;
                $new_candidate_points = $setPercentageStudent;
            }

            if($current_user_rol == 'administrativo'){
                //$new_candidate_points = $getTotalVotes * 0.15;
                $new_candidate_points = $setPercentageAdmin;
            }

            $candidate = Candidate::find($current_candidate_id);
            $actual_points =  floatval($candidate->points);
            $candidate->points = $actual_points + $new_candidate_points;
            //$candidate->points = $actual_points + $new_candidate_points;
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

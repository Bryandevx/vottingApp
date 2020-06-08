<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'candidates';
    protected $primaryKey = 'id_candidate'; // setting the primaryKey for FIND(METHOD);
}


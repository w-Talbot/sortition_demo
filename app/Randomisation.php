<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Randomisation extends Model
{
    use HasFactory;
    protected $fillable = ['study_id', 'participant_id','allocation', 'randomised_by', 'randomisation_date'];
}

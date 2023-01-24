<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Study extends Model
{
    use HasFactory;
    protected $fillable = [
        'study_name',
        'study_type',
        'study_description',
        'logo',
        'study_monitor',
        'algorithm_type',
        'algorithm_masking',
        'algorithm_rng',
        'allocation_groups',
        'selection_options',
        'initial_sites',
        'field_warning',
        'inclusion_warning',
        'exclusion_warning',
        'item_groups',
        'allocation_message'];

}

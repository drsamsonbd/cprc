<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ManualReport extends Model
{
    protected $fillable = [
        'date', 
        'time',
        'pkrc',
        'male', 
        'female', 
        'paeds_male', 
        'paeds_female',
        'carer', 
        'local',
        'non_local',
        'bor',
        'stage_1',
        'stage_2',
        'staff',
        'notes'

    ];
}

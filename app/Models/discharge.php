<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class discharge extends Model
{
    protected $fillable = [
    'reg_number',
    'date',
    'duration',
    'type_dc',
    'notes'
        ];
    }

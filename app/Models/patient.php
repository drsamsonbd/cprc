<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patient extends Model
{
    protected $fillable = [
        'name', 'kp_passport', 'age', 'gender', 'race'. 'phone','job', 'workplace','nationality', 'area', 'notes'
    ];
}

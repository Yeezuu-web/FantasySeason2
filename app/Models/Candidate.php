<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $table = "candidates";

    protected $fillable = [
        'manager_name',
        'team_name',
        'dob',
        'gender',
        'fan_club',
        'email',
        'phone',
        'bank',
        'account_name',
        'account_no',
        'ref_id',
        'status',
    ];
    
}

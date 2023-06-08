<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPlan extends Model
{
    use HasFactory;
    protected $table = 'job_plans';
    protected $primaryKey = 'id';
    
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPlan extends Model
{
    use HasFactory;
    protected $table = 'job_plans';
    protected $primaryKey = 'id';
    protected $guarded = [];


    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'display_frontend' => 'boolean',
    ];
}

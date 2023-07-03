<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobRole extends Model
{
    use HasFactory;
    protected $table = 'job_roles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];

    /**
     * Get all of the comments for the JobRole
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class, 'job_role_id');
    }
}

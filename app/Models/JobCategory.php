<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobCategory extends Model
{
    use HasFactory;
    protected $table = 'job_categories';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'icon',
        'status',
    ];

    protected $casts = [
        'status' => 'boolean',
    ];

    /**
     * Get all of the comments for the JobCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function jobs(): HasMany
    {
        return $this->hasMany(Job::class, 'job_category_id','id');
    }
}

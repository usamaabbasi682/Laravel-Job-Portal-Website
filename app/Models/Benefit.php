<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    use HasFactory;
    protected $table="benefits";
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
    ];

    /**
     * The roles that belong to the Benefit
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function jobs(): BelongsToMany
    {
        return $this->belongsToMany(Job::class, 'benefit_jobs');
    }
}

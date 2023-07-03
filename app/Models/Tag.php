<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;
    protected $table="tags";
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * The roles that belong to the Tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function jobs(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'job_tags');
    }

}

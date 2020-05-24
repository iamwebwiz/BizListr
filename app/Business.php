<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Business extends Model
{
    use SoftDeletes;

    /**
     * The model's guarded fields.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The categories this business is associated with.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Category::class);
    }

    /**
     * The phones associated with this business.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function phones(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(BusinessPhone::class);
    }
}

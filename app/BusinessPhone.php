<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessPhone extends Model
{
    /**
     * The guarded properties for this model.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The business associated with this phone record.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function business(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Business::class);
    }
}

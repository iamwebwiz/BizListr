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
     * The business associated with this model record.
     *
     * @return mixed
     */
    public function business()
    {
        return Business::firstWhereId($this->id);
    }

    /**
     * The category associated with this model record.
     *
     * @return mixed
     */
    public function category()
    {
        return Category::firstWhereId($this->id);
    }
}

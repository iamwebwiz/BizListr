<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BusinessCategory extends Model
{
    protected $table = 'business_category';

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

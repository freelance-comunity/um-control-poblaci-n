<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Population extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'populations';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['month', 'date', 'status', 'enrollment', 'name', 'system', 'turn', 'semi_day', 'scholarship', 'foreign', 'agreement', 'average
', 'five_or_more', 'quarter', 'year_income', 'year_discharge', 'observations_of_changes', 'modification_date', 'low', 'low_date', 'observations_low', 'intern_letter', 'certificate', 'title'];

    // use SoftDeletes;
    // protected $dates = ['deleted_at'];

}

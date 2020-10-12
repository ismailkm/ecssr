<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'status',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    public function answers()
    {
        return $this->hasMany('App\Models\Answer','question_id','id');
    }

    public function results()
    {
        return $this->hasMany('App\Models\Result','question_id','id');
    }
}

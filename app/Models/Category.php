<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
    ];

    public function questions()
    {
        return $this->hasMany('App\Models\Question','category_id','id');
    }

    public function results()
    {
        return $this->hasMany('App\Models\Result','category_id','id');
    }

    public function questionsWithAnswers()
    {
        return $this->hasMany('App\Models\Question','category_id','id')
                    ->select(array('id', 'title', 'category_id'))
                    ->with('category:id,name')
                    ->with(['answers:id,description,question_id']);
    }

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_id',
    ];

    public function student()
    {
        return $this->belongsTo('App\Models\Student', 'student_id');
    }

    public function results()
    {
        return $this->hasMany('App\Models\Result','test_id','id')->with('question');
    }

    public function correctResults()
    {
        return $this->hasMany('App\Models\Result','test_id','id')->where('is_correct', 1);
    }

    public function incorrectResults()
    {
        return $this->hasMany('App\Models\Result','test_id','id')->where('is_correct', 0);
    }

    public function scopeResultCounts($query)
    {
        return $query->withCount(['results', 'correctResults', 'incorrectResults']);
    }

}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'candidates';

    protected $fillable = [
        'name',
        'age',
        'slogan',
        'text',
        'twitter_link'
    ];

    public function results()
    {
        return $this->hasMany(Result::class);
    }
}

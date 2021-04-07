<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'user_id',
        'candidate_id'
    ];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function candidates()
    {
        return $this->belongsTo(Candidate::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Answer extends Model
{
    use \App\Models\Traits\VoteTrait;

    protected $guarded = ['id'];

    protected $appends = [
        'upVotesCount',
        'downVotesCount',
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function isBest()
    {
        return $this->id == $this->question->best_answer_id;
    }
}

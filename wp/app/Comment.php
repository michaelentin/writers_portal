<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

	protected $fillable = [
        'body', 'user_id'
    ];

    public function content()
    {
    	return $this->belongsTo(Content::class);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }
}

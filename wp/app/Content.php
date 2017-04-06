<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{

    protected $fillable = [
        'title',
    ];

    public function comments()
    {
    	return $this->hasMany(Comment::class);
    }

    public function addComment($body, $user_id)
    {
        // creates a new comment

        $this->comments()->create([
            'body' => $body,
            'user_id' => $user_id
        ]);
    }

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function libraries()
    {
    	return $this->belongsToMany(Library::class);
    }
}

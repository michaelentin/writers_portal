<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Library extends Model
{

	protected $fillable = [
        'user_id'
    ];

    public function user()
    {
    	return $this->belongsTo(User::class);
    }

    public function contents()
    {
    	return $this->belongsToMany(Content::class);
    }
}

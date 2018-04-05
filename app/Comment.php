<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
    	'comment', 'user_id', 'topic_id', 'image'
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function topic(){
        return $this->belongsTo(Topic::class);
    }

}

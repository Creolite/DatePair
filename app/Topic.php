<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'name', 'desc', 'forums_id','trends_id', 'tags','likes','user_id', 'name_slug'
    ];

    protected $dates = [
    	'created_at', 'update_at',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
//        return $this->hasMany(Comment::class)->latest()->get();
//        return $this->hasMany(Comment::class)->latest()->paginate(2);
        // To avoid inconsistency, should always return a Relationship instance only:
        return $this->hasMany(Comment::class)->latest();
    }

    public function getRouteKeyName(){
        return 'name_slug';
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable = [
        'title', 'description', 'user_id', 'forums_id', 'trends_id', 'privacy',
        'likes', 'unlikes', 'share', 'title_slug'
    ];

    protected $dates = [
        'created_at', 'update_at',
    ];

    // Use this to retrieve options like 'countries' as serialized JSON from DB then cast to PHP array
    // Countries can be stores as one row.column entry in an 'options' table
    protected $casts = [
        'options' => 'array',
    ];
    // E.g Use case:
    // PS: Can't this be used to store all user options like 'privacy|fb|tw|gp' etc in one field?
    /*
        $user = App\User::find(1);
        $options = $user->options;
        $options['key'] = 'value';
        $user->options = $options;
        $user->save();
    */

    protected static $privacy_values = [
        'everyone' => '1', 'friends' => '2'
    ];

    protected static $social_shares = [
        'fb' => '1', 'tw' => '2', 'gp' => '3'
    ];

    protected static $privacy = [
        'everyone' => '1', 'friends' => '2'
    ];

    private static $rules = [
        'title' => 'required|string|unique:topics|max:255',
        'description' => 'required|string|max:3000',
        'forums_id' => 'required|integer',
        'trends_id' => 'required|integer',
        'privacy' => 'required|integer',
        'share_fb' => 'sometimes|accepted',
        'share_tw' => 'sometimes|accepted',
        'share_gp' => 'sometimes|accepted',
    ];

    public static function rules($action = ''){
        $rules = static::$rules;
        if($action == 'put'){ unset($rules['title']); }
        return $rules;
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class)->latest();
    }

    public function getRouteKeyName(){
        return 'title_slug';
    }

    // Using ENUM is more resource-costly and not SQL-standard: reverting to this
    /*public function setPrivacyAttribute($value){
        return array_search($value, static::$privacy);
    }*/

    public function getPrivacyAttribute($value){
        return !empty(static::$privacy[$value]) ? static::$privacy[$value] : null;
    }

    // '$social' e.g 'fb', '$share' e.g 'on'
    public function setShareAttribute($value){
        foreach ($value as $social => $share) {
            if (!$share) { continue; }
            $numbers[] = static::$social_shares[$social];
        }
        $this->attributes['share'] = !empty($numbers) ? join('', $numbers) : 1;
    }

    // Does NOT until $topic->share is required elsewhere
    // Hack: create accessor for the ID ('getIdAttribute()') which will almost always be called
    // Find a clean fix for this: a function that is always called when a DB selection is made
    public function getShareAttribute($value){
        if(empty($this->attributes['share'])){ return; }

        $shares = [];
        $numbers = str_split($value);

        foreach ($numbers as $n) {
            if (!$social = array_search($n, static::$social_shares)) {
                continue;
            }
            $field = 'share_' . $social;
            $this->attributes[$field] = $shares[$field] = 'on';
        }
        unset($this->attributes['share']);
    }

    // Hack to always call 'getShareAttribute()'
    public function getIdAttribute($value) {
        $this->share;
        return $value;
    }

    public function updateTopic($fields){
        $topic = auth()->user()->topics()->where('id', $this->id)->first();
        return $topic ? $topic->update( $fields ) : null;
    }


}
<?php

namespace Hindsight\Tweets;

use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    protected $fillable = [
        'id',
        'json',
        'tweet_text',
        'place_id',
        'place_name',
        'latitude',
        'longitude',
        'user_id',
        'user_screen_name',
        'user_avatar_url',
        'public',
        'approved',
    ];

    public function setTweetTextAttribute($value)
    {
        $this->attributes['tweet_text'] = trim(str_replace('#onsite', '', $value));
    }
}

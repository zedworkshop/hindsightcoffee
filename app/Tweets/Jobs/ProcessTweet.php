<?php

namespace Hindsight\Tweets\Jobs;

use Hindsight\Tweets\Tweet;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessTweet implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $original_tweet;
    protected $tweet;

    public function __construct($tweet)
    {
        $this->tweet = $tweet;
    }

    public function handle()
    {
        $this->original_tweet = $this->tweet;
        $this->tweet = json_decode($this->tweet, true);

        if ($this->shouldSave()) {
            $this->saveTweet();
        }
    }

    protected function shouldSave()
    {
        return array_has($this->tweet, 'id')
            && empty(array_get($this->tweet, 'entities.user_mentions', []))
            && array_has($this->tweet, 'entities.hashtags')
            && collect(array_get($this->tweet, 'entities.hashtags', []))->contains('text', 'onsite');
    }

    protected function saveTweet()
    {
        $latitude = null;
        $longitude = null;
        $coords = collect(array_get($this->tweet, 'place.bounding_box.coordinates', [null, null]))->flatten(1)->first();

        if ($coords) {
            $latitude = $coords[1];
            $longitude = $coords[0];
        }

        Tweet::create([
            'id' => array_get($this->tweet, 'id_str'),
            'json' => $this->original_tweet,
            'tweet_text' => array_get($this->tweet, 'text', ''),
            'place_id' => array_get($this->tweet, 'place.id', ''),
            'place_name' => array_get($this->tweet, 'place.full_name', ''),
            'latitude' => $latitude,
            'longitude' => $longitude,
            'user_id' => array_get($this->tweet, 'user.id_str', ''),
            'user_screen_name' => array_get($this->tweet, 'user.screen_name', ''),
            'user_avatar_url' => array_get($this->tweet, 'user.profile_image_url_https', ''),
            'approved' => 0
        ]);
    }
}

<?php

namespace Hindsight\Tweets\Services;

use Hindsight\Tweets\Jobs\ProcessTweet;
use Illuminate\Foundation\Bus\DispatchesJobs;
use UserstreamPhirehose;

class TwitterStream extends UserstreamPhirehose
{
    use DispatchesJobs;

    public function __construct($accessToken, $accessSecret)
    {
        parent::__construct($accessToken, $accessSecret);

        $this->URL_BASE = 'https://userstream.twitter.com/1.1/';
    }

    public function enqueueStatus($status)
    {
        $this->dispatch(new ProcessTweet($status));
    }
}

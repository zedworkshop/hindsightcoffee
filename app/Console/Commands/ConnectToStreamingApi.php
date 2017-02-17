<?php

namespace Hindsight\Console\Commands;

use Hindsight\Tweets\Services\TwitterStream;
use Illuminate\Console\Command;

class ConnectToStreamingApi extends Command
{
    protected $signature = 'hindsight:stream_twitter';

    protected $description = 'Connect to the Twitter Streaming API';

    protected $twitter_stream;

    public function __construct(TwitterStream $twitter_stream)
    {
        $this->twitter_stream = $twitter_stream;

        parent::__construct();
    }

    public function handle()
    {
        $this->twitter_stream->consumerKey = config('services.twitter.consumer_secret');
        $this->twitter_stream->consumerSecret = config('services.twitter.consumer_key');
        $this->twitter_stream->consume();
    }
}

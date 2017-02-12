<?php

namespace Hindsight\Console\Commands;

use Hindsight\TwitterStream;
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
        $twitter_consumer_key = env('TWITTER_CONSUMER_KEY', '');
        $twitter_consumer_secret = env('TWITTER_CONSUMER_SECRET', '');

        $this->twitter_stream->consumerKey = $twitter_consumer_key;
        $this->twitter_stream->consumerSecret = $twitter_consumer_secret;
        $this->twitter_stream->consume();
    }
}

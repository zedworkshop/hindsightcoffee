<div class="location-wrapper">
    <h6 class="bold red">{{ $tweet->created_at->format('l F j, Y') }}</h6>
    <p class="small">{{ $tweet->tweet_text }}</p>
</div>
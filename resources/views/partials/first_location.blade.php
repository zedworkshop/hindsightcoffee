<div class="location-wrapper">
    <div class="location-map">
        <img src="https://maps.googleapis.com/maps/api/staticmap?center={{ $tweet->latitude }},{{ $tweet->longitude }}&zoom=16&size=386x180&maptype=roadmap&markers=color:red%7Clabel:S%7C{{ $tweet->latitude }},{{ $tweet->longitude }}&key={{ config('services.google.key') }}"/>
    </div>

    <h5 class="bold red">{{ $tweet->created_at->format('l F j, Y') }}</h5>
    <p>{{ $tweet->tweet_text }}</p>
</div>
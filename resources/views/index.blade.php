<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Huntsville, Alabama Specialty Coffee | Hindsight Coffee Co.</title>
    <meta name="description"
          content="Hindsight Coffee Co. has a passion for bringing some of the highest quality coffees the world has to offer to Huntsville, Alabama.">

    <link rel="shortcut icon" href="/favicon.ico"/>
    <link rel="icon" type="image/png" href="favicon-32x32.png" sizes="32x32"/>
    <link rel="icon" type="image/png" href="favicon-16x16.png" sizes="16x16"/>

    <meta property="fb:admins" content="503386332">
    <meta property="og:url" content="http://hindsightcoffee.com">
    <meta property="og:title" content="Huntsville, Alabama Specialty Coffee">
    <meta property="og:image" content="http://hindsightcoffee.com/img/fb-share.jpg"/>
    <meta property="og:description"
          content="Hindsight Coffee Co. has a passion for bringing some of the highest quality coffees the world has to offer to Huntsville, Alabama.">
    <meta property="og:site_name" content="Hindsight Coffee Co.">
    <meta property="og:type" content="business.business">
    <meta property="business:contact_data:street_address" content="No street address"/>
    <meta property="business:contact_data:locality" content="Huntsville, Alabama"/>
    <meta property="business:contact_data:postal_code" content="35801"/>
    <meta property="business:contact_data:country_name" content="USA"/>
    <meta property="business:contact_data:website" content="http://hindsightcoffee.com"/>

    <meta itemprop="name" content="Huntsville, Alabama Specialty Coffee">
    <meta itemprop="description"
          content="Hindsight Coffee Co. has a passion for bringing some of the highest quality coffees the world has to offer to Huntsville, Alabama.">
    <meta itemprop="image" content="http://hindsightcoffee.com/img/fb-share.jpg">

    <link rel="stylesheet" href="/css/app.css">

    <script type="text/javascript">
        WebFontConfig = {
            google: {
                families: ['Roboto:400,700:latin', 'BioRhyme+Expanded:400']
            }
        };
        (function () {
            var wf = document.createElement('script');
            wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1/webfont.js';
            wf.type = 'text/javascript';
            wf.async = 'true';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(wf, s);
        })();
    </script>
</head>

<body class="border-box">
<main role="main" class="main">
    <header class="siteheader">
        <h1 class="logo">
            <img alt="Hindsight Coffee Co." src="/images/fb.png"/>
        </h1>
    </header>
    <div class="menu">
        <h2 class="red mt0">Track the truck</h2>

        @if($tweets->isEmpty())
            @include('partials.no_locations')
        @else
            @foreach($tweets as $tweet)
                @if($loop->first)
                    @include('partials.first_location')
                @else
                    @include('partials.location')
                @endif
            @endforeach
        @endif

        <hr/>

        <h2 class="red">Menu</h2>
        <ul class="menu-list">
            <li>Drip Coffee</li>
            <li>Espresso</li>
            <li>Latte</li>
            <li>Cappuccino</li>
            <li>Mocha</li>
            <li>Hot Chocolate</li>
            <li>Chai Latte</li>
        </ul>
        <p class="small">We offer caramel, chocolate, and vanilla syrups.</p>
    </div>
    <footer role="footer" class="sitefooter">
        <p class="small white mb0">
            <a href="https://facebook.com/hindsightcoffee/" target="_blank">Facebook</a> &middot;
            <a href="https://instagram.com/hindsightcoffee/" target="_blank">Instagram</a> &middot;
            <a href="mailto:info@hindsightcoffee.com">info@hindsightcoffee.com</a>
        </p>
    </footer>
</main>
</body>
</html>
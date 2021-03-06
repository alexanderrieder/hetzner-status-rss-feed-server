<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hetzner-Status JSON Service</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ url('/css/darcula.css') }}"/>
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.12.0/highlight.min.js"></script>
    <script>hljs.initHighlightingOnLoad();</script>
    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Raleway', sans-serif;
            font-weight: 100;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {

            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 12px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }

    </style>
</head>
<body>
<div class="flex-center position-ref full-height">
    <div class="content">
        <div class="title">
            Hetzner-Status JSON Service
        </div>
        <p>We have currently {{\App\Model\Message::count()}} status messages in our system. We perform the monitoring
            since 2018-02-06 12:00:00. Since this date we have all available messages from Hetzner.</p>
        <div class="links m-b-md">
            <a href="https://github.com/LKDevelopment/hetzner-status-rss-feed-server">GitHub</a>
            <a href="https://twitter.com/HetzStatusBot"><i class="fab fa-twitter"></i> Bot</a>
            <a href="https://telegram.me/HetznerStatsBot"><i class="fab fa-telegram-plane"></i> Bot</a>
        </div>
        <div>
            API (Available languages: de | en )
            <pre>
                <code class="bash">$ curl https://hetzner-status.lkdev.co/api/hetzner-status/{languageCode}</code>
            </pre>
        </div>
        <div class="mt-2">
            Response
            <pre>
                <code class="bash">$ curl https://hetzner-status.lkdev.co/api/hetzner-status/de</code>
            </pre>
            <pre style="height:200px;">
                <code class="json">{{ json_encode(App\StatusMeldung::onlyParents()->language('de')->limit(3)->get(), JSON_PRETTY_PRINT) }}</code>
            </pre>
        </div>
    </div>
</div>
<script defer src="https://use.fontawesome.com/releases/v5.0.12/js/all.js"
        integrity="sha384-Voup2lBiiyZYkRto2XWqbzxHXwzcm4A5RfdfG6466bu5LqjwwrjXCMBQBLMWh7qR"
        crossorigin="anonymous"></script>
</body>
</html>

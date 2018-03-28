<!DOCTYPE html>
<html lang="en-US" itemscope="itemscope" itemtype="http://schema.org/WebPage">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Pizzaro</title>
        <link rel="stylesheet" type="text/css" href="{{url('/skins/front/assets/css/bootstrap.min.css')}}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{url('/skins/front/assets/css/font-awesome.min.css')}}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{url('/skins/front/assets/css/animate.min.css')}}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{url('/skins/front/assets/css/font-pizzaro.css')}}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{url('/skins/front/assets/css/style.css')}}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{url('/skins/front/assets/css/colors/red.css')}}" media="all" />
        <link rel="stylesheet" type="text/css" href="{{url('/skins/front/assets/css/jquery.mCustomScrollbar.min.css')}}" media="all" />

        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CYanone+Kaffeesatz:200,300,400,700" rel="stylesheet">
        <link rel="shortcut icon" href="{{url('/skins/front/assets/images/fav-icon.png')}}">
        @stack('head_css')
        @stack('head_javascript')
    </head>

    <body class="@yield('class_for_gread')">
        <div id="page" class="hfeed site">

            @include('front.navigation.navigation', ['tags' => $tags])
           

            @yield('content')


            @include('front.footer')
            <!-- #colophon -->
        </div>
        <script type="text/javascript" src="{{url('/skins/front/assets/js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/skins/front/assets/js/tether.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/skins/front/assets/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/skins/front/assets/js/owl.carousel.min.js')}}"></script>

        <script type="text/javascript" src="{{url('/skins/front/assets/js/social.share.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/skins/front/assets/js/jquery.mCustomScrollbar.concat.min.js')}}"></script>
        <script type="text/javascript" src="{{url('/skins/front/assets/js/scripts.min.js')}}"></script>
        @stack('footer_javascript')
    </body>
</html>
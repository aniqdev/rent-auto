<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" @yield('html-attributes')>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>@yield('title') | {{ config('app.name', 'TopObytneVozy.cz') }}</title>
        <meta name="keywords" content="@yield('keywords', 'půjčovna obytných vozů, půjčovna obytných aut, půjčovna obytných automobilů, půjčovna karavanů, pronájem obytných vozů, pronájem obytných aut, pronájem obytných automobilů, pronájem karavanů, obytné vozy, karavany, praha, lahovice')">
        <meta name="description" content="@yield('description', 'Pronájem obytných vozů - nové vozy pro 4 až 6 osob, neomezený počet ujetých km, kempingové vybavení a další volitelné příslušenství. TopObytneVozy.cz - Praha')">
        <meta name="author" content="4WORKS Solutions s.r.o.">
        <meta name="copyright" content="4WORKS Solutions s.r.o.">
        <meta name="robots" content="index, follow">
        
        <meta name="facebook-domain-verification" content="yigtshnih9o8b3sa32h7hsdsa78ana" />

        <link rel="canonical" href="{{ url()->current() }}">

        <!-- Social -->
        <meta property="og:site_name" content="{{ config('app.name', 'TopObytneVozy.cz') }}">
        <meta property="og:title" content="@yield('title') | {{ config('app.name', 'TopObytneVozy.cz') }}">
        <meta property="og:description" content="@yield('description', 'Půjčovna obytných vozů - nové vozy pro 4 až 6 osob, neomezený počet ujetých km, kempingové vybavení a další volitelné příslušenství. TopObytneVozy.cz - Praha')">
        <meta property="og:image" content="{{ asset('storage/uploads/st1KtJUvGj8FTWB2LrDBW71rKEnPH4T2tvuCYvPD.jpg') }}">
        <meta property="og:url" content="{{ url()->current() }}">

        <meta name="twitter:title" content="@yield('title') | {{ config('app.name', 'TopObytneVozy.cz') }}">
        <meta name="twitter:description" content="@yield('description', 'Pronájem obytných vozů - nové vozy pro 4 až 6 osob, neomezený počet ujetých km, kempingové vybavení a další volitelné příslušenství. TopObytneVozy.cz - Praha')">
        <meta name="twitter:image" content="{{ asset('images/web/hp-img.jpg') }}">
        <meta name="twitter:card" content="{{ asset('images/web/hp-img.jpg') }}">

        <!-- Favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
        <link rel="manifest" href="{{ asset('site.webmanifest') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="/fonts/web/vendor/icofont/icofont.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        <!-- Hotjar Tracking Code -->
        <script>
            (function(h,o,t,j,a,r){
                h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
                h._hjSettings={hjid:2716907,hjsv:6};
                a=o.getElementsByTagName('head')[0];
                r=o.createElement('script');r.async=1;
                r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
                a.appendChild(r);
            })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
        </script>

        <!-- Smartsupp Live Chat script -->
        <script type="text/javascript">
            var _smartsupp = _smartsupp || {};
            _smartsupp.key = 'e1c39ba47d0205863d2b30fa00a207b55752f3ea';
            window.smartsupp||(function(d) {
            var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
            s=d.getElementsByTagName('script')[0];c=d.createElement('script');
            c.type='text/javascript';c.charset='utf-8';c.async=true;
            c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
            })(document);
        </script>

        <!-- Meta Pixel Code -->
        <script>
        !function(f,b,e,v,n,t,s)
        {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};
        if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
        n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];
        s.parentNode.insertBefore(t,s)}(window, document,'script',
        'https://connect.facebook.net/en_US/fbevents.js');
        fbq('init', '458358831686242');
        fbq('track', 'PageView');
        </script>
        <noscript><img height="1" width="1" style="display:none"
        src="https://www.facebook.com/tr?id=458358831686242&ev=PageView&noscript=1"
        /></noscript>
        <!-- End Meta Pixel Code -->

        <!-- Google Tag Manager -->
        <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
        new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
        j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
        'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-M8NZ5CK');</script>
        <!-- End Google Tag Manager -->

        <!-- Global site tag (gtag.js) - Google Ads: 362985500 -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=AW-362985500"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'AW-362985500');
        </script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-YZDHK1MZ2B"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-YZDHK1MZ2B');
        </script>

        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-197963204-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-197963204-1');
        </script>

        <script type="text/javascript">
	        /* <![CDATA[ */
            var seznam_retargeting_id = 134111;
        	/* ]]> */
        </script>

        <script type="text/javascript" src="//c.imedia.cz/js/retargeting.js"></script>
    </head>
    <body class="@yield('class')">
        
        <!-- Google Tag Manager (noscript) -->
        <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M8NZ5CK"
        height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
        <!-- End Google Tag Manager (noscript) -->

        <div id="app">
        
            <main class="compare__content">
                <x-header-compare />

                @yield('content')

                {{--  <x-footer />  --}}
            </main>

        </div>

    </body>
</html>
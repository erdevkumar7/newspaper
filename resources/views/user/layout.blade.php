<!doctype html>
<html lang="en">

<head>
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-HM3ESLMDMH"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-HM3ESLMDMH');
    </script>

    @include('user.headerCSS')
</head>

<body>
    <div>
        @include('user.topNav')

        @yield('page_content')

        @include('user.footer')
        @include('user.footerJS')
    </div>

</body>

</html>

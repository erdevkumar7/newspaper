<!DOCTYPE html>
<html lang="en">

<head>
    @include('user.headerCSS')
</head>

<body class="index-page">

    @include('user.header')

    @yield('page_content')

    @include('user.footer')

    @include('user.footerJS')


</body>

</html>

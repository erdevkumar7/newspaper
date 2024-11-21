<!doctype html>
<html lang="en">

<head>
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


<!doctype html>
<html lang="en">

<head>
    @include('user.headerCSS')
</head>

<body>    
    <div class="container h-100">
        @include('user.topNav')

        @yield('page_content') 
        
        @include('user.footerJS')
    </div>

</body>

</html>


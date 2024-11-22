<!doctype html>
<html lang="en">

<head>
    @include('organizer.headerCSS')
</head>

<body>    
    <div>
        @include('organizer.topNav')

        @yield('page_content') 
        
        @include('organizer.footer')
        @include('organizer.footerJS')
    </div>

</body>
</html>

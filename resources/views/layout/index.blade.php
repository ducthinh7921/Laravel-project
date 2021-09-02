<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @yield('title')
    <base href="{{asset('')}}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="public/assets/css/base.css">
    <link rel="stylesheet" href="public/assets/css/main.css">  
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
    <link href="public/assets/font/fontawesome-free-5.15.3-web/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400i|Raleway:400,900" rel="stylesheet">
    <script type='text/javascript' src='http://code.jquery.com/jquery-1.9.1.js'></script>
    <script type='text/javascript' src='public/assets/js/jquery.simpleslider.js'></script>
    <script type='text/javascript' src='http://code.jquery.com/jquery-1.9.1.js'></script>
    <script type='text/javascript'
        src='https://rawgithub.com/amaroks/simpleSlider/master/js/jquery.simpleslider.js'></script>
    <script src="https://kit.fontawesome.com/a54d2cbf95.js"></script>


</head>

<body>
    <div class="app">
        @include('layout.header')    

        @yield('content')
        <!-- -----------------FOOTER--------------------- -->
        <!-- ----------------Tin tức------------------ -->
        @include('layout.footer')

        @yield('script')
        
</body>

</html>
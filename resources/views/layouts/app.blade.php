<!doctype html>
<html class="no-js " lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
    @yield('title')
    <!-- Favicon-->
    <link rel="icon" href="assets/images/logo.jpg" type="image/x-icon">
    <!-- Custom Css -->
    <link rel="stylesheet" href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.min.css')}}"> 
    <style>
        .btn{
            background: rgb(5,95,67);
        }
        .copyright a,.zmdi-lock, .signin_with p a, .signin_with a,.checkbox label a {
            color: rgb(5,95,67);
        }
        
    </style>   
</head>
<body class="theme-blush">
    @yield('content')
<!-- Jquery Core Js -->
<script src="{{asset('assets/bundles/libscripts.bundle.js')}}"></script>
<script src="{{asset('assets/bundles/vendorscripts.bundle.js')}}"></script> <!-- Lib Scripts Plugin Js -->

</body>

</html
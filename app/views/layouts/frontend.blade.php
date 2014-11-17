<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
<!-- BEGIN HEAD -->

<!-- Mirrored from thevectorlab.net/metrolab/ by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 30 May 2014 07:53:10 GMT -->
<head>
   <meta charset="utf-8" />
   <title>@yield('title')</title>
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <meta content="" name="description" />
   <meta content="Mosaddek" name="author" />
    {{HTML::style('frontend/css/bootstrap.min.css')}}
    {{HTML::style('frontend/css/toaster.css')}}
    {{HTML::style('frontend/css/custom.css')}}

    {{HTML::script('frontend/js/jquery.min.js')}}

    
    {{HTML::script('frontend/js/angular.js')}}
    {{HTML::script('frontend/js/angular-route.min.js')}}
    
    {{HTML::script('frontend/js/angular-animate.min.js')}}
    {{HTML::script('frontend/js/toaster.js')}}

    {{HTML::script('frontend/js/bootstrap.min.js')}}
    <script>
        var urlRoot = '';
    </script>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="fixed-top">

    <div class="container kcontianer">
        @yield('content')
    </div>
    

</body>
</html>
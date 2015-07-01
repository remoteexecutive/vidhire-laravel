<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Jobfit - {{ $name }}</title>

        <!--Favicon-->

        <!-- Bootstrap -->
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet">
        <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <link href="{!! asset('assets/css/bootstrap-dialog.css') !!}" media="all" rel="stylesheet" type="text/css" />
        <!--Custom CSS-->
        <link href="{!! asset('assets/css/style.css') !!}" media="all" rel="stylesheet" type="text/css" />
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
        <!--[if lt IE 8]>
                 <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
             <![endif]-->
        <div class=header-container>
            <div class="row">
                @include('templates/parts/header-nav')
                @include('templates/parts/header')
                <input type="hidden" class="site-url" name="site-url" value=""/>
                <input type="hidden" class="ajax-url" name="ajax-url" value="">
            </div>
        </div>
        <div class="content-container">
            <div class="row">
                <div class="main-content-container col-md-8 col-xs-12">
                    @if($user == 'Employer')
                    @include('templates/employer')
                    @elseif ($user == 'Jobseeker')
                    @include('templates/jobseeker')
                    @endif
                </div>
                <div class="sidebar-content-container col-md-4 hidden-xs hidden-sm">
                    @include('templates/parts/sidebar')
                </div>
            </div>
        </div>
        <footer>
            @include('templates/parts/footer')
        </footer>
    </div> <!-- /container -->  
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/less.js/2.5.0/less.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false&callback=initialize"></script>
    <script src="http://tinymce.cachefly.net/4.1/tinymce.min.js"></script>
    <script src="{!! asset('assets/js/bootstrap-dialog.min.js') !!}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <!--Custom Javascript-->
    
    <script src="{!! asset('assets/js/custom.js') !!}"></script>
</body>
</html>



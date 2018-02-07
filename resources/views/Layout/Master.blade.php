<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
	
    <title>@yield('Titulo')</title> 
 
    {!!Html::style('css/bootstrap.css') !!}
    {!!Html::style('https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i') !!}
    {!!Html::style('css/font-awesome.css') !!}
    {!!Html::style('css/app.css') !!}
    {!!Html::style('css/pnotify.custom.min.css') !!}
    
    
  

</head>
<body>

        <div class="container-fluid" id="wrapper">

                <div class="row">

                    <nav class="sidebar col-xs-12 col-sm-4 col-lg-3 col-xl-2 bg-faded sidebar-style-1">
                       
                        <div class="navbar-brand mb-2 ml-2"  >
                            <img src="./img/logo.png" width="200" height="10" class="d-inline-block align-top img-fluid" alt="">
                       </div>
                        
                        <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><em class="fa fa-bars"></em></a>
                        
                        <ul class="nav nav-pills flex-column sidebar-nav" id="IDULGENERAL">
                            <li class="nav-item"><a class="nav-link" id = "IDINICIO" href="/home"><em class="fa fa-dashboard"></em> Dashboard <span class="sr-only">(current)</span></a></li>
                            <li class="nav-item"><a class="nav-link" id = "IDCLIENTES" href="/clientes"><em class="fa fa-users"></em> Clientes</a></li>
                            <li class="nav-item"><a class="nav-link" id = "IDUSUARIOS" href="/usuarios"><em class="fa fa-user-circle-o"></em> Usuarios </a></li>
                            <li class="nav-item"><a class="nav-link" id = "IDSERVICIOS" href="/servicios"><em class="fa fa-scissors"></em> Servicios </a></li>
                            <li class="nav-item"><a class="nav-link" id = "IDINFORMES" href="/informes"><em class="fa fa-file-text-o"></em> Informes </a></li>
                        </ul>
                        
                        <a href="#" class="logout-button"><em class="fa fa-power-off"></em> Signout</a>
                    
                    </nav>
                    
                    <main class="col-xs-12 col-sm-8 offset-sm-4 col-lg-9 offset-lg-3 col-xl-10 offset-xl-2   ">

                        <header class="page-header row justify-center">
                            
                            <div class="col-md-6 col-lg-8" >
                                <h1 class="float-left text-center text-md-left">@yield('Titulo-Header')</h1>
                            </div>
                            
                            <div class="dropdown user-dropdown col-md-6 col-lg-4 text-center text-md-right"><a class="btn btn-stripped dropdown-toggle" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <img src="img/profile-pic.jpg" alt="profile photo" class="circle float-left profile-photo" width="50" height="auto">
                                
                                <div class="username mt-1">
                                    <h4 class="mb-1">Username</h4>
                                    
                                    <h6 class="text-muted">Super Admin</h6>
                                </div>
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" style="margin-right: 1.5rem;" aria-labelledby="dropdownMenuLink"><a class="dropdown-item" href="#"><em class="fa fa-user-circle mr-1"></em> View Profile</a>
                                     <a class="dropdown-item" href="#"><em class="fa fa-sliders mr-1"></em> Preferences</a>
                                     <a class="dropdown-item" href="#"><em class="fa fa-power-off mr-1"></em> Logout</a></div>
                            </div>
                            
                            <div class="clear"></div>

                        </header>
        
         

@yield('Content')


 

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->

{!! Html::script('js/jquery-3.2.1.min.js') !!}
{!! Html::script('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js') !!}
{!! Html::script('js/bootstrap.min.js') !!}
{!! Html::script('js/chart.min.js') !!}
{!! Html::script('js/chart-data.js') !!}
{!! Html::script('js/easypiechart.js') !!}
{!! Html::script('js/easypiechart-data.js') !!}
{!! Html::script('js/bootstrap-datepicker.js') !!}
{!! Html::script('js/custom.js') !!} 
{!! Html::script('js/pnotify.custom.min.js') !!} 




 

    @yield('Javascript')


</body>
</html>
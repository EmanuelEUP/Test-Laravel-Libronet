@extends ('Layout.Master')
@section('Titulo','LIBRONET - SERVICIOS')
@section('Titulo-Header','Servicios')


@section('Javascript')

<script>
  
        $(document).ready(function(){

            //AÑADIR CLASE ACTIVE AL MENU
            $('#IDULGENERAL a').removeClass('active');
            $('#IDSERVICIOS').addClass('active');
    
        });

</script>


@stop

@section('Content')

 


@stop
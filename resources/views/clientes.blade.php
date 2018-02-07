@extends ('Layout.Master')
@section('Titulo','LIBRONET - CLIENTES')
@section('Titulo-Header','Clientes')


@section('Javascript')

<script>

        $(document).ready(function(){

            //AÑADIR CLASE ACTIVE AL MENU
            $('#IDULGENERAL a').removeClass('active');
            $('#IDCLIENTES').addClass('active');
    
        });

</script>

@stop

@section('Content')

 


@stop
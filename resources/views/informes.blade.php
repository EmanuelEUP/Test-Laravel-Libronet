@extends ('Layout.Master')
@section('Titulo','LIBRONET - INFORMES')
@section('Titulo-Header','Informes')


@section('Javascript')

<script>

        $(document).ready(function(){

            //AÑADIR CLASE ACTIVE AL MENU
            $('#IDULGENERAL a').removeClass('active');
            $('#IDINFORMES').addClass('active');
    
        });

</script>

@stop

@section('Content')

 


@stop
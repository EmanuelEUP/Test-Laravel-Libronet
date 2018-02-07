@extends ('Layout.Master')
@section('Titulo','LIBRONET - USUARIOS')
@section('Titulo-Header','Usuarios')


@section('Javascript')

<script>  
     
function fncShowModalDel(BTN){

$datos = BTN.value.split(","); 

$('#IDUSUARIOID_ELIMINAR').val($datos[0]);
$('#IDNOMBRE_ELIMINAR').val($datos[1]);
$('#IDEMAIL_ELIMINAR').val($datos[2]); 

$("#IDMODALELIMINAR").modal();

}


function fncShowModalUpd(BTN){

    $datos = BTN.value.split(","); 
    
    $('#IDUSUARIOID_MODIFICAR').val($datos[0]);
    $('#IDNOMBRE_MODIFICAR').val($datos[1]);
    $('#IDEMAIL_MODIFICAR').val($datos[2]); 
    
    $("#IDMODALUPDATE").modal();
    
    }


    function fncdelete(){

        var id = $('#IDUSUARIOID_ELIMINAR').val();
        var nombre = $('#IDNOMBRE_ELIMINAR').val();
        var email = $('#IDEMAIL_ELIMINAR').val(); 
        var route  = "/usuariosdel";
          
    
         $.ajax({
    
             type:'POST',
             url:route ,
             data:{USUARIOS_ID:id,USUARIOS_NOMBRE: nombre,USUARIOS_EMAIL: email},
             success:function(data){
    
              //    alert(data.success);
    
                MsgBox("INFORMACIÓN DEL SISTEMA","USUARIO ELIMINADO",1)
    
                  $('#IDUSUARIOID_ELIMINAR').val("");
                  $('#IDNOMBRE_ELIMINAR').val("");
                  $('#IDEMAIL_ELIMINAR').val("");
                  $('#IDMODALELIMINAR').modal('hide')
    
               listar();
    
             },
             error: function (jqXHR, exception) {
                 var msg = '';
                 if (jqXHR.status === 0) {
                     msg = 'Not connect.\n Verify Network.';
                 } else if (jqXHR.status == 404) {
                     msg = 'Requested page not found. [404]';
                 } else if (jqXHR.status == 500) {
                     msg = 'Internal Server Error [500].';
                 } else if (exception === 'parsererror') {
                     msg = 'Requested JSON parse failed.';
                 } else if (exception === 'timeout') {
                     msg = 'Time out error.';
                 } else if (exception === 'abort') {
                     msg = 'Ajax request aborted.';
                 } else {
                     msg = 'Uncaught Error.\n' + jqXHR.responseText;
                 }
    
                 alert(msg); 
             }
    
          });
    
     
        
        }
    

function fncupdate(){

    var id = $('#IDUSUARIOID_MODIFICAR').val();
    var nombre = $('#IDNOMBRE_MODIFICAR').val();
    var email = $('#IDEMAIL_MODIFICAR').val();
    var password = $('#IDPASSWORD_MODIFICAR').val();
    var route  = "/usuariosupd";
      

     $.ajax({

         type:'POST',
         url:route ,
         data:{USUARIOS_ID:id,USUARIOS_NOMBRE: nombre,USUARIOS_EMAIL: email,USUARIOS_PASSWORD: password},
         success:function(data){

          //    alert(data.success);

            MsgBox("INFORMACIÓN DEL SISTEMA","USUARIO ACTUALIZADO CORRECTAMENTE",1)

              $('#IDUSUARIOID_MODIFICAR').val("");
              $('#IDNOMBRE_MODIFICAR').val("");
              $('#IDEMAIL_MODIFICAR').val("");
              $('#IDPASSWORD_MODIFICAR').val("");
              $('#IDMODALUPDATE').modal('hide')

           listar();

         },
         error: function (jqXHR, exception) {
             var msg = '';
             if (jqXHR.status === 0) {
                 msg = 'Not connect.\n Verify Network.';
             } else if (jqXHR.status == 404) {
                 msg = 'Requested page not found. [404]';
             } else if (jqXHR.status == 500) {
                 msg = 'Internal Server Error [500].';
             } else if (exception === 'parsererror') {
                 msg = 'Requested JSON parse failed.';
             } else if (exception === 'timeout') {
                 msg = 'Time out error.';
             } else if (exception === 'abort') {
                 msg = 'Ajax request aborted.';
             } else {
                 msg = 'Uncaught Error.\n' + jqXHR.responseText;
             }

             alert(msg); 
         }

      });

 
    
    }


    function listar(){

        $('#IDTBUSUARIOS').empty();

        //MOSTRAR DATOS
        var Tabladatos = $('#IDTBUSUARIOS');
        var routelistar = "/usuarioslist";

        $.get(routelistar,function (res){

            $(res).each(function(key,value){

                Tabladatos.append(

                    "<tr>" +

                    "<td>" + value.USUARIOS_ID + "</td>"  +
                    "<td>" + value.USUARIOS_NOMBRE + "</td>"  +
                    "<td>" + value.USUARIOS_EMAIL + "</td>"  +
                    "<td>" + "<button type='button' class='btn btn-primary btn-sm' value='"+ value.USUARIOS_ID + "," + value.USUARIOS_NOMBRE + "," + value.USUARIOS_EMAIL + "' onclick= 'fncShowModalUpd(this);'>Modificar</button>" + "</td>"  + 
                    "<td>" + "<button type='button' class='btn btn btn-danger btn-sm' value='"+ value.USUARIOS_ID + "," + value.USUARIOS_NOMBRE + "," + value.USUARIOS_EMAIL + "' onclick= 'fncShowModalDel(this);'>Eliminar</button>" + "</td>"  + 
                    
                     
                    "</tr>"  

                    );

            });

        });


    }

    

    $(document).ready(function(){


        //AÑADIR CLASE ACTIVE AL MENU
        $('#IDULGENERAL a').removeClass('active');
        $('#IDUSUARIOS').addClass('active');

        //LISTAR
        listar();
  
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
             }
        }); 

      //INGRESO DE DATOS
      $('#IDBTNINGRESAR').click(function(){

        var nombre = $('#IDNOMBRE').val();
        var email = $('#IDEMAIL').val();
        var password = $('#IDPASSWORD').val();
        var token = $('#token').val();
        var routeingresar = "/usuariosadd";
          

         $.ajax({

             type:'POST',
             url:routeingresar,
             data:{USUARIOS_NOMBRE: nombre,USUARIOS_EMAIL: email,USUARIOS_PASSWORD: password},
             success:function(data){

            //    alert(data.success);

                MsgBox("INFORMACIÓN DEL SISTEMA","USUARIO INGRESADO CORRECTAMENTE",1)

                var nombre = $('#IDNOMBRE').val("");
                var email = $('#IDEMAIL').val("");
                var password = $('#IDPASSWORD').val("");


  
             },
             error: function (jqXHR, exception) {
                 var msg = '';
                 if (jqXHR.status === 0) {
                     msg = 'Not connect.\n Verify Network.';
                 } else if (jqXHR.status == 404) {
                     msg = 'Requested page not found. [404]';
                 } else if (jqXHR.status == 500) {
                     msg = 'Internal Server Error [500].';
                 } else if (exception === 'parsererror') {
                     msg = 'Requested JSON parse failed.';
                 } else if (exception === 'timeout') {
                     msg = 'Time out error.';
                 } else if (exception === 'abort') {
                     msg = 'Ajax request aborted.';
                 } else {
                     msg = 'Uncaught Error.\n' + jqXHR.responseText;
                 }

                 MsgBox("INFORMACIÓN DEL SISTEMA",msg,2)
             }
  
          });


     });



    });
       

    function FNC_SHOW01(s,e){

        //LISTAR
        listar();

        $("#ID_ADD").hide(500);
        $("#ID_LIST").show(500); 

    
    }
    
    function FNC_SHOW02(s,e){
        

        
        $("#ID_ADD").show(500);
        $("#ID_LIST").hide(500); 
        
    }
    
    function FNC_CONFIRM(){
    
    
    alert("PRESUNTO POP UP BOOTSTRAP");
    
    
    }


</script>


@stop

@section('Content')


<div >

    <div class ="mb-1">

        <div class ="container">

            <div class="row">

                <div class="col-12">

                    <div class="d-flex  justify-content-center    justify-content-cente mx-auto float-sm-right ">

                        <input type="image" src="./img/check-mark.png" width="32" height="32" onclick="FNC_SHOW01(); return false;"  />
                        <input type="image" src="./img/add.png" width="32" height="32" onclick="FNC_SHOW02(); return false;"  />
                       
                    </div>

                </div>

            </div>

        </div>

    </div>

<!-- SECCIÓN LIST -->
    <div id="ID_LIST">

    <div class="container">

        <div class="row">

            <div class="col-12">

                    <table id="IDTABLEUSUARIOS" class="table">
                            <thead>
                              <tr>
                                <th scope="col">N°</th>
                                <th scope="col">NOMBRE</th>
                                <th scope="col">EMAIL</th>
                                <th scope="col">ACCIÓN</th>
                              </tr>
                            </thead>

                            <tbody id="IDTBUSUARIOS">

                            </tbody>

                          </table>

            </div>

        </div>

    </div>

</div>

</div>

<!-- SECCIÓN DE INSERT -->
<div id="ID_ADD" style="display:none;">

        <div class="container-fluid">
    
            <div  class="row">
    
                <div class="col-12">
    
                    <div class="mb-4 font-weight-bold text-uppercase">Ingresar nuevo Usuario </div>
 
                    <form id="IDFORMULARIO_INSERT">

                            <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="IDNOMBRE" placeholder="Nombre">
                                    </div>
                                  </div>

                            <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                              <div class="col-sm-10">
                                <input type="email" class="form-control" id="IDEMAIL" placeholder="Email">
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="IDPASSWORD" placeholder="Password">
                              </div>
                            </div>


                            <div class="form-group row">
                              <div class="col-sm-10">

                               {!! link_to('#', $title = 'Ingresar', $attributes = ['id'=>'IDBTNINGRESAR','class'=>'btn btn-primary'], $secure = null); !!}
                               <input type="hidden" name="_token" id="token" value="{{csrf_token()}}"/>


                              </div>
                            </div>



                          </form>
    
                </div>
    
            </div>
    
        </div>
    
    </div>
    
    </div>

<!-- MODAL DE UPDATE -->
<div class="modal fade" id="IDMODALUPDATE" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modificar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body"> 

        <div class="container">
    
            <div  class="row">
    
                <div class="col-12">
     
 
                    <form id="IDFORMULARIO_UPDATE">

                            <input type="hidden" class="form-control" id="IDUSUARIOID_MODIFICAR" placeholder="ID">
                        

                            <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
                                    <div class="col-sm-10">
                                      <input type="text" class="form-control" id="IDNOMBRE_MODIFICAR" placeholder="Nombre">
                                    </div>
                                  </div>

                            <div class="form-group row">
                              <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                              <div class="col-sm-10">
                                <input type="email" class="form-control" id="IDEMAIL_MODIFICAR" placeholder="Email">
                              </div>
                            </div>

                            <div class="form-group row">
                              <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" id="IDPASSWORD_MODIFICAR" placeholder="Password">
                              </div>
                            </div>
  
                          </form>
    
                </div>
    
            </div>
    
        </div>
    
    </div>
    
    
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

        {!! link_to('#', $title = 'ACTUALIZAR', $attributes = ['id'=>'IDBTNACTUALIZAR','class'=>'btn btn-primary' , 'onclick'=>'fncupdate();'], $secure = null); !!}
         
      </div>
      
    </div>
  </div>
</div>
 

<!-- MODAL DE ELIMINAR -->

<div class="modal fade" id="IDMODALELIMINAR" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Eliminar Usuario</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body"> 
  
          <div class="container">
      
              <div  class="row">
      
                  <div class="col-12">
       
   
                      <form id="IDFORMULARIO_ELIMINAR">
  
                              <input type="hidden" class="form-control" id="IDUSUARIOID_ELIMINAR" placeholder="ID">
                          
  
                              <div class="form-group row">
                                      <label for="inputEmail3" class="col-sm-2 col-form-label">Nombre</label>
                                      <div class="col-sm-10">
                                        <input type="text" class="form-control" id="IDNOMBRE_ELIMINAR" placeholder="Nombre" readonly>
                                      </div>
                                    </div>
  
                              <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                  <input type="email" class="form-control" id="IDEMAIL_ELIMINAR" placeholder="Email" readonly>
                                </div>
                              </div>
 
    
                            </form>
      
                  </div>
      
              </div>
      
          </div>
      
      </div>
      
      
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
  
          {!! link_to('#', $title = 'ELIMINAR', $attributes = ['id'=>'IDBTNELIMINAR','class'=>'btn btn-primary' , 'onclick'=>'fncdelete();'], $secure = null); !!}
           
        </div>
        
      </div>
    </div>
  </div>
   
 

@stop
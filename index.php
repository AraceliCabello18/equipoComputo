<?php 
  session_start();
  unset($_SESSION['consulta']);
 ?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<title>Equipos de Computo</title>
	<link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
	<link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
  <link rel="stylesheet" type="text/css" href="librerias/select2/css/select2.css">

	<script src="librerias/jquery-3.2.1.min.js"></script>
  <script src="js/funciones.js"></script>
	<script src="librerias/bootstrap/js/bootstrap.js"></script>
	<script src="librerias/alertifyjs/alertify.js"></script>
  <script src="librerias/select2/js/select2.js"></script>
</head>
<body>
	<div class="container">
    <div id="buscador"></div>
		<div id="tabla"></div>
	</div>
	<!-- Modal para registros nuevos -->
<div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar Datos</h4>
      </div>
      <div class="modal-body">
        	<label>Nombre del Equipo</label>
        	<input type="text" name="" id="nombredelequipo" class="form-control input-sm">
        	<label>Modelo</label>
        	<input type="text" name="" id="modelo" class="form-control input-sm">
        	<label>Serie</label>
        	<input type="text" name="" id="serie" class="form-control input-sm">
            <label>Imagen </label>
            <input type="file" REQUIRED name="imagen" id="imagen" class="form-control input-sm">
        	<label>Nombre</label>
        	<input type="text" name="" id="nombre" class="form-control input-sm">
          <label>Apellido</label>
        	<input type="text" name="" id="apellido" class="form-control input-sm">
          <label>Email</label>
        	<input type="text" name="" id="email" class="form-control input-sm">
          <label>telefono</label>
        	<input type="text" name="" id="telefono" class="form-control input-sm">
          <label>Fecha</label>
        	<input type="text" name="" id="fecha" class="form-control input-sm">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-dismiss="modal" id="guardarnuevo">
        Agregar
        </button>
      </div>
    </div>
  </div>
</div> 
<!-- Modal para edicion de datos -->
<div class="modal fade" id="modalEdicion" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Actualizar datos</h4>
      </div>
      <div class="modal-body">
      		<input type="text" hidden="" id="idpersona" name="">
        	<label>Nombre del Equipo </label>
        	<input type="text" name="" id="nombredelequipoU" class="form-control input-sm">
        	<label>Modelo</label>
        	<input type="text" name="" id="modeloU" class="form-control input-sm">
        	<label>Serie</label>
        	<input type="text" name="" id="serieU" class="form-control input-sm">
          <label>Imagen </label>
        	<input type="file" REQUIRED id="imagenU" class="form-control input-sm">
        	<label>Nombre</label>
        	<input type="text" name="" id="nombreU" class="form-control input-sm">
          <label>Apellido</label>
        	<input type="text" name="" id="apellidoU" class="form-control input-sm">
          <label>Email</label>
        	<input type="text" name="" id="emailU" class="form-control input-sm">
          <label>telefono</label>
        	<input type="text" name="" id="telefonoU" class="form-control input-sm">
          <label>Fecha</label>
        	<input type="text" name="" id="fechaU" class="form-control input-sm">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-warning" id="actualizadatos" data-dismiss="modal">Actualizar</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>
<script type="text/javascript">
	$(document).ready(function(){
		$('#tabla').load('componentes/tabla.php');
    $('#buscador').load('componentes/buscador.php');
	});
</script>

<script type="text/javascript">
    $(document).ready(function(){

      
        $('#guardarnuevo').click(function(){
          nombredelequipo=$('#nombredelequipo').val();
          modelo=$('#modelo').val();
          serie=$('#serie').val();
          imagen=$('#imagen').val();
          nombre=$('#nombre').val();
          apellido=$('#apellido').val();
          email=$('#email').val();
          telefono=$('#telefono').val();
          fecha=$('#fecha').val();
      
          agregardatos(nombredelequipo, modelo, serie, imagen, nombre, apellido, email, telefono, fecha);

        });

*/

        $('#actualizadatos').click(function(){
          actualizaDatos();
        });

    });

    //ingreso imagen blob
  	$('#guardarnuevo').click(function(){
      var form_data = new FormData();
      form_data.append('nombredelequipo', $('#nombredelequipo').val());
      form_data.append('modelo', $('#modelo').val());
      form_data.append('serie', $('#serie').val());
      form_data.append('nombre', $('#nombre').val());
      form_data.append('apellido', $('#apellido').val());
      form_data.append('email', $('#email').val());
      form_data.append('telefono', $('#telefono').val());
      form_data.append("imagen", document.getElementById('imagen').files[0]);
      console.log(form_data);
      //document.getElementById('imagen').files[0])      
      $.ajax({
        url: "php/agregarDatos.php",
        method: "POST",
        data: form_data,
        contentType: false,
        processData: false,
		    success:function(data) {
          console.log(data);
          if(data==1){
            $('#tabla').load('componentes/tabla.php');
            $('#buscador').load('componentes/buscador.php');
            alertify.success("agregado con exito :)");
          }else{
            alertify.error("Fallo el servidor :(");
          }
        }
      });

    });
</script>
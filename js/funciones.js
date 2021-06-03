
function agregardatos(nombredelequipo,modelo,serie,imagen,nombre,apellido,email,telefono,fecha){
	cadena="nombredelequipo=" + nombredelequipo + 
	"&modelo=" + modelo + 
	"&serie=" + serie + 
	"&imagen=" + document.getElementById('imagen').files[0] + 
	"&nombre=" + nombre + 
	"&apellido=" + apellido +
	"&email=" + email +
	"&telefono=" + telefono +
	"&fecha=" + fecha;
	$.ajax({
		type:"POST",
		url:"php/agregarDatos.php",
		data: cadena,
		contentType: false,
                processData: false,
		success:function(r){
			if(r==1){
				$('#tabla').load('componentes/tabla.php');
				 $('#buscador').load('componentes/buscador.php');
				alertify.success("agregado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});

}

function agregaform(datos){

	d=datos.split('||');

	$('#idpersona').val(d[0]);
	$('#nombredelequipoU').val(d[1]);
	$('#modeloU').val(d[2]);
	$('#serieU').val(d[3]);
	$('#imagenU').val(d[4]);
	$('#nombreU').val(d[5]);
	$('#apellidoU').val(d[6]);
	$('#emailU').val(d[7]);
	$('#telefonoU').val(d[8]);
	$('#fechaU').val(d[9]);
}

function actualizaDatos(){

	id=$('#idpersona').val();
	nombre=$('#nombredelequipoU').val();
	nombre=$('#modeloU').val();
	nombre=$('#serieU').val();
	nombre=$('#imagenU').val();
	nombre=$('#nombreU').val();
	apellido=$('#apellidoU').val();
	email=$('#emailU').val();
	telefono=$('#telefonoU').val();
	fecha=$('#fechaU').val();
	cadena= "id=" + id +
	        "&nombredelequipo=" + nombredelequipo + 
	        "&modelo=" + modelo + 
	        "&serie=" + serie + 
	        "&imagen=" + imagen + 
			"&nombre=" + nombre + 
			"&apellido=" + apellido +
			"&email=" + email +
			"&telefono=" + telefono +
			"&fecha=" + fecha;

	$.ajax({
		type:"POST",
		url:"php/actualizaDatos.php",
		data:cadena,
		success:function(r){
			
			if(r==1){
				$('#tabla').load('componentes/tabla.php');
				alertify.success("Actualizado con exito :)");
			}else{
				alertify.error("Fallo el servidor :(");
			}
		}
	});

}

function preguntarSiNo(id){
	alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?', 
					function(){ eliminarDatos(id) }
                , function(){ alertify.error('Se cancelo')});
}

function eliminarDatos(id){

	cadena="id=" + id;

		$.ajax({
			type:"POST",
			url:"php/eliminarDatos.php",
			data:cadena,
			success:function(r){
				if(r==1){
					$('#tabla').load('componentes/tabla.php');
					alertify.success("Eliminado con exito!");
				}else{
					alertify.error("Fallo el servidor :(");
				}
			}
		});
}
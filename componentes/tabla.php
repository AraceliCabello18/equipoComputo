
<?php  session_start();
	require_once "../php/conexion.php";
	$conexion=conexion();  ?>
<div class="row">
	<div class="col-sm-12">
	<h2>Tabla dinamica facultad autodidacta</h2>
		<table class="table table-hover table-condensed table-bordered">
		<caption>
			<button class="btn btn-primary" data-toggle="modal" data-target="#modalNuevo">
				Agregar nuevo 
				<span class="glyphicon glyphicon-plus"></span>
			</button>
		</caption>
			<tr>
			    <td>Nombre del Equipo</td>
				<td>Modelo</td>
				<td>Serie</td>
				<td>Imagen</td>
				<td>Nombre</td>
				<td>Apellido</td>
				<td>Email</td>
				<td>Telefono</td>
				<td>Fecha</td>
				<td>Editar</td>
				<td>Eliminar</td>
			</tr>
			<?php 
				if(isset($_SESSION['consulta'])){
					if($_SESSION['consulta'] > 0){
						$idp=$_SESSION['consulta'];
						$sql="SELECT id, nombredelequipo, odelo, serie, imagen, nombre, apellido, email, telefono, fecha 
						from t_equipos where id='$idp'";
					}else{
						$sql="SELECT id, nombredelequipo, modelo, serie, imagen, nombre, apellido, email, telefono, fecha
						from t_equipos";
					}
				}else{
					$sql="SELECT id, nombredelequipo, modelo, serie, imagen, nombre, apellido, email, telefono, fecha
						from t_equipos";
				}

				$result=mysqli_query($conexion,$sql);
				while($ver=mysqli_fetch_row($result)){ 

					$datos=$ver[0]."||".
						   $ver[1]."||".
						   $ver[2]."||".
						   $ver[3]."||".
						   $ver[4]."||".
						   $ver[5]."||".
						   $ver[6]."||".
						   $ver[7]."||".
						   $ver[8]."||".
						   $ver[9];
			 ?>

			<tr>
				<td><?php echo $ver[1] ?></td>
				<td><?php echo $ver[2] ?></td>
				<td><?php echo $ver[3] ?></td>
				<td>
				<img class="d-block w-100" src="data:image/jpg;base64,<?php echo base64_encode($ver[4]); ?>"
                 alt="First slide" style="height: 200px; width: 150px">
				</td>
				<td><?php echo $ver[5] ?></td>
				<td><?php echo $ver[6] ?></td>
				<td><?php echo $ver[7] ?></td>
				<td><?php echo $ver[8] ?></td>
				<td><?php echo $ver[9] ?></td>
				<td>
					<button class="btn btn-warning glyphicon glyphicon-pencil" 
					data-toggle="modal" 
					data-target="#modalEdicion" 
					onclick="agregaform('<?php echo $datos ?>')">	
					</button>
				</td>
				<td>
					<button class="btn btn-danger glyphicon glyphicon-remove" 
					onclick="preguntarSiNo('<?php echo $ver[0] ?>')">
						
					</button>
				</td>
			</tr>
			<?php 
				}
			 ?>
		</table>
	</div>
</div>
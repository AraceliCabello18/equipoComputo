<?php 
	require_once "../php/conexion.php";
	$conexion=conexion();

	$sql="SELECT id, nombredelequipo, modelo, serie, imagen,nombre, apellido, email, telefono, fecha 
						from t_equipos";
				$result=mysqli_query($conexion,$sql);  ?>
<br><br>
<div class="row">
	<div class="col-sm-8"></div>
	<div class="col-sm-4">
		<label>Buscador</label>
		<select id="buscadorvivo" class="form-control input-sm">
			<option value="0">Seleciona uno</option>
			<?php
				while($ver=mysqli_fetch_row($result)): 
			 ?>
				<option value="<?php echo $ver[0] ?>">
					<?php echo $ver[1]." ".$ver[2] ?>
					<?php echo $ver[3]." ".$ver[4] ?>
					<?php echo $ver[5]." ".$ver[6] ?>
					<?php echo $ver[7]." ".$ver[8] ?>
					<?php echo $ver[9] ?>
				</option>
			<?php endwhile; ?>
		</select>
	</div>
</div>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#buscadorvivo').select2();

			$('#buscadorvivo').change(function(){
				$.ajax({
					type:"post",
					data:'valor=' + $('#buscadorvivo').val(),
					url:'php/crearsession.php',
					success:function(r){
						$('#tabla').load('componentes/tabla.php');
					}
				});
			});
		});
	</script>
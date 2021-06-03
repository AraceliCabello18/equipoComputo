<?php 
	require_once "conexion.php";
	$conexion=conexion();
	$id=$_POST['id'];
	$ne=$_POST['nombredelequipo'];
	$m=$_POST['modelo'];
	$s=$_POST['serie'];
	$i=$_POST['imagen'];
	$n=$_POST['nombre'];
	$a=$_POST['apellido'];
	$e=$_POST['email'];
	$t=$_POST['telefono'];
	$f=$_POST['fecha'];
	$sql="UPDATE t_equipos set nombredelequipo='$ne',
	                            modelo='$m',
								serie='$s',
								imagen='$i',
								nombre='$n',
								apellido='$a',
								email='$e',
								telefono='$t'
								fecha='$f'
				where id='$id'";
	echo $result=mysqli_query($conexion,$sql);

 ?>
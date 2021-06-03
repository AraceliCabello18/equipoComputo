<?php 

	require_once "conexion.php";
	$conexion=conexion();
	$ne=$_POST['nombredelequipo'];
	$m=$_POST['modelo'];
	$s=$_POST['serie'];
	$imgData=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
	echo $imgData;
	$imgData=addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
	
	addslashes(file_get_contents($_FILES['imagen']['tmp_name'])	
	$table=new TablaDatos();
	$imgData="";
	if(is_uploaded_file($_FILES['fileImage']['tmp_name'])) {
		$imgData =addslashes(file_get_contents($_FILES['fileImage']['tmp_name']));	
	}	
	$n=$_POST['nombre'];
	$a=$_POST['apellido'];
	$e=$_POST['email'];
	$t=$_POST['telefono'];
	

	$sql="INSERT into t_equipos (nombredelequipo, modelo, serie, imagen, nombre, apellido, email, telefono)
								values ('$ne','$m','$s','$imgData','$n','$a','$e','$t')";
	echo $result=mysqli_query($conexion,$sql);
	//echo 1;
 ?>
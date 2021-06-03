<?php

   session_start();
   require_once "../php/conexion.php";
   $conexion=conexion();
   $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));

    
    $sql="INSERT into t_equipos (imagen) values ('$imagen')";
    
    $result=mysqli_query($conexion,$sql);


    if($result){
        echo "Si se inserto";
        //header("Location: mostrar.php");
    }else{
        echo "No se inserto";
    }

?>
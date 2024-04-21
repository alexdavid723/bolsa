<?php

    include("../includes/conectar.php");

    $conexion = conectar();



    //Recibimos datos del formulario
    $razonsocial = $_POST['txt_razonsocial'];
    $ruc = $_POST['txt_ruc'];
    $direccion = $_POST['txt_direccion'];
    $telefono = $_POST['txt_telefono'];
    $correo = $_POST['txt_correo'];


    $sql = "INSERT INTO empresa (razon_social,ruc,direccion,telefono,correo) VALUES('$razonsocial',' $ruc','$direccion','$telefono','$correo') ";

    mysqli_query($conexion,$sql) or die("Error al guardar.");
    
    header("location: listar_empresas.php");

?>
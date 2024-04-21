<?php
include ("../includes/conectar.php");

$conexion = conectar();
session_start();
//recibimos los datos de user y password
$usuario = $_POST['txt_usuario'];
$password = $_POST['txt_password'];

//echo "usuario: ".$usuario;
//echo "pass: ".$password;

$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND contrasenia ='$password'";
$resultado = mysqli_query($conexion, $sql);

$numero_resultados = mysqli_affected_rows($conexion);
//echo "Se ha encontrado ".$numero_resultados." filas";
if ($numero_resultados == 1) {
    

    $fila = mysqli_fetch_assoc($resultado);

    $_SESSION["SESION_ROL"] = $fila['id_rol'];

    $_SESSION["SESION_NOMBRES"] = $fila['nombre'];
    $_SESSION["SESION_APELLIDOS"] = $fila['apellidos'];

    //echo $_SESSION["SESION_NOMBRES"];
    //echo $_SESSION["SESION_APELLIDOS"];
    

    header("Location:../index.php");

    //echo"BIENVENIDO";
} else {
    header("Location:form_login.php?error_login=error");
}


?>
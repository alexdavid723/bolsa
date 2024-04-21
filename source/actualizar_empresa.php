<?php
include ("../includes/conectar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se recibió un ID válido
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];

        // Recuperar los datos del formulario
        $razonsocial = $_POST['txt_razonsocial'];
        $ruc = $_POST['txt_ruc'];
        $direccion = $_POST['txt_direccion'];
        $telefono = $_POST['txt_telefono'];
        $correo = $_POST['txt_correo'];

        // Actualizar los datos del usuario en la base de datos
        $conexion = conectar();
        $id = mysqli_real_escape_string($conexion, $id); // Evita inyección SQL
        $razonsocial = mysqli_real_escape_string($conexion, $razonsocial);
        $ruc = mysqli_real_escape_string($conexion, $ruc);
        $direccion = mysqli_real_escape_string($conexion, $direccion);
        $telefono = mysqli_real_escape_string($conexion, $telefono);
        $correo = mysqli_real_escape_string($conexion, $correo);

        $sql = "UPDATE empresa SET razon_social='$razonsocial', ruc='$ruc', direccion='$direccion', telefono='$telefono', correo='$correo' WHERE id=$id";

        if (mysqli_query($conexion, $sql)) {
            echo "Empresa actualizado correctamente.";
        } else {
            echo "Error al actualizar Empresa: " . mysqli_error($conexion);
        }

        // Cerrar la conexión
        mysqli_close($conexion);
    } else {
        echo "ID de Empresa no válido.";
    }
} else {
    echo "Solicitud no válida.";
}

header("location: listar_empresas.php");
?>
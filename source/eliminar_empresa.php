<?php
include("../includes/conectar.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar el usuario de la base de datos
    $conexion = conectar();
    $id = mysqli_real_escape_string($conexion, $id); // Evita inyección SQL
    $sql = "DELETE FROM empresa WHERE id = $id";
    $resultado = mysqli_query($conexion, $sql);

    if ($resultado) {
        echo "emrpesa eliminada correctamente.";
    } else {
        echo "Error al eliminar empresa.";
    }
} else {
    echo "ID de empresa no especificado.";
    exit();
}
header("location: listar_empresas.php");
?>

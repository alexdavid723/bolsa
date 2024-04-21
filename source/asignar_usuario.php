<?php
include ("../includes/conectar.php");
$conexion = conectar();
if (isset($_POST['id_empresa']) && isset($_POST['id_usuario'])) {
    // Obtener los datos enviados por POST
    $id_empresa = $_POST['id_empresa'];
    $id_usuario = $_POST['id_usuario'];

    // Realizar la lógica para asignar el usuario a la empresa en la base de datos
    // Asegúrate de tener una conexión a la base de datos establecida previamente

    // Aquí debes ejecutar una consulta SQL para actualizar el campo 'id_usuario' en la tabla 'empresa'
    // Puedes hacerlo de esta manera, asumiendo que tienes una conexión a la base de datos llamada $conexion
    $sql_actualizar = "UPDATE empresa SET id_usuario = $id_usuario WHERE id = $id_empresa";

    if (mysqli_query($conexion, $sql_actualizar)) {
        // Si la consulta se ejecutó con éxito, devolver una respuesta exitosa
        echo "La asignación se realizó correctamente.";
    } else {
        // Si hubo un error en la consulta, devolver un mensaje de error
        echo "Error al realizar la asignación: " . mysqli_error($conexion);
    }
} else {
    // Si no se recibieron los datos esperados, devolver un mensaje de error
    echo "Error: Datos insuficientes para realizar la asignación.";
}
?>

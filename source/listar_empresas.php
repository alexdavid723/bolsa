<?php
include("../includes/head.php");
include("../includes/conectar.php");
$conexion = conectar();
?>

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Inicio Zona  central del sistema  -->
    <h1>Lista de las Empresas</h1>
    <!-- Button trigger modal -->


    <?php

    $sql = "SELECT * FROM empresa";
    $registros = mysqli_query($conexion, $sql);

    echo "<table class='table table-striped table-hover'>";

    echo "<th>Razón Social</th>";
    echo "<th>RUC</th>";
    echo "<th>Dirección</th>";
    echo "<th>Teléfono</th>";
    echo "<th>Correo</th>";
    echo "<th>Acciones</th>";

    while ($fila = mysqli_fetch_array($registros)) {
        echo "<tr>";
        echo "<td>" . $fila['razon_social'] . "</td>";
        echo "<td>" . $fila['ruc'] . "</td>";
        echo "<td>" . $fila['direccion'] . "</td>";
        echo "<td>" . $fila['telefono'] . "</td>";
        echo "<td>" . $fila['correo'] . "</td>";

        echo "<td>";
    ?>

        <button type="button" class="btn btn-warning" onclick="editarUsuario('<?php echo $fila['id']; ?>')"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325" />
            </svg> Editar</button>
        <button type="button" class="btn btn-danger" onclick="eliminarUsuario(<?php echo $fila['id']; ?>)"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
            </svg> Eliminar</button>
        <button type="button" class="btn btn-primary" onclick="f_mostrarusuarios(<?php echo $fila['id']; ?>, '<?php echo $fila['razon_social']; ?>')"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus" viewBox="0 0 16 16">
                <path d="M7.5 0a.5.5 0 0 1 .5.5V7h6.5a.5.5 0 0 1 0 1H8v6.5a.5.5 0 0 1-1 0V8H.5a.5.5 0 0 1 0-1H7V.5a.5.5 0 0 1 .5-.5z" />
            </svg> Asignar Usuario</button>



    <?php
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";

    ?>
    <div id="div_usuarios">
        <h1>Lista de Usuarioa</h1>
        <form id="form_asignar_usuario">
            <?php
            // Consulta SQL para seleccionar todos los usuarios
            $sql_todos_usuarios = "SELECT id, nombre, apellidos FROM usuarios";
            $result_todos_usuarios = mysqli_query($conexion, $sql_todos_usuarios);

            // Consulta SQL para obtener los IDs de los usuarios ya asignados a una empresa
            $sql_usuarios_asignados = "SELECT id_usuario FROM empresa";
            $result_usuarios_asignados = mysqli_query($conexion, $sql_usuarios_asignados);
            $usuarios_asignados = array();
            while ($fila = mysqli_fetch_array($result_usuarios_asignados)) {
                $usuarios_asignados[] = $fila['id_usuario'];
            }

            if ($result_todos_usuarios) {
                if (mysqli_num_rows($result_todos_usuarios) > 0) {
                    echo "<ul class='list-group'>";
                    while ($fila_usuario = mysqli_fetch_array($result_todos_usuarios)) {
                        echo "<li class='list-group-item'>";
                        if (in_array($fila_usuario['id'], $usuarios_asignados)) {
                            echo "<span class='float-right text-danger'>Ya asignado a otra empresa</span>";
                        }
                        echo "<input type='radio' name='usuario_seleccionado' value='" . $fila_usuario['id'] . "'";
                        // Si el usuario está asignado, deshabilita el radio button
                        if (in_array($fila_usuario['id'], $usuarios_asignados)) {
                            echo " disabled";
                        }
                        echo ">";
                        echo $fila_usuario['nombre'] . " " . $fila_usuario['apellidos'];
                        echo "</li>";
                    }
                    echo "</ul>";
                    echo "<button type='button' class='btn btn-primary' onclick='asignarUsuario()'>Asignar</button>";
                } else {
                    echo "No hay usuarios disponibles para asignar.";
                }
            } else {
                echo "Error al realizar la consulta SQL: " . mysqli_error($conexion);
            }
            ?>
        </form>
    </div>








    <!-- Fin Zona  central del sistema  -->


</div>

<!-- /.container-fluid -->
<?php
include("../includes/foot.php");
?>

<script>
    var ID_EMPRESA; //VARIABLE GLOBAL
    $(document).ready(function() { //inicio jquery
        $(div_usuarios).dialog({
            width: 600,
            height: 400,
        });
        $("#div_usuarios").dialog("close");
    }); //fin jquery
    function editarUsuario(id) {
        location.href = "editar_empresa.php?id=" + id;
    }

    function eliminarUsuario(id) {
        if (confirm('¿Estás seguro de que quieres eliminar esta empresa?')) {
            window.location.href = "eliminar_empresa.php?id=" + id;
        }
    }

    function f_mostrarusuarios(idEmpresa, razonSocial) {
        ID_EMPRESA = idEmpresa;
        // Obtener el nombre de la empresa seleccionada
        var nombreEmpresa = $("td[data-id='" + idEmpresa + "']").first().text();
        // Actualizar el título del diálogo con el nombre de la empresa
        $("#div_usuarios").dialog("option", "title", "Asignar un usuario para la empresa " + razonSocial);
        $("#div_usuarios").dialog("open");
    }

    function asignarUsuario() {
        var idUsuarioSeleccionado = $('input[name="usuario_seleccionado"]:checked').val();
        if (!idUsuarioSeleccionado) {
            alert('Por favor, selecciona un usuario.');
            return;
        }
        // Realizar la asignación del usuario a la empresa mediante AJAX
        $.ajax({
            type: "POST",
            url: "asignar_usuario.php",
            data: {
                id_empresa: ID_EMPRESA,
                id_usuario: idUsuarioSeleccionado
            },
            success: function(response) {
                // Mostrar mensaje de éxito o recargar la página, etc.
                alert(response);
                // Recargar la página
                location.reload();
            },
            error: function(xhr, status, error) {
                // Manejar errores
                console.error(xhr.responseText);
            }
        });
    }
</script>
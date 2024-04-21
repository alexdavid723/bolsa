<?php
include("config.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Sistema de bolsa laboral</title>

    <!-- Custom fonts for this template-->
    <link href="<?php echo RUTAGENERAL; ?>themplates/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?php echo RUTAGENERAL; ?>css/sb-admin-2.min.css" rel="stylesheet">

    <link href="<?php echo RUTAGENERAL; ?>js/jquery-ui.structure.min.css" rel="stylesheet">
    <link href="<?php echo RUTAGENERAL; ?>js/jquery-ui.theme.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Inicio Sidebar - menu izquierdo -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <img src="<?php echo RUTAGENERAL; ?>themplates/img/portafolio.png" alt="" width="30px" style="margin-right: 5px;">
                </div>
                <div class="sidebar-brand-text mx-1">Bolsa Laboral</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Inicio -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo RUTAGENERAL; ?>index.php">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Inicio</span></a>
            </li>
            <!-- Nav Item - REGISTRAR A UN USUARIO -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo RUTAGENERAL; ?>source/registro_usuarios.php">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Registrar usuario</span></a>
            </li>
            <?php
            if (isset($_SESSION["SESION_ROL"]) && $_SESSION["SESION_ROL"] == '1') {
            ?>
                <!-- Nav Item - LISTAR USUARIOS -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo RUTAGENERAL; ?>source/registro_empresa.php">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Registrar Empresa</span></a>
                </li>
            <?php
            }
            ?>
            <?php
            if (isset($_SESSION["SESION_ROL"]) && $_SESSION["SESION_ROL"] == '1') {
            ?>
                <!-- Nav Item - LISTAR USUARIOS -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo RUTAGENERAL; ?>source/listar_usuarios.php">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Listar Usuarios</span></a>
                </li>
            <?php
            }
            ?>
            <?php
            if (isset($_SESSION["SESION_ROL"]) && $_SESSION["SESION_ROL"] == '1') {
            ?>
                <!-- Nav Item - LISTAR USUARIOS -->
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo RUTAGENERAL; ?>source/listar_empresas.php">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Listar Empresas</span></a>
                </li>
            <?php
            }
            ?>
            <!-- INICIAR SESION -->
            <?php
            if (!isset($_SESSION["SESION_NOMBRES"])) {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo RUTAGENERAL; ?>source/form_login.php">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Iniciar sesion</span></a>
                </li>
            <?php
            } else {
            ?>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo RUTAGENERAL; ?>source/logout.php">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Cerrar Sesión</span></a>
                </li>
            <?php
            }
            ?>

        </ul>
        <!-- Fin Sidebar - menu izquierdo -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand-lg navbar-light bg-light my-3">
                    <a class="navbar-brand" href="#"></a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <?php
                                if (isset($_SESSION['SESION_NOMBRES'])) {
                                    echo '<span class="navbar-text">';
                                    echo '<i class="fas fa-user"></i>'; // Cambia el icono a una personita
                                    echo "BIENVENIDO: " . $_SESSION['SESION_NOMBRES'] . " " . $_SESSION['SESION_APELLIDOS'];
                                    echo '</span>';
                                }
                                ?>
                            </li>
                        </ul>
                    </div>
                </nav>
                <!-- End of Topbar -->
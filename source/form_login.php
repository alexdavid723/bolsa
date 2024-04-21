<?php
include ("../includes/head.php");
?>

<!-- Begin Page Content -->
<div class="container-fluid">


    <!-- Inicio Zona  central del sistema  -->
    <h1>Acceder al Sistema</h1>
    <div class="row dflex flexwrap justify-content-center">
        <div class="col-6">
            <form class="p-3" method="POST" action="login.php">
                <div class="form-group">
                    <label>USUARIO</label>
                    <input name="txt_usuario" class="form-control" placeholder="Ingresar Usuario" required="required">

                </div>
                <div class="form-group">
                    <label>CONTRASEÑA</label>
                    <input name="txt_password" type="password" class="form-control" placeholder="Password">
                </div>
                <?php
                if (isset($_REQUEST['error_login'])) {
                ?>

                <div class="form-group">
                    <div class="alert alert-danger" role="alert">
                        Usuario y/o contraseña incorrecto(s)
                    </div>
                </div>
                <?php
                }
                ?>

                <button type="submit" class="btn btn-primary">Login</button>
            </form>
        </div>
    </div>



    <!-- Fin Zona  central del sistema  -->


</div>
<!-- /.container-fluid -->
<?php
include ("../includes/foot.php");
?>
<?php
include("../includes/head.php");
?>

<!-- Begin Page Content -->
<div class="container-fluid">



<!-- Begin Page Content -->
<div class="container-fluid">

<h1>Registro Una empresa </h1>
    <!-- Inicio Zona  central del sistema  -->

  <form method="POST" action="guardar_empresa.php">

  <div class="form-group row">
    <label for="validationCustom01" class="col-sm-2 col-form-label">Razón Social</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="txt_razonsocial" id="validationCustom03" required="required">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">RUC</label>
    <div class="col-sm-10">
      <input type="text" class="form-control"  name="txt_ruc"required="required">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Dirección</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="txt_direccion"required="required">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Teléfono</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="txt_telefono" required="required">
    </div>
  </div>

  <div class="form-group row">
    <label for="inputPassword3" class="col-sm-2 col-form-label">Correo</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="txt_correo" required="required">
    </div>
  </div>
  
  

  <div class="form-group row">
    <div class="col-sm-10">
      <button type="submit" class="btn btn-primary">Guardar Empresa</button>
    </div>
  </div>

</form>





    <!-- Fin Zona  central del sistema  -->


</div>
<!-- /.container-fluid -->
<?php
include("../includes/foot.php");
?>
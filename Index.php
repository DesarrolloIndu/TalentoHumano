<!-- JESU JUVA-->

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Talento Humano</title>
<?php
require('Paginas/estructura/Head.php');
?>
 
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <!-- <form action="Php/Validar.php" method="post" id="Envio"> --> 
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="" class="h1"><b>Talento</b> Humano</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg"> Ingrese sus datos para iniciar sesión</p>

      <form action="Php/Validar.php" method="post" id="Envio">
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="login_username" name="login_username" placeholder="Usuario" onkeypress="" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>  
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control"  id="login_password" name="login_password" placeholder="Contraseña" onkeypress="" >
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
            
          </div>
        </div>
     <!--    <div id="resultado"></div> -->
     
          <!-- /.col -->
            <button type="submit" id ="btn-ingresar" name="login" class="btn btn-primary btn-block">Ingresar</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

<script> 

 </script>
   <!-- 
       -->

      
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
</body>
</html>
<!--
SOLI DEO GLORIA
Joyber
2022
-->



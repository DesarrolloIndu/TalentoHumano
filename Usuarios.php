<?php
require('Php/Seguridad.php');
require('Php/Conexion.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Talento Humano</title>
  <!-- <script src="Js/Usuarios/Usuarios.js"></script> -->
  <?php
  require('Paginas/estructura/Head.php');
  ?>
  <script src="js/Usuarios/Usuarios.js"></script>

</head>

<body onload="Vertabla();" class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">
    <?php
    include('Paginas/Estructura/Nav.php');
    ?>

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->

    <?php
    include('Paginas/Estructura/aside.php');
    ?>

    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Gestión de Perfiles de Usuario </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="Dashboard.Php">Inicio</a></li>
                <li class="breadcrumb-item active">Perfiles de Usuario</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- Main content -->
      <section class="content">
        <div id="tabla"></div>

        <!-- Modal para registros nuevos -->
        <!-- <a class="btn btn-primary btn-lg" href='javascript:;' id="Enviar" onclick="">Prueba envio </a> -->



        <!------------------------------------------------------------------------------------------------------------------------- -->

        <div class="modal fade" id="modalNuevo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" enctype="multipart/form-data" action="php/Agregar_Usuarios.php" method="post">
          <div class="modal-dialog modal-lg">

            <div class="modal-content">
              <div class="modal-header bg-info">
                <h4 class="modal-title">Guardar usuarios</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-4">
                    <form method="POST" id="Nuevo_Usuario" action="">

                      <div class="">
                        <label>identificacion</label>
                        <input type="text" name="" id="txt_id" autocomplete="off" autofocus class="form-control input-sm" value="" maxlength="10" onKeypress="if (event.keyCode < 45 || event.keyCode > 57) event.returnValue = false;" placeholder="Cedula o Nit">

                      </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="txtRuta">Nombre</label>
                      <input type="text" name="" id="txt_name" autocomplete="off" class="form-control input-sm" placeholder="Nombres y Apellidos">
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="txtRuta">Email</label>
                      <input type="text" name="" id="txt_ema" autocomplete="off" class="form-control input-sm" placeholder="Correo electronico">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="txtRuta">Gestión</label>
                      <input type="text" name="" id="txt_gestion" autocomplete="off" class="form-control input-sm" onkeypress="return checkink(event)" placeholder="Gestión">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="txtRuta">Cargo</label>
                      <input type="text" name="" id="txt_Cargo" autocomplete="off" class="form-control input-sm" placeholder="Cargo">
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="">
                      <label for="txtRuta">Usuario</label>
                      <input type="text" name="" id="txt_User" autocomplete="off" class="form-control input-sm" placeholder="Nombre del Perfil de Usuario">
                    </div>

                  </div>
                  <div class="col-sm-4">
                    <div class="">
                      <label>Contraseña</label>
                      <input type="password" name="pw" onchange="Validar_Pw()" id="txt_pass" autocomplete="off" class="form-control input-sm" placeholder="Escriba Una Contraseña">
                    </div>
                    <script>
                      function Validar_Pw() {
                        Pw1 = document.getElementById("txt_pass").value;
                        Pw2 = document.getElementById("txt_veripass").value;
                        if (Pw1 == Pw2) {
                          document.getElementById("txt_pass").style.border = "2px solid #58D68D ";
                          document.getElementById("txt_veripass").style.border = "2px solid #58D68D ";
                        } else {
                          document.getElementById("txt_pass").style.border = "2px solid #E74C3C ";
                          document.getElementById("txt_veripass").style.border = "2px solid #E74C3C ";
                        }
                      }
                    </script>
                  </div>

                  <div class="col-sm-4">
                    <div class="">
                      <label>Confirmar Contraseña</label>
                      <input type="password" name="pw" onchange="Validar_Pw()" id="txt_veripass" autocomplete="off" class="form-control input-sm" placeholder="Confirme la Contraseña">
                    </div>

                  </div>

                  <div class="col-sm-4">
                    <div class="">
                      <label>Tipo de Usuario</label>
                      <select class="form-control" id="Cmb_Tipos">
                        <option value="A">Usuario</option>
                        <option value="B">Administrador</option>
                      </select>
                    </div>

                  </div>

                  <div class="col-sm-4">
                    <div class="">
                      <label>Estado</label>
                      <select class="form-control" id="Cmb_Estado">
                        <option value="A">Inactivo</option>
                        <option value="B">Activo</option>
                      </select>
                    </div>

                  </div>


                </div>
              </div>
              <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="Cancelar()">Cerrar</button>
                <button type="submit" class="btn btn-info" data-dismiss="modal" id="guardarnuevo" onclick="Nuevo_Usuario()" value=" enviar">
                  Guardar
                </button>
                <div id="resp"></div>
              </div>
            </div>
            </form>
          </div>

        </div>

    </div>














    <!-- Modal Edicion   modalEdicion -->
    <div class="modal fade" id="modaledicion">
      <div class="modal-dialog modal-lg">

        <div class="modal-content">
          <div class="modal-header bg-info">
            <h4 class="modal-title">Actualizar Usuarios</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">
            <div class="row">
              <div class="col-sm-4">
                <form method="POST" id="actualizar" name="contact" role="form" enctype="multipart/form-data" class="needs-validation" novalida>

                  <div class="">

                    <input type="hidden" name="identificacion" id="identificacion" autocomplete="off" class="form-control input-sm" value="" placeholder="Descripción cargo" required readonly>
                  </div>
                  <div class="">
                    <div class="form-group">
                      <label for="txtRuta">Nombre</label>
                      <input type="text" class="form-control" name="nombre" autocomplete="off" class="form-control input-sm" id="nombre" placeholder="gestión" required>
                    </div>
                  </div>
              </div>

              <div class="col-sm-4">
                <div class="form-group">
                  <label for="txtRuta">Email</label>
                  <input type="text" class="form-control" name="email" autocomplete="off" class="form-control input-sm" id="email" placeholder="gestión" required>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="txtRuta">Gestión</label>
                  <input type="text" class="form-control" name="gestion" autocomplete="off" class="form-control input-sm" id="gestion" placeholder="gestión" required>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label for="txtRuta">Cargo</label>
                  <input type="text" class="form-control" name="cargo" autocomplete="off" class="form-control input-sm" id="cargo" placeholder="gestión" required>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="">
                  <label for="txtRuta">Usuario</label>
                  <input type="text" class="form-control" name="usuario" autocomplete="off" class="form-control input-sm" id="usuario" placeholder="Responsable">
                </div>

              </div>
              <div class="col-sm-4">
                <div class="">
                  <label for="txtRuta">Contraseña</label>
                  <input type="password" class="form-control" name="password" onchange="editvalidarcontra()" autocomplete="off" class="form-control input-sm" id="password" placeholder="Observaciones" required>
                </div>

              </div>
              <script>
                function editvalidarcontra() {
                  con1 = document.getElementById("password").value;
                  con2 = document.getElementById("password1").value;
                  if (con1 == con2) {
                    document.getElementById("password").style.border = "2px solid #58D68D ";
                    document.getElementById("password1").style.border = "2px solid #58D68D ";
                  } else {
                    document.getElementById("password").style.border = "2px solid #E74C3C ";
                    document.getElementById("password1").style.border = "2px solid #E74C3C ";
                  }
                }
              </script>

              <div class="col-sm-4">
                <div class="">
                  <label for="txtRuta">Confirmar Contraseña</label>
                  <input type="password" class="form-control" name="password1" onchange="editvalidarcontra()" autocomplete="off" class="form-control input-sm" id="password1" placeholder="Confirmar contraseña" required>
                </div>

              </div>

              <div class="col-sm-4">
                <div class="">
                  <label>Estado de Usuario</label>
                  <select class="form-control" name="Estado_Up" id="Estado_Up">
                    <option value="0">Inactivo</option>
                    <option value="1">Activo</option>
                  </select>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="">
                  <label>Tipo de usuario</label>
                  <select class="form-control" name="Tipo_Up" id="Tipo_Up">
                    <option value="0">Usuario</option>
                    <option value="1">Administrador</option>
                  </select>

                </div>


              </div>
            </div>
            <div class="modal-footer justify-content-end">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
              <button type="submit" class="btn btn-info" data-dismiss="modal" id="submit1" value=" enviar" onclick="Validar_contrasena()">
                Guardar cambios
              </button>
            </div>
            </form>
          </div>

        </div>

      </div>

      <script>
        //modal actualizar.....................................



        /*
$(document).ready(function() {
    $('#submit').on('click', function(e) {
        e.preventDefault();
        var dataString = $('#contactForm').serialize();
        alert('Datos serializados: '+dataString);
    }); 
}); */
      </script>

      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <?php
      include('Paginas/Estructura/Footer.php');
      ?>
    </footer>


</html> 0**
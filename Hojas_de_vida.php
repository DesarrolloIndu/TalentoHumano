<?php
require('Php/Seguridad.php');
require('Php/Conexion.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


  <!-- Minified JS library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- Minified Bootstrap JS -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <link href="css/bootstrap-datetimepicker.min.css" rel="stylesheet">
  <script src="js/bootstrap-datetimepicker.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <title>Talento Humano</title>
  <?php
  require('Paginas/estructura/Head.php');
  ?>

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
              <h1 class="m-0">Hojas de Vida</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="Dashboard.Php">Inicio</a></li>
                <li class="breadcrumb-item active">solicitudes</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- Main content -->
      <section class="content">

        <button class="btn btn-primary" data-toggle="modal" data-target="#vida" id="New">
          Agregar Hoja de vida
          <span class="glyphicon glyphicon-plus"></span>
        </button>
        <!-- Example single danger button -->
        <div class="contenedor">
          <div class="modal fade" id="vida">
            <div class="modal-dialog modal-lg">

              <div class="modal-content">
                <div class="modal-header bg-info">
                  <h4 class="modal-title">Registro de Hojas de vida</h4>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>

                <div class="modal-body">
               
                    <div class="col-md-12">


                      <div class="progress">
                        <div class="progress-bar progress-bar-striped active bg-info" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                      </div>
                      
                      <form id="register_form" novalidate action="form_action.php" method="post">
                        <fieldset>
                          <h5 style="color:#31B0CC;">Paso 1: Información de contacto</h5>
                          <div class="col-md-12">
                            <label for="email">Correo electronico*</label>
                            <input type="email" class="form-control" required id="email" name="email" placeholder="correo electronico">
                          </div>
                          <div class="col-md-12">
                            <label for="email">numero de celular</label>
                            <input type="email" class="form-control" required id="email" name="email" placeholder="Numero de celular">
                          </div>
                          <div class="col-md-12">
                            <label for="email">Dirección*</label>
                            <input type="email" class="form-control" required id="email" name="email" placeholder="Direccion">
                          </div>
                          <div class="col-sm-12">
                            <label for="password">*****</label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="opcional*"><br>
                          </div>
                         
                          <input type="button" class="next-form btn btn-info" value="Siguiente" />
                        </fieldset>
                        <fieldset>
                          <h5 style="color:#31B0CC;"> Paso 2: informacion personal</h5>
                          <div class="col-sm-12">
                            <label for="first_name">Nombres</label>
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Nombres completos">
                          </div>
                          <div class="col-sm-12">
                            <label for="last_name">Apellidos</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Apellidos"><br>
                          </div>
                          <div class="col-sm-12">
                            <label for="last_name">edad</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Apellidos"><br>
                          </div>
                          <div class="col-sm-12">
                            <label for="last_name">****</label>
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Apellidos"><br>
                          </div>
                          <input type="button" name="previous" class="previous-form btn btn-warning" value="Antes" />
                          <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                        </fieldset>
                        <fieldset>
                          <h5 style="color:#31B0CC;">Paso 3: Nivel educativo</h5>
                          <div class="col-sm-12">
                            <label for="mobile">selecciones*</label>
                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="">
                          </div>
                          <div class="col-sm-12">
                            <label for="password">*****</label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="opcional*"><br>
                          </div>
                          <div class="col-sm-12">
                            <label for="password">*****</label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="opcional*"><br>
                          </div>
                          <div class="col-sm-12">
                            <label for="password">*****</label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="opcional*"><br>
                          </div>
                          
                         
                          <input type="button" name="previous" class="previous-form btn btn-warning" value="Antes" />
                          <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                          
                        </fieldset>
                        <fieldset>
                          <h5 style="color:#31B0CC;">Paso 4: Nivel educativo</h5>
                          <div class="col-sm-12">
                            <label for="mobile">selecciones*</label>
                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="">
                          </div>
                          <div class="col-sm-12">
                            <label for="password">*****</label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="opcional*"><br>
                          </div>
                          <div class="col-sm-12">
                            <label for="password">*****</label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="opcional*"><br>
                          </div>
                          <div class="col-sm-12">
                            <label for="password">*****</label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="opcional*"><br>
                          </div>
                          
                         
                          <input type="button" name="previous" class="previous-form btn btn-warning" value="Antes" />
                          <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                          
                        </fieldset>
                        <fieldset>
                          <h5 style="color:#31B0CC;">Paso 5: Nivel educativo</h5>
                          <div class="col-sm-12">
                            <label for="mobile">selecciones*</label>
                            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="">
                          </div>
                          <div class="col-sm-12">
                            <label for="password">*****</label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="opcional*"><br>
                          </div>
                          <div class="col-sm-12">
                            <label for="password">*****</label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="opcional*"><br>
                          </div>
                          <div class="col-sm-12">
                            <label for="password">*****</label>
                            <input type="text" class="form-control" name="password" id="password" placeholder="opcional*"><br>
                          </div>
                          
                         
                          <input type="button" name="previous" class="previous-form btn btn-warning" value="Antes" />
                          <input type="button" name="next" class="next-form btn btn-info" value="Siguiente" />
                          
                          
                        </fieldset>
                        <fieldset>
                          <h2>gracias por registrar</h2>
                          <input type="button" name="previous" class="previous-form btn btn-warning" value="Antes" />
                          <input type="submit" name="submit" class="submit btn btn-info" value="Guardar" />
                        </fieldset>
                      </form>

                    </div>
                  </div>

                </div>









                <style>
                  #register_form fieldset:not(:first-of-type) {
                    display: none;
                  }
                </style>
                <script>
                  $(document).ready(function() {
                    var form_count = 1,
                      previous_form, next_form, total_forms;
                    total_forms = $("fieldset").length;
                    $(".next-form").click(function() {
                      previous_form = $(this).parent();
                      next_form = $(this).parent().next();
                      next_form.show();
                      previous_form.hide();
                      setProgressBarValue(++form_count);
                    });
                    $(".previous-form").click(function() {
                      previous_form = $(this).parent();
                      next_form = $(this).parent().prev();
                      next_form.show();
                      previous_form.hide();
                      setProgressBarValue(--form_count);
                    });
                    setProgressBarValue(form_count);

                    function setProgressBarValue(value) {
                      var percent = parseFloat(100 / total_forms) * value;
                      percent = percent.toFixed();
                      $(".progress-bar")
                        .css("width", percent + "%")
                        .html(percent + "%");
                    }
                    // Handle form submit and validation
                    $("#register_form").submit(function(event) {
                      var error_message = '';
                      if (!$("#email").val()) {
                        error_message += "por favor Ingresa el correo";
                      }
                      if (!$("#password").val()) {
                        error_message += "<br>por favor Ingresa el nombre";
                      }
                      if (!$("#mobile").val()) {
                        error_message += "<br>por favor Ingresa el nivel educativo";
                      }
                      // Display error if any else submit form
                      if (error_message) {
                        alertify.error("completa todos los campos");
                        return false;
                      } else {
                        return true;
                      }
                    });
                  });
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






</html>
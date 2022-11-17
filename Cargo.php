<?php
require('Php/Seguridad.php');
require('Php/Conexion.php');

?>

<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- jQuery UI 1.11.4 -->
  <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <title>Talento Humano</title>
  <?php
  require('Paginas/estructura/Head.php');
  ?>
  <!-- Script Usuarios -->
  <script src="Js/cargo/cargo.js"></script>



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
              <h1 class="m-0">Gestión de Cargos </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="Dashboard.Php">Inicio</a></li>
                <li class="breadcrumb-item active">Perfiles</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- Main content -->
      <section class="content">
        <div id="tablacargo"></div> 

        <!-- Modal para registros nuevos -->
        <!-- <a class="btn btn-primary btn-lg" href='javascript:;' id="Enviar" onclick="">Prueba envio </a> -->

        <div class="modal fade" id="cargomodal">
          <div class="modal-dialog modal-lg">

            <div class="modal-content">
              <div class="modal-header bg-info">
                <h4 class="modal-title">Gestionar Cargos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-4">

                    <form method="POST" id="contactForm" name="contact" role="form" enctype="multipart/form-data" class="needs-validation" novalida>
                      <div class="">
                        <label>Cargo</label>
                        <input type="text" name="cargo" id="cargo" autocomplete="off" class="form-control input-sm" placeholder="Descripción cargo" required>

                      </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="">
                      <label>Gestion</label>
                      <select class="form-control" id="Cmb_Gestion" name="Cmb_Gestion">
                        <option value="0">Seleccione:</option>
                        <?php

                        $result = mysqli_query($conn, "CALL optionselect();");
                        while ($ver = mysqli_fetch_row($result)) {

                          $datos = $ver[0] . "||" .
                            $ver[1] . "||";
                          echo '<option value="' . $ver[0] . '">' . $ver[1] . '</option>';
                        }
                        ?>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-4">
                    <label>Seleccione Área</label>
                    <select class='form-control' id='lista2' name='lista2'>
                      <option value="0">Seleccione</option>
                    </select>
                  </div>

                  <div class="col-sm-4">
                    <div class="">
                      <label for="txtRuta">Escolaridad</label>
                      <textarea type="text" class="form-control" id="escolaridad" name="escolaridad" autocomplete="off" class="form-control input-sm"  placeholder="Formacion" required></textarea>
                    </div></div>

                  <div class="col-sm-4">
                    <div class="">
                      <label for="txtRuta">Formación</label>
                      <textarea type="text" class="form-control" name="formacion" autocomplete="off" class="form-control input-sm" id="formacion" placeholder="Formacion" required></textarea>
                    </div>

                  </div>
                  <div class="col-sm-4">
                    <div class="">
                      <label for="txtRuta">Experiencia</label>
                      <textarea type="text" class="form-control" name="experiencia" autocomplete="off" class="form-control input-sm" id="experiencia" placeholder="Experiencia" required></textarea>
                    </div>

                  </div>

                  <script>
                    $(document).ready(function() {

                      var calle = $('#lista2');

                      $('#Cmb_Gestion').change(function() {
                        $.ajax({
                          data: "area=" + $('#Cmb_Gestion').val(),
                          type: 'POST',
                          url: 'datos.php',

                        }).done(function(data) {
                          calle.html(data);
                        });

                      });

                    });
                  </script>



                  <!-- <script type="text/javascript">
                    $(document).ready(function() {
                      $('#Cmb_Gestion').val(1);
                      recargarLista();

                      $('#Cmb_Gestion').change(function() {
                        recargarLista();
                      });
                    })
                  </script>
                  <script type="text/javascript">
                    function recargarLista() {
                      $.ajax({
                        type: "POST",
                        url: "datos.php",
                        data: "continente=" + $('#Cmb_Gestion').val(),
                        success: function(r) {
                          $('#select2lista').html(r);
                        }
                      });
                    }
                  </script> -->
                  <div class="col-sm-4">
                    <div class="">
                      <label for="txtRuta">Horario</label>
                      <input type="text" class="form-control" name="horario" autocomplete="off" class="form-control input-sm" id="horario" placeholder="ej:Lunes a sábado" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="">
                      <label for="txtRuta">Disponibilidad de viajar</label>
                      <input type="text" class="form-control" name="d" autocomplete="off" class="form-control input-sm" id="d" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                        <div class="form-group">
                          <label for="txtRuta">Salario</label>
                          <input type="number" class="form-control" min="1000000" name="s" autocomplete="off" class="form-control input-sm" id="s" placeholder="Salario del cargo" required>
                        </div>
                      </div>
                  <div class="col-sm-12">
                    <div class="">
                      <label for="txtRuta">Observaciones</label>
                      <textarea type="text" class="form-control" name="observaciones" autocomplete="off" class="form-control input-sm" id="observaciones" placeholder="Observaciones" required></textarea>
                    </div>

                  </div>


                </div>
                <div class="modal-footer justify-content-end">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                  <button type="submit" class="btn btn-info" data-dismiss="modal" id="submit12" onclick="nuevocargo()" value=" enviar">
                    Guardar
                  </button>
                </div>
              </div>

              </form>
            </div>
            <script>
              /*
$(document).ready(function(){

$('#submit1').on('click',function(e){
e.preventDefault();
actualizar();
})
})*/
            </script>

          </div>

        </div>
        <!-- Modal Edicion   modalEdicion -->
        <div class="modal fade" id="modalEdicion">
          <div class="modal-dialog modal-lg">

            <div class="modal-content">
              <div class="modal-header bg-info">
                <h4 class="modal-title">Actualizar Cargos</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>

              <div class="modal-body">
                <div class="row">
                  <div class="col-sm-4">
                    <form method="POST" id="actualizar" name="actualizar" role="form" enctype="multipart/form-data" class="needs-validation" novalida>
                      <div class="">
                        <input type="hidden" id="id1" name="id1">
                        <label>Cargo</label>
                        <input type="text" name="cargo1" id="cargo1" autocomplete="off" class="form-control input-sm" placeholder="Descripción cargo" required>

                      </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="form-group">
                      <label for="txtRuta">Gestión</label>
                      <input type="text" class="form-control" name="gestion1" autocomplete="off" class="form-control input-sm" id="gestion1" placeholder="gestión" required readonly>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="">
                      <label for="txtRuta">Área</label>
                      <input type="text" class="form-control" name="area1" autocomplete="off" class="form-control input-sm" id="area1" placeholder="Responsable" readonly>
                    </div>

                  </div>
                  <!-- <div class="col-sm-4">
                    <div class="">
                      <label>Escolaridad</label>
                      <select class="form-control" id="escolaridad1" name="escolaridad1">
                        <option value="N/A">Seleccione:</option>
                        <option value="Basica-Primaria">Basica Primaria</option>
                        <option value="Basica-Secundaria">Basica Secundaria</option>
                        <option value="Educación-Media">Educación Media</option>
                        <option value="Educación-Técnica-Profesional">Educación Técnica Profesional</option>
                        <option value="Educación-Tecnólogica">Educación Tecnólogica</option>
                        <option value="Educación-Universitaria">Educación Universitaria</option>
                        <option value="Educación-Postgrado">Educación Postgrado</option>
                        <option value="Diplomado">Diplomado</option>
                      </select>
                    </div>
                  </div> -->
                  <div class="col-sm-4">
                    <div class="">
                      <label for="txtRuta">Escolaridad</label>
                      <textarea type="text" class="form-control" id="escolaridad1" name="escolaridad1" autocomplete="off" class="form-control input-sm"  placeholder="Formacion" required></textarea>
                    </div></div>

                  <div class="col-sm-4">
                    <div class="">
                      <label for="txtRuta">Formación</label>
                      <textarea type="text" class="form-control" name="formacion1" autocomplete="off" class="form-control input-sm" id="formacion1" placeholder="Formacion" required></textarea>
                    </div>

                  </div>
                  <div class="col-sm-4">
                    <div class="">
                      <label for="txtRuta">Experiencia</label>
                      <textarea type="text" class="form-control" name="experiencia1" autocomplete="off" class="form-control input-sm" id="experiencia1" placeholder="Experiencia" required></textarea>
                    </div>
                    

                  </div>
                  <div class="col-sm-4">
                    <div class="">
                      <label for="txtRuta">Horario</label>
                      <input type="text" class="form-control" name="horario1" autocomplete="off" class="form-control input-sm" id="horario1" placeholder="ej:Lunes a sábado" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                    <div class="">
                      <label for="txtRuta">Disponibilidad de viajar</label>
                      <input type="text" class="form-control" name="d1" autocomplete="off" class="form-control input-sm" id="d1" required>
                    </div>
                  </div>
                  <div class="col-sm-4">
                        <div class="form-group">
                          <label for="txtRuta">Salario</label>
                          <input type="number" class="form-control" min="1000000" name="s1" autocomplete="off" class="form-control input-sm" id="s1" placeholder="Salario del cargo" required>
                        </div>
                      </div>
                  <div class="col-sm-12">
                    <div class="">
                      <label for="txtRuta">Observaciones</label>
                      <textarea type="text" class="form-control" name="observaciones1" autocomplete="off" class="form-control input-sm" id="observaciones1" placeholder="Observaciones" required></textarea>                  </div>

                  </div> 


                </div>
              </div>
              <div class="modal-footer justify-content-end">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                <button type="submit" class="btn btn-info" data-dismiss="modal" id="submit1" value=" enviar" onclick="actualizarcargo()">
                  Guardar cambios
                </button>
              </div>
              </form>
            </div>

          </div>

        </div>







        <script>
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




</html>
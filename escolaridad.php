<?php
require('Php/Seguridad.php');
require('Php/Conexion.php');
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- jQuery UI 1.11.4 -->
    <!-- jQuery UI 1.11.4 -->
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <title>Talento Humano</title>
    <?php
    require('Paginas/estructura/Head.php');
    ?>

    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" type="text/css" href="plugins/datatables/jquery.dataTables.min.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>




    <!-- Script Usuarios -->
    <script src="Js/escolaridad/escolaridad.js"></script>




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
                            <h1 class="m-0">Configuracion parametro escolaridad</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="Dashboard.Php">Inicio</a></li>
                                <li class="breadcrumb-item active">Escolaridad</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- Main content -->


            <section class="content">
                <div class="row">
                    <div class="col-md-12">

                        <div id="mostrartablanacionalidad">

                        </div>

                        <div class="modal fade" id="predmodalac">
                            <div class="modal-dialog modal-lg">

                                <div class="modal-content">
                                    <div class="modal-header bg-info">
                                        <h4 class="modal-title">Actualización de escolaridad</h4>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-sm-4">

                                                <form method="POST" id="formunac" name="formulariopre" role="form" enctype="multipart/form-data" class="needs-validation" novalida>
                                                    <div class="">
                                                        <label>Escolaridad</label>
                                                        <input type="hidden" name="ID" id="ID" autocomplete="off" class="form-control input-sm" placeholder="Escolaridad">
                                                        <input type="text" name="escolari" id="escolari" autocomplete="off" class="form-control input-sm" placeholder="Escolaridad">

                                                    </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group">
                                                    <label for="txtRuta">Observaciones</label>
                                                    <textarea type="text" spellcheck="true" class="form-control" name="observ" autocomplete="off" class="form-control input-sm" id="observ" placeholder="Observaciones" required></textarea>
                                                </div>
                                            </div></div>

                                            <div class="modal-footer justify-content-end">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                                                <button type="submit" class="btn btn-info" data-dismiss="modal" id="submit12" onclick="actualizar_es()" value=" enviar">
                                                    Guardar
                                                </button>
                                            </div>
                                            </form>
                                        


                                    </div>

                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-12">

                                <div id="mostrartabla">

                                </div>




                                <div class="modal fade" id="escolaridad">
                                    <div class="modal-dialog modal-lg">

                                        <div class="modal-content">
                                            <div class="modal-header bg-info">
                                                <h4 class="modal-title">Añadir Escolaridad</h4>

                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>

                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-sm-4">

                                                        <form method="POST" id="crear" name="formulariopre" role="form" enctype="multipart/form-data" class="needs-validation" novalida>
                                                            <div class="">
                                                                <label>Escolaridad</label>
                                                                <input type="text" name="esc" id="esc" autocomplete="off" class="form-control input-sm" placeholder="Escolaridad">

                                                            </div>
                                                    </div>
                                                    <div class="col-sm-8">
                                                        <div class="form-group">
                                                            <label for="txtRuta">Observaciones</label>
                                                            <textarea type="text" spellcheck="true" class="form-control" name="obser" autocomplete="off" class="form-control input-sm" id="obser" placeholder="Observaciones" required></textarea>
                                                        </div>
                                                    </div></div>

                                                    <div class="modal-footer justify-content-end">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                                                        <button type="submit" class="btn btn-info" data-dismiss="modal" id="submit12" onclick="nuevoes()" value=" enviar">
                                                            Guardar
                                                        </button>
                                                    </div>
                                                    </form>
                                                </div>


                                            </div>

                                        </div>
                                    </div>
                                </div>
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
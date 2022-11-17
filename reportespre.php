<?php
//  session_start();
require_once "Php/conexion.php";
ob_start();
// require_once "../Criptografia.php";
?>

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




</head>

            <table  class="table table-hover table-condensed  table-striped">
                <thead class="bg-info">
                    <tr id="theadRow">
                        <td class="text-center">ID</td>
                        <td class="text-center">Nacionalidad</td>
                        <td class="text-center">Escolaridad</td>
                        <td class="text-center">Ocupación</td>
                        <td class="text-center">Nacionalidad</td>
                        <td class="text-center">Escolaridad</td>
                        <td class="text-center">Ocupación</td>
                        <td class="text-center">Ciudad</td>
                        <td class="text-center">Telefono</td>
                        <td class="text-center">Email</td>
                        <td class="text-center">Nacionalidad</td>
                        <td class="text-center">Escolaridad</td>
                        <td class="text-center">Anexos</td>
                    </tr>
                </thead>

                <tbody>
                    <?php

                    //======================================================
                    $result = mysqli_query($conn, "CALL sp_tablapre;");

                    if (mysqli_num_rows($result) > 0) {

                        while ($ver = mysqli_fetch_row($result)) {

                            $datos = $ver[0] . "||" .
                                $ver[1] . "||" .
                                $ver[2] . "||" .
                                $ver[3] . "||" .
                                $ver[4] . "||" .
                                $ver[5] . "||" .
                                $ver[6] . "||" .
                                $ver[7] . "||" .
                                $ver[8] . "||" .
                                $ver[9] . "||" .
                                $ver[10] . "||" .
                                $ver[11] . "||" .
                                $ver[12] . "||" .
                                $ver[13] . "||" .
                                $ver[14] . "||" .
                                $ver[15] . "||" .
                                $ver[16] . "||";
                    ?>
                            <tr>
                                <td class="text-center"><?php echo $ver[0] ?></td>
                                <td><?php echo $ver[2] ?></td>
                                <td class="text-center"><?php echo $ver[16] ?></td>
                                <td><?php echo $ver[13] ?></td>

                                <td class="text-center"><?php echo $ver[3] ?></td>
                                <td class="text-center"><?php echo $ver[5] ?></td>
                                <td class="text-center"><?php echo $ver[4] ?></td>
                                <td class="text-center"><?php echo $ver[6] ?></td>
                                <td class="text-center"><?php echo $ver[8] ?></td>
                                <td class="text-center"><?php echo $ver[9] ?></td>
                                <td class="text-center"><?php echo $ver[14] ?></td>
                                <td class="text-center"><?php echo $ver[15] ?></td>
                                <td class="text-center"><?php echo $ver[12] ?></td>


                            </tr>

                    <?php
                      mysqli_next_result($conn);  }
                    }
                    ?>
                </tbody>
            </table>

    <?php

    $html = ob_get_clean();
    require_once 'plugins/dompdf/autoload.inc.php';
    use Dompdf\Dompdf;

    $domp = new Dompdf();
    $option = $domp->getOptions();
    $option->set(array('isRemoteEnabled' => false));
    $domp->setOptions($option);
    $domp->loadHtml($html);
    $domp->setPaper('letter');
    $domp->render();
    $domp->stream("archivo_.pdf", array("attachment" => false));



    ?>
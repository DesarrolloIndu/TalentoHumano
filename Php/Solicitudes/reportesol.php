<?php
session_start();
require_once "../Conexion.php";
ob_start();
$var = base64_decode($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
$id = $var;


$result = mysqli_query($conn, "SELECT Reg_Kawak,Cod_Cargo,Descripcion,Fecha_solicitud,Fecha_Limite,(Cantidad - Contratados) AS Pendientes,Estado,Cantidad,Salario,Fecha_publicacion,Link,Fecha_cierre,a.Observaciones,Contratados,Cantidad,consecutivo FROM solicitudes a INNER JOIN cargos b  ON a.Cod_Cargo =  b.Id_Cargo WHERE Reg_Kawak=$id");
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
            $ver[15] . "||";
?>

<div class="row">
            <div class="col-sm-12">
                <div class="card text-center">

                    <div class="card-body ">
                        <div class="row justify-content-start">
                            <div class="col-4">

                                <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/talentohumano/Archivos/Imagenes/Talento.jpeg" class="rounded-circle" width="100" height="90" style="float:left;">
                            </div>
                        </div>
                        <div style="float:right;">
                            <pre style="color:#4E4E4E; font-size:x-small;">
                                    Tanques y Tapas Industriales Ltda.
                                    Mosquera–Cundinamarca–Colombia
                                    Cra.5 Este No.15-30
                                </pre>
                        </div>

                        <div class="container">
                            <br><br><br><br>
                            <center>
                                <h3 class="text-capitalize font-weight-bold font-italic">GESTIÓN ADMINISTRATIVA Y FINANCIERA</h3>
                            <p class="card-text text-capitalize">
                            <b> TALENTO HUMANO</b> <br>
                            REPORTE DE SOLICITUD NUMERO <?php echo $ver[15]; ?>
                            </p> <hr>
                          
                            </center>

                            
                            <br><br>
                                <p id="cuerpo2" class="card-text text-capitalize">
                                    Registro solicitud Kawak numero: <b><?php echo $ver[0]; ?></b><br>
                                    
                                    Solicitud para el cargo: <b><?php echo $ver[2]; ?></b> <br>
                                    Cantidad de personal requerido: <b><?php echo $ver[7]; ?></b> <br>
                                    Salario asignado:<b>$<?php echo $ver[8]; ?></b><br>
                                    Total contratados: <b><?php echo $ver[13]; ?></b><br>
                                    Fecha de publicación Kawak: <b><?php echo $ver[9]; ?></b><br>
                                    Fecha de solicitud:<b><?php echo $ver[3]; ?></b><br>
                                    Fecha de cierre: <b>
                                    <?php
                                    if ($ver[11] == ""){
                                        echo("Solicitud Abierta");
                                    }else{
                                        echo $ver[11];
                                    }
                                    ?>
                                    </b><br>
                                    Observaciones: <?php echo $ver[12]; ?> <br>
                                    
                                </p>
                                <br>
                                

                           
             <?php    } } ?>
                            </p>




                        </div>
                        <div>

                        </div>
                    </div>

                </div>
<hr>

            <footer style="float:right; position: absolute;  padding: 0%; bottom:0%; color:#4E4E4E; font-size:x-small;">
            <hr>    
            <pre>Impreso Por:<?php echo  $_SESSION["Usuario_Activo"]; ?><br>
              <?php
                $fecha = date('Y-m-d');
                echo "      Fecha:" . $fecha; ?>  
            </pre>
            </footer>
            <pre></pre>

        </div>


        <?php
        $html = ob_get_clean();
        require_once '../../plugins/dompdf/autoload.inc.php';

        use Dompdf\Dompdf;

        $domp = new Dompdf();
        $option = $domp->getOptions();
        $option->set(array('isRemoteEnabled' => true));
        $domp->setOptions($option);
        $domp->loadHtml($html);
        $domp->setPaper('letter');
        $domp->render();
        $domp->stream("Reporte_Solicitud.pdf", array("attachment" => false));
        ?>
        <hr>
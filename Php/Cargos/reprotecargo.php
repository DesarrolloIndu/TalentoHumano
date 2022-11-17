<?php
session_start();
require_once "../Conexion.php";
ob_start();
$var = base64_decode($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
$id = $var;


$result = mysqli_query($conn, "SELECT Id_Cargo,a.Descripcion,b.Descripcion AS gestion,c.Area_,Escolaridad,Formacion,Experiencia,a.Observaciones,a.Horario,sal,Disponibilidad
FROM cargos AS a 
INNER JOIN gestion AS b ON(b.Id_Gestion=a.Gestion_Cargo) 
INNER JOIN areas AS c ON (c.Id_Area=a.Area_) WHERE Id_Cargo=$id");
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
            $ver[10] . "||";

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
                                <hr>
                                <p class="card-text text-capitalize">
                                    <b> TALENTO HUMANO</b> <br>
                                    Descripción del cargo
                                </p>
                                <hr>

                            </center>


                            <br>

                            <p id="cuerpo2" class="card-text text-capitalize">
                                Cargo solicitado <b><?php echo $ver[1]; ?></b> con experiencia de <?php echo $ver[6]; ?> certificada.<br><br>
                                Horario:<?php echo $ver[8]; ?><br><br>
                                Salario:$<?php echo $ver[9]; ?> (pagos quincenales)<br><br>
                                Requerimientos<br><br>
                                Educación mínima:<?php echo $ver[4]; ?><br><br>
                                Formacion:<?php echo $ver[5]; ?><br><br>
                                Disponibilidad de viajar:<?php echo $ver[10]; ?><br><br>
                                Area que solicita:<?php echo $ver[3]; ?><br><br>
                                Tipo de contrato: Contrato indefinido<br><br>
                                Observaciones:<?php echo $ver[7]; ?><br>

                            </p>
                            <br><br>



                    <?php    }
            } ?>
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
            $domp->stream("Reporte_Cargo.pdf", array("attachment" => false));
            ?>
            <hr>
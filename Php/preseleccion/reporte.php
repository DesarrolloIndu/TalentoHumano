<?php
session_start();
require_once "../Conexion.php";
ob_start();
$var = base64_decode($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
$id = $var;


$result = mysqli_query($conn, "SELECT * FROM preseleccion WHERE Documento=$id");
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

        <div class="row">
            <div class="col-sm-12">
                <div class="card text-center">

                    <div class="card-body ">
                        <div class="row justify-content-start">
                            <div class="col-4">

                                <img src="http://<?php echo $_SERVER['HTTP_HOST']; ?>/talentohumano/Archivos/Imagenes/Talento.jpeg" class="rounded-circle" width="90" height="90" style="float:left;">
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
                                <h3 class="text-capitalize font-weight-bold font-italic">REPORTE PRESELECCIÓN</h3>
                            </center>

                            <br>
                            <center>
                                <p id="cuerpo2" class="card-text text-capitalize">
                                    Una de las principales complicaciones que se encuentran a la hora de
                                    transmitir la información obtenida de un proceso de selección es el momento de
                                    generar informes. Un informe de selección no es más que un documento que
                                    contiene una serie de elementos conductuales que fueron manifestados y
                                    observados en una persona durante un proceso con una finalidad especifica. El
                                    informe es el resultado de la elaboración del material obtenido y expresa el
                                    supuesto saber que el evaluador ha logrado acerca del candidato. Es común
                                    que suelan confundirse los informes de selección con los informes de
                                    evaluación emitidos normalmente por los software de corrección de pruebas
                                    psicométricas, en donde se presentan los resultados numéricos de las pruebas
                                    aplicadas y en algunos casos una descripción de tales datos (Hogan, 2004). La
                                    diferencia fundamental viene expresada en la relación de los resultados
                                    obtenidos con un perfil de características que ha sido definido como esperable
                                    para una condición específica. Representando así, una aproximación global al
                                    desempeño de uno o varios candidatos en un proceso.
                                    La utilidad de los informes de selección viene dada por la posibilidad de
                                    transmitir y dar a conocer la información obtenida de una manera clara y el
                                    poder sustentar las decisiones que se tomen en criterios reconocidos y
                                    explícitamente expuestos en un documento.
                                    Ahora bien, los informes tienen la finalidad de comunicar a otras personas los
                                    resultados obtenidos por uno o varios individuos en una situación donde el
                                    objetivo fundamental del evaluador es tomar una decisión que se adecue a las
                                    condiciones y a los intereses que se tienen (Cortada, 2000). Estos intereses
                                    marcan una notable diferencia en el tipo de informe que se debe realizar
                                    (objetivo) y en la manera como se expresan los aspectos observados.
                                    Para los Psicólogos existen diferentes tipos de informes que dependen del
                                    contexto en donde éste se desenvuelva y de los objetivos que éste posea.
                                    Aquel que labore en áreas clínicas o directamente asociadas con la salud,
                                    deberá considerar como objetivo fundamental el describir el funcionamiento
                                    psíquico, mental y conductual del paciente con la finalidad de llegar a un
                                    diagnóstico claro de lo que le ocurre. En estos contextos el paciente acude al
                                    especialista partiendo de alguna dolencia que posee y la evaluación está
                                    orientada a indagar todos los elementos asociados a lo que refiere como
                                </p>
                            </center>
                            <p id="cuerpo5" step="any" class="card-text text-capitalize ">
                                <?php echo $ver[13];  ?>
                            </p>
                            <p id="cuerpo6" class="card-text text-capitalize ">
                                <?php echo $ver[9];  ?>
                            </p>
                            <p id="cuerpo7" class="card-text text-capitalize ">
                                <?php echo $ver[5];  ?>
                            </p>
                            <p id="cuerpo3" class="card-text text-capitalize ">
                                <?php echo $ver[7];  ?>
                            </p>
                            <p id="cuerpo8" class="card-text text-capitalize ">
                        <?php echo $ver[10];
                    }
                } ?>
                            </p>




                        </div>
                        <div>

                        </div>
                    </div>

                </div>

            </div> 
            
            <footer style="float:right; position: absolute;  padding: 0%; bottom:0%; color:#4E4E4E; font-size:x-small;">
              <pre>Impreso Por:<?php echo  $_SESSION["Usuario_Activo"]; ?><br>
              <?php
             $fecha=date('Y-m-d');
               echo "        Fecha:" .$fecha;?>  
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
        $domp->stream("archivo_.pdf", array("attachment" => false));
        ?>
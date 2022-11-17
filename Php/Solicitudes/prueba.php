<?php
//  session_start();
require_once "../conexion.php";
// require_once "../Criptografia.php";
?>
<!-- <script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script> -->
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/datatables-select/js/dataTables.select.min.js"></script>


<div class="row">

    <div class="col-md-8">
        <label for="Dato_Fil">Filtrar Por:&nbsp; </label>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Dato_Fil" id="inlineRadio1" value="2" onclick="filtro();" checked>
            <label class="form-check-label" for="inlineRadio1">Fecha de solicitud</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Dato_Fil" id="inlineRadio2" value="3" onclick="filtro();">
            <label class="form-check-label" for="inlineRadio2">Fecha Limite</label>
        </div>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="Dato_Fil" id="inlineRadio3" value="5" onclick="filtro();">
            <label class="form-check-label" for="inlineRadio3">Fecha de Cierre</label>
        </div>
        <button onclick="schekeado();" hidden>dato</button>
        <br>
        <br>
        <div class="row">
            <div class="col-md-5">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-info text-white" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" class="form-control" placeholder="Desde" name="dateStart" style=" color: #888A8C;" placeholder="Desde" id="dateStart" value="Desde" readonly>
                </div>
            </div>
            <div class="col-md-5">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-info text-white" id="basic-addon1"><i class="fas fa-calendar-alt"></i></span>
                    </div>
                    <input type="text" name="dateEnd" class="form-control" id="dateEnd" placeholder="Hasta" readonly>
                </div>
            </div>

            <div class="col-md-2">
                <div class="input-group mb-3">
                    <button id="reset" class="btn btn-outline-warning btn-sm" onclick="Vertabla()">Reiniciar Filtro</button>
                </div>
            </div>
        </div>
    </div>




    <div class="col-md-12">

        <div class="table-responsive">
            <table id="commentTable" class="table table-hover table-condensed  table-striped" style="width:100%;">
            <caption>
                <button class="btn btn-info" data-toggle="modal" data-target="#solicitudmodal" id="New">
                    Agregar Solicitud
                    <span class="glyphicon glyphicon-plus"></span>
                </button>
            </caption>

                <thead class="bg-info">
                    <tr id="theadRow">
                        <td class="text-center"><?php echo "N°" . '&nbsp' . "Solicitud"; ?></td>
                        <td class="text-center">Kawak</td>
                        <td class="text-center">Cargo</td>
                        <td class="text-center"><?php echo "Fecha" . '&nbsp' . "de" . '&nbsp' . "solicitud"; ?></td>
                        <td class="text-center"><?php echo "Fecha" . '&nbsp' . "Limite"; ?></td>
                        <td class="text-center"><?php echo "Por" . '&nbsp' . "contratar"; ?></td>
                        </td>
                        <td class="text-center"><?php echo "Fecha" . '&nbsp' . "Cierre"; ?></td>
                        <td class="text-center" style="width:1%;">Estado</td>
                        <td class="text-center">Reporte</td>
                        <td class="text-center">PDF</td>
                        <td class="text-center" style="width:1%;">Editar</td>
                        <td class="text-center" style="width:1%;">Eliminar</td>
                    </tr>
                </thead>
                </script>
                <style type="text/css">
                    .coloring {
                        background-color: green;
                    }

                    .tooltip .tooltip-inner {
                        background-color: #5bc0de;
                    }

                    .tooltip .arrow::before {
                        border-left-color: #5bc0de;
                    }
                </style>
                <script>
                    $(function() {
                        $('[data-toggle="popover"]').popover()
                    })

                    $(function() {
                        $('[data-toggle="tooltip"]').tooltip()
                    })
                </script>
                <tbody>
                    <?php

                    //======================================================
                    $result = mysqli_query($conn, "CALL sp_Solicitudes;");

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
                                $ver[12] = trim(preg_replace("[\n|\r|\n\r]", "", $ver[12])) . "||" .  // $ver[12]= trim(preg_replace('/\s+/', ' ', $ver[12]));
                                $ver[13] . "||" .
                                $ver[14] . "||" .
                                $ver[15] . "||";

                    ?>
                            <tr>
                                <td class="text-center"><?php echo $ver[15] ?></td>
                                <td class="text-center"><?php echo $ver[0] ?></td>
                                <td class="text-center" data-toggle="tooltip" data-placement="left" data-html="true" title=" <?php echo "Salario:" . $ver[8] ?>"><?php echo $ver[2] ?></td>
                                <td class="text-center"><?php echo $ver[3] ?></td>
                                <td class="text-center"><?php echo $ver[4] ?></td>

                                <td class="text-center" data-toggle="tooltip" data-placement="left" data-html="true" title="<?php echo   $ver[14] . ' vacantes ' . $ver[13] . ' ' . 'contratados'  ?>">
                                    <?php
                                    $pendientes = $ver[5];
                                    $estado = $ver[6];
                                    if ($pendientes >= 1 and $estado == 0) {
                                        echo '<span style="color:red">' . $ver[5] . '</span>';
                                    } elseif ($pendientes == 0 and $estado == 0) {
                                        echo '<span style="color:blue">' . $ver[5] . '</span>';
                                    } else {
                                        echo '<span style="color:green">' . $ver[5] . '</span>';
                                    }
                                    ?></td>
                                <td class="text-center"><?php echo $ver[11] ?></td>
                                <td class="text-center " data-toggle="tooltip" data-placement="left" data-html="true" title="<?php
                                                                                                                                $estado = $ver[6];
                                                                                                                                if ($estado < 1) {
                                                                                                                                    echo  " Fecha requerida  " . " " . $ver[4];
                                                                                                                                } else {
                                                                                                                                    // echo " Cerrada el " . '&nbsp' . $ver[11];
                                                                                                                                }
                                                                                                                                ?>" onclick="estado('<?php echo $datos; ?>')"><?php echo $ver[6] ?></td>
                                <td class="text-center">
                                    <button class='btn btn-primary' data-toggle="modal" data-target="#Informe_sol" onclick="informe('<?php echo $datos; ?>')"> <i class="fa fa-eye"></i> </button>
                                </td>
                                <td class="text-center">
                                    <?php $var = base64_encode($ver[0]); ?>

                                    <a class='btn btn-danger' href="Php/Solicitudes/reportesol.php?id=<?php echo $var ?>"><i class="fa fa-file-pdf">  
                                            <!-- <button class='btn btn-danger' data-toggle="modal" onclick="prueba()"> <i class="fa fa-file-pdf"></i> </button> -->
                                </td>
                                <td class="text-center">
                                    <button id="" class='btn btn-warning' data-toggle="modal" data-target="#solicitudactualizar" onclick="llenarmodal('<?php echo $datos; ?>')"> <i class="fas fa-pencil-alt"></i> </button>
                                </td>

                                <td class="text-center">
                                    <button class="btn btn-danger glyphicon glyphicon-remove" onclick="preguntarSiNo('<?php echo $ver[0] ?>')"> <i class="fas fa-trash-alt"></i> </button>
                                </td>


                            </tr>

                    <?php
                        }
                    } else {
                        return false;
                    }
                    ?>
                </tbody>
            </table>

         

            <br><br>
        </div>

        <br>
    </div>
    <div id="endBlock"></div>
    <!-- verificando filtro de fechas porque me quedo incompleto ya quedo solucionado -->



    <script type="text/javascript">
        var Selector_fill = 2;

        function filtro() {
            // recorremos todos los valores del radio button para encontrar el seleccionado
            const radios = document.getElementsByName('Dato_Fil');
            for (var i = 0; i < radios.length; i++) {
                if (radios[i].checked) {
                    var Radio_selec = radios[i].value;
                    // alert(Radio_selec);
                    Selector_fill = Radio_selec;
                    break;
                }
            }
        };

        function schekeado() {
            // recorremos todos los valores del radio button para encontrar el seleccionado
            alert(Selector_fill);
        };

        // The plugin function for adding a new filtering routine
        $.fn.dataTableExt.afnFiltering.push(
            function(oSettings, aData, iDataIndex) {
                var dato = $("#dateStart").val();
                if (dato == "Desde") {
                    var dateStart = parseDateValue("2022-01-01");
                } else {
                    //alert("Dato: " + " " + dato);
                    var dateStart = parseDateValue(dato);
                }
                //  var dateStart = parseDateValue($("#dateStart").val());
                var dateEnd = parseDateValue($("#dateEnd").val());
                // aData represents the table structure as an array of columns, so the script access the date value
                // in the first column of the table via aData[0]   
                //selecccionar columna n° || Columna a filtrar
                //  var Filtrado =Selector_fill;
                var evalDate = parseDateValue(aData[Selector_fill]);
                if (evalDate >= dateStart && evalDate <= dateEnd) {
                    return true;
                } else {
                    return false;
                }

            });

        // Function for converting a mm/dd/yyyy date value into a numeric string for comparison (example 08/12/2010 becomes 20100812
        function parseDateValue(rawDate) {
            var dateArray = rawDate.split("-");
            var parsedDate = dateArray[0] + dateArray[1] + dateArray[2];
            return parsedDate;
        }



        $(function() {
            var currentdate = new Date();
            var datetime = "Fecha: " + currentdate.getDate() + "/" +
                (currentdate.getMonth() + 1) + "/" +
                currentdate.getFullYear() + " Hora " +
                currentdate.getHours() + ":" +
                currentdate.getMinutes() + ":" +
                currentdate.getSeconds();
            // Implements the dataTables plugin on the HTML table
            var $dTable = $("#commentTable").dataTable({

                dom: 'B<"float-left"i> <"float-right"f>t <"float-left"l> <"float-right"p> <"clearfix">', // abajo lftiprB   - arriba lftiprB
                buttons: [{
                        title: 'Reporte Gestión De Solicitudes',
                        extend: 'excelHtml5',
                        text: '<i class="fa fa-file-excel" aria-hidden="true"></i>',
                        className: 'btn btn-success',
                        autoFilter: true,
                        titleAttr: 'Excel',

                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        }
                    },
                    {
                        extend: 'pdfHtml5',
                        title: 'Reporte Gestión De Solicitudes',
                        text: '<i class="fa fa-file-pdf"></i>',
                        titleAttr: 'PDF',
                        className: 'btn btn-danger',
                        footer: datetime,
                        messageBottom: datetime,
                        exportOptions: {
                            columns: [0, 1, 2, 3, 4, 5, 6]
                        },
                        messageTop: 'PDF created by PDFMake with Buttons for DataTables.'
                    },

                    // , {
                    //     title: 'Reporte Gestión De Solicitudes',
                    //     extend: 'print',
                    //     text: '<i class="fa fa-print" aria-hidden="true"></i>',
                    //     className: 'btn btn-info',
                    //     exportOptions: {
                    //         columns: [0, 1, 2, 3, 4, 5, 6]
                    //     },
                    //     titleAttr: 'Imprimir'
                    // }
                ],


                select: true,
                "lengthMenu": [
                    [5, 10, -1],
                    [5, 10, "All"]
                ],
                "ordering": true,
                "info": false,
                "bStateSave": false,
                "aaSorting": [
                    [0, 'des']

                ],
                "aoColumns": [{
                    /* Debe coincidir con el numero de columna del Datatable */
                    "mData": "col1"
                }, {
                    "mData": "col2"
                }, {
                    "mData": "col3"
                }, {
                    "mData": "col4"
                }, {
                    "mData": "col5"
                }, {
                    "mData": "col6"
                }, {
                    "mData": "col7"
                }, {
                    "mData": "col8"
                }, {
                    "mData": "col9"
                }, {
                    "mData": "col10"
                }, {
                    "mData": "col11"
                }, {
                    "mData": "col12"
                }],


                "ordering": true,
                "info": false,
                "columnDefs": [{
                    "targets": [7], //organizar leer columnas 
                    "sortable": false,
                    "render": function(data, type, full, meta) {

                        if (data == 0) {

                            return "<div class='bg-primary color-palette text-center'>ABIERTA</div> "

                        } else {
                            return "<div class='bg-success color-palette text-center'>CERRADA</div> "

                        }

                    }
                }, ],
                "language": {
                    "processing": "Procesando...",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "Ningún dato disponible en esta tabla",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "search": "Buscar:",
                    "infoThousands": ",",
                    "loadingRecords": "Cargando...",
                    "paginate": {
                        "first": "Primero",
                        "last": "Último",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "aria": {
                        "sortAscending": ": Activar para ordenar la columna de manera ascendente",
                        "sortDescending": ": Activar para ordenar la columna de manera descendente"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "colvis": "Visibilidad",
                        "collection": "Colección",
                        "colvisRestore": "Restaurar visibilidad",
                        "copyKeys": "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
                        "copySuccess": {
                            "1": "Copiada 1 fila al portapapeles",
                            "_": "Copiadas %d fila al portapapeles"
                        },
                        "copyTitle": "Copiar al portapapeles",
                        "csv": "CSV",
                        "excel": "Excel",
                        "pageLength": {
                            "-1": "Mostrar todas las filas",
                            "1": "Mostrar 1 fila",
                            "_": "Mostrar %d filas"
                        },
                        "pdf": "PDF",
                        "print": "Imprimir"
                    },
                    "autoFill": {
                        "cancel": "Cancelar",
                        "fill": "Rellene todas las celdas con <i>%d<\/i>",
                        "fillHorizontal": "Rellenar celdas horizontalmente",
                        "fillVertical": "Rellenar celdas verticalmentemente"
                    },
                    "decimal": ",",
                    "searchBuilder": {
                        "add": "Añadir condición",
                        "button": {
                            "0": "Constructor de búsqueda",
                            "_": "Constructor de búsqueda (%d)"
                        },
                        "clearAll": "Borrar todo",
                        "condition": "Condición",
                        "conditions": {
                            "date": {
                                "after": "Despues",
                                "before": "Antes",
                                "between": "Entre",
                                "empty": "Vacío",
                                "equals": "Igual a",
                                "notBetween": "No entre",
                                "notEmpty": "No Vacio",
                                "not": "Diferente de"
                            },
                            "number": {
                                "between": "Entre",
                                "empty": "Vacio",
                                "equals": "Igual a",
                                "gt": "Mayor a",
                                "gte": "Mayor o igual a",
                                "lt": "Menor que",
                                "lte": "Menor o igual que",
                                "notBetween": "No entre",
                                "notEmpty": "No vacío",
                                "not": "Diferente de"
                            },
                            "string": {
                                "contains": "Contiene",
                                "empty": "Vacío",
                                "endsWith": "Termina en",
                                "equals": "Igual a",
                                "notEmpty": "No Vacio",
                                "startsWith": "Empieza con",
                                "not": "Diferente de"
                            },
                            "array": {
                                "not": "Diferente de",
                                "equals": "Igual",
                                "empty": "Vacío",
                                "contains": "Contiene",
                                "notEmpty": "No Vacío",
                                "without": "Sin"
                            }
                        },
                        "data": "Data",
                        "deleteTitle": "Eliminar regla de filtrado",
                        "leftTitle": "Criterios anulados",
                        "logicAnd": "Y",
                        "logicOr": "O",
                        "rightTitle": "Criterios de sangría",
                        "title": {
                            "0": "Constructor de búsqueda",
                            "_": "Constructor de búsqueda (%d)"
                        },
                        "value": "Valor"
                    },
                    "searchPanes": {
                        "clearMessage": "Borrar todo",
                        "collapse": {
                            "0": "Paneles de búsqueda",
                            "_": "Paneles de búsqueda (%d)"
                        },
                        "count": "{total}",
                        "countFiltered": "{shown} ({total})",
                        "emptyPanes": "Sin paneles de búsqueda",
                        "loadMessage": "Cargando paneles de búsqueda",
                        "title": "Filtros Activos - %d"
                    },
                    "select": {
                        "1": "%d fila seleccionada",
                        "_": "%d filas seleccionadas",
                        "cells": {
                            "1": "1 celda seleccionada",
                            "_": "$d celdas seleccionadas"
                        },
                        "columns": {
                            "1": "1 columna seleccionada",
                            "_": "%d columnas seleccionadas"
                        }
                    },
                    "thousands": ".",
                    "datetime": {
                        "previous": "Anterior",
                        "next": "Proximo",
                        "hours": "Horas",
                        "minutes": "Minutos",
                        "seconds": "Segundos",
                        "unknown": "-",
                        "amPm": [
                            "am",
                            "pm"
                        ]
                    },
                    "editor": {
                        "close": "Cerrar",
                        "create": {
                            "button": "Nuevo",
                            "title": "Crear Nuevo Registro",
                            "submit": "Crear"
                        },
                        "edit": {
                            "button": "Editar",
                            "title": "Editar Registro",
                            "submit": "Actualizar"
                        },
                        "remove": {
                            "button": "Eliminar",
                            "title": "Eliminar Registro",
                            "submit": "Eliminar",
                            "confirm": {
                                "_": "¿Está seguro que desea eliminar %d filas?",
                                "1": "¿Está seguro que desea eliminar 1 fila?"
                            }
                        },
                        "error": {
                            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">Más información&lt;\\\/a&gt;).<\/a>"
                        },
                        "multi": {
                            "title": "Múltiples Valores",
                            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                            "restore": "Deshacer Cambios",
                            "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
                        }
                    },
                    "info": "Mostrando de _START_ a _END_ de _TOTAL_ entradas"
                }
            });

            // The dataTables plugin creates the filtering and pagination controls for the table dynamically, so these
            // lines will clone the date range controls currently hidden in the baseDateControl div and append them to
            // the feedbackTable_filter block created by dataTables
            // $dateControls= $("#baseDateControl").children("div").clone();
            // $("#feedbackTable_filter").prepend($dateControls);

            // Implements the jQuery UI Datepicker widget on the date controls
            $(function() {
                var from = $("#dateStart")
                    .datepicker({
                        dateFormat: "yy-mm-dd",
                        changeMonth: true,
                        //cambiar año
                        changeYear: true,
                        closeText: 'Cerrar',
                        currentText: 'Hoy',
                        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                        ],
                        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                            'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'
                        ],
                        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié;', 'Juv', 'Vie', 'Sáb'],
                        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                        weekHeader: 'Sm',
                        firstDay: 1,
                        isRTL: false,
                        showMonthAfterYear: false,
                        yearSuffix: ''
                    })
                    .on("change", function() {
                        to.datepicker("option", "minDate", getDate(this));
                    }),
                    to = $("#dateEnd").datepicker({
                        dateFormat: "yy-mm-dd",
                        changeMonth: true,
                        changeYear: true,
                        closeText: 'Cerrar',
                        currentText: 'Hoy',
                        monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
                            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                        ],
                        monthNamesShort: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun',
                            'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic'
                        ],
                        dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
                        dayNamesShort: ['Dom', 'Lun', 'Mar', 'Mié;', 'Juv', 'Vie', 'Sáb'],
                        dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
                        weekHeader: 'Sm',
                        firstDay: 1,
                        isRTL: false,
                        showMonthAfterYear: false,
                        yearSuffix: ''
                    })
                    .on("change", function() {
                        from.datepicker("option", "maxDate", getDate(this));
                    });

                function getDate(element) {
                    var date;
                    var dateFormat = "yy-mm-dd";
                    try {
                        date = $.datepicker.parseDate(dateFormat, element.value);
                    } catch (error) {
                        date = null;
                    }

                    return date;
                }
            });



            $("#dateStart").keyup(function() {
                $dTable.fnDraw();
            });
            $("#dateStart").change(function() {
                $dTable.fnDraw();
            });
            $("#dateEnd").keyup(function() {
                $dTable.fnDraw();
            });
            $("#dateEnd").change(function() {
                $dTable.fnDraw();
            });




        });
    </script>
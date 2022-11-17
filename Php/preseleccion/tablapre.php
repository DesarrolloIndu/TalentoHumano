<?php
//  session_start();
require_once "../conexion.php";
// require_once "../Criptografia.php";
?>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/datatables-select/js/dataTables.select.min.js"></script>

<div class="row">
    <div class="col-md-12 ">
        <!-- colocar tabla responsiva con el buscador -->
        <div class="table-responsive">
            <table id="tablapreseleccion" class="table table-hover table-condensed  table-striped" style="width:100%;">




                <thead class="bg-info">
                    <tr id="theadRow">
                        <td class="text-center"><?php echo "N°" . '&nbsp' . "documento"; ?></td>
                        <td><?php echo "Apellidos" . '&nbsp' . "y" . '&nbsp' . "Nombres"; ?></td>
                        <td><?php echo "N°" . '&nbsp' . "Solicitud"; ?></td>
                        <td><?php echo "Aplicación" . '&nbsp' . "al" . '&nbsp' . "Cargo" . '&nbsp' . ""; ?></td>
                        <td class="text-center">Estado</td>
                        <td class="text-center">Editar</td>
                        <td class="text-center">Eliminar</td>

                    </tr>
                </thead>
                </script>
                <style type="text/css">
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
                    $result = mysqli_query($conn, "CALL sp_tablapre");

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
                                $ver[16] . "||" .
                                $ver[17] . "||" .
                                $ver[18] . "||" .
                                $ver[19] . "||" .
                                $ver[20] . "||";
                            //  session_start();
                            // $_SESSION["Id_Preseleccion"]=$ver[0];
                    ?>
                            <tr>
                                <td class="text-center"><?php echo $ver[0] ?></td>
                                <td><?php echo $ver[2] ?></td>
                                <td class="text-center"><?php echo $ver[19] ?></td>
                                <td><?php echo $ver[13] ?></td>
                                <td class="text-center" onclick="Data_Estado('<?php echo $datos; ?>')"> <?php echo $ver[15] ?> </td>
                                <td class="text-center">
                                    <button id="" class='btn btn-warning' data-toggle="modal" data-target="#predmodalac" onclick="llenarmodal('<?php echo $datos; ?>')"> <i class="fas fa-pencil-alt"></i> </button>
                                </td>
                                <td class="text-center">
                                    <button class="btn btn-danger glyphicon glyphicon-remove" onclick="preguntarSiNo('<?php echo $ver[0] ?>')"> <i class="fas fa-trash-alt"></i> </button>
                                </td>
                            </tr>
                    <?php
                        }
                    } else {
                    }
                    ?>
                </tbody>
            </table>
            <button class="btn btn-info" data-toggle="modal" data-target="#predmodal" id="New">
                Registro de aspirantes
                <span class="glyphicon glyphicon-plus"></span>
            </button>
        </div>
    </div>
    <script>
    </script>
    <!-- verificando filtro de fechas porque me quedo incompleto ya quedo solucionado -->
    <script type="text/javascript">
        $(function() {
            // Implements the dataTables plugin on the HTML table
            var $dTable = $("#tablapreseleccion").dataTable({
                dom: 'B<"float-left"i> <"float-right"f>t <"float-left"l> <"float-right"p> <"clearfix">', // abajo lftiprB   - arriba lftiprB
                //  dom: 'Bfrtip',
                buttons: [{
                    title: 'Reporte Gestión De Solicitudes',
                    extend: 'excelHtml5',
                    text: '<i class="fa fa-file-excel" aria-hidden="true"></i>',
                    className: 'btn btn-success',
                    autoFilter: true,
                    titleAttr: 'Excel',

                    exportOptions: {
                        columns: [0, 1, 2, 3, 4]
                    }
                }, ],
                select: true,
                "lengthMenu": [
                    [5, 10, -1],
                    [5, 10, "All"]
                ],
                "ordering": true,
                "info": false,
                "bStateSave": false,
                "aaSorting": [
                    [2, 'des']

                ],
                "aoColumns": [{
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
                    },
                    {
                        "mData": "col7"
                    }
                ],
                //PERSONALIZACION DE COLUMNA ESTADOS-->"COLORES"
                "columnDefs": [{   
                    "targets": [4],//Numero de columna
                    "sortable": false,
                    "render": function(data, type, full, meta) { 
                        if (data == 2) {
                            return "<div class='bg-primary color-palette' data-toggle='modal' '  data-target='#modal'>Pendiente</div> "
                            // onclick='prue()
                        }
                        if (data == 1) {
                            return "<div class='bg-success color-palette text-center'>Seleccionado</div> "
                        } else {
                            return "<div class='bg-danger color-palette text-center'>No Seleccionado</div> "
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
        });
    </script>
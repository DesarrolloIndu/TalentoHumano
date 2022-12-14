<?php
//  session_start();
require_once "../conexion.php";
// require_once "../Criptografia.php";
?>



<div class="row">
    <div class="col-md-12 ">
        <!-- colocar tabla responsiva con el buscador -->
        <div class="table-responsive">
            <table id="tablanacionalidad" class="table table-hover table-condensed  table-striped" style="width:100%;">
                <caption>
                    <button class="btn btn-info" data-toggle="modal" data-target="#nac1" id="New">
                        Agregar Nacionalidad
                        <span class="glyphicon glyphicon-plus"></span>
                    </button>
                </caption>
                <thead class="bg-info">
                    <tr id="theadRow">
                        <td>Nacionalidad</td>
                        <td>Observaciones</td>
                        <td class="text-center" style="width:1%;">Editar</td>
                        <td class="text-center" style="width:1%;">Eliminar</td>
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
                    $result = mysqli_query($conn, " SELECT * FROM nacionalidad;");

                    if (mysqli_num_rows($result) > 0) {

                        while ($ver = mysqli_fetch_row($result)) {

                            $datos = $ver[0] . "||" .
                                $ver[1] . "||" .
                                $ver[2] . "||";
                    ?>
                            <tr>
                                <td><?php echo $ver[1] ?></td>
                                <td><?php echo $ver[2] ?></td>
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
        </div>
    </div>

    <script>

    </script>
    <!-- verificando filtro de fechas porque me quedo incompleto ya quedo solucionado -->


    <!-- <script type="text/javascript">
        
        // 'use strict';  
        $.getScript("plugins/datatables/jquery.dataTables.min.js", function() {
            $('#tablapreseleccion').DataTable({
                "responsive": true,
                "searching": true,
                "paging": true,
                "lengthMenu": [
                    [5, 10, 15, -1],
                    [5, 10, 15, "All"]
                ],
                "ordering": true,
                "info": false,
                "bStateSave": false,
                "aaSorting": [
                    [0, 'asc']

                ],
                "columnDefs": [{
                    "targets": [11],
                    "sortable": false,
                    "render": function(data, type, full, meta) {

                        if (data == 2) {
                            return "<button class='bg-primary color-palette text-center'>Pendiente</button> "
                        }
                        if (data == 1) {
                            return "<div class='bg-success color-palette text-center'>Seleccionado</div> "
                        } else {
                            return "<div class='bg-danger color-palette text-center'>No Seleccionado</div> "
                        }

                    }
                }, ],
                    "ordering": true,
                    "info": false,
                    "language": {
                        "processing": "Procesando...",
                        "lengthMenu": "Mostrar _MENU_ registros",
                        "zeroRecords": "No se encontraron resultados",
                        "emptyTable": "Ning??n dato disponible en esta tabla",
                        "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                        "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                        "search": "Buscar:",
                        "infoThousands": ",",
                        "loadingRecords": "Cargando...",
                        "paginate": {
                            "first": "Primero",
                            "last": "??ltimo",
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
                            "collection": "Colecci??n",
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
                            "add": "A??adir condici??n",
                            "button": {
                                "0": "Constructor de b??squeda",
                                "_": "Constructor de b??squeda (%d)"
                            },
                            "clearAll": "Borrar todo",
                            "condition": "Condici??n",
                            "conditions": {
                                "date": {
                                    "after": "Despues",
                                    "before": "Antes",
                                    "between": "Entre",
                                    "empty": "Vac??o",
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
                                    "notEmpty": "No vac??o",
                                    "not": "Diferente de"
                                },
                                "string": {
                                    "contains": "Contiene",
                                    "empty": "Vac??o",
                                    "endsWith": "Termina en",
                                    "equals": "Igual a",
                                    "notEmpty": "No Vacio",
                                    "startsWith": "Empieza con",
                                    "not": "Diferente de"
                                },
                                "array": {
                                    "not": "Diferente de",
                                    "equals": "Igual",
                                    "empty": "Vac??o",
                                    "contains": "Contiene",
                                    "notEmpty": "No Vac??o",
                                    "without": "Sin"
                                }
                            },
                            "data": "Data",
                            "deleteTitle": "Eliminar regla de filtrado",
                            "leftTitle": "Criterios anulados",
                            "logicAnd": "Y",
                            "logicOr": "O",
                            "rightTitle": "Criterios de sangr??a",
                            "title": {
                                "0": "Constructor de b??squeda",
                                "_": "Constructor de b??squeda (%d)"
                            },
                            "value": "Valor"
                        },
                        "searchPanes": {
                            "clearMessage": "Borrar todo",
                            "collapse": {
                                "0": "Paneles de b??squeda",
                                "_": "Paneles de b??squeda (%d)"
                            },
                            "count": "{total}",
                            "countFiltered": "{shown} ({total})",
                            "emptyPanes": "Sin paneles de b??squeda",
                            "loadMessage": "Cargando paneles de b??squeda",
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
                                    "_": "??Est?? seguro que desea eliminar %d filas?",
                                    "1": "??Est?? seguro que desea eliminar 1 fila?"
                                }
                            },
                            "error": {
                                "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">M??s informaci??n&lt;\\\/a&gt;).<\/a>"
                            },
                            "multi": {
                                "title": "M??ltiples Valores",
                                "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aqu??, de lo contrario conservar??n sus valores individuales.",
                                "restore": "Deshacer Cambios",
                                "noMulti": "Este registro puede ser editado individualmente, pero no como parte de un grupo."
                            }
                        },
                        "info": "Mostrando de _START_ a _END_ de _TOTAL_ entradas"
                    },
                }

            );
        });
    </script>  -->



    <script type="text/javascript">
        $(function() {
            // Implements the dataTables plugin on the HTML table
            var $dTable = $("#tablanacionalidad").dataTable({
               // dom: 'B<"float-left"i>  <"float-left"l> ',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                "responsive": true,
                "searching": true,
                "paging": true,
                "lengthMenu": [
                    [5, 10, 15, -1],
                    [5, 10, 15, "All"]
                ],
                "ordering": true,
                "info": false,
                "bStateSave": false,
                "aaSorting": [
                    [0, 'asc']

                ],
                "aoColumns": [{
                    "mData": "col1"
                }, {
                    "mData": "col2"
                }, {
                    "mData": "col3"
                }, {
                    "mData": "col4"
                }],

                "language": {
                    "processing": "Procesando...",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    "zeroRecords": "No se encontraron resultados",
                    "emptyTable": "Ning??n dato disponible en esta tabla",
                    "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                    "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                    "search": "Buscar:",
                    "infoThousands": ",",
                    "loadingRecords": "Cargando...",
                    "paginate": {
                        "first": "Primero",
                        "last": "??ltimo",
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
                        "collection": "Colecci??n",
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
                        "add": "A??adir condici??n",
                        "button": {
                            "0": "Constructor de b??squeda",
                            "_": "Constructor de b??squeda (%d)"
                        },
                        "clearAll": "Borrar todo",
                        "condition": "Condici??n",
                        "conditions": {
                            "date": {
                                "after": "Despues",
                                "before": "Antes",
                                "between": "Entre",
                                "empty": "Vac??o",
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
                                "notEmpty": "No vac??o",
                                "not": "Diferente de"
                            },
                            "string": {
                                "contains": "Contiene",
                                "empty": "Vac??o",
                                "endsWith": "Termina en",
                                "equals": "Igual a",
                                "notEmpty": "No Vacio",
                                "startsWith": "Empieza con",
                                "not": "Diferente de"
                            },
                            "array": {
                                "not": "Diferente de",
                                "equals": "Igual",
                                "empty": "Vac??o",
                                "contains": "Contiene",
                                "notEmpty": "No Vac??o",
                                "without": "Sin"
                            }
                        },
                        "data": "Data",
                        "deleteTitle": "Eliminar regla de filtrado",
                        "leftTitle": "Criterios anulados",
                        "logicAnd": "Y",
                        "logicOr": "O",
                        "rightTitle": "Criterios de sangr??a",
                        "title": {
                            "0": "Constructor de b??squeda",
                            "_": "Constructor de b??squeda (%d)"
                        },
                        "value": "Valor"
                    },
                    "searchPanes": {
                        "clearMessage": "Borrar todo",
                        "collapse": {
                            "0": "Paneles de b??squeda",
                            "_": "Paneles de b??squeda (%d)"
                        },
                        "count": "{total}",
                        "countFiltered": "{shown} ({total})",
                        "emptyPanes": "Sin paneles de b??squeda",
                        "loadMessage": "Cargando paneles de b??squeda",
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
                                "_": "??Est?? seguro que desea eliminar %d filas?",
                                "1": "??Est?? seguro que desea eliminar 1 fila?"
                            }
                        },
                        "error": {
                            "system": "Ha ocurrido un error en el sistema (<a target=\"\\\" rel=\"\\ nofollow\" href=\"\\\">M??s informaci??n&lt;\\\/a&gt;).<\/a>"
                        },
                        "multi": {
                            "title": "M??ltiples Valores",
                            "info": "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aqu??, de lo contrario conservar??n sus valores individuales.",
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

        });
    </script>
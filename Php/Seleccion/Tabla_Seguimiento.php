<?php
//  session_start();
require_once "../conexion.php";
// require_once "../Criptografia.php";
?>
<div class="row">
    <div class="col-md-12 ">
        <!-- colocar tabla responsiva con el buscador -->
        <div class="table-responsive">
            <table id="tablaseguimiento" class="table table-hover table-condensed  table-striped" style="width:100%;">
                <thead class="bg-info">
                    <tr id="theadRow">
                        <td class="text-center"><?php echo  "Identificación"; ?></td>
                        <td class="text-center"><?php echo "Aspirante"; ?></td>
                        <td class="text-center"><?php echo "Cargo " . '&nbsp' . "Aplicado"; ?></td>
                        <td class="text-center"><?php echo "Fecha" . '&nbsp' . "de" . '&nbsp' . "Aplicación"; ?></td>
                        <td class="text-center"><?php echo "Estado " . '&nbsp' . "del" . '&nbsp' . "Proceso"; ?> </td>
                        <td class="text-center"><?php echo "Avance"; ?></td>
                        <td class="text-center"><?php echo " Porcentaje"; ?></td>
                        <td class="text-center" style="width:1%;">Editar</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    //======================================================
                    $result = mysqli_query($conn, " CALL Sp_Select_Table()");
                    if (mysqli_num_rows($result) > 0) {
                        while ($ver = mysqli_fetch_row($result)) {
                            $datos = $ver[0] . "||" .
                                $ver[1] . "||" .
                                $ver[2] . "||" .
                                $ver[3] . "||" .
                                $ver[4] . "||" .
                                $ver[5] . "||";
                    ?>
                            <tr>
                                <td class="text-center"><?php echo $ver[0] ?></td>
                                <td class="text-center"><?php echo $ver[1] ?></td>
                                <td class="text-center"><?php echo $ver[2] ?></td>
                                <td class="text-center"><?php echo $ver[4] ?></td>
                                <td class="text-center"><?php echo $ver[3] ?></td>
                                <td class="text-center"><?php echo $ver[5] ?></td>
                                <td class="text-center"><?php echo $ver[5] ?>%</td>
                                <td class="text-center">
                                    <button id="" class='btn btn-warning' data-toggle="modal" data-target="#predmodalac_" onclick="llenarmodal('<?php echo $datos; ?>')"> <i class="fa fa-address-card"></i> </button>
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
    <script type="text/javascript">
        // 'use strict';  
        $.getScript("plugins/datatables/jquery.dataTables.min.js", function() {
            $('#tablaseguimiento').DataTable({
                    "responsive": true,
                    "searching": true,
                    "paging": true,
                    "lengthMenu": [
                        [5, 10, -1],
                        [5, 10, "All"]
                    ],
                    "ordering": true,
                    "info": false,
                    "bStateSave": false,
                    "aaSorting": [
                        [3, 'des']

                    ],
                    "columnDefs": [{
                            "targets": [4],
                            "sortable": false,
                            "render": function(data, type, full, meta) {
                                if (data == 1) {
                                    return "<div class='bg-info color-palette text-center'> En Proceso</div> "
                                }
                                if (data == 2) {
                                    return "<div class='bg-success color-palette text-center'> Aprobado</div> "
                                }
                                if (data == 3) {
                                    return "<div class='bg-danger color-palette text-center'> No Aprobado </div> "
                                }
                                if (data == 4) {
                                    return "<div class='bg-warning color-palette text-center'> Cancelado</div> "
                                }
                            }
                        },
                        {
                            "targets": [5],
                            "sortable": false,
                            "render": function(data, type, full, meta) {
                                return type === 'display' ?
                                    '<progress value="' + data + '" max="100"> .10%.  </progress>' :
                                    data;
                            },
                        },

                    ],
                    "ordering": true,
                    "info": false,
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
                    },
                }

            );
        });
    </script>
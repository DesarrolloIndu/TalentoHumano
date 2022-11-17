var Estado = 0;
var Tipo = 0;
var Contenido = 0;
var Validador = 0;

//================================================================================================= Eventos   
$(document).ready(function () {

});

function Vertabla() {
    $('#tablagestion').load('Php/gestion/tablagestion.php');
};
//======================================================================================Funciones

function guardargestion() {
    var datos = $('#contactogestion').serialize()

    $.ajax({
        type: "POST",
        url: "Php/gestion/creargestion.php",
        cache: false,
        data: datos,
        success: function (r) {
            if (r == 1) {
                alertify.success("Gestion Agregado Exitosamente");
                $('#cargomodal').modal('hide')
                $('#tablagestion').load('Php/gestion/tablagestion.php');
            } else {
                alertify.Error("Error al Crear el Gestion");
            }
        },
    });
    return false;
}



function llenarmodal(datos) {
    d = datos.split('||');
    $("#id").val(d[0]);
    $("#descripcion1").val(d[1]);
    $("#director1").val(d[2]);
    $("#observaciones1").val(d[3]);
}


function actualizargestion() {
    var datos = $("#actualizargestion").serialize();
    $.ajax({
        type: "POST",
        url: "Php/gestion/actualizargestion.php",
        data: datos,
        success: function (e) {
            if (e == 1) {
                alertify.success("Gestion Actualizada Exitosamente");
                $('#modalEdicion').modal('hide')
                $('#tablagestion').load('Php/gestion/tablagestion.php');
            } else {
                alert("Error al actualizar la gestion");
            }
        },
    });
    return false;
}

function actualizarcargo() {
    descripcion1 = document.getElementById("descripcion1").value;
    responsable1 = document.getElementById("director1").value;
    observaciones1 = document.getElementById("observaciones1").value;
    if (descripcion1 == "" || responsable1 == "" || observaciones1 == "") {
        // var Contenido = 0;
        alertify.alert('Talento Humano', "No Ingresaste Todos Los Datos.Todos los campos son Necesarios.");
    } else {
        //alertify.alert("campos llenos"+cargo+gestion+responsable+observaciones);
        actualizargestion();
        Limpiar();
    }
}

//===================================================================================== Eliminar Usuarios
function preguntarSiNo(id) {
    alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?',
        function () { eliminargestion(id) }
        , function () { alertify.error('Se cancelo') });
}


//======================================================================================

function eliminargestion(id) {
    cadena = "id=" + id;
    $.ajax({
        type: "POST",
        url: "Php/gestion/eliminargestion.php",
        data: cadena,
        success: function (r) {
            if (r == 1) {
                alertify.success("Gestion Eliminada Exitosamente");
                $('#tablagestion').load('Php/gestion/tablagestion.php');
            } else {
                alertify.error("Fallo el servidor ");
            }
        }
    });
}

//======================================================================================




//insertar cargo validando el formulario

function nuevagestion() {
    descripcion = document.getElementById("descripcion").value;
    responsable = document.getElementById("director").value;
    observaciones = document.getElementById("observaciones").value;
    if (descripcion == "" || responsable == "" || observaciones == "") {
        // var Contenido = 0;
        alertify.alert('Talento Humano', "No Ingresaste Todos Los Datos.Todos los campos son Necesarios.");
    } else {
        //alertify.alert("campos llenos"+cargo+gestion+responsable+observaciones);
        guardargestion();
        Limpiar();
    }
}
function Limpiar() {
    $('input[type="text"]').val('');
};






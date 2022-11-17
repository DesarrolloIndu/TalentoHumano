var Estado = 0;
var Tipo = 0;
var Contenido = 0;
var Validador = 0;

//================================================================================================= Eventos   
$(document).ready(function () {

});

function Vertabla() {
    $('#tabla_areas').load('Php/areas/tabla_areas.php');
};
//======================================================================================Funciones

function guardararea() {
    var datos = $('#contactoarea').serialize()

    $.ajax({
        type: "POST",
        url: "Php/areas/creararea.php",
        cache: false,
        data: datos,
        success: function (r) {
            if (r == 1) {
                alertify.success("Área Agregada Exitosamente");
                $('#areamodal').modal('hide')
                $('#tabla_areas').load('Php/areas/tabla_areas.php');
            } else {
                alertify.Error("Error al Crear la Área");
            }
        },
    });
    return false;
}



function llenarmodal(datos) {
    d = datos.split('||');
    $("#id").val(d[0]);
    $("#gestion").val(d[1]);
    $("#area1").val(d[2]);
    $("#director1").val(d[3]);
    $("#observaciones1").val(d[4]);
    $("#corr1").val(d[5]);
}


function actualizar() {
    var datos = $("#actualizar").serialize();
    $.ajax({
        type: "POST",
        url: "Php/areas/actualizararea.php",
        data: datos,
        success: function (e) {
            if (e == 1) {
                alertify.success("Área Actualizada Exitosamente");
                $('#modalEdicion').modal('hide')
                $('#tabla_areas').load('Php/areas/tabla_areas.php');
            } else {
                alert("Error al actualizar el area");
            }
        },
    });
    return false;
}

function actualizararea() {
    gestion1 = document.getElementById("gestion").value;
    area1 = document.getElementById("area1").value;
    director1 = document.getElementById("director1").value;
    observaciones1 = document.getElementById("observaciones1").value;
    if (area1 == "" || director1 == "" || observaciones1 == "") {
        // var Contenido = 0;
        alertify.alert('Talento Humano', "No Ingresaste Todos Los Datos.Todos los campos son Necesarios.");
    } else {
        //alertify.alert("campos llenos"+cargo+gestion+responsable+observaciones);
        actualizar();
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
        url: "Php/areas/eliminararea.php",
        data: cadena,
        success: function (r) {
            if (r == 1) {
                alertify.success("Área Eliminada Exitosamente");
                $('#tabla_areas').load('Php/areas/tabla_areas.php');
            } else {
                alertify.error("Fallo el servidor ");
            }
        }
    });
}

//======================================================================================




//insertar cargo validando el formulario

function nuevaarea() {
    var e = document.getElementById("Cmb_Gestion");
    var select = e.options[e.selectedIndex].value;
    area = document.getElementById("area").value;
    director = document.getElementById("director").value;
    if (select == "" || area == "" || director == "") {
        // var Contenido = 0;
        alertify.alert('Talento Humano', "No Ingresaste Todos Los Datos.Todos los campos son Necesarios.");
    } else {
        //alertify.alert("campos llenos"+cargo+gestion+responsable+observaciones);
        guardararea();
        Limpiar();
    }
}
function Limpiar() {
    $('input[type="text"]').val('');
};




/*

function CrearTabladeDatos(){
    // recorremos todos los valores del radio button para encontrar el seleccionado
    var memo=document.getElementsByName('Dato_Fil');
    for(i=0; i<memo.length; i++){
        if(memo[i].checked){
            var memory=memo[i].checked;
            alert(memory);
        }
        if(memory==true){
            Dato_Fil="16GB";
        }
        if(memory==true){
            Dato_Fil="32GB";
        }
        if(memory==true){
            Dato_Fil="64GB";
        }
    }
}


var seleccion = document.querySelector('input[name=Dato_Fil:checked').value;
alert(seleccion);

*/
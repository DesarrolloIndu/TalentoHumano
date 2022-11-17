var Estado = 0;
var Tipo = 0;
var Contenido = 0;
var Validador = 0;

//================================================================================================= Eventos
$(document).ready(function () {});

function Vertabla() {
  $("#tablacargo").load("Php/Cargos/tablacargo.php");
}    


//======================================================================================Funciones


function guardar() {
  var datos = $("#contactForm").serialize();

  $.ajax({
    type: "POST",
    url: "Php/Cargos/crear_cargo.php", 
    cache: false,
    data: datos,
    success: function (r) {
      if (r == 1) {
        alertify.success("Cargo Agregado Exitosamente");
        $("#cargomodal").modal("hide");
        $("#tablacargo").load("Php/Cargos/tablacargo.php");
      } else {
        alertify.error("Error al Crear el cargo");
      }
    },
  });
  return false;
}


function llenarmodal(datos) {
  d = datos.split("||");
  $("#id1").val(d[0]);
  $("#cargo1").val(d[1]);
  $("#gestion1").val(d[2]);
  $("#area1").val(d[3]);
  $("#escolaridad1").val(d[4]);
  $("#formacion1").val(d[5]);
  $("#experiencia1").val(d[6]);
  $("#observaciones1").val(d[7]);
  $("#s1").val(d[9]);
  $("#horario1").val(d[8]);
  $("#d1").val(d[10]);
}

function actualizar() {
  var datos = $("#actualizar").serialize();
  $.ajax({
    type: "POST",
    url: "Php/Cargos/actualizar_cargo.php",
    data: datos,
    success: function (e) {
      if (e == 1) {
        alertify.success("Cargo Actualizado Exitosamente");
        $("#modalEdicion").modal("hide");
        $("#tablacargo").load("Php/Cargos/tablacargo.php");
      } else {
        alertify.error("Error al actualizar el cargo");
      }
    },
  });
  return false;
} 

function actualizarcargo() {
  cargo1 = document.getElementById("cargo1").value;
  gestion1 = document.getElementById("gestion1").value;
  responsable1 = document.getElementById("area1").value;
  observaciones1 = document.getElementById("observaciones1").value;
  if (
    cargo1 == "" ||
    responsable1 == "" ||
    observaciones1 == ""
  ) {
    // var Contenido = 0;
    alertify.alert(
      "Talento Humano",
      "No Ingresaste Todos Los Datos.Todos los campos son Necesarios."
    );
  } else {
    //alertify.alert("campos llenos"+cargo+gestion+responsable+observaciones);
    actualizar();
    Limpiar();
  }
}


//===================================================================================== Eliminar Usuarios
function preguntarSiNo(id) {
  alertify.confirm(
    "Eliminar Datos",
    "¿Esta seguro de eliminar este registro?",
    function () {
      eliminarDatos(id);
    },
    function () {
      alertify.error("Se cancelo");
    }
  );
}

//======================================================================================

function eliminarDatos(id) {
  cadena = "id1=" + id;
  $.ajax({
    type: "POST",
    url: "Php/Cargos/eliminarcargo.php",
    data: cadena,
    success: function (r) {
      if (r == 1) {
        alertify.success("Cargo Eliminado Exitosamente");
        $("#tablacargo").load("Php/Cargos/tablacargo.php");
      } else {
        alertify.error("Fallo el servidor ");
      }
    },
  });
}

//======================================================================================

//insertar cargo validando el formulario

function nuevocargo() {
  cargo = document.getElementById("cargo").value;
  observaciones = document.getElementById("observaciones").value;
  if (
    cargo == "" 
  ) {
    // var Contenido = 0;
    alertify.alert(
      "Talento Humano",
      "No Ingresaste Todos Los Datos.Todos los campos son Necesarios."
    );
  } else { 
    guardar();
    Limpiar();
  }
}

function Limpiar() {
  $('input[type="text"]').val("");
}



//llenar input con lista desplegable
// function valor() {
//   var e = document.getElementById("Cmb_Gestion");
//   var strUser = e.options[e.selectedIndex].value;
//   $.ajax({
//     data: { Peticion: strUser },
//     type: "post",
//     url: "Php/Cargos/select_Areas.php",
//     beforeSend: function () {
//      // alert(strUser);

//     },
//     success: function (resultado) {
//   // alert("Dato 1"+ " "+ resultado.split("|")[0]);
//    //  $("#area").val(resultado.split("|")[1]);
//     //  $("#responsable").val(resultado.split("|")[2]);
//     //  $("#observaciones").val(resultado.split("|")[2]);
//     alert(resultado);

//     },
//   });
// }
 




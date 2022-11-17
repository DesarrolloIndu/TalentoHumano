var Estado = 0;
var Tipo = 0;
var Contenido = 0;
var Validador = 0;

//================================================================================================= Eventos   

/*

function obtenerfechas() {
 fecha1 = document.getElementById("start_date").value;
 fecha2 = document.getElementById("end_date").value;
 alert("fecha 1 :" + fecha1 + " fecha 2 :" + fecha2);
}
*/
function Vertabla() {
  $('#mostrartabla').load('Php/escolaridad/tabla.php');
  
};
/*
  function definitiva(){
    fecha1 = document.getElementById("start_date").value;
    fecha2 = document.getElementById("end_date").value;
    if (fecha1=="" || fecha2 =="") {
      alert("variables vacias");
    }else{
      cargartablas()
      Limpiar();
    }

  }

  function cargartablas(){
    $('#tablasol').load('Php/Solicitudes/filtro.php');   
  }


*/
//======================================================================================Funciones
function prue(data) {
  d = data.split('||');
  $("#id").val(d[0]);
  $("#nom").val(d[2]);
  $("#sol").val(d[16]);
  $("#em").val(d[9]);
}

function guardar() {
  var datos = $('#crear').serialize()

  $.ajax({
    type: "POST",
    url: "Php/escolaridad/crear.php",
    cache: false,
    data: datos,
    success: function (r) {
      if (r == 1) {
        alertify.success("Escolaridad Agregada Exitosamente");
        $('#escolaridad').modal('hide')
        $('#mostrartabla').load('Php/escolaridad/tabla.php');
      } else {
        alertify.error("Error al registrar escolaridad");
      }
    },
  });
  return false;
}



function llenarmodal(data) {
  d = data.split('||');
  $("#ID").val(d[0]);
  $("#escolari").val(d[1]);
  $("#observ").val(d[2]);  
}
function actualizar_es() {
 escolaridad = document.getElementById("escolari").value;
  if (  escolaridad  == "") {
    // var Contenido = 0;
    alertify.alert('Talento Humano', "No Ingresaste Todos Los Datos.Todos los campos son Necesarios.");
  } else {
    //alertify.alert("campos llenos"+cargo+gestion+responsable+observaciones);
    actualizar();
    Limpiar();
  }
}


function actualizar() {
  var data = $("#formunac").serialize();
  $.ajax({
    type: "POST",
    url: "Php/escolaridad/actualizar.php",
    data: data,
    success: function (e) {
      if (e == 1) {
        alertify.success("Escolaridad Actualizada Exitosamente");
        $('#escolaridad').modal('hide')
        $('#mostrartabla').load('Php/escolaridad/tabla.php');
      } else {
        alert("Error al actualizar");
      }
    },
  });
  return false;
}



//===================================================================================== Eliminar Usuarios
function preguntarSiNo(id) {
  alertify.confirm('Eliminar Datos', '¿Esta seguro de eliminar este registro?',
    function () { eliminarDatos(id) }
    , function () { alertify.error('Se cancelo') });
}


//======================================================================================

function eliminarDatos(id) {
  cadena = "ID=" + id;
  $.ajax({
    type: "POST",
    url: "Php/escolaridad/eliminar.php",
    data: cadena,
    success: function (r) {
      if (r == 1) {
        alertify.success("Escolaridad eliminada Exitosamente");
        $('#mostrartabla').load('Php/escolaridad/tabla.php');
      } else {
        alertify.error("Fallo el servidor ");
      }
    }
  });
}

//======================================================================================







function nuevoes() {
 esc = document.getElementById("esc").value;
  if (esc == "") {
      Swal.fire({
      icon: 'info',
      title: 'Ingresa todos los datos',
      showConfirmButton: false,
      timer: 1500,
    
    })
  } else {
    //alertify.alert("campos llenos"+cargo+gestion+responsable+observaciones);
    guardar();
    Limpiar();
  }
}
function Limpiar() {
  $('input[type="text"]').val('');
};





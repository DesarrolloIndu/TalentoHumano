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
  $("#tablaprueba").load("Php/Solicitudes/prueba.php");
}
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

function guardar() {
  var datos = $("#formulariosol").serialize();

  $.ajax({
    type: "POST",
    url: "Php/solicitudes/crear_solicitud.php",
    cache: false,
    data: datos,
    success: function (r) {
      if (r == 1) {
        Swal.fire({
          showClass: {
            popup: "animate__animated animate__fadeInDown",
          },
          hideClass: {
            popup: "animate__animated animate__fadeOutUp",
          },
          icon: "success",
          title: "Solicitud resgistrada correctamente",
          showConfirmButton: false,
          //timer: 3000,
        });
        $("#solicitudmodal").modal("hide");
        $("#tablaprueba").load("Php/solicitudes/prueba.php");
        $("#solicitudmodal").find("select").val("0");
        $("#solicitudmodal").find("input,textarea").val("");
      } else {
        Swal.fire({
          showClass: {
            popup: "animate__animated animate__fadeInDown",
          },
          hideClass: {
            popup: "animate__animated animate__fadeOutUp",
          },
          icon: "error",
          title:
            "Error al crear solicitud",
          showConfirmButton: false,
          //timer: 5000,
        });
        $("#solicitudmodal").modal("hide");
        $("#solicitudmodal").find("select").val("0");
        $("#solicitudmodal").find("input,textarea").val("");
      }
    },
  });
  return false;
}

function llenarmodal(data) {
  try {
  d = data.split("||");
  $("#registro1").val(d[0]);
  $("#fechasol1").val(d[3]);
  var Dato_cargo = d[1];
  $("#cargo1").val(Dato_cargo);
  $("#cantidad1").val(d[7]);
  $("#salario1").val(d[8]);
  $("#fechap1").val(d[9]);
  $("#link1").val(d[10]);
  $("#fechal1").val(d[4]);
  $("#observaciones1").val(d[12]);
  //alert(d[14]);
  }
  catch(err) {
    alert(err.message);
  }
  var Validar = d[6];
  if (Validar == 0) {
    $("#registro1").prop("disabled", false);
    $("#fechasol1").prop("disabled", false);
    $("#cargo1").prop("disabled", false);
    $("#cantidad1").prop("disabled", false);
    $("#salario1").prop("disabled", false);
    $("#fechap1").prop("disabled", false);
    $("#link1").prop("disabled", false);
    $("#fechal1").prop("disabled", false);
    $("#observaciones1").prop("disabled", false);
    $("#Btn_Actualizar").prop("disabled", false);
  } else {
    $("#registro1").prop("disabled", true);
    $("#fechasol1").prop("disabled", true);
    $("#cargo1").prop("disabled", true);
    $("#cantidad1").prop("disabled", true);
    $("#salario1").prop("disabled", true);
    $("#fechap1").prop("disabled", true);
    $("#link1").prop("disabled", true);
    $("#fechal1").prop("disabled", true);
    $("#observaciones1").prop("disabled", true);
    $("#Btn_Actualizar").prop("disabled", true);
  }
}

function prueba() {
  

  
  alert("hola");
}

function informe(data) {
  try {
    
    d = data.split("||");
    var kawak=d[0];
    var titulo = d[15];
    var carg = d[2];
    var fp = d[9];
    var fc = d[11];
    var fc_est="Cerrada";
    var obser = d[12];
    if(fc== ""){
      document.getElementById("cuerpo4").innerHTML = "Solicitud Abierta " ; 
    }else{
       document.getElementById("cuerpo4").innerHTML = "Fecha de cierre: " + fc;
    }
    var sal = d[8];
    var can = d[7];
    var con = d[13];
    var sol = d[3];
    document.getElementById("titulo").innerHTML ="Número de solicitud " + titulo;
    document.getElementById("kawak").innerHTML = "Numero de registro Kawak: " + kawak;
    document.getElementById("cuerpo2").innerHTML = "Cargo Aplicado: " + carg;
    document.getElementById("cuerpo3").innerHTML = "Fecha De Publicación: " + fp;
    document.getElementById("cuerpo6").innerHTML = "Cantidad De Personal Requerido: " + can;
    document.getElementById("cuerpo7").innerHTML = "Contratados: " + con;
    document.getElementById("cuerpo8").innerHTML = "Fecha de Solicitud: " + sol; 
   document.getElementById("cuerpo1").innerHTML = "Observaciones: " + obser;
  }
  catch(err) {
    alert(err.message);
  }



 
}

function actualizar() {
  var data = $("#actualizarsolicitud").serialize();
  $.ajax({
    type: "POST",
    url: "Php/Solicitudes/actualizar_sol.php",
    data: data,
    success: function (e) {
      if (e == 1) {
        Swal.fire({
          showClass: {
            popup: "animate__animated animate__fadeInDown",
          },
          hideClass: {
            popup: "animate__animated animate__fadeOutUp",
          },
          icon: "success",
          title: "Registro Actualizado correctamente",
          showConfirmButton: false,
          // timer: 3000,
        });
        $("#solicitudactualizar").modal("hide");
        $("#tablaprueba").load("Php/solicitudes/prueba.php");
      } else {
        // alert("Error al actualizar el cargo");
        Swal.fire({
          showClass: {
            popup: "animate__animated animate__fadeInDown",
          },
          hideClass: {
            popup: "animate__animated animate__fadeOutUp",
          },
          icon: "error",
          title: "Oops...",
          text: "Algo salio Mal!",
          // confirmButtonColor: "#1D8FE9",
          showConfirmButton: false,
          // footer: '<a href="">Why do I have this issue?</a>'
        });
      }
    },
  });
  return false;
}

function actualizar_solicitud() {
  fsolicitud1 = document.getElementById("fechasol1").value;
  cantidad1 = document.getElementById("cantidad1").value;
  salario1 = document.getElementById("salario1").value;
  fechap1 = document.getElementById("fechap1").value;
  flimite1 = document.getElementById("fechal1").value;
  if (
    fsolicitud1 == "" ||
    cantidad1 == "" ||
    salario1 == "" ||
    fechap1 == "" ||
    flimite1 == ""
  ) {
    // var Contenido = 0;
    Swal.fire({
      showClass: {
        popup: "animate__animated animate__fadeInDown",
      },
      hideClass: {
        popup: "animate__animated animate__fadeOutUp",
      },
      icon: "info",
      title: "No ingresaste todos los datos",
      showConfirmButton: false,
      // timer: 3000,
    });
  } else {
    //alertify.alert("campos llenos"+cargo+gestion+responsable+observaciones);
    actualizar();
    Limpiar();
  }
}

//===================================================================================== Eliminar Usuarios
function preguntarSiNo(id) {
  Swal.fire({
    showClass: {
      popup: "animate__animated animate__fadeInDown",
    },
    hideClass: {
      popup: "animate__animated animate__fadeOutUp",
    },
    title: "¿Esta seguro de eliminar este registro?",
    showDenyButton: true,
    showCancelButton: true,
    //cancelButtonColor: '#1D8FE9',
    cancelButtonText: "Cancelar",
    confirmButtonText: "Eliminar ",
    confirmButtonColor: "#5DBD55",
    denyButtonText: `No Eliminar`,
    denyButtonColor: "#1D8FE9",
  }).then((result) => {
    /* Read more about isConfirmed, isDenied below */
    if (result.isConfirmed) {
      eliminarDatos(id);
      Swal.fire({
        showClass: {
          popup: "animate__animated animate__fadeInDown",
        },
        hideClass: {
          popup: "animate__animated animate__fadeOutUp",
        },
        icon: "success",
        title: "Registro eliminado Correctamente",
        showConfirmButton: false,
      });
    } else if (result.isDenied) {
      Swal.fire({
        showClass: {
          popup: "animate__animated animate__fadeInDown",
        },
        hideClass: {
          popup: "animate__animated animate__fadeOutUp",
        },
        icon: "error",
        title: "Oops...",
        showConfirmButton: false,
        text: "Operación Cancelada por el Usuario.!",
      });
    }
  });
}

//======================================================================================

function eliminarDatos(id) {
  cadena = "registro=" + id;
  $.ajax({
    type: "POST",
    url: "Php/Solicitudes/eliminarsol.php",
    data: cadena,
    success: function (r) {
      if (r == 1) {
        Swal.fire({
          icon: "success",
          title: "Registro eliminado correctamente",
          showConfirmButton: false,
          // timer: 3000,
          showClass: {
            popup: "animate__animated animate__fadeInDown",
          },
          hideClass: {
            popup: "animate__animated animate__fadeOutUp",
          },
        });
        $("#tablaprueba").load("Php/solicitudes/prueba.php");
      } else {
        Swal.fire({
          showClass: {
            popup: "animate__animated animate__fadeInDown",
          },
          hideClass: {
            popup: "animate__animated animate__fadeOutUp",
          },
          icon: "error",
          title: "Oops...",
          text: "No se puede eliminar este registro!",
          confirmButtonColor: "#1D8FE9",
          // footer: '<a href="">Why do I have this issue?</a>'
        });
      }
    },
  });
}

//======================================================================================

//insertar cargo validando el formulario

function nuevasolocitud() {
  fsolicitud = document.getElementById("fechasol").value;
  cantidad = document.getElementById("cantidad").value;
  salario = document.getElementById("salario").value;
  fechap = document.getElementById("fechap").value;
  flimite = document.getElementById("fechal").value;
  if (
    fsolicitud == "" ||
    cantidad == "" ||
    salario == "" ||
    fechap == "" ||
    flimite == ""
  ) {
    Swal.fire({
      showClass: {
        popup: "animate__animated animate__fadeInDown",
      },
      hideClass: {
        popup: "animate__animated animate__fadeOutUp",
      },
      icon: "info",
      title: "No ingresaste todos los datos",
      showConfirmButton: false,
      // timer: 3000,
    });
  } else {
    //alertify.alert("campos llenos"+cargo+gestion+responsable+observaciones);
    guardar();
    Limpiar();
  }
}
function Limpiar() {
  $('input[type="text"]').val("");
}

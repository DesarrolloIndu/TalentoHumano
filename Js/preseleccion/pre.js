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
  $("#mostrartablare").load("Php/preseleccion/tablapre.php");
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

// FUNCION CREAR PRESELECCION
function guardar() {
  var datos = $("#formulariopre").serialize();

  $.ajax({
    type: "POST",
    url: "Php/preseleccion/crear_seleccion.php",
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
          title: "Postulación resgistrada correctamente",
          showConfirmButton: false,
          //timer: 3000,
        });
        $("#predmodal").modal("hide");
        $("#predmodal").find("select").val("0");
        $("#predmodal").find("input,textarea").val("");
        $("#mostrartablare").load("Php/preseleccion/tablapre.php");
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
            "Error al Registrar Hoja de Vida. </br> Usuario registrado anteriormente",
          showConfirmButton: false,
          //timer: 5000,
        });
        $("#predmodal").modal("hide");
        $("#predmodal").find("select").val("0");
        $("#predmodal").find("input,textarea").val("");
      }
    },
  });
  return false;
}

function limpiarmodal() {
  $('input[type="text"]').val("");
  $("select").val("0");
}

//   $('#predmodal').modal('hide', function ggg () {
//     $('input[type="text"]').val('');
// });

function llenarmodal(data) {
  d = data.split("||");
  $("#documento1").val(d[0]);
  var Dato_tipo = d[1];
  $("#tipo1").val(Dato_tipo);
  $("#nombre1").val(d[2]);
  var Dato_nac = d[17];
  $("#nacionalidad2").val(Dato_nac);
  $("#ocupacion1").val(d[4]);
  var Dato_es = d[18];
  $("#escolaridad1").val(Dato_es);
  var Dato_car = d[19];
  $("#cargoo").val(Dato_car);
  $("#ciudad1").val(d[6]);
  $("#direccion1").val(d[7]);
  $("#email1").val(d[9]);
  $("#tel1").val(d[8]);
  $("#txt_Estado_").val(d[15]);
  $("#txt_Solicitud").val(d[19]);
}
function actualizar_pre() {
  tipo = document.getElementById("tipo1").value;
  nombre = document.getElementById("nombre1").value;
  nacionalidad = document.getElementById("nacionalidad2").value;
  ocupacion = document.getElementById("ocupacion1").value;
  escolaridad = document.getElementById("escolaridad1").value;
  cargo = document.getElementById("cargoo").value;
  ciudad = document.getElementById("ciudad1").value;
  direccion = document.getElementById("direccion1").value;
  email = document.getElementById("email1").value;
  tel = document.getElementById("tel1").value;
  if (
    tipo == "" ||
    nombre == "" ||
    nacionalidad == "" ||
    ocupacion == "" ||
    escolaridad == "" ||
    cargo == "" ||
    ciudad == "" ||
    direccion == "" ||
    email == "" ||
    tel == ""
  ) {
    // var Contenido = 0;
    Swal.fire({
      showClass: {
        popup: "animate__animated animate__fadeInDown",
        timer: 1500,
      },
      hideClass: {
        popup: "animate__animated animate__fadeOutUp",
        timer: 1500,
      },
      icon: "warning",
      title: "No ingresaste todos los datos",
      showConfirmButton: false,
      timer: 1500,
      // timer: 3000,
    });
  } else {
    //alertify.alert("campos llenos"+cargo+gestion+responsable+observaciones);
    actualizar();
    Limpiar();
  }
}

function actualizar() {
  var data = $("#formularioactualizar").serialize();
  $.ajax({
    type: "POST",
    url: "Php/preseleccion/editarpre.php",
    data: data,
    success: function (e) {
      if (e == 1) {
        //alertify.success("Actualizado Exitosamente");

        Swal.fire({
          showClass: {
            popup: "animate__animated animate__fadeInDown",
            timer: 1500,
          },
          hideClass: {
            popup: "animate__animated animate__fadeOutUp",
            timer: 1500,
          },
          icon: "success",
          title: "Registro Actualizado correctamente",
          showConfirmButton: false,
          timer: 1500,
          // timer: 3000,
        });
        $("#predmodalac").modal("hide");
        $("#mostrartablare").load("Php/preseleccion/tablapre.php");
      } else {
        // alert("Error al actualizar");
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
  cadena = "documento=" + id;
  $.ajax({
    type: "POST",
    url: "Php/preseleccion/eliminarpre.php",
    data: cadena,
    success: function (r) {
      if (r == 1) {
        // alertify.success("Postulación Eliminada Exitosamente");

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

        $("#mostrartablare").load("Php/preseleccion/tablapre.php");
      } else {
        // alertify.error("Fallo el servidor ");
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
          confirmButtonColor: "#1D8FE9",
          // footer: '<a href="">Why do I have this issue?</a>'
        });
      }
    },
  });
}

//======================================================================================

//insertar cargo validando el formulario

function nuevopre() {
  documento = document.getElementById("documento").value;
  tipo = document.getElementById("tipo").value;
  nombre = document.getElementById("nombre").value;
  nacionalidad = document.getElementById("nacionalidad").value;
  ocupacion = document.getElementById("ocupacion").value;
  escolaridad = document.getElementById("escolaridad").value;
  ciudad = document.getElementById("ciudad").value;
  direccion = document.getElementById("direccion").value;
  telefono = document.getElementById("tel").value;
  email = document.getElementById("email").value;
  cargo = document.getElementById("cargo").value;
  if (
    documento == "" ||
    tipo == "" ||
    nombre == "" ||
    nacionalidad == "" ||
    ocupacion == "" ||
    escolaridad == "" ||
    ciudad == "" ||
    direccion == "" ||
    telefono == "" ||
    email == "" ||
    cargo == ""
  ) {
    // var Contenido = 0;
    Swal.fire({
      icon: "info",
      title: "Ingresa todos los datos",
      showConfirmButton: false,
      //timer: 1500,
      showClass: {
        popup: "animate__animated animate__fadeInDown",
      },
      hideClass: {
        popup: "animate__animated animate__fadeOutUp",
      },
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

//  RECIBIR DATOS DE DATATABLE  FUNCION  APLICAR ESTADO
function Data_Estado(Paquete) {
  d = Paquete.split("||");
  var Id_ = d[0];
  var Name_ = d[2];
  var Solicitud_ = d[19];
  var Email_ = d[9];
  var Estado = d[15];
  var SendMail = 0;
  var ValAplica = 0;

  //Validar Estado si es: Pendiente ejecuta Funcion
  if (Estado == 2) {
    //Script
    (async () => {
      const inputOptions = new Promise((resolve) => {
        setTimeout(() => {
          resolve({
            1: "Si Aplica",
            0: "No aplica",
          });
        }, 0);
      });
      const { value: Respuesta } = await Swal.fire({
        showClass: {
          popup: "animate__animated animate__fadeInDown",
        },
        hideClass: {
          popup: "animate__animated animate__fadeOutUp",
        },
        title: "Aplicación al Cargo",
        input: "radio",
        confirmButtonText: "Guardar Cambios ",
        confirmButtonColor: "#1D8FE9",
        showCancelButton: true,
        cancelButtonText: "Cancelar",
        inputOptions: inputOptions,
        inputValidator: (value) => {
          if (!value) {
            return "Tienes que elegir una Opción!";
          }
        },
      });
      //Validar Aplicacion al cargo
      if (Respuesta) {
        //alert (" Si o No "+ Respuesta);
        //actualizarestado(color, Id_, Name_, Solicitud_, Email_);
        if (Respuesta == 1) {
          //Validador envio correo si aplica............................
          const { value: accept } = await Swal.fire({
            title: "Enviar Correo...",
            input: "checkbox",
            inputValue: 1,
            inputPlaceholder: "Se enviara notificación via correo electronico.",
            confirmButtonText: 'Continue <i class="fa fa-envelope"></i>',
            confirmButtonColor: "#1D8FE9",
            inputValidator: (result) => {
              // alert("no se envia correo........");
            },
          });
          if (accept) {
            // alert("Aplica , se envia correo....."  );
            ValAplica = 1;
            SendMail = 1;
            Aplicar_Send(Id_, Solicitud_, ValAplica, SendMail,Solicitud_);
            //Enviar_Correo(Respuesta, Id_, Name_, Solicitud_, Email_);
          } else {
            // alert("Aplica , NO  se envia correo....." );
            ValAplica = 1;
            SendMail = 0;
            Aplicar_Send(Id_, Solicitud_, ValAplica, SendMail,Solicitud_);
          }
          //Fin validador envio correo............................
          // SI APLICA AL CARGO
          Swal.fire({
            showClass: {
              popup: "animate__animated animate__fadeInDown",
            },
            hideClass: {
              popup: "animate__animated animate__fadeOutUp",
            },
            icon: "success",
            title: "Aplicacion al cargo </br> Ejecutada Correctamente",
            showConfirmButton: false,
            timer: 3000,
          });
        } else {
          //Validador envio correo si No aplica............................
          const { value: accept } = await Swal.fire({
            title: "Enviar Correo...",
            input: "checkbox",
            inputValue: 1,
            inputPlaceholder: "Se enviara notificación via correo electronico.",
            confirmButtonText: 'Continue <i class="fa fa-envelope"></i>',
            confirmButtonColor: "#1D8FE9",
            timer: 3000,
            inputValidator: (result) => {
              //alert("no se envia correo........");
            },
          });
          if (accept) {
            //alert("NO Aplica,  Hay que enviar correo........" );
            ValAplica = 0;
            SendMail = 1;
            Aplicar_Send(Id_, Solicitud_, ValAplica, SendMail,Solicitud_);
          } else {
            // alert("NO Aplica, No hay que enviar correo........");
            ValAplica = 0;
            SendMail = 0;
            Aplicar_Send(Id_, Solicitud_, ValAplica, SendMail,Solicitud_);
          }
          //Fin validador envio correo............................
          //NO APLICA AL CARGO
          Swal.fire({
            showClass: {
              popup: "animate__animated animate__fadeInDown",
            },
            hideClass: {
              popup: "animate__animated animate__fadeOutUp",
            },
            icon: "error",
            title: "El aspirante no continua </br> activo en el proceso",
            showConfirmButton: false,
            timer: 3000,
            // footer: '<a href="">Why do I have this issue?</a>'
          });
        }
      }
    })();
  }
}

// FUNCION AJAX  APLICACION A CARGO y envio de correo
function Aplicar_Send(Ident_, Solicitud_, ValApl_, SendMail_,Solicitud_) {
//Valores  
Cadena ={"Documento": Ident_, "Solicitud":Solicitud_, "Aplica":ValApl_, "Email":SendMail_,"Solicitud":Solicitud_}
//Envio de Datos Aplicacion
  $.ajax({
    url: "Php/preseleccion/Aplicar.php",
    type: "POST",
    data: Cadena,
    success: function (result) {
     alert(result);
     Vertabla();
    }
  });
}

/* HOJA DE VIDA ------->  ACTIVACION  Captura PW */
//VALIDAR ACTIVACION
function ValidarEstado() {
  var Dato = document.getElementById("txt_Estado_").value;
  //alert("Estado " + Status);
  if (Dato == 0) { 
    SolicitudPw();
  }
  if (Dato == 1) {
    Swal.fire({
      icon: "warning",
      title: "No se requiere Activación.",
      html: "El usuario esta asociado a un <br> Proceso de selección en curso.",
      showConfirmButton: false,
      timer: 5000,
      showClass: {
        popup: "animate__animated animate__fadeInDown",
      },
      hideClass: {
        popup: "animate__animated animate__fadeOutUp",
      },
    });
  }
  if (Dato == 2) {
    Swal.fire({
      icon: "warning",
      title: "No se requiere Activación.",
      html: "El usuario se encuentra activo.",
      showConfirmButton: false,
      timer: 5000,
      showClass: {
        popup: "animate__animated animate__fadeInDown",
      },
      hideClass: {
        popup: "animate__animated animate__fadeOutUp",
      },
    });
  }
}

/*   Activar Hoja de vida */
function SolicitudPw() {
  (async () => {
    const { value: password } = await Swal.fire({
      title: "Ingresa Contraseña ",
      input: "password",
      inputLabel: "Administrador",
      inputPlaceholder: "Cantraseña Administrador",
      confirmButtonColor: "#3085d6",
      confirmButtonText: "Autorizar",
      showClass: {
        popup: "animate__animated animate__fadeInDown",
      },
      hideClass: {
        popup: "animate__animated animate__fadeOutUp",
      },
      inputAttributes: {
        maxlength: 10,
        autocapitalize: "off",
        autocorrect: "off",
      },
    });
    if (password) {
      ValidarPw(password);
      
    }
  })();
}

/*Validar Contraseña */
function ValidarPw(res) {
  $.ajax({
    url: "Php/preseleccion/Desarrollo_Pw.php",
    type: "POST",
    data: { res: res },
    success: function (rta) {
      //alert(rta);
      if (rta == 1) {
        //alert("Aceptado");
        //Si Pass ok
        Activar();
      } else {
        //Si pass Fail
        //alert("Denegado");
        ActivacionError();
      }
    },
  });
}

function Activar() {
  //Envio Datos Para Activar
  Documento_ = document.getElementById("documento1").value;
  Cadena ={"Documento": Documento_ }
  $.ajax({
    url: "Php/preseleccion/estado.php",
    type: "POST",
    data: Cadena,
    success: function (result) {
    ActivacionOk() 
    Vertabla();
    }
  });
}

function ActivacionOk() {
  //Respuesta de envio
  Swal.fire({
    showClass: {
      popup: "animate__animated animate__fadeInDown",
      timer: 3000,
    },
    hideClass: {
      popup: "animate__animated animate__fadeOutUp",
      timer: 3000,
    },
    icon: "success",
    title: "Hoja de vida </br> Activada Correctamente",
    showConfirmButton: false,
    timer: 3000,
  });
}

/* Mensaje error Activacion */
function ActivacionError() {
  Swal.fire({
    showClass: {
      popup: "animate__animated animate__fadeInDown",
      timer: 3000,
    },
    hideClass: {
      popup: "animate__animated animate__fadeOutUp",
      timer: 3000,
    },
    icon: "error",
    title: "Oops...",
    text: "Contraseña Incorrecta.!",
    showConfirmButton: false,
  });
}

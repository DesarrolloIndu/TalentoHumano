// ================================================================================================= Varibles
var Estado = 0;
var Tipo = 0;
var Contenido = 0;
var Validador = 0;

//==============================================================================================
function Validar_Pw() {
  Pw1 = document.getElementById("txt_pass").value;
  Pw2 = document.getElementById("txt_veripass").value;
  if (Pw1 == Pw2) {
    document.getElementById("txt_pass").style.border = "2px solid #58D68D ";
    document.getElementById("txt_veripass").style.border = "2px solid #58D68D ";
  } else {
    document.getElementById("txt_pass").style.border = "2px solid #E74C3C ";
    document.getElementById("txt_veripass").style.border = "2px solid #E74C3C ";
  }
} 



//================================================================================================= Eventos
$(document).ready(function () {
  //Obtener valor de las listas desplegables
  $("#Cmb_Tipos").change(function () {
    var combo_Tipo = document.getElementById("Cmb_Tipos");
    Tipo_ = combo_Tipo.options[combo_Tipo.selectedIndex].text;
    if (Tipo_ == "Administrador") {
      Tipo = 1;
    } else {
      Tipo = 0;
    }
  });

  $("#Cmb_Estado").change(function () {
    var combo_Estado = document.getElementById("Cmb_Estado");
    Estado_ = combo_Estado.options[combo_Estado.selectedIndex].text;
    if (Estado_ == "Activo") {
      Estado = 1;
    } else {
      Estado = 0;
    }
  });
  //Comparar Paswords
});
//======================================================================================Funciones

function Vertabla() {
  $("#tabla").load("Php/Usuarios/tabla.php");
}
//Obtener valor de las cajas
function Leer_Cajas() {
  Id = document.getElementById("txt_id").value;
  Name = document.getElementById("txt_name").value;
  Email = document.getElementById("txt_ema").value;
  Gestion = document.getElementById("txt_gestion").value;
  Cargo = document.getElementById("txt_Cargo").value;
  User = document.getElementById("txt_User").value;
  Pass = document.getElementById("txt_pass").value;
  Pass_2 = document.getElementById("txt_veripass").value;
}

// comparador Password
function Validar_pass() {
  var pas1 = $("#txt_pass").val();
  var pas2 = $("#txt_veripass").val();
  if (pas1 == pas2) {
    Validador = 1;
    //Enviar Informacion
    Leer_Cajas();
    Nuevousuario(Id, Name, Email, Gestion, Cargo, User, Pass, Tipo, Estado);
    Limpiar();
  } else {
    Validador = 0;
    Swal.fire({
      showClass: {
        popup: "animate__animated animate__fadeInDown",
      },
      hideClass: {
        popup: "animate__animated animate__fadeOutUp",
      },
      icon: "error",
      title: "Las contraseñas no coinciden",
      showConfirmButton: false,
    });
    return false;
  }
}
///////////// PROCESO ACTUALIZACION USUARIOS ////////////

function llenarmodal(datos) {
  d = datos.split("||");
  $("#identificacion").val(d[0]);
  $("#nombre").val(d[1]);
  $("#email").val(d[2]);
  $("#gestion").val(d[3]);
  $("#cargo").val(d[4]);
  $("#usuario").val(d[5]);
  $("#password").val(d[6]);
  $("#password1").val(d[6]);
  var Dato_Tipo = d[7];
  var Dato_Estado = d[8];
  $("#Tipo_Up").val(Dato_Tipo);
  $("#Estado_Up").val(Dato_Estado);
}

function actualizar() {
  var datos = $("#actualizar").serialize();
  $.ajax({
    type: "POST",
    url: "Php/Usuarios/Editar_Usuario.php",
    data: datos,
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
        $("#modaledicion").modal("hide");
        $("#tabla").load("Php/Usuarios/tabla.php");
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

function actualizausuario() {
  nombre = document.getElementById("nombre").value;
  email = document.getElementById("email").value;
  gestion = document.getElementById("gestion").value;
  cargo = document.getElementById("cargo").value;
  usuario = document.getElementById("usuario").value;
  pass = document.getElementById("password").value;
  if (
    nombre == "" ||
    email == "" ||
    gestion == "" ||
    cargo == "" ||
    usuario == "" ||
    pass == ""
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
      title: "Ingresar todos los datos",
      showConfirmButton: false,
    });
  } else {
    //alertify.alert("campos llenos"+cargo+gestion+responsable+observaciones);
    actualizar();
  }
}

function Validar_contrasena() {
  var pass1 = $("#password").val();
  var pass2 = $("#password1").val();
  if (pass1 == pass2) {
    Validador = 1;
    //Enviar Informacion
    actualizausuario();
  } else {
    Validador = 0;
    Swal.fire({
      showClass: {
        popup: "animate__animated animate__fadeInDown",
      },
      hideClass: {
        popup: "animate__animated animate__fadeOutUp",
      },
      icon: "error",
      title: "Las contraseñas no coinciden",
      showConfirmButton: false,
    });
    return false;
  }
}

////////////////////////////////////////////////////////
// Validador Cajas Vacias
function Validar_Vacias() {
  Id = document.getElementById("txt_id").value;
  Name = document.getElementById("txt_name").value;
  Email = document.getElementById("txt_ema").value;
  Gestion = document.getElementById("txt_gestion").value;
  Cargo = document.getElementById("txt_Cargo").value;
  User = document.getElementById("txt_User").value;
  Pass = document.getElementById("txt_pass").value;
  Pass_2 = document.getElementById("txt_veripass").value;
  if (
    Id == "" ||
    Name == "" ||
    Email == "" ||
    Gestion == "" ||
    Cargo == "" ||
    User == "" ||
    Pass == "" ||
    Pass_2 == ""
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
      title: "Ingresar todos los datos",
      showConfirmButton: false,
    });
  } else {
    var Contenido = 1;
    // alertify.alert('Talento Humano',"Todos llenos" + Id + Name + Email );
    Validar_pass();
  }
}


  //Limpiar Cajas
function Limpiar() {
  $('input[type="text"]').val("");
  $('input[type="password"]').val("");
  $("#Cmb_Estado").val("Inactivo");
  $("#Cmb_Tipos").val("Usuario");
  $("#Cmb_Tipos").change();
  $("#Cmb_Estado").change();
}

// Llamar Funcion crear Usuario
function Nuevo_Usuario() {
  Validar_Vacias();
  Contenido = 0;
  Validador = 0;
}

// function Cancelar(){
//     Contenido = 0;
//     Validador = 0;
//     $('#txt_pass').css({'border-width':'thin'});
//     $('#txt_veripass').css({'border-width':'thin'});
//     $('#txt_pass').css({'border-style':'solid'});
//     $('#txt_veripass').css({'border-style':'solid'});
//     $('#txt_pass').css({'border-color':'#D6DBDF'});
//     $('#txt_veripass').css({'border-color':'#D6DBDF'});
//     $('input[type="text"]').val('');
//     $('input[type="password"]').val('');
//     $('#Cmb_Estado').val('Inactivo');
//     $('#Cmb_Tipos').val('Usuario');
// };

//========================================================================================== ajax
// Funcion crear usuario
function Nuevousuario(
  Id,
  Name,
  Email,
  Gestion,
  Cargo,
  User,
  Pass,
  Tipo,
  Estado
) {
  var Datos = {
    Id: Id,
    Name: Name,
    Email: Email,
    Gestion: Gestion,
    Cargo: Cargo,
    User: User,
    Pass: Pass,
    Tipo: Tipo,
    Estado: Estado,
  };
  // alertify.alert('Talento Humano' , 'AJAX' + Id + Name + Email + Gestion + Cargo + User + Pass + Tipo + Estado );

  $.ajax({
    type: "POST",
    url: "Php/Usuarios/Crear_Usuarios.php",
    data: Datos,
    success: function (data) {
      if (data == 1) {
        // console.log(Datos);
        $("#tabla").load("Php/Usuarios/tabla.php");
        Swal.fire({
          showClass: {
            popup: "animate__animated animate__fadeInDown",
          },
          hideClass: {
            popup: "animate__animated animate__fadeOutUp",
          },
          icon: "success",
          title: "Registro creado correctamente",
          showConfirmButton: false,
          // timer: 3000,
        });
      } else {
        //$('#tabla').load('componentes/tabla.php');
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
  cadena = "id=" + id;
  $.ajax({
    type: "POST",
    url: "Php/Usuarios/Eliminar_Usuarios.php",
    data: cadena,
    success: function (r) {
      if (r == 1) {
        $("#tabla").load("Php/Usuarios/tabla.php");
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
          text: "Algo salio Mal!",
          confirmButtonColor: "#1D8FE9",
          // footer: '<a href="">Why do I have this issue?</a>'
        });
      }
    },
  });
}

//======================================================================================

//========================================================================Actualizar Usuarios
function agregaform(datos) {
  d = datos.split("||");
  $("#txt_id_up").val(d[0]);
  $("#txt_name_up").val(d[1]);
  $("#txt_ema_up").val(d[2]);
  $("#txt_gestion_up").val(d[3]);
  $("#txt_Cargo_up").val(d[4]);
  $("#txt_User_up").val(d[5]);
  $("#txt_pass_up").val(d[6]);
  $("#txt_veripass_up").val(d[6]);
}

//===========================================================================================
// function mostrar_Pw(){
//     var tipo = document.getElementById("txt_pass_up");
//     if(tipo.type == "password"){
//         tipo.type = "text";
//     }else{
//         tipo.type = "password";
//     }
// };

// function mostrar_Pw_(){
//     var tipo_a = document.getElementById("txt_veripass_up");
//     if(tipo_a.type == "password"){
//         tipo_a.type = "text";
//     }else{
//         tipo_a.type = "password";
//     }
// };

//================================================================================================

/* Update Usuarios */

function submitForm() {
  var dataString = $("#contactForm").serialize();
  $.ajax({
    type: "POST",
    url: "Php/Usuarios/Editar_Usuario.php",
    cache: false,
    data: dataString,
    success: function (response) {
      //$("#resp").html(response)
      $("#modalEdicion").modal("hide");
      // alert("enviado");
      //console.log(dataString);
    },
    error: function () {
      alert("Error");
    },
  });
  //alert("clicked");
}

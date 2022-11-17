function Datos_Close(Datos) {
  d = Datos.split("||");
  var Kawak = d[0];
  var Descripcion = d[1];
  var F_Cierre = d[2];
  var Cantidad = d[3];
  var Contratados = d[4];
  var Faltaron = Cantidad - Contratados;
  var Observaciones = "";
  var Validador = " ;";
  var corrector_1 = " ";
  var uno_contratados = " ";
  var s_contratados = " ";
  // Validador de mensaje
  if (Contratados == Cantidad) {
    Mensaje_ = " Solicitud Completada Correctamente.";
  } else {
    Mensaje_ = "Solicitud Cerrada Incompleta.";
  }
  // pasar 1 a un  contratados
  if (Contratados == 1) {
    uno_contratados = " un ";
    s_contratados = " contratado";
  } else {
    uno_contratados = Contratados;
    s_contratados = " contratados";
  }
  // Mensaje cierre sin novedad
  var Info_ok =
    uno_contratados +
    "&nbsp;" +
    Descripcion +
    s_contratados +
    ".<br> <br>" +
    " <b> Fecha de cierre: </b><br>  " +
    F_Cierre;
  // pasar 1 a un  en faltantes
  if (Faltaron == 1) {
    corrector_1 = " un ";
  } else {
    corrector_1 = Faltaron;
  }
  // mensaje con Faltantes
  var Info =
    "<b>  No contratado: " +
    corrector_1 +
    "&nbsp;" +
    Descripcion +
    ". </b> <br>" +
    "<br> <b> Fecha de cierre: </b><br>  " +
    F_Cierre;

  if (Contratados == Cantidad) {
    //alert("iguales");
    Swal.fire({
      title: Mensaje_,
      html: Info_ok,
      position: "center'",
      icon: "success",
      showConfirmButton: false,
      timer: 7000,
      showClass: {
        popup: "animate__animated animate__fadeInDown",
      },
      hideClass: {
        popup: "animate__animated animate__fadeOutUp",
      },
    });
  } else {
    Swal.fire({
      title: Mensaje_,
      html: Info,
      position: "center",
      icon: "error",
      showConfirmButton: false,
      timer: 7000,
      showClass: {
        popup: "animate__animated animate__fadeInDown",
      },
      hideClass: {
        popup: "animate__animated animate__fadeOutUp",
      },
    });
  }
}

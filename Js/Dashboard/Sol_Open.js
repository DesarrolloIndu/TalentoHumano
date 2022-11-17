function Datos_REC(Datos) {
  d = Datos.split("||");
  var Num_sol = d[0];
  var Cargo = d[1];
  var Cantidad = d[2];
  var F_Limite = d[3];
  var Dias = d[4];
  var Hay = d[5];
  var Mensaje_ = "";
  var Faltan = Cantidad - Hay;
  // Validador
  if (Dias > 1) {
    Mensaje_ = " Vence en " + Dias + " dias " ;
  } 
  if (Dias == 1) {
    Mensaje_ = " Vence  Mañana"   ;
  }
  if (Dias == 0) {
    Mensaje_ = " Vence  Hoy "   ;
  } 
  if (Dias == -1) {
    Mensaje_ = "  Vencio ayer "  ;
  }
  if (Dias < -1) {
    const newStr = Dias.slice(1) //.substring(1)  ->   const str = '*platano_'   const newStr = str.substring(1, str.length - 1)  console.log(newStr) // platano
    Mensaje_ = "  Vencido hace " + newStr + " dias "    ;
  }
  // End
  var Info = 
    " <b> Cargo solicitado: </b><br>  " +
    Cargo +
    " <br> <b>Solicitud N°</b> <br> " +
    Num_sol +
   // "<br> <b>Cantidad Solicitada</b> <br> " +
   // Cantidad +
    "<br> <b>Pendientes por contratar</b> <br> " +
    Faltan +
    "<br> <b>Fecha limite para contratación</b> <br>" +
    F_Limite 
    ;

  if (Dias > 10) {
    Swal.fire({
      title: Mensaje_ ,
      html: Info,
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
  }
  if (Dias >= 1 && Dias < 9) {
    Swal.fire({
      title: Mensaje_ ,
      html: Info,
      position: "center'",
      icon: "warning",
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
  if (Dias == 0) {
    Swal.fire({
      title: Mensaje_ ,
      html: Info,
      position: "center'",
      icon: "info",
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
  if (Dias < 0) {
    Swal.fire({
      title: Mensaje_ ,
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

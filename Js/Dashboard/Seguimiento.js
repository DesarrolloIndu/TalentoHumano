function Datos_Seguimiento(datos) {
    d = datos.split("||");
    var Nombre = d[1];
    var Cargo= d[2];
   // alert(datos);
    var Info_ok = "<b> Entrevista Talento Humano </b> <br> <b> Prueba de Conocimiento </b><br> <b> Prueba de Teorico Práctica </b><br>"    ;
   //alert
    Swal.fire({
    title: "Pruebas pendientes",
    html: Info_ok,
    position: "center",
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
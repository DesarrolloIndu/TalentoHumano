function Datos_Seleccion(datos) {
    d = datos.split("||");
    var Num_Doc = d[0];
    var Nombre = d[1];
    var Postulacion = d[4];
    var Cargo = d[6];
   // alert(datos);
    var Info_ok = " <b> Cargo Aplicado </b><br>  " + Cargo +' &nbsp;'  +"<br>" + " <b> Fecha de Postulación: </b><br>  " + Postulacion;
   //alert
    Swal.fire({
    title: Nombre,
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


// call Preselect_open_Det()
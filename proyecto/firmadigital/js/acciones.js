
$("#formfirmadigital").on('submit', function (event) {
  event.preventDefault();
  formularioFirmaDigital();
});


refrescaimagen();

function refrescaimagen() {
  $.post('funciones/acciones.php', {
    seleccionar: 3
  }, function (respuesta) {
    console.log("RESP: " + respuesta);
    if (respuesta == 1) {
      toastr.error("¡Ha ocurrido un error al editar contraseña!");
    } else {
      // Parece que su navegador está almacenando en caché la imagen 
      // Entoces fuerzo al navegador a recargar la imagen pasando una variable adicional como marca de tiempo
      d = new Date();
      $("#imagendefirma").attr("src", "../perfil/firmas/" + respuesta + "?" + d.getTime());
    }
  }).fail(function () {
    toastr.info("No se pudo cargar el selector");
  });
}

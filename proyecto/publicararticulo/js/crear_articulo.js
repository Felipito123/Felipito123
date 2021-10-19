document.getElementById('botoncheckbox').onchange = function () {
  if (this.checked) {
    document.getElementById('id_pdf').style.display = 'block';
    //more js statements
  }
  else {
    document.getElementById('id_pdf').style.display = 'none';
    //more js statements
  }
}


$(document).ready(function (event) {
  // Submit form data via Ajax
  form = $("#formcreararticulo");
  $("#formcreararticulo").on('submit', function (event) {
    event.preventDefault();

    let titulo = $('#titulo_articulo').val();
    let categoria = $('#categoria').val();
    // let imagen = $('#archivo').val();
    // let pdf = $('#archivopdf').val();
    let descripcion = $('#descripcion').val();

    //console.log("TITULO: " + titulo + "\nCATEGORIA: " + categoria + "\nIMAGEN: " + imagen + "\nPDF: " + pdf + "\nDESCRIPCIÓN: " + descripcion);

    if (validavacioynulo([titulo, categoria, descripcion])) { swalfire("Campo(s) vacio(s)!", "error"); }
    else{
    $.ajax({
      type: 'POST',
      url: 'funciones/fun_crear_articulo.php',
      data: new FormData(this),
      dataType: 'json',
      contentType: false,
      cache: false,
      processData: false,
      beforeSend: function () {
        //form[0].reset(); //LUEGO DE ENVIAR SE RESETE O LIMPIE EL FORMULARIO, SINO QUEDAN GUARDADOS ALGUNOS DATOS AL VOLVER ATRÁS

      }
    }).done(function (respuesta) {
      console.log(respuesta);

      if (respuesta == 1) {
        swalfire("Tamaño de la imagen excedida", "error");
      }
      else if (respuesta == 2) {
        swalfire("¡Error 1 al subir imagen!", "error");
        // window.setTimeout(function () { location.href = 'index.php'; }, 2000);
      }
      else if (respuesta == 3) {
        swalfire("¡Articulo subido!", "success"); //articulo con imagen
        // window.setTimeout(function () { location.href = 'index.php'; }, 2000);
        form[0].reset();
        limpiarnombreImagenPDFySummernote();
      }
      else if (respuesta == 4) {
        swalfire("¡formato erroneo de imagen 1!", "error");
      }
      else if (respuesta == 5) {
        swalfire("¡Error 2 al subir imagen!", "error");
      }
      else if (respuesta == 6) {
        swalfire("¡Articulo subido!", "success"); //articulo con imagen
        // window.setTimeout(function () { location.href = 'index.php'; }, 2000);
        form[0].reset();
        limpiarnombreImagenPDFySummernote();
      }
      else if (respuesta == 7) {
        swalfire("¡formato erroneo de imagen!", "error");
      }
      else if (respuesta == 8) {
        swalfire("¡No hay datos asociados o no ha llenado los campos correctamente!", "error");
      }
      else if (respuesta == 9) {
        swalfire("¡Tamaño pdf excedido!", "error");
      }
      else if (respuesta == 10) {
        swalfire("¡No es un pdf!", "error");
      }
      else if (respuesta == 11) {
        swalfire("¡Parámetros vacíos!", "info");
      }
      else {
        swalfire("ERROR ERROR", "error");
      }

    }).fail(function (res) {
      console.log(res);
      swalfire("ERROR ERROR ERROR ", "error");
    });
    }
  });
});

function limpiarnombreImagenPDFySummernote() {
  $("#nombreimagen").html("");
  document.getElementById('id_pdf').style.display = 'none';
  $('#descripcion').summernote('code', '<p><br></p>');
}

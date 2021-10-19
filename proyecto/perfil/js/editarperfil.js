$(document).ready(function (event) {
  // llenaRegionSelector();
  DetectaCambiosSelectores();
  llenar_perfil();


  $("#formueditarperfil").on('submit', function (event) {
    event.preventDefault();
    formularioEditarPerfil();
  });

  $("#formcontrasena").on('submit', function (event) {
    event.preventDefault();
    formularioEditarContrasena();
  });


  function DetectaCambiosSelectores() {
    //================DETECTA EL CAMBIO DEL SELECTOR MENSUAL Y DE ACUERDO AL MES SE CONSULTA EL AÑO=================//
    $('#region').on('change', function () {
      var region = $(this).val();
      // console.log("SELECC: " + region);
      if (region) {
        $.post('funciones/fun_llena_select.php', { seleccionar: 1, subselect: 3, regionseleccionada: region }, function (respuesta) {
          //  console.log("RESP2: " + respuesta);
          if (respuesta == 1) { //No hay comunas registradas
            $('#s2').hide();
            $('#a2').removeAttr('hidden');
          } else if (respuesta == 2) { //No hay regiones registradas
            $('#s1').hide();
            $('#a1').removeAttr('hidden');
          } else {
            $('#comuna').html(respuesta);
          }
        }).fail(function () { swalfire("No se pudo cargar el selector", "error") });
      } else {
        $('#comuna').html('<option value="">Seleccione una región primero...</option>');
      }
    });
  }

});


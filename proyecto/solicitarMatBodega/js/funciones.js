//Muestro el stock disponible del material seleccionado
$('#mat_mb').on('change', function() {
    let id_material = $(this).val();
    console.log("ID MATERIAL: " + id_material);
    if (id_material != '') {
        $('#indicecantidad').removeAttr('hidden');

        $.post('funciones/acceso.php', {
            seleccionar: 3,
            id_material: parseInt(id_material)
        }, function(respuesta) {
            console.log("RESPP: " + respuesta);
            if (respuesta == -1) {
                toastr.error("Parámetros vacíos");
            } else if (respuesta == -2) {
                toastr.error("Hubo un error,, si el problema persiste, por favor contacte a soporte.")
            } else if (respuesta == -444) {
                toastr.error("No se han recibido parámetros");
            } else {
                $('#indicecantidad').fadeIn();
                $('#MaximoCantDisponibles').val(respuesta);
                $('#MaximoCantDisponibles').text(respuesta);
                // $('#MaximoCantDisponibles').html(respuesta);
            }
        }).fail(function() {
            swalfire("No se pudo mostrar stock maximo de ese estado en particular", "error");
        });
    } else {
        $('#indicecantidad').attr('hidden', true);
    }
});


//Validar cantidad de stock disponibles
$('#cantidadmaterial').on('keyup', function() {
    let cantidadmaterial = $(this).val();
    let maximodisponible = $('#MaximoCantDisponibles').val();

    $("#cantidadmaterial").attr({
        "max": parseInt(maximodisponible), // Si no le agrego el parseInt no valida correctamente, ya que lo toma como string y el max recibe números
        "min": 1 // values (or variables) here
    });
    // console.log("CANTIDAD INGRESADA: " + cantidadmaterial + "\n MAXIMO STOCK DISPONIBLE: " + maximodisponible);
    // MaximoCantDisponibles
});
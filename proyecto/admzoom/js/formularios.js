function modificarZoom(){
    form = $("#form-modal-zoom");
    let id = $("#idmodal").val();
    let asunto = $("#asuntomodal").val();
    let duracion = $("#duracionmodal").val();
    let fecha = $("#fechamodal").val();
    let contrasena = $("#contramodal").val();
    let hora = $("#horamodal").val();


    let contar = hora.split(':');
    if (contar.length >= 3) {
        hora = contar[0] + ':' + contar[1];
    }

    var formData = new FormData(form[0]); //form[0]
    formData.append('horareunion', hora);

    // for (var i of formData.entries()) {
    //     console.log(i[0]+ ', ' + i[1]); 
    // }

    if (validavacioynulo([id,asunto,duracion,fecha,hora,contrasena])) { swalfire("¡Campo vacio!", "error"); }
    else {
        //  swalalerta("HOLAAAAAA", "success");
        console.log("ID: " + id + 
        "\nAsunto: " + asunto + 
        "\nDuración: " + duracion +
        "\nFecha: " + fecha + 
        "\nHora: " + hora + 
        "\nContraseña: " + contrasena);

        $.ajax({
            type: 'POST',
            url: '../Zoom/modificar.php',
            data: formData,
            dataType: 'text',
            contentType: false,
            cache: false,
            processData: false,
            // beforeSend: function () {// }
        }).done(function (respuesta) {
            console.log(respuesta);
            if (respuesta == 1) {
                toastr.error("¡Error en la consulta");
            }else if (respuesta == 2) {
                $('#modal-zoom').modal('hide');
                tablazoom.ajax.reload(null, false);
                toastr.success("¡Se ha editado correctamente!");
            }else if (respuesta == 3) {
                toastr.error("¡Parámetros vacios");
            }else {
                toastr.error("ERROR ERROR");
            }

        }).fail(function (res) {
            console.log(res);
        });
    }
}
//========================VALIDA EL ARCHIVO PERMITIDO EN LA IMAGEN DE PERFIL ======================================//
$('#filemu').on('change', function() {
    var ext = $(this).val().split('.').pop();
    if ($(this).val() != '') {
        if (ext == "jpg" || ext == "png" || ext == "JPEG" || ext == "jpeg" || ext == "JPG" || ext == "PNG") {
            console.log("La extensión es: " + ext);
            if ($(this)[0].files[0].size > 20971520) { //1048576bytes * 20 = 20MB   (IMAGEN NO MAYPR A 20 MB)
                // 1024bytes=1KB, 1048576bytes=1MB, 1024*1024*1024 (bytes)= 1GB
                //console.log("La imagen excede el tamaño máximo: archivo no debe ser mayor a 20 MB");
                alertify.error("Tamaño excede a 20 MB");
                $(this).val('');
            } else {
                //console.log('seleccionado'); //Selecciono un archivo
                $('#previsualizacion').fadeIn(); //se muestra la etiqueta img con una disipación más lenta
                readURL(this); // y la muestra aqui, llamando a la funcion 
            }
        } else { 
            $(this).val(''); // si no es el formato de imagen borra el cache del file
            alertify.error("Ingrese solo imagen");
            console.log("Extensión no permitida: " + ext);
        }
    } else {
        $('#previsualizacion').fadeOut(); //si ha cerrado la ventana para seleccionar un archivo oculto la etiqueta img con un desvanecimiento lento
        setTimeout(function(){  document.getElementById('previsualizacion').removeAttribute('src'); }, 2000); //le quito la direccion src, después de los 2 segundos del fadeOut, porque sino se muestra la img vacia
        //console.log('cancelo o cerro');
    }
});
//========================VALIDA EL ARCHIVO PERMITIDO EN LA IMAGEN DE PERFIL ======================================//


//========================VALIDA EL LARGO DEL INPUT ======================================//
let numero = 2;
let numerom = 49;
$("#nombre").on("keyup", function() {

    if (($("#nombre").val().length) < numero) {
        // $('#nombre').css({
        //     'border-color': 'red',
        //     'border-style': 'solid',
        //     'border-width': 'medium'
        // });
        this.setCustomValidity('Minimo 2 caracteres');
    } else if (($("#nombre").val().length) > numerom) {
        // $('#nombre').css('border-color', 'red');
    } else if (($("#nombre").val().length) >= numero && $("#nombre").val().length < numerom) {
        // $('#nombre').css('border-color', '#28a745');
        this.setCustomValidity('');
    } else {
        this.setCustomValidity('');
        // $("#clave1").val('');
    }
});

let numero2 = 2;
let numero49 = 49;
$("#correo").on("keyup", function() {

    if (($("#correo").val().length) < numero2) {
        // $('#correo').css({
        //     'border-color': 'red',
        //     'border-style': 'solid',
        //     'border-width': 'medium'
        // });
        this.setCustomValidity('Minimo 2 caracteres');
    } else if (($("#correo").val().length) > numero49) {
        // $('#correo').css({
        //     'border-color': 'red',
        //     'border-style': 'solid',
        //     'border-width': 'medium'
        // });
    } else if (($("#correo").val().length) >= numero2 && $("#correo").val().length < numero49) {
        // $('#correo').css({
        //     'border-color': '#28a745',
        //     'border-style': 'solid',
        //     'border-width': 'medium'
        // });
        this.setCustomValidity('');
    } else {
        this.setCustomValidity('');
        // $("#clave1").val('');
    }
});


let numerodos = 2;
let numero100 = 100;
$("#contrasena").on("keyup", function() {

    if (($("#contrasena").val().length) < numerodos) {
        // $('#contrasena').css({
        //     'border-color': 'red',
        //     'border-style': 'solid',
        //     'border-width': 'medium'
        // });
        this.setCustomValidity('Minimo 2 caracteres');
    } else if (($("#contrasena").val().length) > numero100) {
        // $('#contrasena').css({
        //     'border-color': 'red',
        //     'border-style': 'solid',
        //     'border-width': 'medium'
        // });
    } else if (($("#contrasena").val().length) >= numerodos && $("#contrasena").val().length < numero100) {
        // $('#contrasena').css({
        //     'border-color': '#28a745',
        //     'border-style': 'solid',
        //     'border-width': 'medium'
        // });
        this.setCustomValidity('');
    } else {
        this.setCustomValidity('');
        // $("#clave1").val('');
    }
});
//========================VALIDA EL LARGO DEL INPUT ======================================//

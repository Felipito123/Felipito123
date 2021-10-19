var progress = document.getElementById("progress");
var tiemporestante = document.getElementById("tiemporestante");
var imagen = document.getElementById("cargarimagen");

var _URL = window.URL || window.webkitURL;

imagen.addEventListener('change', function () {
    // var file, img, ancho, alto;
    var ext = $('#cargarimagen').val().split('.').pop();
    console.log("Formato: " + ext);


    if (ext == "png" || ext == "PNG") {
        // alertify.success("Formato: " + ext);
        $('#divcarga').show();
        var form = new FormData();
        form.append('file', imagen.files[0]);
        form.append('seleccionar', 2);

        /*ATRIBUTOS PARA LA DESCARGA (para descargar archivos se hace por medio de blob) */
        request = new XMLHttpRequest();
        var tiempodecomienzo = new Date().getTime();

        request.upload.onabort = function () {
            console.log("Ha abortado");
        };

        request.onload = function () {
            let respuesta = request.responseText;
            if (respuesta == 1) {
                toastr.error("Campos vacio, no se ha recibido la firma");
            } else if (respuesta == 2) {
                toastr.error("Ha excedido los 20MB permitidos");
            }  else if (respuesta == 3) {
                toastr.error("El ancho minimo es 430 pixeles");
                $('#tiemporestante').html("<div class='alert alert-primary'> <label><strong>Alerta</strong></label> <br> <label> Ancho minimo permitido (430px)</label></div>");
                setTimeout(function () {
                    $('#tiemporestante').fadeOut();
                    $('#divcarga').fadeOut();
                }, 3 * 1000);
            }  else if (respuesta == 4) {
                $('#tiemporestante').text("Altura minima: 290 px");
                toastr.error("La altura minima es 290 pixeles");
                $('#tiemporestante').html("<div class='alert alert-primary'> <label><strong>Alerta</strong></label> <br> <label> Altura minima permitida (290px)</label></div>");
                setTimeout(function () {
                    $('#tiemporestante').fadeOut();
                    $('#divcarga').fadeOut();
                }, 3 * 1000);
            } else if (respuesta == 5) {
                toastr.error("Ha ocurrido un error al subir la firma");
            } else if (respuesta == 6) {
                toastr.success("Firma subida");
                $('#tiemporestante').text("completado");
                $('#cargarimagen').val('');
                refrescaimagen();
                setTimeout(function () {
                    $('#divcarga').fadeOut();
                }, 2 * 1000);
            } else if (respuesta == 7) {
                toastr.error("Firma no es formato PNG", "un momento");
            }
            console.log("Respuesta servidor: " + request.responseText);
        };

        request.upload.onprogress = function (e) {

            progress.max = e.total;
            progress.value = e.loaded;

            let tamañoenMB = e.total / (1024 * 1024);

            if (tamañoenMB > 20) {
                toastr.info("Tamaño máximo 20MB");
                request.abort();
                return;
            } else {

                var porcentaje = (e.loaded / e.total) * 100; // porcentaje
                porcentaje = Math.floor(porcentaje);

                progress.innerHTML = porcentaje + "%"; //se muestra el texto del porcentaje
                progress.setAttribute('style', 'width:' + porcentaje + '%'); //se va llenando la barra agregando el atributo style="width: N %"


                var tiempodetermino = new Date().getTime();
                var duracion = (tiempodetermino - tiempodecomienzo) / 1000;

                /*===============velocida de descarga ================ */
                var bsp = e.loaded / duracion; //byte por segundo
                var kbsp = bsp / 1024; //kilobyte por segundo
                kbsp = Math.floor(kbsp);
                let velodidadDescarga = kbsp;
                /*===============velocida de descarga ================ */

                var tiempo = (e.total - e.loaded) / bsp;
                var segundos = tiempo % 60;
                var minutos = tiempo / 60;

                segundos = Math.floor(segundos);
                minutos = Math.floor(minutos);

                $('#tiemporestante').text(minutos + " minutos " + segundos + " segundos restantes "); //velodidadDescarga+" KB/s "+
                // tiemporestante.innerHTML =  kbsp+" KB/s "+minutos+" minutos "+segundos+" segundos restantes ";
            }
        };

        request.open('POST', 'funciones/acciones.php', true);
        request.send(form);
    } else {
        toastr.info("No es formato PNG", "un momento");
        return;
    }


});



// var rutadelarchivo = "../../imgpordefecto/lupa.png"; // Captures.rar // ../perfil/firmas/193871240/firma.png
// document.querySelector('#download-button').addEventListener('click', function() {

//     // alertify.success(""+this.value);

//     /*ATRIBUTOS PARA LA DESCARGA (para descargar archivos se hace por medio de blob) */
//     request = new XMLHttpRequest();
//     request.responseType = 'blob';
//     request.open('get', rutadelarchivo, true);
//     request.send();

//     var tiempodecomienzo = new Date().getTime();


//     request.onprogress = function(e) {
//         progress.max = e.total;
//         progress.value = e.loaded;

//         let tamañoenMB = e.total / (1024 * 1024);

//         if (tamañoenMB > 20) {
//             toastr.info("aborte");
//             request.abort();
//             return;
//         } else {

//             var porcentaje = (e.loaded / e.total) * 100; // porcentaje
//             porcentaje = Math.floor(porcentaje);

//             progress.innerHTML = porcentaje + "%"; //se muestra el texto del porcentaje
//             progress.setAttribute('style', 'width:' + porcentaje + '%'); //se va llenando la barra agregando el atributo style="width: N %"


//             var tiempodetermino = new Date().getTime();
//             var duracion = (tiempodetermino - tiempodecomienzo) / 1000;

//             /*===============velocida de descarga ================ */
//             var bsp = e.loaded / duracion; //byte por segundo
//             var kbsp = bsp / 1024; //kilobyte por segundo
//             kbsp = Math.floor(kbsp);
//             let velodidadDescarga = kbsp;
//             /*===============velocida de descarga ================ */

//             var tiempo = (e.total - e.loaded) / bsp;
//             var segundos = tiempo % 60;
//             var minutos = tiempo / 60;

//             segundos = Math.floor(segundos);
//             minutos = Math.floor(minutos);

//             $('#tiemporestante').text(minutos + " minutos " + segundos + " segundos restantes "); //velodidadDescarga+" KB/s "+
//             // tiemporestante.innerHTML =  kbsp+" KB/s "+minutos+" minutos "+segundos+" segundos restantes ";
//         }
//     };

//     request.onreadystatechange = function() { //cuando esta completamente cargado el archivo 
//         if (this.readyState == 4 && this.status == 200) {
//             // console.log('this.response: '+this.response);

//             var obj = window.URL.createObjectURL(this.response); //Crea un archivo sobre la url, pero no se muestra sino el href
//             // console.log('obj: '+obj);
//             document.getElementById('save-file').setAttribute('href', obj);
//             document.getElementById('save-file').setAttribute('download', rutadelarchivo);
//             setTimeout(function() {
//                 window.URL.revokeObjectURL(obj); //se borra la url y no queda expusta en el html 
//             }, 60 * 1000);
//         }
//     };
// });

var ip;
var pais;
var ciudad;
var region;
var compania;


$.getJSON('https://ipapi.co/json/', function (data) {
    //  console.log("IP:" + data.ip + "\nPais:" + data.country_name + "\nCiudad:" + data.city + "\nRegión:" + data.region + "\nCompañia:" + data.org);
    ip = data.ip;
    pais = data.country_name;
    region = data.region;
    ciudad = data.city;
    compania = data.org;
});


$('.calificaciones').rating(function (votacion, event) {
    console.log("ID publicacion:" + idart + "\nVotacion:" + votacion + "\nIP:" + ip + "\nPais:" + pais + "\nCiudad:" + ciudad + "\nRegión:" + region + "\nCompañia:" + compania)
    $.ajax({
        method: "POST",
        url: "funciones/fun_agregar_calificacion.php",
        data: {
            valorvotar: votacion,
            idarticulo: idart,
            valor_ip: ip,
            valor_pais: pais,
            valor_region: region,
            valor_ciudad: ciudad,
            tipo_compania: compania
        }
    }).done(function (respuesta) {
        // console.log(respuesta);
        if (respuesta == 0) {
            // alertify.error("Ya califico una vez", "error");
        } else if (respuesta == 1) {
            alertify.success("Gracias por calificar", "success");
        } else if (respuesta == 2) {
            alertify.error("Error en la consulta", "error");
        } else if (respuesta == 3) {
            alertify.error("No se han recibido parametros", "error");
        }

    });
});


function ocultarcalificacion() { //Va consultando cada 2 segundos si ha calificado o no

    //  console.log("idarrrt: "+idart+"\nip:"+ip+"\npais:"+pais+"\nregion:"+region+"\nciudad:"+ciudad+"\ncompania:"+compania);
    $.ajax({
        type: 'POST',
        url: 'funciones/fun_ocultar_calificacion.php',
        data: {
            'idarticulo': idart,
            'valor_ip': ip,
            'valor_pais': pais,
            'valor_region': region,
            'valor_ciudad': ciudad,
            'tipo_compania': compania
        }
    }).done(function (resp) {
        // console.log("resp:"+resp);
        if (resp == 0) {
            //Aqui ocultar la calificacion
            $('#muestracalificacion').css('visibility', 'hidden');
        } else if (resp == 1) {
            //No ha calificado, entonces muestro la calificacion
            $('#muestracalificacion').css('visibility', 'visible');
        } else if (resp == 2) {
            //No se han recibido parametros
            
        }
    }).fail(function () {

    });
}

// ocultarcalificacion();

setInterval(ocultarcalificacion, 3000);
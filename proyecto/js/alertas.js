
//function muestra() {
    $.ajax({
        type: 'POST',
        url: '../funcionesphp/fun_llenar_alerta.php',
        data: { 'pues': 1 }
    }).done(function (html) {
        $('#visualizar').html(html);
    }).fail(function () {

    });
//}

//setInterval(muestra, 10000);


//Seteo cuando hago click en el dropdown de la alerta cambio en la BD el estado de novisto a visto
$(document).on('click','#alerta',function(){
    $.ajax({
        type: 'POST',
        url: '../funcionesphp/fun_llenar_alerta.php',
        data: { 'pues': 2 }
    }).done(function (html) {
        //$('#visualizar').html(html);
    }).fail(function () {

    });
});
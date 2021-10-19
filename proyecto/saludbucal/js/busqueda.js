
$("#botonbuscarodonto").click(activarFiltroBusqueda); // si se apreta el boton buscar se activa el filtro de busqueda

$('#inputbuscarodonto').on('keydown', function(ev) { //si en el input se apreta enter se activa el filtro de busqueda
    if (ev.key === 'Enter') {
        activarFiltroBusqueda();
    }
});

function activarFiltroBusqueda() {
    var myUrl = window.location.href; // se obtiene la  url
    console.log("URL 1: " + myUrl);

    let var1 = myUrl.split('proyecto/');
    myUrl = myUrl.replace(var1[1], 'saludbucal/?pg=1'); //el var1[1] toma el valor ej: /mision
    //console.log("URL 2: " + myUrl);

    var url = new URL(myUrl);
    var search_params = url.searchParams; //parámetro recibido por get, en este caso pg=1
    let busqueda = $('#inputbuscarodonto').val();

    if (busqueda !== '') { //Si el input es distinto de vacio
        search_params.set('bq', busqueda); // le agrego el parámetro &
        url.search = search_params.toString(); //le agrego el parámetro ?pg=1&bq=valordelinput
        new_url = url.toString(); //obtengo la nueva url completa
        window.location = new_url; //redirijo a la url completa ej: http://localhost/TESIS/tesis/proyecto/saludbucal/?pg=1&bq=valordelinput
    }
}


function validainput(e) {
    key = e.keycode || e.which;
    teclado = String.fromCharCode(key).toLowerCase();
    letras = " 1234567890abcdefghijklmnñopqrstuvwxyzáéíóú@."; //es lo que se permite en el input cuando se presiona el teclado (keypress)
    especiales = "8-37-38-39-46-164";
    teclado_especial = false;

    if (letras.indexOf(teclado) === -1 && !teclado_especial) {
        return false;
    }
}


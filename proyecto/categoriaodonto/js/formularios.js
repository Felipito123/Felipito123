/*====================================================================FORMULARIOS======================================================*/

function formularioRegistroCategoria() {
    form = $("#formCategoriaOdonto");
    let nombrecategoria = $("#categoriaodonto").val(); //valor del input categoria

    if (validavacioynulo([nombrecategoria])) { swalfire("¡Campo vacio!", "error"); }
    else if (nombrecategoria.length < 2 || nombrecategoria.length > 45) { swalfire("Tamaño del nombre de la categoria, \nmínimo: 2 y máximo: 45 caracteres", "error"); }
    else {
        $.post('funciones/acceso.php', { categoriaodonto: nombrecategoria, seleccionar: 2 }, function (respuesta) {
            console.log(respuesta);
            if (respuesta == 1) {
                swalfire("¡Existe una categoría con ese nombre!", "error");
            } else if (respuesta == 2) {
                tablacategoriasodonto.ajax.reload(null, false);
                form[0].reset();
                swalfire("¡Categoría Ingresada!", "success");
            } else if (respuesta == 3) {
                swalfire("¡Ha ocurrido un error al registrar la categoria!", "error");
            } else if (respuesta == 4 || respuesta == 444) {
                swalfire("No se enviaron parametros", "error");
            } else if (respuesta == 11) {
                swalfire("¡Campos vacios, compruebe datos!", "error");
            }
        }).fail(function (res) {
            console.log("FAIL:" + res);
        });
    }
}
/*====================================================================FORMULARIOS======================================================*/
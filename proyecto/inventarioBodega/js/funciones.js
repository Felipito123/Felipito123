function MantencionMaterial(idmaterial,cantidadmaxima, stocktotal) {
    Swal.fire({
        title: 'Mantención Del Material',
        //icon: 'info',
        // showClass: { //para esta animación del modal integre un css llamado animate.min.css
        //     popup: 'animate__animated animate__fadeInDown'
        // },
        // hideClass: {
        //     popup: 'animate__animated animate__fadeOutUp'
        // },
        html: `
        <div class="row justify-content-center" id="mostrarmaximo" hidden>
            <div class="col-lg-6">
                <small id="label" class="form-text text-muted">Máximo stock disponible</small>
                <div class="input-group mb-3">
                <input type="text" class="form-control text-center" id="stockmaximodelaseleccion"  minlength="1" maxlength="9" onkeypress="return solonumeros(event)" onpaste="return false" disabled>
                </div>
            </div>
        </div>
    
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="form-group">
                <label id="labelparaswal" class="col-form-label">Mantener Material:</label>
                <select class="form-control" id="estadomantencionmaterial" required>
                <option value="" selected>Seleccione una opción</option>
                <option value="1">Agregar nuevo stock al material</option>
                <option value="2">Registrar material Perdido</option>
                <option value="3">Registrar material Defectuoso</option>
                <option value="4">Reincorporar material Defectuoso</option>
                <option value="5">Reincorporar material Perdido</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="form-group">
                <label id="labelparaswal">Stock: </label>
                <div class="input-group">
                    <span class="input-group-text"><i class="fa fa-hashtag" aria-hidden="true" style="width: 13px;"></i></span>
                    <input type="number" class="form-control" id="stocksolicitar" placeholder="Ingrese Stock" min="1" max="`+ stocktotal + `" minlength="2" maxlength="7" onkeypress="return solonumeros(event)" onpaste="return false" required>
                </div>
            </div>
        </div>
    </div>
    `,
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Guardar',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: "#f6c23e",
        cancelButtonColor: "#858796",
        width: '600px',

        preConfirm: () => {
            let seleccion = $('#estadomantencionmaterial').val();
            let maximo = $('#stockmaximodelaseleccion').val();
            let stocksolicitar = $('#stocksolicitar').val();

            //Nota: Para la selección == 1, no valido la longitud, puesto que puede agregar material a como de gusto.
            if (validavacioynulo([seleccion])) { Swal.showValidationMessage('No ha seleccionado una opción'); }
            else if (parseInt([maximo])== 0) { Swal.showValidationMessage('No hay stock disponible para esta acción'); }
            else if (validavacioynulo([maximo]) || parseInt(stocksolicitar) == 0) { Swal.showValidationMessage('Campo stock vacío'); }
            else if (parseInt(stocksolicitar) < 0) { Swal.showValidationMessage('Campo stock no debe ser negativo'); }
            else if (seleccion == 2 && (parseInt(stocksolicitar) > parseInt(maximo))) { Swal.showValidationMessage('No puede registrar más material Perdido del stock disponible'); }
            else if (seleccion == 3 && (parseInt(stocksolicitar) > parseInt(maximo))) { Swal.showValidationMessage('No puede registrar más material Defectuoso del stock disponible'); }
            else if (seleccion == 4 && (parseInt(stocksolicitar) > parseInt(maximo))) { Swal.showValidationMessage('No puede reincorporar más material Defectuoso del stock disponible'); }
            else if (seleccion == 5 && (parseInt(stocksolicitar) > parseInt(maximo))) { Swal.showValidationMessage('No puede reincorporar más material Perdido del stock disponible'); }
            else {
                $.post('funciones/acceso.php', {
                    idmaterial: idmaterial,
                    cantidadmaxima: cantidadmaxima,
                    stocktotal: stocktotal,
                    accion: seleccion,
                    stockasolicitar: stocksolicitar,
                    seleccionar: 11
                }, function (respuesta) {
                    console.log("MANTENCIÓN: " + respuesta);
                    if (respuesta == 1) {
                        toastr.error("¡Hubo un error al registrar mantención en el material!");
                    } else if (respuesta == 2) {
                        toastr.success("¡Material mantenido exitosamente");
                        tabla_inventario_bodega.ajax.reload(null, false);
                    } else if (respuesta == 3) {
                        toastr.error("¡No se encuentra el Material");
                    } else if (respuesta == 4 || respuesta == 5) {
                        toastr.error("¡Verifique stock solicitado!");
                    } else if (respuesta == 6 || respuesta == 7 || respuesta == 8) {
                        toastr.error("¡El stock a solicitar debe ser menor al stock disponible para este medicamento");
                    } else if (respuesta == 9) {
                        toastr.error("¡Parámetros no recibidos!");
                    }
                }).fail(function () {
                    swalfire("Ocurrio un Error Inesperado")
                });
            }
        }
    });

    mostrarStockMaximo(idmaterial);
}

function mostrarStockMaximo(idmaterial) {
    $('#estadomantencionmaterial').on('change', function () {
        let estadorecibidodelselect = $(this).val();
        let estadoaconsultar;

        if (estadorecibidodelselect != '') {
            $('#mostrarmaximo').removeAttr('hidden');
            if (estadorecibidodelselect == 1 || estadorecibidodelselect == 2 || estadorecibidodelselect == 3) estadoaconsultar = 1; //Consulta por el estado disponible = 1
            else if (estadorecibidodelselect == 4) estadoaconsultar = 3; //Consulta por el estado defectuoso = 3
            else if (estadorecibidodelselect == 5) estadoaconsultar = 4; //Consulta por el estado perdido = 4

            $.post('funciones/acceso.php', { seleccionar: 10, idmaterial: parseInt(idmaterial), estadohistorialmaterial: parseInt(estadoaconsultar) }, function (respuesta) {
                // console.log("RESPP: " + respuesta);
                if (respuesta == -1) {
                    toastr.error("Hubo un error, no se puede mostrar stock maximo de ese estado en particular")
                } else if (respuesta == -2) {
                    toastr.error("No hay stock maximo de ese estado en particular que mostrar")
                } else if (respuesta == -3) {
                    toastr.error("No se han recibido parámetros")
                } else {
                    $('#stockmaximodelaseleccion').val(respuesta);
                }
            }).fail(function () {
                swalfire("No se pudo mostrar stock maximo de ese estado en particular", "error");
            });
        } else {
            $('#mostrarmaximo').attr('hidden', true);
        }
    });
}
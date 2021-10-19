function agregarmedicamento() {
    form = $("#formRegistrarMedicamento");
    let nombreimagen = $('#imagen').val(); //este lo uso para validar y el let archivo, para enviar como file
    let nombremedicamento = $('#nombre').val();
    let precio = $('#precio').val();
    let dosificacion = $('#dosificacion').val();
    let stock = $('#stock').val();
    let tipomedicamento = $('#tipomedicamento').val();
    let categoriamedicamento = $('#categoriamedicamento').val();
    let archivo = document.getElementById("imagen").files[0];  // file from input

    // for (var i of formData.entries()) {
    //     console.log(i[0] + ', ' + i[1]);
    // }

    if (validavacioynulo([nombremedicamento])) { toastr.info('Campo nombre vacio'); }
    else if (validavacioynulo([precio])) { toastr.info('Campo precio vacio'); }
    else if (validavacioynulo([dosificacion])) { toastr.info('Campo dosificación vacio'); }
    else if (validavacioynulo([stock])) { toastr.info('Campo stock vacio'); }
    else if (stock < 1) { toastr.info('Campo stock inválido'); }
    else if (validavacioynulo([nombreimagen])) { toastr.info('Campo de la imagen vacio'); }
    else if (validavacioynulo([tipomedicamento])) { toastr.info('Tipo medicamento no seleccionado'); }
    else if (validavacioynulo([categoriamedicamento])) { toastr.info('Categoria no seleccionada'); }
    else {
        let formData = new FormData();
        formData.append("seleccionar", 2);
        formData.append("nombre", nombremedicamento);
        formData.append("precio", precio);
        formData.append("dosificacion", dosificacion);
        formData.append("stock", stock);
        formData.append("tipomedicamento", tipomedicamento);
        formData.append("categoriamedicamento", categoriamedicamento);
        formData.append("imagen", archivo);

        $.ajax({
            type: 'POST',
            url: 'funciones/acceso.php',
            data: formData,
            dataType: 'text',
            contentType: false,
            cache: false,
            processData: false
        }).done(function (respuesta) {
            console.log("respuesta: " + respuesta);
            if (respuesta == 1) {
                swalfire("¡Campos vacios!", "error");
            } else if (respuesta == 2) {
                swalfire("¡Existe un medicamento con el mismo nombre y categoria", "error");
            } else if (respuesta == 3 || respuesta == 4 || respuesta == 5) {
                swalfire("¡Hubo un error al ingresar el medicamento", "error");
            } else if (respuesta == 6) {
                swalfire("¡Medicamento Registrado!", "success");
                tablamedicamentos.ajax.reload(null, false);
                form[0].reset();
            } else if (respuesta == 7) {
                swalfire("¡Tamaño imagen no valida!", "error");
            } else if (respuesta == 8) {
                swalfire("¡Imagen no valida!", "error");
            } else if (respuesta == 9) {
                swalfire("¡Parámetros no recibidos!", "error");
            }
        }).fail(function (res) {
            console.log(res);
        });
    }
}


function editarMedicamento(idmedicamento, idtipomedicamento, idcategoria, nombre, precio, dosificacion, nombreimagen) {

    llenarSelectEditarMedicamento(idcategoria, idtipomedicamento);

    Swal.fire({
        title: 'Editar Medicamento',
        //icon: 'info',
        showClass: { //para esta animación del modal integre un css llamado animate.min.css
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        },
        html: `
        <div style="max-width: 0; max-height: 0; overflow: hidden;"><input autofocus="true" /> Hago esto para deshabilitar el autofocus del primer input</div>
        <div class="row justify-content-center">
            <div class="col-lg-10">
            <img src="img/`+ idmedicamento + `/` + nombreimagen + `" alt="Logo" class="img-fluid d-block mx-auto mb-3" style="max-height: 200px;"></img>
            </div>
        </div>
            <div class="row justify-content-center pt-3">
            <div class="col-lg-6">
                <div class="form-group">
                    <label id="labelparaswal">Nombre</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa fa-user" aria-hidden="true" style="width: 13px;"></i></span>
                        <input type="text" class="form-control" id="EDnombre" placeholder="Ingrese Nombre" minlength="2" maxlength="100" value="`+ nombre + `" onkeypress="return sololetras(event)" onpaste="return false" autocomplete="off" required>
                    </div>
                </div>
            </div>
    
            <div class="col-lg-6">
                <div class="form-group">
                    <label id="labelparaswal">Precio</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa fa-user" aria-hidden="true" style="width: 13px;"></i></span>
                        <input type="text" class="form-control" id="EDprecio" placeholder="Ingrese precio" minlength="3" maxlength="7" value="`+ precio + `" onkeypress="return solonumeros(event)" onpaste="return false" autocomplete="off" required>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="form-group">
                    <label id="labelparaswal">Dosificación</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fas fa-compass" aria-hidden="true" style="width: 13px;"></i></span>
                        <input type="text" class="form-control" id="EDdosificacion" placeholder="Ingrese dosificacion" minlength="2" maxlength="40" value="`+ dosificacion + `" onkeypress="return dosis(event)" onpaste="return false" autocomplete="off" required>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="row justify-content-center">
    
            <div class="col-lg-9">
            <div class="form-group">
                <label id="labelparaswal">Cambiar imagen</label>
                <input type="file" class="form-control-file estilo-archivo" id="EDimagen" accept=".jpg,.jpeg,.png,.bmp" required>
            </div>
        </div>
        </div>
    
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="form-group">
                    <label id="labelparaswal" class="col-form-label">Tipo medicamento:</label>
                    <select class="form-control tipmed" id="EDtipomedicamento" required>
                    <option value="">Seleccione un tipo de medicamento</option>
                    </select>
                </div>
            </div>
            
            <div class="col-lg-10">
                <div class="form-group">
                <label id="labelparaswal" class="col-form-label">Categoria medicamento:</label>
                <select class="form-control catmed" id="EDcategoriamedicamento" required>
                <option value="">Seleccione una categoria</option>
                </select>
                </div>
            </div>
    
        </div>`,
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Guardar',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: "#e74a3b",
        cancelButtonColor: "#858796",
        width: '650px',

        preConfirm: () => {
            let nombreimagen = $('#EDimagen').val(); //este lo uso para validar y el let archivo, para enviar como file
            let nombremedicamento = $('#EDnombre').val();
            let precio = $('#EDprecio').val();
            let dosificacion = $('#EDdosificacion').val();
            let tipomedicamento = $('#EDtipomedicamento').val();
            let categoriamedicamento = $('#EDcategoriamedicamento').val();
            let archivo = document.getElementById("EDimagen").files[0];  // file from input

            // for (var i of formData.entries()) {
            //     console.log(i[0] + ', ' + i[1]);
            // }

            if (validavacioynulo([nombremedicamento])) { Swal.showValidationMessage('campo nombre vacio'); }
            else if (validavacioynulo([precio])) { Swal.showValidationMessage('campo precio vacio'); }
            else if (validavacioynulo([dosificacion])) { Swal.showValidationMessage('campo dosificación vacio'); }
            else if (validavacioynulo([tipomedicamento])) { Swal.showValidationMessage('tipo medicamento no seleccionado'); }
            else if (validavacioynulo([categoriamedicamento])) { Swal.showValidationMessage('categoria no seleccionada'); }
            else {
                let formData = new FormData();
                formData.append("seleccionar", 3);
                formData.append("idmedicamento", idmedicamento);
                formData.append("nombre", nombremedicamento);
                formData.append("precio", precio);
                formData.append("dosificacion", dosificacion);
                formData.append("tipomedicamento", tipomedicamento);
                formData.append("categoriamedicamento", categoriamedicamento);

                if (archivo !== null && archivo !== undefined) {
                    formData.append("imagen", archivo);
                }
                //      for (var i of formData.entries()) {
                //     console.log(i[0] + ', ' + i[1]);
                // }
                $.ajax({
                    type: 'POST',
                    url: 'funciones/acceso.php',
                    data: formData,
                    dataType: 'text',
                    contentType: false,
                    cache: false,
                    processData: false
                }).done(function (respuesta) {
                    console.log("respuesta: " + respuesta);
                    if (respuesta == 1 || respuesta == 6) {
                        swalfire("¡Campos vacios!", "error");
                    } else if (respuesta == 2 || respuesta == 7) {
                        swalfire("¡Hubo un error al editar el medicamento", "error");
                    } else if (respuesta == 3 || respuesta == 8) {
                        swalfire("¡Medicamento Editado!", "success");
                        tablamedicamentos.ajax.reload(null, false);
                    } else if (respuesta == 4) {
                        swalfire("¡Tamaño imagen no valida!", "error");
                    } else if (respuesta == 5) {
                        swalfire("¡Formato imagen no valida!", "error");
                    } else if (respuesta == 9) {
                        swalfire("¡Parámetros no recibidos!", "success");
                    } else if (respuesta == 10) {
                        swalfire("¡Existe un medicamento con el mismo nombre y categoria!", "error");
                    }
                }).fail(function (res) {
                    console.log(res);
                });
            }
        }
    });
    ValidaImgDeMedicamento();

}

function MantencionMedicamento(idmedicamento, cantidadmaxima, stocktotal) {
    Swal.fire({
        title: 'Mantención Del Medicamento',
        //icon: 'info',
        showClass: { //para esta animación del modal integre un css llamado animate.min.css
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        },
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
                <label id="labelparaswal" class="col-form-label">Opción de la Mantención:</label>
                <select class="form-control" id="estadomantencionmedicamento" required>
                <option value="" selected>Seleccione una opción</option>
                <option value="1">Agregar nuevo stock al medicamento</option>
                <option value="2">Registrar medicamento Vencido</option>
                <option value="3">Registrar medicamento Entregado</option>
                <option value="4">Reincorporar medicamento Vencido</option>
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
        confirmButtonColor: "#e74a3b",
        cancelButtonColor: "#858796",
        width: '600px',

        preConfirm: () => {
            let seleccion = $('#estadomantencionmedicamento').val();
            let maximo = $('#stockmaximodelaseleccion').val();
            let accionmantencion = $('#estadomantencionmedicamento').val();
            let stocksolicitar = $('#stocksolicitar').val();

            if (validavacioynulo([accionmantencion])) { Swal.showValidationMessage('No ha seleccionado una opción'); }
            else if (validavacioynulo([stocksolicitar]) || parseInt(stocksolicitar) == 0) { Swal.showValidationMessage('campo stock vacío'); }
            else if (seleccion != 1 && (parseInt(stocksolicitar) > parseInt(maximo))) { Swal.showValidationMessage('Revise el stock a solicitado'); }
            else {
                $.post('funciones/acceso.php', {
                    idmedicamento: idmedicamento,
                    cantidadmaxima: cantidadmaxima,
                    stocktotal: stocktotal,
                    accion: accionmantencion,
                    stockasolicitar: stocksolicitar,
                    seleccionar: 4
                }, function (respuesta) {
                    console.log("MANTENCIÓN: " + respuesta);
                    if (respuesta == 1) {
                        swalfire("¡Hubo un error al registrar mantención en el medicamento!", "error");
                    } else if (respuesta == 2) {
                        swalfire("¡Medicamento mantenido exitosamente", "success");
                        tablamedicamentos.ajax.reload(null, false);
                    } else if (respuesta == 3) {
                        swalfire("¡No se encuentra el Medicamento", "error");
                    } else if (respuesta == 4 || respuesta == 5) {
                        swalfire("¡Verifique stock solicitado!", "error");
                    } else if (respuesta == 6 || respuesta == 7 || respuesta == 8) {
                        swalfire("¡El stock a solicitar debe ser menor al stock disponible para este medicamento", "error");
                    } else if (respuesta == 9) {
                        swalfire("¡Parámetros no recibidos!", "error");
                    }
                }).fail(function () {
                    swalfire("Ocurrio un Error Inesperado", "error")
                });
            }
        }
    });

    mostrarStockMaximo(idmedicamento);
}

function ocultarmedicamento(idmedic) {
    Swal.fire({
        title: '¿Desea ocultar el medicamento?',
        //icon: 'info',
        showClass: { //para esta animación del modal integre un css llamado animate.min.css
            popup: 'animate__animated animate__fadeInDown'
        },
        hideClass: {
            popup: 'animate__animated animate__fadeOutUp'
        },
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Si, confirmo',
        cancelButtonText: 'No, cancelar',
        confirmButtonColor: "#e74a3b",
        cancelButtonColor: "#858796",
        width: '550px',
        preConfirm: () => {
            if (validavacioynulo([idmedic])) { Swal.showValidationMessage('¡No se ha recibido parámetro del medicamento!') }
            else {
                $.post('funciones/acceso.php', { idmedicamento: idmedic, seleccionar: 7 }, function (respuesta) {
                    //console.log(" Ocultar Medicamento: " + respuesta);
                    if (respuesta == 1) {
                        swalfire("¡Campo vacio!", "error");
                    } else if (respuesta == 2) {
                        swalfire("¡Medicamento ya se encuentra oculto", "error");
                        tablamedicamentos.ajax.reload(null, false);
                        TablaMedicOcultos.ajax.reload(null, false);
                    }  else if (respuesta == 3) {
                        swalfire("¡Hubo un error al ocultar medicamento", "error");
                    } else if (respuesta == 4) {
                        swalfire("Medicamento ocultado!", "success");
                        tablamedicamentos.ajax.reload(null, false);
                        TablaMedicOcultos.ajax.reload(null, false);
                    } else if (respuesta == 5) {
                        swalfire("¡Parámetros no recibidos!", "error");
                    }
                }).fail(function () {
                    swalfire("Ocurrio un Error Inesperado", "error")
                });
            }
        }
    });
}

function agregartipomedicamento() {

    let nombretipomed = $('#nombretipomed').val(); //este lo uso para validar y el let archivo, para enviar como file

    // for (var i of formData.entries()) {
    //     console.log(i[0] + ', ' + i[1]);
    // }

    if (validavacioynulo([nombretipomed])) { toastr.info('Campo nombre del <strong>tipo de medicamento</strong> vacio'); }
    else {
        let formData = new FormData();
        formData.append("seleccionar", 11);
        formData.append("nombretipomed", nombretipomed);

        $.ajax({
            type: 'POST',
            url: 'funciones/acceso.php',
            data: formData,
            dataType: 'text',
            contentType: false,
            cache: false,
            processData: false
        }).done(function (respuesta) {
            console.log("respuesta: " + respuesta);
            if (respuesta == 1) {
                toastr.error("¡Campos vacios!");
            } else if (respuesta == 2) {
                toastr.error("¡Existe un tipo de medicamento con ese nombre");
            } else if (respuesta == 3) {
                toastr.error("¡Hubo un error al ingresar el tipo de medicamento, si el problema persiste, contacte a soporte.");
            } else if (respuesta == 4) {
                $('#nombretipomed').val('');
                llenarSelectTipoMedicamento();
                toastr.success("¡Tipo de Medicamento Registrado!");
                tablaTipomedicamentos.ajax.reload(null, false);
            } else if (respuesta == 5) {
                toastr.error("¡Parámetros no recibidos!");
            }
        }).fail(function (res) {
            console.log(res);
        });
    }
}

function agregarcategoriamedicamento() {

    let nombrecatmed = $('#nombrecatmed').val(); //este lo uso para validar y el let archivo, para enviar como file

    // for (var i of formData.entries()) {
    //     console.log(i[0] + ', ' + i[1]);
    // }

    if (validavacioynulo([nombrecatmed])) { toastr.info('Campo nombre de la <strong>categoria del medicamento</strong> vacia'); }
    else {
        let formData = new FormData();
        formData.append("seleccionar", 12);
        formData.append("nombrecatmed", nombrecatmed);

        $.ajax({
            type: 'POST',
            url: 'funciones/acceso.php',
            data: formData,
            dataType: 'text',
            contentType: false,
            cache: false,
            processData: false
        }).done(function (respuesta) {
            console.log("respuesta: " + respuesta);
            if (respuesta == 1) {
                toastr.error("¡Campos vacios!");
            } else if (respuesta == 2) {
                toastr.error("¡Existe una categoría de medicamento con ese nombre");
            } else if (respuesta == 3) {
                toastr.error("Hubo un error al ingresar el tipo de medicamento, si el problema persiste, contacte a soporte.");
            } else if (respuesta == 4) {
                $('#nombrecatmed').val('');
                llenarSelectCategoriaMedicamento();
                toastr.success("¡Categoría de Medicamento Registrada!");
                tablaCatmed.ajax.reload(null, false);
            } else if (respuesta == 5) {
                toastr.error("¡Parámetros no recibidos!");
            }
        }).fail(function (res) {
            console.log(res);
        });
    }
}

function editarTipoMed(IDTIPOMED, NOMBRETIPOMED) {

    Swal.fire({
        title: 'Editar Tipo Medicamento',
        //icon: 'info',
        // showClass: { //para esta animación del modal integre un css llamado animate.min.css
        //     popup: 'animate__animated animate__fadeInDown'
        // },
        // hideClass: {
        //     popup: 'animate__animated animate__fadeOutUp'
        // },
        html: `
        <div style="max-width: 0; max-height: 0; overflow: hidden;"><input autofocus="true" /> Hago esto para deshabilitar el autofocus del primer input</div>
        <div class="row justify-content-center pt-3">
            <div class="col-lg-12">
                <div class="form-group">
                    <label id="labelparaswal">Nombre</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa fa-etsy" aria-hidden="true" style="width: 13px;"></i></span>
                        <input type="text" class="form-control" id="Etipmed" name="Etipmed"  minlength="2" maxlength="100" placeholder="Nombre del tipo de medicamento" value="`+ NOMBRETIPOMED + `" onkeypress="return sololetrasynumeros(event)" onpaste="return false" required>
                    </div>
                </div>
            </div>
        </div>`,
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Guardar',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: "#17a2b8",
        cancelButtonColor: "#858796",
        width: '500px',

        preConfirm: () => {
            let tmed = $('#Etipmed').val();

            if (validavacioynulo([IDTIPOMED, tmed])) { Swal.showValidationMessage('Campo nombre tipo medicamento inválido') }
            else if (tmed.length < 2 || tmed.length > 100) { Swal.showValidationMessage('Tamaño del campo nombre, <br> mínimo: 2 y máximo: 100 caracteres'); }
            else {
                $.post('funciones/acceso.php', { IDTIPOMED: IDTIPOMED, tmed: tmed, seleccionar: 13 }, function (respuesta) {
                    // console.log("EDITAR DEL SWAL: " + respuesta);
                    if (respuesta == 1) {
                        toastr.error("¡Campo vacio!");
                    } else if (respuesta == 2) {
                        toastr.error("¡Existe un tipo de medicamento con ese nombre");
                        //Hago creer al usuario que edita pero en realidad está enviando el mismo nombre
                        // toastr.success("¡Tipo de Medicamento Editado!");
                    } else if (respuesta == 3) {
                        toastr.error("Hubo un error al ingresar el tipo de medicamento, si el problema persiste, contacte a soporte.");
                    } else if (respuesta == 4) {
                        llenarSelectTipoMedicamento();
                        toastr.success("¡Tipo de Medicamento Editado!");
                        tablaTipomedicamentos.ajax.reload(null, false);
                    } else if (respuesta == 5) {
                        toastr.error("¡Parámetros no recibidos!");
                    }
                }).fail(function () {
                    swalfire("Ocurrio un Error Inesperado");
                });
            }

        }
    });
}

function editarCatMed(IDCATMED, NOMBRECATMED) {

    Swal.fire({
        title: 'Editar Tipo Medicamento',
        //icon: 'info',
        // showClass: { //para esta animación del modal integre un css llamado animate.min.css
        //     popup: 'animate__animated animate__fadeInDown'
        // },
        // hideClass: {
        //     popup: 'animate__animated animate__fadeOutUp'
        // },
        html: `
        <div style="max-width: 0; max-height: 0; overflow: hidden;"><input autofocus="true" /> Hago esto para deshabilitar el autofocus del primer input</div>
        <div class="row justify-content-center pt-3">
            <div class="col-lg-12">
                <div class="form-group">
                    <label id="labelparaswal">Nombre</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa fa-etsy" aria-hidden="true" style="width: 13px;"></i></span>
                        <input type="text" class="form-control" id="Ecatmed" name="Ecatmed"  minlength="2" maxlength="100" placeholder="Nombre de la categoria del medicamento" value="`+ NOMBRECATMED + `" onkeypress="return sololetrasynumeros(event)" onpaste="return false" required>
                    </div>
                </div>
            </div>
        </div>`,
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Guardar',
        cancelButtonText: 'Cancelar',
        confirmButtonColor: "#17a2b8",
        cancelButtonColor: "#858796",
        width: '500px',

        preConfirm: () => {
            let catmed = $('#Ecatmed').val();

            if (validavacioynulo([IDCATMED, catmed])) { Swal.showValidationMessage('Campo nombre de categoria medicamento inválido') }
            else if (catmed.length < 2 || catmed.length > 100) { Swal.showValidationMessage('Tamaño del campo nombre, <br> mínimo: 2 y máximo: 100 caracteres'); }
            else {
                $.post('funciones/acceso.php', { IDCATMED: IDCATMED, catmed: catmed, seleccionar: 14 }, function (respuesta) {
                    // console.log("EDITAR DEL SWAL: " + respuesta);
                    if (respuesta == 1) {
                        toastr.error("¡Campo vacio!");
                    } else if (respuesta == 2) {
                        toastr.error("¡Existe una categoría de medicamento con ese nombre");
                        //Hago creer al usuario que edita pero en realidad está enviando el mismo nombre
                        // toastr.success("¡Categoria de Medicamento Editada!");
                    } else if (respuesta == 3) {
                        toastr.error("Hubo un error al ingresar el tipo de medicamento, si el problema persiste, contacte a soporte.");
                    } else if (respuesta == 4) {
                        llenarSelectCategoriaMedicamento();
                        toastr.success("¡Categoria de Medicamento Editada!");
                        tablaCatmed.ajax.reload(null, false);
                    } else if (respuesta == 5) {
                        toastr.error("¡Parámetros no recibidos!");
                    }
                }).fail(function () {
                    swalfire("Ocurrio un Error Inesperado");
                });
            }

        }
    });
}

function eliminarTipoMed(IDTIPOMED) {
    Swal.fire({
        title: '¿Desea eliminar el tipo de medicamento?',
        //icon: 'info',
        // showClass: { //para esta animación del modal integre un css llamado animate.min.css
        //     popup: 'animate__animated animate__fadeInDown'
        // },
        // hideClass: {
        //     popup: 'animate__animated animate__fadeOutUp'
        // },
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Si, confirmo',
        cancelButtonText: 'No, cancelar',
        confirmButtonColor: "#f6c23e",
        cancelButtonColor: "#858796",
        width: '550px',
        preConfirm: () => {
            if (validavacioynulo([IDTIPOMED])) { Swal.showValidationMessage('¡No se ha recibido parámetro en el tipo de medicamento!') }
            else {
                $.post('funciones/acceso.php', { IDTIPOMED: IDTIPOMED, seleccionar: 15 }, function (respuesta) {
                    //console.log("ELIMINAR PACIENTE: " + respuesta);
                    if (respuesta == 1) {
                        toastr.error("¡Campo vacio!");
                    } else if (respuesta == 2) {
                        toastr.error("¡El tipo de medicamento está vinculado a un medicamento, por lo tanto, no se puede eliminar.");
                    } else if (respuesta == 3) {
                        toastr.error("Hubo un error al eliminar el tipo de medicamento, si el problema persiste, contacte a soporte.");
                    } else if (respuesta == 4) {
                        llenarSelectTipoMedicamento();
                        tablaTipomedicamentos.ajax.reload(null, false);
                        toastr.success("¡tipo de medicamento Eliminado!");
                    } else if (respuesta == 5) {
                        toastr.error("¡Parámetros no recibidos!");
                    }
                }).fail(function () {
                    swalfire("Ocurrio un Error Inesperado", "error")
                });
            }
        }
    });
}

function eliminarCatMed(IDCATMED) {
    Swal.fire({
        title: '¿Desea eliminar la categoria de medicamento?',
        //icon: 'info',
        // showClass: { //para esta animación del modal integre un css llamado animate.min.css
        //     popup: 'animate__animated animate__fadeInDown'
        // },
        // hideClass: {
        //     popup: 'animate__animated animate__fadeOutUp'
        // },
        focusConfirm: false,
        showCancelButton: true,
        confirmButtonText: 'Si, confirmo',
        cancelButtonText: 'No, cancelar',
        confirmButtonColor: "#f6c23e",
        cancelButtonColor: "#858796",
        width: '550px',
        preConfirm: () => {
            if (validavacioynulo([IDCATMED])) { Swal.showValidationMessage('¡No se ha recibido parámetro de la categoría de medicamento!') }
            else {
                $.post('funciones/acceso.php', { IDCATMED: IDCATMED, seleccionar: 16 }, function (respuesta) {
                    //console.log("ELIMINAR PACIENTE: " + respuesta);
                    if (respuesta == 1) {
                        toastr.error("¡Campo vacio!");
                    } else if (respuesta == 2) {
                        toastr.error("¡La categoría está vinculada a un medicamento, por lo tanto, no se puede eliminar.");
                    } else if (respuesta == 3) {
                        toastr.error("Hubo un error al eliminar la categoría de medicamento, si el problema persiste, contacte a soporte.");
                    } else if (respuesta == 4) {
                        llenarSelectCategoriaMedicamento();
                        tablaCatmed.ajax.reload(null, false);
                        toastr.success("¡categoría de medicamento Eliminada!");
                    } else if (respuesta == 5) {
                        toastr.error("¡Parámetros no recibidos!");
                    }
                }).fail(function () {
                    swalfire("Ocurrio un Error Inesperado", "error")
                });
            }
        }
    });
}

function llenarSelectTipoMedicamento() {
    $.post('funciones/acceso.php', { seleccionar: 6, subselect: 1 }, function (respuesta) {
        //  console.log("RESPP: " + respuesta);
        $('#tipomedicamento').html(respuesta);
    }).fail(function () {
        swalfire("No se pudo cargar el tipo de medicamento", "error")
    });
}
function llenarSelectCategoriaMedicamento() {
    $.post('funciones/acceso.php', { seleccionar: 6, subselect: 2 }, function (respuesta) {
        //  console.log("RESPP: " + respuesta);
        $('#categoriamedicamento').html(respuesta);
    }).fail(function () {
        swalfire("No se pudo cargar la categoria de medicamento", "error")
    });
}

function llenarSelectEditarMedicamento(idcategoria, idtipomedicamento) {
    $.post('funciones/acceso.php', { seleccionar: 6, subselect: 1 }, function (respuesta) {
        //  console.log("RESPP: " + respuesta);
        $('#EDtipomedicamento').html(respuesta);
        $('#EDtipomedicamento option[value="' + idtipomedicamento + '"]').prop('selected', true);
    }).fail(function () {
        swalfire("No se pudo cargar el tipo de medicamento", "error")
    });

    $.post('funciones/acceso.php', { seleccionar: 6, subselect: 2 }, function (respuesta) {
        //  console.log("RESPP: " + respuesta);
        $('#EDcategoriamedicamento').html(respuesta);
        $('#EDcategoriamedicamento option[value="' + idcategoria + '"]').prop('selected', true);
    }).fail(function () {
        swalfire("No se pudo cargar la categoria de medicamento", "error")
    });
}

function ValidaImgDeMedicamento() {
    $('#EDimagen').on('change', function () {
        var ext = $(this).val().split('.').pop();
        if ($(this).val() != '') {
            if (ext == "jpg" || ext == "png" || ext == "JPEG" || ext == "jpeg" || ext == "JPG" || ext == "PNG" || ext == "bmp") {
                // console.log("La extensión es: " + ext);
                if ($(this)[0].files[0].size > 20971520) { //1048576bytes * 20 = 20MB   (IMAGEN NO MAYPR A 20 MB)
                    // 1024bytes=1KB, 1048576bytes=1MB, 1024*1024*1024 (bytes)= 1GB
                    // console.log("La imagen excede el tamaño máximo: archivo no debe ser mayor a 20 MB");
                    alertify.error("Tamaño excede a 20 MB");
                    $(this).val('');
                }
            } else {
                $(this).val('');
                alertify.error("Sólo se permiten imagenes");
                console.log("Extensión no permitida: " + ext);
            }
        }
    });
}


function mostrarStockMaximo(idmedicamento) {
    $('#estadomantencionmedicamento').on('change', function () {
        let estadorecibidodelselect = $(this).val();
        let estadoaconsultar;

        if (estadorecibidodelselect != '') {
            $('#mostrarmaximo').removeAttr('hidden');
            if (estadorecibidodelselect == 1 || estadorecibidodelselect == 2 || estadorecibidodelselect == 3) estadoaconsultar = 1;
            else if (estadorecibidodelselect == 4) estadoaconsultar = 3;

            $.post('funciones/acceso.php', { seleccionar: 5, idmedicamento: parseInt(idmedicamento), estadohistorialmedicamento: parseInt(estadoaconsultar) }, function (respuesta) {
                console.log("RESPP: " + respuesta);
                if (respuesta == -1) {
                    alertify.error("Hubo un error, no se puede mostrar stock maximo de ese estado en particular")
                } else if (respuesta == -2) {
                    alertify.error("No hay stock maximo de ese estado en particular que mostrar")
                } else if (respuesta == -3) {
                    alertify.error("No se han recibido parámetros")
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
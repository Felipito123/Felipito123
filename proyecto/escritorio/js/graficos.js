// Chart.defaults.global.defaultFontFamily = 'Arial';
// Chart.defaults.global.defaultFontColor = '#858796';
// Chart.defaults.font.size = 16;

var cincopatologiasfrecuentes;
var PacientesIngresadosPorMes;
var ExpPacPorRangoEdadYGenero;
var ExpMaterialDeAseoOficinaHigienePorCategoria;
var Exp5articulosmascalificados;
var ExpBandejaMensajesPorSemestre;
var ExpStockMensualMaterialesBodega;
var ExpBannerIMGeVID;
var ExpSolAprbRechzAgenRetMed;
var ExpSolicDeMedTrimestral;
var ExpSolTotalRespoYnoRespAgenRetMed;
var ExpCantTotalSolicDePermisoEspAdmiFerLeg;
var ExpoMotivoSolcPermEspecial;
var ExpTipoRemSolcPermAdminHistorial;
var ExpCantTotalMedPorEstadoDispoEntrVenc;
var ExpGraficoHistoricoRegMedPorDiaDeSemana;
var ExpCrearGraficoHistoricoEstadosMedPorDiaDeSemana;
var ExpGraficoHistoricoEstadosMedPorTrimestre;
var ExpGraficoCantRespSolicitudesReclamosSugerencias;
var ExpGraficoCantTipSolicLibroRSF;
var ExpGraficoInstMayorCantDeSolicReclamos;
var ExpSectconMayorCantDeFuncionarios;
var ExpGraficoCantDeFuncionariosPorUnidad;
var ExpGraficoCantMaterBodTrim;
var ExpcrearGraficoMedAgenDiaDeSemana;
var ExpcrearGraficoConcComentarioUsuarporArticulo;
var ExpcrearGraficoArticuloMasComentados;
var ExpcrearGraficoAyudasSopTecnico;
var ExpcrearGraficoSeguimientoCalificacionesDeLosArticulos;
var ExpcrearGraficoEstadisticaVisitasYvisitantesArtNoticia;




$.post("funciones/acceso.php", { seleccionar: 1 }, function (data) {
    crearGraficopatologiasFrecuentes(data);
    // console.log("TEMP: \n"+data); let temp = JSON.parse(data);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});

$.post("funciones/acceso.php", { seleccionar: 2 }, function (data) {
    graficopacientesregistrado(data);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});

$.post("funciones/acceso.php", {
    seleccionar: 3
}, function (respuesta) {
    PacientesegunRangodeEdadyGenero(respuesta);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});

$.post("funciones/acceso.php", {
    seleccionar: 4
}, function (respuesta) {
    // console.log("RESA: "+respuesta);
    crearGraficoCantMaterialesDeAsOfHigVsCat(respuesta);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});

$.post("funciones/acceso.php", {
    seleccionar: 5
}, function (respuesta) {
    // console.log("RESA: "+respuesta);
    crearGrafico5ArticulosMasCalificados(respuesta);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});

$.post("funciones/acceso.php", {
    seleccionar: 7
}, function (respuesta) {
    // console.log("RES7: "+respuesta);
    crearGraficoBandejaMensajesPorSemestre(respuesta);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});

$.post("funciones/acceso.php", {
    seleccionar: 10
}, function (respuesta) {
    // console.log("RES10: "+respuesta);
    crearGraficoStockmensualmaterialesBodega(respuesta);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});

$.post("funciones/acceso.php", {
    seleccionar: 11
}, function (respuesta) {
    // console.log("RES11: "+respuesta);
    crearGraficoBannerImgVidActEInact(respuesta);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});

$.post("funciones/acceso.php", {
    seleccionar: 12
}, function (respuesta) {
    // console.log("RES12: "+respuesta);
    crearSolicitudAgendaRetiroDeMedicamentosTrimestral(respuesta);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});

$.post("funciones/acceso.php", {
    seleccionar: 13
}, function (respuesta) {
    // console.log("RES13: "+respuesta);
    crearSolicitudDeMedicamentosTrimestral(respuesta);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});

$.post("funciones/acceso.php", {
    seleccionar: 15
}, function (respuesta) {
    // console.log("RES15: "+respuesta);
    crearGraficoCantTotalSolicitudAgendaRetiroDeMedicamentos(respuesta);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});

$.post("funciones/acceso.php", {
    seleccionar: 16
}, function (respuesta) {
    // console.log("RES16: "+respuesta);
    crearGraficoCantTotalSolicDePermisoEspAdmiFerLeg(respuesta);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});

$.post("funciones/acceso.php", {
    seleccionar: 17
}, function (respuesta) {
    // console.log("RES17: "+respuesta);
    crearGraficoMotivoSolcPermEspecial(respuesta);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});

$.post("funciones/acceso.php", {
    seleccionar: 18
}, function (respuesta) {
    // console.log("RES18: "+respuesta);
    crearGraficoTipoRemSolcPermAdminHistorial(respuesta);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});

$.post("funciones/acceso.php", {
    seleccionar: 19
}, function (respuesta) {
    // console.log("RES19: "+respuesta);
    crearGraficoCantTotalMedPorEstadoDispoEntrVenc(respuesta);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});

$.post("funciones/acceso.php", {
    seleccionar: 20
}, function (respuesta) {
    // console.log("RES20: "+respuesta);
    crearGraficoHistoricoRegMedPorDiaDeSemana(respuesta);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});

$.post("funciones/acceso.php", {
    seleccionar: 21
}, function (respuesta) {
    // console.log("RES21: "+respuesta);
    crearGraficoHistoricoEstadosMedPorDiaDeSemana(respuesta);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});

$.post("funciones/acceso.php", {
    seleccionar: 22
}, function (respuesta) {
    // console.log("RES22: "+respuesta);
    crearGraficoHistoricoEstadosMedPorTrimestre(respuesta);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});

$.post("funciones/acceso.php", {
    seleccionar: 23
}, function (respuesta) {
    // console.log("RES23: "+respuesta);
    crearGraficoCantRespSolicitudesReclamosSugerencias(respuesta);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});

$.post("funciones/acceso.php", {
    seleccionar: 24
}, function (respuesta) {
    // console.log("RES24: "+respuesta);
    crearGraficoCantTipSolicLibroRSF(respuesta);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});

$.post("funciones/acceso.php", {
    seleccionar: 25
}, function (respuesta) {
    // console.log("RES25: "+respuesta);
    crearGraficoInstMayorCantDeSolicReclamos(respuesta);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});

$.post("funciones/acceso.php", {
    seleccionar: 26
}, function (respuesta) {
    // console.log("RES26: "+respuesta);
    crearGraficoSectconMayorCantDeFuncionarios(respuesta);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});

$.post("funciones/acceso.php", {
    seleccionar: 27
}, function (respuesta) {
    // console.log("RES27: "+respuesta);
    crearGraficoCantDeFuncionariosPorUnidad(respuesta);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});

$.post("funciones/acceso.php", {
    seleccionar: 30
}, function (respuesta) {
    // console.log("RES30: "+respuesta);
    crearGraficoCantMaterBodTrim(respuesta);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});

$.post("funciones/acceso.php", {
    seleccionar: 31
}, function (respuesta) {
    // console.log("RES31: " + respuesta);
    crearGraficoMedAgenDiaDeSemana(respuesta);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});

$.post("funciones/acceso.php", {
    seleccionar: 32
}, function (respuesta) {
    // console.log("RES32: " + respuesta);
    crearGraficoConcComentarioUsuarporArticulo(respuesta);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});

$.post("funciones/acceso.php", {
    seleccionar: 33
}, function (respuesta) {
    // console.log("RES33: " + respuesta);
    crearGraficoArticuloMasComentados(respuesta);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});

$.post("funciones/acceso.php", {
    seleccionar: 34
}, function (respuesta) {
    // console.log("RES34: " + respuesta);
    crearGraficoAyudasSopTecnico(respuesta);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});

$.post("funciones/acceso.php", {
    seleccionar: 36
}, function (respuesta) {
    // console.log("RES36: " + respuesta);
    crearGraficoSeguimientoCalificacionesDeLosArticulos(respuesta);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
});





// GRAFICO PATOLOGIAS MÁS FRECUENTES EN PACIENTES
function crearGraficopatologiasFrecuentes(respuesta) {
    var obj = JSON.parse(respuesta);

    var nombre_patologia = [];
    var cantidaddefrecuencia = [];

    for (var i in obj) {
        nombre_patologia.push(obj[i].NOMBRE_PATOLOGIA.substring(0, 29));
        cantidaddefrecuencia.push(obj[i].CANTIDAD);
    }

    /*======================Para excel=====================*/
    let setearnombresparaexcel = obj.map(function (datasss) {
        return {
            "Nombre Patologia": datasss.NOMBRE_PATOLOGIA,
            "Frecuencia en pacientes": datasss.CANTIDAD,
        }
    });
    cincopatologiasfrecuentes = setearnombresparaexcel;
    /*======================Para excel=====================*/


    // Chart.defaults.font.size = 16;
    var ctx = document.getElementById('Pacienteconpatologias').getContext('2d');
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: nombre_patologia,
            datasets: [{
                label: "Frecuencia",
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#ff8a80", "#66bb6a", "#dcd1ef", "#9e72e8", "#b6d6e4", "#95c6dc", "#2e799a", "#f3d374", "#f39b19"],
                data: cantidaddefrecuencia
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                // text: 'Patologias más frecuentes en pacientes'
            },
            scales: {
                yAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        stepSize: 1, // Y que sea por valor numerico
                        beginAtZero: true //Establezo que comienze en 0 el gráfico
                    }
                }],
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        fontFamily: "Helvetica"
                    }
                }]
            }
        }
    });
}


// GRAFICO DE PACIENTES REGISTRADOS MENSUALMENTE EN EL AÑO EN CURSO
function graficopacientesregistrado(respuesta) {
    var obj = JSON.parse(respuesta);

    var fecha_registro = [];
    var cantidaddefrecuencia = [];

    for (var i in obj) {
        let var1 = moment(obj[i].FECHA_REGISTRO).format('DD-MMM-YYYY');
        let expl = var1.split("-");
        let fechaseteada = expl[0] + ' de ' + traducirmeses(expl[1]) + " del " + expl[2];
        fecha_registro.push(fechaseteada);
        cantidaddefrecuencia.push(obj[i].CANTIDAD);
    }

    //     for(var i=0; i< obj.length; i++){
    //         fecha_registro[i]=obj[i].FECHA_REGISTRO;
    //         cantidaddefrecuencia[i]=obj[i].CANTIDAD;
    //    }

    /*======================Para excel=====================*/
    let setearnombresparaexcel = obj.map(function (datasss) {
        let expl = datasss.FECHA_REGISTRO.split("-");
        return {
            "Fecha de Ingreso": expl[2] + "/" + expl[1] + "/" + expl[0],
            "Cantidad": datasss.CANTIDAD,
        }
    });
    PacientesIngresadosPorMes = setearnombresparaexcel;
    /*======================Para excel=====================*/

    // console.log("FECHA: " + fecha_registro + " CANTIDAD: " + cantidaddefrecuencia)

    var graf = document.getElementById('graficopacientesregistrado').getContext('2d');

    var myBarChart = new Chart(graf, {
        type: 'horizontalBar',
        data: {
            labels: fecha_registro,
            datasets: [{
                label: "Cantidad",
                data: cantidaddefrecuencia,
                backgroundColor: ["#dcd1ef", "#dcd1ef", "#dcd1ef", "#dcd1ef", "#dcd1ef", "#dcd1ef", "#dcd1ef", "#dcd1ef", "#dcd1ef", "#dcd1ef", "#dcd1ef", "#dcd1ef"],
                // borderWidth: 1
            }]
        }, options: {
            legend: {
                display: false
            },
            labels: {
                font: {
                    size: 25
                }
            },
            tooltips: {
                callbacks: {
                    label: function (tooltipItem) {
                        let mostrartooltip = '';
                        if (tooltipItem.xLabel < 2) {
                            mostrartooltip = tooltipItem.xLabel + " Paciente registrado";
                            // mostrartooltip= tooltipItem.xLabel + " Paciente ingresado en"+tooltipItem.yLabel;
                        } else {
                            mostrartooltip = tooltipItem.xLabel + " Pacientes registrados";
                        }
                        return mostrartooltip;
                    }
                }
            },
            scales: {
                yAxes: [{
                    display: true,
                    gridLines: {
                        display: true //Lineas del fondo
                    },
                    ticks: {
                        // stepSize: 1,
                        // beginAtZero: true
                        fontColor: '#464646',
                        fontSize: 12,
                        fontFamily: "Helvetica",
                        callback: function (label, index, labels) {
                            let expl = label.split("del");
                            let porcion = expl[0].split("de");
                            // console.log(label);
                            return porcion[1] + expl[1];
                            // return traducir_label(label);
                        }
                    }
                }],
                xAxes: [{
                    display: true,

                    gridLines: {
                        display: true //Lineas del fondo
                    },
                    ticks: {
                        stepSize: 1, // Y que sea por valor numerico
                        beginAtZero: true //Establezo que comienze en 0 el gráfico
                    }
                }]
            }
        }
    });
}

function PacientesegunRangodeEdadyGenero(res) {
    var pacienteporRangoyGenero = [];
    var obj = JSON.parse(res);

    for (var i in obj) {
        pacienteporRangoyGenero.push({ edad: obj[i].edad, hombre: obj[i].hombre, mujer: obj[i].mujer });
    }

    /*======================Para excel=====================*/
    let setearnombresparaexcel = obj.map(function (datasss) {
        return {
            "Rango de edad (años)": datasss.edad,
            "Hombre": datasss.hombre,
            "Mujer": datasss.mujer
        }
    });
    ExpPacPorRangoEdadYGenero = setearnombresparaexcel;
    /*======================Para excel=====================*/

    var options = {
        height: 500,
        width: 450,
        style: {
            leftBarColor: "#229922",
            rightBarColor: "#992222"
        }
    }
    pyramidBuilder(pacienteporRangoyGenero, '#graficohombreymujer', options);
    // console.log(pacienteporRangoyGenero);
}

// GRÁFICO CANTIDAD DE MATERIALES DE ASEO, OFICINA E HIGIENE VS CATEGORIA
function crearGraficoCantMaterialesDeAsOfHigVsCat(respuesta) {
    var obj = JSON.parse(respuesta);

    var nombre_categoria = [];
    var cantidaddefrecuencia = [];

    for (var i in obj) {
        nombre_categoria.push(obj[i].NOMBRE_CAT_MB);
        cantidaddefrecuencia.push(obj[i].CANTIDAD);
    }

    /*======================Para excel=====================*/
    let setearnombresparaexcel = obj.map(function (datasss) {
        return {
            "Nombre Categoria Material": datasss.NOMBRE_CAT_MB,
            "Cantidad": datasss.CANTIDAD,
        }
    });
    ExpMaterialDeAseoOficinaHigienePorCategoria = setearnombresparaexcel;
    /*======================Para excel=====================*/


    // Chart.defaults.font.size = 16;
    var ctx = document.getElementById('graficoMaterialesPorCategoria').getContext('2d');
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: nombre_categoria,
            datasets: [{
                label: "Cantidad",
                backgroundColor: ["#2e799a", "#b6d6e4", "#3cba9f", "#ff8a80", "#f3d374", "#f39b19"],
                data: cantidaddefrecuencia
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                // text: 'Patologias más frecuentes en pacientes'
            },
            scales: {
                yAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        stepSize: 1, // Y que sea por valor numerico
                        beginAtZero: true //Establezo que comienze en 0 el gráfico
                    }
                }],
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false
                    },
                    ticks: {
                        fontFamily: "Helvetica"
                    }
                }]
            }
        }
    });
}

// GRÁFICO 5 ARTICULOS MÁS CALIFICADOS
function crearGrafico5ArticulosMasCalificados(respuesta) {
    var obj = JSON.parse(respuesta);

    var titulo_articulo = [];
    var promedio = [];

    for (var i in obj) {
        titulo_articulo.push(obj[i].TITULO_ARTICULO.substring(0, 45));
        promedio.push(obj[i].PROMEDIO);
    }

    /*======================Para excel=====================*/
    let setearnombresparaexcel = obj.map(function (datasss) {
        return {
            "Titulo artículo": datasss.TITULO_ARTICULO,
            "Calificacion": datasss.PROMEDIO,
        }
    });
    Exp5articulosmascalificados = setearnombresparaexcel;
    /*======================Para excel=====================*/

    // GRAFICO 4 - TORTA
    ctx = document.getElementById('cincArtMejorCalificado').getContext('2d');
    myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: titulo_articulo,
            datasets: [{
                label: 'Cantidad',
                data: promedio,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    "#dcd1ef",
                    "#f3d374"
                ],
                // borderColor: [
                //     'rgba(255, 99, 132, 1)',
                //     'rgba(54, 162, 235, 1)'
                // ],
                // borderWidth: 1
            }]
        },
        options: {
            legend: {
                display: true,
                labels: {
                    fontFamily: 'Helvetica'
                }
            },
            title: {
                display: false,
                // text: 'Titulo del gráfico'
            }
        }
    });
}


// GRAFICO BANDEJA DE MENSAJES POR SEMESTRE
function crearGraficoBandejaMensajesPorSemestre(respuesta) {
    var obj = JSON.parse(respuesta);

    let primersemestre = obj[0].total_bandeja_primSem;
    let segundosemestre = obj[1].total_bandeja_segSem;

    /*======================Para excel=====================*/
    // let setearnombresparaexcel = obj.map(function (datasss) {
    //     return {
    //         "Primer Semestre": datasss.total_bandeja_primSem,
    //         "Segundo Semestre": datasss.total_bandeja_segSem,
    //     }
    // });
    // ExpBandejaMensajesPorSemestre = setearnombresparaexcel;

    ExpBandejaMensajesPorSemestre = [{
        "Primer semestre": primersemestre,
        "Segundo semestre": segundosemestre
    }];
    /*======================Para excel=====================*/

    var ctc = document.getElementById('banjmensjporsemestre');
    var miaf = new Chart(ctc, {
        type: 'doughnut',
        data: {
            labels: ['Mensajes Primer Semestre', 'Mensajes Segundo Semestre'],
            datasets: [{
                label: ['#primsem', '#segsem'],
                data: [primersemestre, segundosemestre],
                backgroundColor: [
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(153, 102, 255, 0.2)'
                ],
                // borderColor: [
                //     'rgba(255, 99, 132, 1)',
                //     'rgba(54, 162, 235, 1)'
                // ],
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                display: true,
                labels: {
                    fontFamily: 'Helvetica'
                }
            },
            title: {
                display: false,
                // text: 'Patologias más frecuentes en pacientes'
            }
        }

    });

}

// GRAFICO STOCK MENSUAL DE MATERIALES EN BODEGA
function crearGraficoStockmensualmaterialesBodega(respuesta) {
    let jsonresp, contador;
    jsonresp = JSON.parse(respuesta);
    contador = jsonresp.length;

    // console.log("PROBAR DATOS: " + respuesta);
    // console.log("LARGO DEL ARRAY: " + contador);

    var cantidad_Aseo = [], cantidad_Oficina = [], cantidad_Higiene = [];

    for (var i in jsonresp[0]) {
        cantidad_Aseo.push(jsonresp[0][i].CANTIDAD);
    }
    for (var i in jsonresp[1]) {
        cantidad_Oficina.push(jsonresp[1][i].CANTIDAD);
    }
    for (var i in jsonresp[2]) {
        cantidad_Higiene.push(jsonresp[2][i].CANTIDAD);
    }

    var maxima_cantidad = parseInt(jsonresp[3].CANTIDADMAXIMA); // le sumo 50 a la cantidad máxima del stock de los materiales

    /*======================Para excel=====================*/
    var paraexportarenExcel = [
        {
            "CATEGORIA": "Aseo",
            "Enero": cantidad_Aseo[0],
            "Febrero": cantidad_Aseo[1],
            "Marzo": cantidad_Aseo[2],
            "Abril": cantidad_Aseo[3],
            "Mayo": cantidad_Aseo[4],
            "Junio": cantidad_Aseo[5],
            "Julio": cantidad_Aseo[6],
            "Agosto": cantidad_Aseo[7],
            "Septiembre": cantidad_Aseo[8],
            "Octubre": cantidad_Aseo[9],
            "Noviembre": cantidad_Aseo[10],
            "Diciembre": cantidad_Aseo[11]
        },
        {
            "CATEGORIA": "Oficina",
            "Enero": cantidad_Oficina[0],
            "Febrero": cantidad_Oficina[1],
            "Marzo": cantidad_Oficina[2],
            "Abril": cantidad_Oficina[3],
            "Mayo": cantidad_Oficina[4],
            "Junio": cantidad_Oficina[5],
            "Julio": cantidad_Oficina[6],
            "Agosto": cantidad_Oficina[7],
            "Septiembre": cantidad_Oficina[8],
            "Octubre": cantidad_Oficina[9],
            "Noviembre": cantidad_Oficina[10],
            "Diciembre": cantidad_Oficina[11]
        },

        {
            "CATEGORIA": "Higiene",
            "Enero": cantidad_Higiene[0],
            "Febrero": cantidad_Higiene[1],
            "Marzo": cantidad_Higiene[2],
            "Abril": cantidad_Higiene[3],
            "Mayo": cantidad_Higiene[4],
            "Junio": cantidad_Higiene[5],
            "Julio": cantidad_Higiene[6],
            "Agosto": cantidad_Higiene[7],
            "Septiembre": cantidad_Higiene[8],
            "Octubre": cantidad_Higiene[9],
            "Noviembre": cantidad_Higiene[10],
            "Diciembre": cantidad_Higiene[11]
        }
    ];
    ExpStockMensualMaterialesBodega = paraexportarenExcel;
    /*======================Para excel=====================*/


    // console.log("CANTIDAD DE ASEO: " + cantidad_Aseo);
    // console.log("CANTIDAD DE OFICINA: " + cantidad_Oficina);
    // console.log("CANTIDAD DE HIGIENE: " + cantidad_Higiene);

    const ctx2 = document.getElementById("GraficoStockmensualmaterialesBodega").getContext('2d');
    const gradientStroke1 = ctx2.createLinearGradient(500, 0, 100, 0);
    gradientStroke1.addColorStop(0, "#f53c79");
    gradientStroke1.addColorStop(1, "#f0ae00");

    const gradientStroke2 = ctx2.createLinearGradient(500, 0, 100, 0);
    gradientStroke2.addColorStop(0, "#4400eb");
    gradientStroke2.addColorStop(1, "#44ecf5");

    const gradientStroke3 = ctx2.createLinearGradient(500, 0, 100, 0);
    gradientStroke3.addColorStop(0, "#36b9d8");
    gradientStroke3.addColorStop(1, "#4bffa2");

    ctx2.height = 200;

    new Chart(ctx2, {
        type: 'line',
        legend: {
            display: false
        },
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            type: 'line',
            defaultFontFamily: 'Poppins',
            datasets: [{
                label: "Aseo",
                data: cantidad_Aseo,
                backgroundColor: 'transparent',
                borderColor: "#1BC167",
                borderWidth: 4,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: "#fff",
                pointBackgroundColor: "#1BC167",

            }
                , {
                label: "Oficina",
                data: cantidad_Oficina,
                backgroundColor: 'transparent',
                borderColor: "#508FF4",
                borderWidth: 4,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: '#fff',
                pointBackgroundColor: "#508FF4",
            }
                ,
            {
                label: "Higiene",
                data: cantidad_Higiene,
                backgroundColor: 'transparent',
                borderColor: "#008080",
                borderWidth: 4,
                pointStyle: 'circle',
                pointRadius: 5,
                pointBorderColor: '#fff',
                pointBackgroundColor: "#008080",
            }

            ]
        },
        options: {
            responsive: true,
            tooltips: {
                display: false,
                mode: 'index',
                titleFontSize: 10,
                titleFontColor: '#706F9A',
                bodyFontColor: '#706F9A',
                backgroundColor: '#fff',
                titleFontFamily: '"Muli", sans-serif',
                bodyFontFamily: '"Muli", sans-serif',
                cornerRadius: 3,
                intersect: false,
            },
            legend: {
                display: false,
                labels: {
                    usePointStyle: true,
                    fontFamily: 'Montserrat',
                },
            },
            scales: {
                xAxes: [{
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: false,
                        labelString: 'Month'
                    }
                }],
                yAxes: [{
                    display: true,
                    gridLines: {
                        display: false,
                        drawBorder: false
                    },
                    scaleLabel: {
                        display: false,
                    },
                    ticks: {
                        max: maxima_cantidad,
                        min: 0,
                        stepSize: 20
                    }
                }]
            },
            title: {
                display: false,
                text: 'Normal Legend'
            }
        }
    });
}

// GRAFICO BANNER DE IMAGENES Y VIDES, ACTIVOS E INACTIVOS
function crearGraficoBannerImgVidActEInact(respuesta) {
    var obj = JSON.parse(respuesta);

    let banner_img_activo = obj[0].BANNER_IMG_ACTIVO;
    let banner_img_inactivo = obj[1].BANNER_IMG_INACTIVO;
    let banner_vid_activo = obj[2].BANNER_VID_ACTIVO;
    let banner_vid_inactivo = obj[3].BANNER_VID_INACTIVO;

    // console.log("BANNER IMG ACTIVO: " + banner_img_activo);
    // console.log("BANNER IMG INACTIVO: " + banner_img_inactivo);
    // console.log("BANNER VID ACTIVO: " + banner_vid_activo);
    // console.log("BANNER VID INACTIVO: " + banner_vid_inactivo);

    // ExpBannerIMGeVID = [{
    //     "Primer semestre": primersemestre,
    //     "Segundo semestre": segundosemestre
    // }];

    /*======================Para excel=====================*/
    var paraexportarenExcel = [
        {
            "ESTADO": "Activo",
            "Banner Imágenes Activo": banner_img_activo,
            "Banner Videos Activo": banner_vid_activo
        },
        {
            "ESTADO": "Inactivo",
            "Banner Imágenes Inactivo": banner_img_inactivo,
            "Banner Videos Inactivo": banner_vid_inactivo
        }
    ];
    ExpBannerIMGeVID = paraexportarenExcel;
    /*======================Para excel=====================*/

    var ctx = document.getElementById('GraficoBannerIMGeVID');
    var grafico1 = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Banner de imágenes activos', 'Banner de imágenes inactivos', 'Banner de videos activos', 'Banner de videos inactivos'],
            datasets: [{
                label: ['#BnImgAct', '#BnImgInact', '#BnVidAct', '#BnVidInact'],
                data: [banner_img_activo, banner_img_inactivo, banner_vid_activo, banner_vid_inactivo],
                backgroundColor: ['#eca09a', '#b6d6e4', '#ffecd9', '#ebe0ff'],
                hoverOffset: 4,
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                display: true,
                labels: {
                    fontFamily: 'Helvetica'
                }
            },
            title: {
                display: false,
                // text: 'Titulo del gráfico'
            }
        }
    });
}

// GRÁFICO SOLICITUD DE AGENDA DE RETIRO DE MEDICAMENTOS TRIMESTRALMENTE
function crearSolicitudAgendaRetiroDeMedicamentosTrimestral(respuesta) {
    let jsonresp, contador;
    jsonresp = JSON.parse(respuesta);
    contador = jsonresp.length;

    // console.log("PROBAR DATOS: " + respuesta);
    // console.log("LARGO DEL ARRAY: " + contador);

    var Solic_Respondidas = [], Solic_No_respondidas = [];

    Solic_Respondidas.push(jsonresp[0][1].CANTIDAD_SOLICITUDES, jsonresp[1][1].CANTIDAD_SOLICITUDES, jsonresp[2][1].CANTIDAD_SOLICITUDES, jsonresp[3][1].CANTIDAD_SOLICITUDES);
    Solic_No_respondidas.push(jsonresp[0][2].CANTIDAD_SOLICITUDES, jsonresp[1][2].CANTIDAD_SOLICITUDES, jsonresp[2][2].CANTIDAD_SOLICITUDES, jsonresp[3][2].CANTIDAD_SOLICITUDES);

    // console.log("SOLIC APR 1ER SEM: "+jsonresp[0][1].CANTIDAD_SOLICITUDES+"\nSOLIC RECHZ 1ER SEM: "+jsonresp[0][2].CANTIDAD_SOLICITUDES);
    // console.log("SOLIC APR 2ER SEM: "+jsonresp[1][1].CANTIDAD_SOLICITUDES+"\nSOLIC RECHZ 2ER SEM: "+jsonresp[1][2].CANTIDAD_SOLICITUDES);
    // console.log("SOLIC APR 3ER SEM: "+jsonresp[2][1].CANTIDAD_SOLICITUDES+"\nSOLIC RECHZ 3ER SEM: "+jsonresp[2][2].CANTIDAD_SOLICITUDES);
    // console.log("SOLIC APR 4TO SEM: "+jsonresp[3][1].CANTIDAD_SOLICITUDES+"\nSOLIC RECHZ 4TO SEM: "+jsonresp[3][2].CANTIDAD_SOLICITUDES);
    // console.log("SOLIC APROBADAS: "+Solic_Respondidas+"\nSOLIC RECHAZADAS: "+Solic_No_respondidas);

    /*======================Para excel=====================*/
    var paraexportarenExcel = [
        {
            "OPERACIÓN": "Respondidas",
            "Ene/Feb/Mar": jsonresp[0][1].CANTIDAD_SOLICITUDES,
            "Abr/May/Jun": jsonresp[1][1].CANTIDAD_SOLICITUDES,
            "Jul/Ago/Sep": jsonresp[2][1].CANTIDAD_SOLICITUDES,
            "Oct/Nov/Dic": jsonresp[3][1].CANTIDAD_SOLICITUDES
        },
        {
            "OPERACIÓN": "No respondidas",
            "Ene/Feb/Mar": jsonresp[0][2].CANTIDAD_SOLICITUDES,
            "Abr/May/Jun": jsonresp[1][2].CANTIDAD_SOLICITUDES,
            "Jul/Ago/Sep": jsonresp[2][2].CANTIDAD_SOLICITUDES,
            "Oct/Nov/Dic": jsonresp[3][2].CANTIDAD_SOLICITUDES
        }
    ];
    ExpSolAprbRechzAgenRetMed = paraexportarenExcel;
    /*======================Para excel=====================*/

    new Chart(document.getElementById("graficoSolAprbRechzAgenRetMed"), {
        type: 'bar',
        data: {
            labels: ["Ene/Feb/Mar", "Abr/May/Jun", "Jul/Ago/Sep", "Oct/Nov/Dic"],
            datasets: [{
                label: "Solicitudes Respondidas",
                backgroundColor: "#3e95cd",
                data: Solic_Respondidas,
                borderWidth: 1,
                borderRadius: 20
            }, {
                label: "Solicitudes No respondidas",
                backgroundColor: "#8e5ea2",
                data: Solic_No_respondidas,
                borderWidth: 1,
                borderRadius: 20
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Solicitudes Trimestral de retiro de medicamentos'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                        stepSize: 2
                    }

                }]
            }
        }
    });
}

// GRÁFICO SOLICITUD DE SOLICITUDES DE MEDICAMENTOS TRIMESTRALMENTE
function crearSolicitudDeMedicamentosTrimestral(respuesta) {
    let jsonresp, contador;
    jsonresp = JSON.parse(respuesta);
    contador = jsonresp.length;

    // console.log("PROBAR DATOS: " + respuesta);
    // console.log("LARGO DEL ARRAY: " + contador);

    var Enespera_Trimestral = [], Entransito_Trimestral = [], Entregados_Trimestral = [];

    Enespera_Trimestral.push(jsonresp[0][1].CANTIDAD_SOLICITUDES, jsonresp[1][1].CANTIDAD_SOLICITUDES, jsonresp[2][1].CANTIDAD_SOLICITUDES, jsonresp[3][1].CANTIDAD_SOLICITUDES);
    Entransito_Trimestral.push(jsonresp[0][2].CANTIDAD_SOLICITUDES, jsonresp[1][2].CANTIDAD_SOLICITUDES, jsonresp[2][2].CANTIDAD_SOLICITUDES, jsonresp[3][2].CANTIDAD_SOLICITUDES);
    Entregados_Trimestral.push(jsonresp[0][3].CANTIDAD_SOLICITUDES, jsonresp[1][3].CANTIDAD_SOLICITUDES, jsonresp[2][3].CANTIDAD_SOLICITUDES, jsonresp[3][3].CANTIDAD_SOLICITUDES);

    // console.log("SOLIC EN ESPERA 1ER TRIM: " + jsonresp[0][1].CANTIDAD_SOLICITUDES + "\nSOLIC EN TRÁNSITO 1ER TRIM: " + jsonresp[0][2].CANTIDAD_SOLICITUDES + "\nSOLIC ENTREGADOS 1ER TRIM: " + jsonresp[0][3].CANTIDAD_SOLICITUDES);
    // console.log("SOLIC EN ESPERA 2DO TRIM: " + jsonresp[1][1].CANTIDAD_SOLICITUDES + "\nSOLIC EN TRÁNSITO 2DO TRIM: " + jsonresp[1][2].CANTIDAD_SOLICITUDES + "\nSOLIC ENTREGADOS 2DO TRIM: " + jsonresp[1][3].CANTIDAD_SOLICITUDES);
    // console.log("SOLIC EN ESPERA 3ER TRIM: " + jsonresp[2][1].CANTIDAD_SOLICITUDES + "\nSOLIC EN TRÁNSITO 3ER TRIM: " + jsonresp[2][2].CANTIDAD_SOLICITUDES + "\nSOLIC ENTREGADOS 3ER TRIM: " + jsonresp[2][3].CANTIDAD_SOLICITUDES);
    // console.log("SOLIC EN ESPERA 4TO TRIM: " + jsonresp[3][1].CANTIDAD_SOLICITUDES + "\nSOLIC EN TRÁNSITO 4TO TRIM: " + jsonresp[3][2].CANTIDAD_SOLICITUDES + "\nSOLIC ENTREGADOS 4TO TRIM: " + jsonresp[3][3].CANTIDAD_SOLICITUDES);

    // console.log("SOLIC EN ESPERA: "+Enespera_Trimestral+"\nSOLIC EN TRÁNSITO: "+Entransito_Trimestral+"\nSOLIC ENTREGADOS: "+Entregados_Trimestral);

    // /*======================Para excel=====================*/
    var paraexportarenExcel = [
        {
            "SEGUIMIENTO": "En espera",
            "Ene/Feb/Mar": jsonresp[0][1].CANTIDAD_SOLICITUDES,
            "Abr/May/Jun": jsonresp[1][1].CANTIDAD_SOLICITUDES,
            "Jul/Ago/Sep": jsonresp[2][1].CANTIDAD_SOLICITUDES,
            "Oct/Nov/Dic": jsonresp[3][1].CANTIDAD_SOLICITUDES
        },
        {
            "SEGUIMIENTO": "En tránsito",
            "Ene/Feb/Mar": jsonresp[0][2].CANTIDAD_SOLICITUDES,
            "Abr/May/Jun": jsonresp[1][2].CANTIDAD_SOLICITUDES,
            "Jul/Ago/Sep": jsonresp[2][2].CANTIDAD_SOLICITUDES,
            "Oct/Nov/Dic": jsonresp[3][2].CANTIDAD_SOLICITUDES
        },
        {
            "SEGUIMIENTO": "En entrega",
            "Ene/Feb/Mar": jsonresp[0][3].CANTIDAD_SOLICITUDES,
            "Abr/May/Jun": jsonresp[1][3].CANTIDAD_SOLICITUDES,
            "Jul/Ago/Sep": jsonresp[2][3].CANTIDAD_SOLICITUDES,
            "Oct/Nov/Dic": jsonresp[3][3].CANTIDAD_SOLICITUDES
        }
    ];
    ExpSolicDeMedTrimestral = paraexportarenExcel;
    /*======================Para excel=====================*/

    Chart.defaults.global.legend.labels.usePointStyle = true;
    var ctx = document.getElementById('GraficoSolicitudesDeMedicamentosTrimestral').getContext("2d");

    var gradientStrokeViolet = ctx.createLinearGradient(0, 0, 0, 90);
    gradientStrokeViolet.addColorStop(0, 'rgba(59, 118, 239)');
    gradientStrokeViolet.addColorStop(1, 'rgba(59, 118, 239)');
    var gradientLegendViolet = 'rgba(59, 118, 239)';

    var gradientStrokeValorDos = ctx.createLinearGradient(500, 0, 100, 0);
    gradientStrokeValorDos.addColorStop(0, "#f53c79");
    gradientStrokeValorDos.addColorStop(1, "#f53c79");
    var gradientLegendStrokeValorDos = '#f53c79';

    var gradientStrokeValorTres = ctx.createLinearGradient(500, 0, 100, 0);
    gradientStrokeValorTres.addColorStop(0, "#607d8b");
    gradientStrokeValorTres.addColorStop(1, "#607d8b");
    var gradientLegendStrokeValorTres = '#607d8b';

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Ene/Feb/Mar', 'Abr/May/Jun', 'Jul/Ago/Sep', 'Oct/Nov/Dic'],
            datasets: [{
                label: "En espera",
                borderColor: gradientStrokeViolet,
                backgroundColor: gradientStrokeViolet,
                hoverBackgroundColor: gradientStrokeViolet,
                legendColor: gradientLegendViolet,
                pointRadius: 0,
                fill: false,
                borderWidth: 2,
                fill: 'origin',
                data: Enespera_Trimestral
            },
            {
                label: "En tránsito",
                borderColor: gradientStrokeValorDos,
                backgroundColor: gradientStrokeValorDos,
                hoverBackgroundColor: gradientStrokeValorDos,
                legendColor: gradientLegendStrokeValorDos,
                pointRadius: 0,
                fill: false,
                borderWidth: 2,
                fill: 'origin',
                data: Entransito_Trimestral
            },
            {
                label: "Entregados",
                borderColor: gradientStrokeValorTres,
                backgroundColor: gradientStrokeValorTres,
                hoverBackgroundColor: gradientStrokeValorTres,
                legendColor: gradientLegendStrokeValorTres,
                pointRadius: 0,
                fill: false,
                borderWidth: 2,
                fill: 'origin',
                data: Entregados_Trimestral
            }
            ]
        },
        options: {
            responsive: true,
            legend: false,
            legendCallback: function (chart) {
                var text = [];
                text.push('<ul>');
                for (var i = 0; i < chart.data.datasets.length; i++) {
                    text.push('<li><span class="legend-dots" style="background:' +
                        chart.data.datasets[i].legendColor +
                        '"></span>');
                    if (chart.data.datasets[i].label) {
                        text.push(chart.data.datasets[i].label);
                    }
                    text.push('</li>');
                }
                text.push('</ul>');
                return text.join('');
            },
            title: {
                display: true,
                text: 'Solicitudes de medicamentos trimestrales (En espera, En tránsito, Entregado)'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        // stepSize: 1, // Y que sea por valor numerico
                        beginAtZero: true //Establezo que comienze en 0 el gráfico en la parte en el eje y
                    },
                    gridLines: {
                        drawBorder: false,
                        color: 'rgba(235,237,242,1)',
                        zeroLineColor: 'rgba(235,237,242,1)'
                    }
                }],
                xAxes: [{
                    // Change here
                    barPercentage: 0.6, //Separación entre barras
                }]
            }
        },
        elements: {
            point: {
                radius: 0
            }
        }
    });
}

// GRÁFICO CANTIDAD TOTAL DE SOLCIITUDES DE AGENDA DE RETIRO DE MEDICAMENTOS
function crearGraficoCantTotalSolicitudAgendaRetiroDeMedicamentos(respuesta) {
    let jsonresp, contador;
    jsonresp = JSON.parse(respuesta);
    contador = jsonresp.length;

    // console.log("PROBAR DATOS: " + respuesta);
    // console.log("LARGO DEL ARRAY: " + contador);

    var Respondida, NoRespondida;
    Respondida = jsonresp[0].total_sol_cant_agenda_respondida;
    NoRespondida = jsonresp[1].total_sol_cant_agenda_norespondida;

    // console.log("SOLIC RESPONDIDAS (AGENDA MED): "+jsonresp[0].total_sol_cant_agenda_respondida+"\nSOLIC NO RESPONDIDAS (AGENDA MED): "+jsonresp[1].total_sol_cant_agenda_norespondida);

    /*======================Para excel=====================*/
    var paraexportarenExcel = [
        {
            "OPERACIÓN": "Respondidas",
            "CANTIDAD": Respondida
        },
        {
            "OPERACIÓN": "No respondidas",
            "CANTIDAD": NoRespondida
        }
    ];
    ExpSolTotalRespoYnoRespAgenRetMed = paraexportarenExcel;
    /*======================Para excel=====================*/

    const ctx = document.getElementById("graficoCantTotalSolAgendaRetMed").getContext('2d');
    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Total Solicitudes Respondidas", "Total Solicitudes No respondidas"],
            datasets: [{
                label: "Population (millions)",
                backgroundColor: ["#3e95cd", "#8e5ea2"],
                data: [Respondida, NoRespondida]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Cantidad total de solicitudes de agenda de retiro de medicamentos'
            }
        }
    });
}

// GRÁFICO CANTIDAD TOTAL DE SOLICITUDES DE PERMISO, ADMINISTRATIVO, FERIADO LEGAL
function crearGraficoCantTotalSolicDePermisoEspAdmiFerLeg(respuesta) {
    let jsonresp, contador;
    jsonresp = JSON.parse(respuesta);
    contador = jsonresp.length;

    // console.log("PROBAR DATOS: " + respuesta);
    // console.log("LARGO DEL ARRAY: " + contador);

    var CantTotalSolPermEsp, CantTotalSolPermAdmin, CantTotalSolPermFL;
    CantTotalSolPermEsp = jsonresp[0].total_sol_cant_perm_esp;
    CantTotalSolPermAdmin = jsonresp[1].total_sol_cant_perm_admin;
    CantTotalSolPermFL = jsonresp[2].total_sol_cant_perm_frlg;

    // console.log("CantTotalSolPermEsp: "+CantTotalSolPermEsp+"\nCantTotalSolPermAdmin: "+CantTotalSolPermAdmin+"\nCantTotalSolPermFlg: "+CantTotalSolPermFL);

    /*======================Para excel=====================*/
    var paraexportarenExcel = [
        {
            "TIPO SOLICITUD": "Total Solicitudes Permiso Especial",
            "CANTIDAD": CantTotalSolPermEsp
        },
        {
            "TIPO SOLICITUD": "Total Solicitudes Permiso Administrativo",
            "CANTIDAD": CantTotalSolPermAdmin
        },
        {
            "TIPO SOLICITUD": "Total Solicitudes Permiso Feriado Legal",
            "CANTIDAD": CantTotalSolPermFL
        }
    ];
    ExpCantTotalSolicDePermisoEspAdmiFerLeg = paraexportarenExcel;
    /*======================Para excel=====================*/

    new Chart(document.getElementById("graficoCantidadSolicDePermisosEspAdminFerLeg"), {
        type: 'doughnut',
        data: {
            labels: ["Total solicitudes de permiso especial", "Total solicitudes de permiso administrativo", "Total solicitudes de feriado legal"],
            datasets: [{
                label: "Population (millions)",
                backgroundColor: ["#81bfbe", "#dda699", "#b3d2b2"],
                data: [CantTotalSolPermEsp, CantTotalSolPermAdmin, CantTotalSolPermFL]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Solicitudes de permisos de tipo: especial, administrativo, feriado legal'
            }
        }
    });
}

// GRÁFICO MOTIVO DE LAS SOLICITUDES DE PERMISO ESPECIAL
function crearGraficoMotivoSolcPermEspecial(respuesta) {
    let jsonresp, contador;
    jsonresp = JSON.parse(respuesta);
    contador = jsonresp.length;

    // console.log("PROBAR DATOS: " + respuesta);
    // console.log("LARGO DEL ARRAY: " + contador);

    var CantTotalReunionApoderados, CantTotalControlSHijo;
    CantTotalReunionApoderados = jsonresp[0].total_reunion_apoderados;
    CantTotalControlSHijo = jsonresp[1].total_control_salud_hijo;

    // console.log("Reunión de apoderados: "+CantTotalReunionApoderados+"\nControl de salud de mi hijo(a): "+CantTotalControlSHijo);

    /*======================Para excel=====================*/
    var paraexportarenExcel = [
        {
            "MOTIVO": "Reunión de apoderados",
            "CANTIDAD": CantTotalReunionApoderados
        },
        {
            "MOTIVO": "Control de salud de mi hijo(a)",
            "CANTIDAD": CantTotalControlSHijo
        }
    ];
    ExpoMotivoSolcPermEspecial = paraexportarenExcel;
    /*======================Para excel=====================*/

    new Chart(document.getElementById("graficoMotivoSolcPermEspecial"), {
        type: 'doughnut',
        data: {
            labels: ["Reunión de apoderados", "Control de salud de mi hijo(a)"],
            datasets: [{
                label: "Population (millions)",
                backgroundColor: ["#b8afe5", "#d0c3c3"],
                data: [CantTotalReunionApoderados, CantTotalControlSHijo]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Motivos de las solicitudes de permisos especial (Historial)'
            }
        }
    });
}

// GRÁFICO TIPO DE REMUNERACIONES EN SOLICITUDES DE PERMISO ADMINISTRATIVO (HISTORIAL)
function crearGraficoTipoRemSolcPermAdminHistorial(respuesta) {
    let jsonresp, contador;
    jsonresp = JSON.parse(respuesta);
    contador = jsonresp.length;

    // console.log("PROBAR DATOS: " + respuesta);
    // console.log("LARGO DEL ARRAY: " + contador);

    var CantTotalConGoceRemun, CantTotalSinGoceRemun;
    CantTotalConGoceRemun = jsonresp[0].total_con_goce_remuneracion;
    CantTotalSinGoceRemun = jsonresp[1].total_sin_goce_remuneracion;

    // console.log("Con goce de remuneraciones: "+CantTotalConGoceRemun+"\nSin goce de remuneraciones: "+CantTotalSinGoceRemun);

    /*======================Para excel=====================*/
    var paraexportarenExcel = [
        {
            "TIPO REMUNERACION": "Con goce de remuneraciones",
            "CANTIDAD": CantTotalConGoceRemun
        },
        {
            "TIPO REMUNERACION": "Sin goce de remuneraciones",
            "CANTIDAD": CantTotalSinGoceRemun
        }
    ];
    ExpTipoRemSolcPermAdminHistorial = paraexportarenExcel;
    /*======================Para excel=====================*/

    new Chart(document.getElementById("graficoCantTotalTipoRemSolPermAdmin"), {
        type: 'doughnut',
        data: {
            labels: ["Con goce de remuneraciones", "Sin goce de remuneraciones"],
            datasets: [{
                label: "Population (millions)",
                backgroundColor: ["#81bfbe", "#d0c3c3"],
                data: [CantTotalConGoceRemun, CantTotalSinGoceRemun]
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Tipo de remuneraciones en solicitudes de permisos administrativo (Historial)'
            }
        }
    });
}

// GRÁFICO CANTIDAD TOTAL DE MEDICAMENTOS SEGUN ESTADO (DISPONIBLE, ENTREGADOS, VENCIDOS)
function crearGraficoCantTotalMedPorEstadoDispoEntrVenc(respuesta) {
    let jsonresp, contador;
    jsonresp = JSON.parse(respuesta);
    contador = jsonresp.length;

    // console.log("PROBAR DATOS: " + respuesta);
    // console.log("LARGO DEL ARRAY: " + contador);

    var Cant_total_EstMedDisponible, Cant_total_EstMedEntregados, Cant_total_EstMedVencidos;
    Cant_total_EstMedDisponible = jsonresp[0].total_EstMedDisponible;
    Cant_total_EstMedEntregados = jsonresp[1].total_EstMedEntregados;
    Cant_total_EstMedVencidos = jsonresp[2].total_EstMedVencidos;

    // console.log("MED Disponible: " + Cant_total_EstMedDisponible +
    //     "\nMED Entregados: " + Cant_total_EstMedEntregados +
    //     "\nMED Vencidos: " + Cant_total_EstMedVencidos);

    /*======================Para excel=====================*/
    var paraexportarenExcel = [
        {
            "ESTADO": "Disponible",
            "CANTIDAD": Cant_total_EstMedDisponible
        },
        {
            "ESTADO": "Entregados",
            "CANTIDAD": Cant_total_EstMedEntregados
        },
        {
            "ESTADO": "Vencidos",
            "CANTIDAD": Cant_total_EstMedVencidos
        }
    ];
    ExpCantTotalMedPorEstadoDispoEntrVenc = paraexportarenExcel;
    /*======================Para excel=====================*/

    new Chart(document.getElementById("GraficoCantTotalMedPorEstadoDispoEntrVenc"), {
        type: 'doughnut',
        data: {
            labels: ["Disponible", "Entregados", "Vencidos"],
            datasets: [
                {
                    label: "Cantidad",
                    backgroundColor: ["#607d8b", "#d0c3c3", "#f53c79"],
                    data: [Cant_total_EstMedDisponible, Cant_total_EstMedEntregados, Cant_total_EstMedVencidos]
                }
                // {
                //     label: "Disponible",
                //     backgroundColor: ["#607d8b"],
                //     data: [Cant_total_EstMedDisponible]
                // }, {
                //     label: "Entregados",
                //     backgroundColor: ["#d0c3c3"],
                //     data: [Cant_total_EstMedEntregados]
                // }, {
                //     label: "Vencidos",
                //     backgroundColor: ["#f53c79"],
                //     data: [Cant_total_EstMedVencidos]
                // }

                // {
                //     label: "Disponible",
                //     backgroundColor: ["#607d8b"],
                //     data: [Cant_total_EstMedDisponible]
                // }, {
                //     label: "Entregados",
                //     backgroundColor: ["#d0c3c3"],
                //     data: [Cant_total_EstMedEntregados]
                // }, {
                //     label: "Vencidos",
                //     backgroundColor: ["#f53c79"],
                //     data: [Cant_total_EstMedVencidos]
                // }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Cantidad total de medicamentos según su estado'
            },
            // scales: {
            //     yAxes: [{
            //         ticks: {
            //             min: 0,
            //             stepSize: 25
            //         }
            //     }]
            // }
        }
    });

}

// GRÁFICO HISTÓRICO DE MEDICAMENTOS REGISTRADOS POR DIA DE SEMANA
function crearGraficoHistoricoRegMedPorDiaDeSemana(respuesta) {
    let jsonresp, contador;
    jsonresp = JSON.parse(respuesta);
    contador = jsonresp.length;

    // console.log("PROBAR DATOS: " + respuesta);
    // console.log("LARGO DEL ARRAY: " + contador);

    var MedicamentosVisibles = [], MedicamentosNoVisibles = [];
    let LunesDisp, MartesDisp, MiercolesDisp, JuevesDisp, ViernesDisp, SabadoDisp, DomingoDisp;
    let LunesNoDisp, MartesNoDisp, MiercolesNoDisp, JuevesNoDisp, ViernesNoDisp, SabadoNoDisp, DomingoNoDisp;
    LunesDisp = jsonresp[0][0].CANTIDAD; LunesNoDisp = jsonresp[0][1].CANTIDAD;
    MartesDisp = jsonresp[1][0].CANTIDAD; MartesNoDisp = jsonresp[1][1].CANTIDAD;
    MiercolesDisp = jsonresp[2][0].CANTIDAD; MiercolesNoDisp = jsonresp[2][1].CANTIDAD;
    JuevesDisp = jsonresp[3][0].CANTIDAD; JuevesNoDisp = jsonresp[3][1].CANTIDAD;
    ViernesDisp = jsonresp[4][0].CANTIDAD; ViernesNoDisp = jsonresp[4][1].CANTIDAD;
    SabadoDisp = jsonresp[5][0].CANTIDAD; SabadoNoDisp = jsonresp[5][1].CANTIDAD;
    DomingoDisp = jsonresp[6][0].CANTIDAD; DomingoNoDisp = jsonresp[6][1].CANTIDAD;

    for (var i in jsonresp) { //Agrupe todos los Visibles los que tienen subindice [0],  Ej: jsonresp[0][0],jsonresp[1][0], jsonresp[2][0]...
        MedicamentosVisibles.push(jsonresp[i][0].CANTIDAD);
    }
    for (var i in jsonresp) { //Agrupe todos los Visibles los que tienen subindice [1],  Ej: jsonresp[0][1],jsonresp[1][1], jsonresp[2][1]...
        MedicamentosNoVisibles.push(jsonresp[i][1].CANTIDAD);
    }

    // console.log(
    //     "MED Disponibles: " + MedicamentosVisibles +
    //     "\nMED No Disponibles: " + MedicamentosNoVisibles);

    // console.log(
    //     "MED Disponibles: " + MedicamentosVisibles +
    //     "\nMED No Disponibles: " + MedicamentosNoVisibles);

    /*======================Para excel=====================*/
    var paraexportarenExcel =
        [

            {
                "ESTADOS": "Disponible",
                "SIGLA": "DP",
                " ": " ",
                "DIA": "Lunes",
                "\n": "DP",
                "CANTIDAD\n": LunesDisp,
                "\n\n": "NDP",
                "CANTIDAD\n\n": LunesNoDisp
            },
            {
                "ESTADOS": "No disponible",
                "SIGLA": "NDP",
                "DIA": "Martes",
                "\n": "DP",
                "CANTIDAD\n": MartesDisp,
                "\n\n": "NDP",
                "CANTIDAD\n\n": MartesNoDisp
            },
            {
                "DIA": "Miercoles",
                "\n": "DP",
                "CANTIDAD\n": MiercolesDisp,
                "\n\n": "NDP",
                "CANTIDAD\n\n": MiercolesNoDisp
            },
            {
                "DIA": "Jueves",
                "\n": "DP",
                "CANTIDAD\n": JuevesDisp,
                "\n\n": "NDP",
                "CANTIDAD\n\n": JuevesNoDisp
            },
            {
                "DIA": "Viernes",
                "\n": "DP",
                "CANTIDAD\n": ViernesDisp,
                "\n\n": "NDP",
                "CANTIDAD\n\n": ViernesNoDisp
            },
            {
                "DIA": "Sábado",
                "\n": "DP",
                "CANTIDAD\n": SabadoDisp,
                "\n\n": "NDP",
                "CANTIDAD\n\n": SabadoNoDisp
            },
            {
                "DIA": "Domingo",
                "\n": "DP",
                "CANTIDAD\n": DomingoDisp,
                "\n\n": "NDP",
                "CANTIDAD\n\n": DomingoNoDisp
            }
        ];

    ExpGraficoHistoricoRegMedPorDiaDeSemana = paraexportarenExcel;

    /*======================Para excel=====================*/
    new Chart(document.getElementById("GraficoHistoricoRegMedPorDiaDeSemana"), {
        type: 'bar',
        data: {
            labels: ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"],
            datasets: [
                {
                    data: MedicamentosVisibles,
                    label: "Disponible",
                    borderColor: "#d0c3c3",
                    backgroundColor: "#d0c3c3",
                    borderWidth: 2
                },
                {
                    data: MedicamentosNoVisibles,
                    label: "No Disponible",
                    borderColor: "#f53c79",
                    backgroundColor: "#f53c79",
                    borderWidth: 2
                }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Histórico Cantidad de medicamentos registrados en dias de semana'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        stepSize: 1, // Y que sea por valor numerico
                        beginAtZero: true //Establezo que comienze en 0 el gráfico
                    }
                }]
            }
        },
    });
}

// GRÁFICO HISTÓRICO DE ESTADOS DE MEDICAMENTOS POR DIA DE SEMANA
function crearGraficoHistoricoEstadosMedPorDiaDeSemana(respuesta) {
    let jsonresp, contador;
    jsonresp = JSON.parse(respuesta);
    contador = jsonresp.length;

    // console.log("PROBAR DATOS: " + respuesta);
    // console.log("LARGO DEL ARRAY: " + contador);

    var TotDisponibles = [], TotEntregados = [], TotVencidos = [], TotalesDispEntVenc = [];

    for (var i in jsonresp) { //Agrupe todos los Disponibles los que tienen subindice [0],  Ej: jsonresp[0][0],jsonresp[1][0], jsonresp[2][0]...
        TotDisponibles.push(jsonresp[i][0].CANTIDAD);
    }
    for (var i in jsonresp) { //Agrupe todos los Entregados los que tienen subindice [1],  Ej: jsonresp[0][1],jsonresp[1][1], jsonresp[2][1]...
        TotEntregados.push(jsonresp[i][1].CANTIDAD);
    }
    for (var i in jsonresp) { //Agrupe todos los Vencidos los que tienen subindice [1],  Ej: jsonresp[0][1],jsonresp[1][1], jsonresp[2][1]...
        TotVencidos.push(jsonresp[i][2].CANTIDAD);
    }
    for (var i in jsonresp[7]) { //Agrupe todos los Vencidos los que tienen subindice [1],  Ej: jsonresp[0][1],jsonresp[1][1], jsonresp[2][1]...
        TotalesDispEntVenc.push(jsonresp[7][i].TOTAL);
    }

    // console.log(
    //     "MED Disponibles Lun-Dom: " + TotDisponibles +
    //     "\nMED Entregados Lun-Dom: " + TotEntregados +
    //     "\nMED Vencidos Lun-Dom: " + TotVencidos +
    //     "\nMED Totales Lun-Dom: " + TotalesDispEntVenc);

    let [valorminimo, valormaximo] = TotalesDispEntVenc.reduce(([prevMin, prevMax], curr) => [Math.min(prevMin, curr), Math.max(prevMax, curr)], [Infinity, -Infinity]);
    // console.log("Min:", valorminimo);
    // console.log("Max:", valormaximo);

    /*======================Para excel=====================*/
    var paraexportarenExcel =
        [
            {
                "ESTADOS": "Disponible",
                "SIGLA": "DP",
                " ": " ",
                "DIA": "Lunes",
                "\n": "DP",
                "CANTIDAD\n": jsonresp[0][0].CANTIDAD,
                "\n\n": "ENTRG",
                "CANTIDAD\n\n": jsonresp[0][1].CANTIDAD,
                "\n\n\n": "VENC",
                "CANTIDAD\n\n\n": jsonresp[0][2].CANTIDAD
            },
            {
                "ESTADOS": "Entregados",
                "SIGLA": "ENTRG",
                "DIA": "Martes",
                "\n": "DP",
                "CANTIDAD\n": jsonresp[1][0].CANTIDAD,
                "\n\n": "ENTRG",
                "CANTIDAD\n\n": jsonresp[1][1].CANTIDAD,
                "\n\n\n": "VENC",
                "CANTIDAD\n\n\n": jsonresp[1][2].CANTIDAD
            },
            {
                "ESTADOS": "Vencidos",
                "SIGLA": "VENC",
                "DIA": "Miercoles",
                "\n": "DP",
                "CANTIDAD\n": jsonresp[2][0].CANTIDAD,
                "\n\n": "ENTRG",
                "CANTIDAD\n\n": jsonresp[2][1].CANTIDAD,
                "\n\n\n": "VENC",
                "CANTIDAD\n\n\n": jsonresp[2][2].CANTIDAD
            },
            {
                "DIA": "Jueves",
                "\n": "DP",
                "CANTIDAD\n": jsonresp[3][0].CANTIDAD,
                "\n\n": "ENTRG",
                "CANTIDAD\n\n": jsonresp[3][1].CANTIDAD,
                "\n\n\n": "VENC",
                "CANTIDAD\n\n\n": jsonresp[3][2].CANTIDAD
            },
            {
                "DIA": "Viernes",
                "\n": "DP",
                "CANTIDAD\n": jsonresp[4][0].CANTIDAD,
                "\n\n": "ENTRG",
                "CANTIDAD\n\n": jsonresp[4][1].CANTIDAD,
                "\n\n\n": "VENC",
                "CANTIDAD\n\n\n": jsonresp[4][2].CANTIDAD
            },
            {
                "DIA": "Sábado",
                "\n": "DP",
                "CANTIDAD\n": jsonresp[5][0].CANTIDAD,
                "\n\n": "ENTRG",
                "CANTIDAD\n\n": jsonresp[5][1].CANTIDAD,
                "\n\n\n": "VENC",
                "CANTIDAD\n\n\n": jsonresp[5][2].CANTIDAD
            },
            {
                "DIA": "Domingo",
                "\n": "DP",
                "CANTIDAD\n": jsonresp[6][0].CANTIDAD,
                "\n\n": "ENTRG",
                "CANTIDAD\n\n": jsonresp[6][1].CANTIDAD,
                "\n\n\n": "VENC",
                "CANTIDAD\n\n\n": jsonresp[6][2].CANTIDAD
            }
        ];

    ExpCrearGraficoHistoricoEstadosMedPorDiaDeSemana = paraexportarenExcel;

    /*======================Para excel=====================*/
    var yAxesticks = [];

    new Chart(document.getElementById("GraficoCantMedEstDiaSem"), {
        type: 'bar',
        data: {
            labels: ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"],
            datasets: [{
                data: TotalesDispEntVenc,
                label: "Total",
                borderColor: "#3e95cd",
                backgroundColor: "rgb(62,149,205)",
                borderWidth: 2,
                type: 'line',
                fill: false
            }, {
                data: TotDisponibles,
                label: "Disponibles",
                borderColor: "#607d8b",
                backgroundColor: "#607d8b",
                borderWidth: 2
            }, {
                data: TotEntregados,
                label: "Entregados",
                borderColor: "#ffa500",
                backgroundColor: "#ffa500",
                borderWidth: 2
            }, {
                data: TotVencidos,
                label: "Vencidos",
                borderColor: "#c45850",
                backgroundColor: "#c45850",
                borderWidth: 2
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Cantidad total de medicamentos según su estado y día de semana'
            },
            scales: {
                yAxes: [{
                    // ticks: {
                    //     min: 0,
                    //     max: 600,
                    //     stepSize: 25
                    // }
                    ticks: {
                        beginAtZero: true,
                        // callback: function (value, index, values) {
                        //     yAxesticks = values;
                        //     return value;
                        // },
                        max: valormaximo + 30
                        //Uso  + 30 porque la linea del total se muy junta entonces al valor máximo le subo un poco más para que le de espacio
                    }
                }]
            }
        }
    });

    // var highestVal = yAxesticks[0];
    // console.log("Valor más alto: "+highestVal);
}

// GRÁFICO HISTÓRICO DE ESTADOS DE MEDICAMENTOS POR TRIMESTRE
function crearGraficoHistoricoEstadosMedPorTrimestre(respuesta) {
    let jsonresp, contador;
    jsonresp = JSON.parse(respuesta);
    contador = jsonresp.length;

    // console.log("PROBAR DATOS: " + respuesta);
    // console.log("LARGO DEL ARRAY: " + contador);

    var TotDisponibles = [], TotEntregados = [], TotVencidos = [], TotalesDispEntVenc = [];

    for (var i in jsonresp) { //Agrupe todos los Disponibles los que tienen subindice [0],  Ej: jsonresp[0][0],jsonresp[1][0], jsonresp[2][0]...
        TotDisponibles.push(jsonresp[i][0].CANTIDAD);
    }
    for (var i in jsonresp) { //Agrupe todos los Entregados los que tienen subindice [1],  Ej: jsonresp[0][1],jsonresp[1][1], jsonresp[2][1]...
        TotEntregados.push(jsonresp[i][1].CANTIDAD);
    }
    for (var i in jsonresp) { //Agrupe todos los Vencidos los que tienen subindice [1],  Ej: jsonresp[0][1],jsonresp[1][1], jsonresp[2][1]...
        TotVencidos.push(jsonresp[i][2].CANTIDAD);
    }
    for (var i in jsonresp[7]) { //Agrupe todos los Vencidos los que tienen subindice [1],  Ej: jsonresp[0][1],jsonresp[1][1], jsonresp[2][1]...
        TotalesDispEntVenc.push(jsonresp[7][i].TOTAL);
    }

    // console.log(
    //     "MED Disponibles Ene/Feb/Mar: " + TotDisponibles +
    //     "\nMED Entregados Abr/May/Jun: " + TotEntregados +
    //     "\nMED Vencidos Jul/Ago/Sep: " + TotVencidos +
    //     "\nMED Totales Oct/Nov/Dic: " + TotalesDispEntVenc);

    let [valorminimo, valormaximo] = TotalesDispEntVenc.reduce(([prevMin, prevMax], curr) => [Math.min(prevMin, curr), Math.max(prevMax, curr)], [Infinity, -Infinity]);
    // console.log("Min:", valorminimo);
    // console.log("Max:", valormaximo);

    /*======================Para excel=====================*/
    var paraexportarenExcel =
        [

            {
                "ESTADO": "Disponible",
                "Ene/Feb/Mar": jsonresp[0][0].CANTIDAD,
                "Abr/May/Jun": jsonresp[1][0].CANTIDAD,
                "Jul/Ago/Sep": jsonresp[2][0].CANTIDAD,
                "Oct/Nov/Dic": jsonresp[3][0].CANTIDAD
            },
            {
                "ESTADO": "Entregados",
                "Ene/Feb/Mar": jsonresp[0][1].CANTIDAD,
                "Abr/May/Jun": jsonresp[1][1].CANTIDAD,
                "Jul/Ago/Sep": jsonresp[2][1].CANTIDAD,
                "Oct/Nov/Dic": jsonresp[3][1].CANTIDAD
            },
            {
                "ESTADO": "Vencidos",
                "Ene/Feb/Mar": jsonresp[0][2].CANTIDAD,
                "Abr/May/Jun": jsonresp[1][2].CANTIDAD,
                "Jul/Ago/Sep": jsonresp[2][2].CANTIDAD,
                "Oct/Nov/Dic": jsonresp[3][2].CANTIDAD
            }
        ];
    ExpGraficoHistoricoEstadosMedPorTrimestre = paraexportarenExcel;

    /*======================Para excel=====================*/
    new Chart(document.getElementById("GraficoCantMedEstadosMedPorTrimestre"), {
        type: 'bar',
        data: {
            labels: ["Ene/Feb/Mar", "Abr/May/Jun", "Jul/Ago/Sep", "Oct/Nov/Dic"],
            datasets: [{
                data: TotalesDispEntVenc,
                label: "Total",
                borderColor: "#3e95cd",
                backgroundColor: "rgb(62,149,205)",
                borderWidth: 2,
                type: 'line',
                fill: false
            }, {
                data: TotDisponibles,
                label: "Disponibles",
                borderColor: "#607d8b",
                backgroundColor: "#607d8b",
                borderWidth: 2
            }, {
                data: TotEntregados,
                label: "Entregados",
                borderColor: "#ffa500",
                backgroundColor: "#ffa500",
                borderWidth: 2,
            }, {
                data: TotVencidos,
                label: "Vencidos",
                borderColor: "#c45850",
                backgroundColor: "#c45850",
                borderWidth: 2
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Cantidad total de medicamentos según su estado y trimestre'
            },
            scales: {
                yAxes: [{
                    // ticks: {
                    //     min: 0,
                    //     max: 600,
                    //     stepSize: 25 //para que vaya contando de 25 en 25 unidades 
                    // }
                    ticks: {
                        beginAtZero: true,
                        max: valormaximo + 30
                        //Uso  + 30 porque la linea del total se muy junta entonces al valor máximo le subo un poco más para que le de espacio
                    }
                }]
            }
        }
    });
}



// GRÁFICO CANTIDAD ESTADO DE RESPUESTAS SOBRE LOS RECLAMOS O SUGERENCIAS REGISTRADAS
function crearGraficoCantRespSolicitudesReclamosSugerencias(respuesta) {
    let jsonresp, contador;
    jsonresp = JSON.parse(respuesta);
    contador = jsonresp.length;

    // console.log("PROBAR DATOS: " + respuesta);
    // console.log("LARGO DEL ARRAY: " + contador);

    var Respuestas = [];

    for (var i in jsonresp[0]) {
        // console.log("i : "+i+" RES: "+jsonresp[0][i].CANTIDAD);
        Respuestas.push(jsonresp[0][i].CANTIDAD);
    }

    // console.log("SOLIC : " + Respuestas);
    // console.log("SOLIC RESPONDIDAS (AGENDA MED): " + jsonresp[0][0].CANTIDAD + "\nSOLIC NO RESPONDIDAS (AGENDA MED): " + jsonresp[0][1].CANTIDAD);

    /*======================Para excel=====================*/
    var paraexportarenExcel = [
        {
            "OPERACIÓN": "Solicitudes RCL y/o SG respondidas",
            "CANTIDAD": jsonresp[0][0].CANTIDAD
        },
        {
            "OPERACIÓN": "Solicitudes RCL y/o SG No respondidas",
            "CANTIDAD": jsonresp[0][1].CANTIDAD
        }
    ];
    ExpGraficoCantRespSolicitudesReclamosSugerencias = paraexportarenExcel;
    /*======================Para excel=====================*/

    new Chart(document.getElementById("graficoCantRespSolicitudesReclamosSugerencias"), {
        type: 'doughnut',
        data: {
            labels: ["Solicitudes RCL y/o SG respondidas", "Solicitudes RCL y/o SG No respondidas"],
            datasets: [{
                label: "Cantidad",
                backgroundColor: ["#80aaa5", "#ab9559"],
                data: Respuestas
            }]
        },
        options: {
            title: {
                display: true,
                text: 'Estado de respuesta a las solicitudes reclamos(RCL) y/o sugerencias(SG)'
            }
        }
    });
}


// GRÁFICO CANTIDAD SEGÚN TIPO DE SOLICITUD EN EL LIBRO R.S.F
function crearGraficoCantTipSolicLibroRSF(respuesta) {
    let jsonresp, contador;
    jsonresp = JSON.parse(respuesta);
    contador = jsonresp.length;

    // console.log("PROBAR DATOS: " + respuesta);
    // console.log("LARGO DEL ARRAY: " + contador);

    // console.log("SOLIC : "+Tipos);
    // console.log("SOLIC RECLAMOS: "+jsonresp[0][0].CANTIDAD+
    // "\nSOLIC SUGERENCIAS: "+jsonresp[0][1].CANTIDAD+
    // "\nSOLIC FELICITACIONES: "+jsonresp[0][2].CANTIDAD);

    /*======================Para excel=====================*/
    var paraexportarenExcel = [
        {
            "TIPO": "Reclamos",
            "CANTIDAD": jsonresp[0][0].CANTIDAD
        },
        {
            "TIPO": "Sugerencias",
            "CANTIDAD": jsonresp[0][1].CANTIDAD
        },
        {
            "TIPO": "Felicitaciones",
            "CANTIDAD": jsonresp[0][2].CANTIDAD
        }
    ];
    ExpGraficoCantTipSolicLibroRSF = paraexportarenExcel;
    /*======================Para excel=====================*/

    new Chart(document.getElementById("graficoCantTipSolicLibroRSF"), {
        type: 'horizontalBar',
        data: {
            labels: [""],
            datasets: [
                {
                    label: 'Reclamos',
                    data: [jsonresp[0][0].CANTIDAD],
                    borderColor: "#80aaa5",
                    backgroundColor: "#80aaa5"
                },
                {
                    label: 'Sugerencias',
                    data: [jsonresp[0][1].CANTIDAD],
                    borderColor: "#ab9559",
                    backgroundColor: "#ab9559"
                },
                {
                    label: 'Felicitaciones',
                    data: [jsonresp[0][2].CANTIDAD],
                    borderColor: "#fafdde",
                    backgroundColor: "#fafdde"
                }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Cantidad según tipo de solicitud en el Libro R.S.F'
            },
            scales: {
                xAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                }]
            }
        }
    });
}


// GRÁFICO INSTITUCIONES CON MAYOR CANTIDAD DE SOLICITUDES DE RECLAMOS (7)
function crearGraficoInstMayorCantDeSolicReclamos(respuesta) {
    let jsonresp, contador;
    jsonresp = JSON.parse(respuesta);
    contador = jsonresp.length;

    // console.log("PROBAR DATOS: " + respuesta);
    // console.log("LARGO DEL ARRAY: " + contador);

    var nombre_institucion = [];
    var cantidadtotal = [];

    for (var i in jsonresp) {
        nombre_institucion.push(jsonresp[i].NOMBRE_INSTITUCION);
        cantidadtotal.push(jsonresp[i].CANTIDAD);
        // console.log("NOMBRE INSTITUCION: "+jsonresp[i].NOMBRE_INSTITUCION+"\n CANTIDAD: "+jsonresp[i].CANTIDAD);
    }

    /*======================Para excel=====================*/
    let paraexportarenExcel = jsonresp.map(function (datasss) {
        return {
            "Nombre Institución": datasss.NOMBRE_INSTITUCION,
            "Cantidad": datasss.CANTIDAD,
        }
    });
    ExpGraficoInstMayorCantDeSolicReclamos = paraexportarenExcel;
    /*======================Para excel=====================*/

    new Chart(document.getElementById("graficoInstMayorCantDeSolicReclamos"), {
        type: 'horizontalBar',
        data: {
            labels: nombre_institucion,
            datasets: [
                {
                    label: 'Total',
                    data: cantidadtotal,
                    backgroundColor: ["#80aaa5", "#ab9559", "#fafdde", "#fafdde", "#ff8a80", "#3cba9f", "#f3d374"]
                }
                // {
                //     label: 'Sugerencias',
                //     data: [3],
                //     borderColor: "#ab9559",
                //     backgroundColor: "#ab9559"
                // }
            ]
        },
        options: {
            title: {
                display: true,
                text: 'Instituciones con mayor cantidad de solicitudes de reclamos'
            },
            scales: {
                xAxes: [{
                    ticks: {
                        beginAtZero: true,
                        stepSize: 1
                    }
                    // stacked: true
                }]
            },
            legend: { //quito la legenda para marcar y desmarcar las opciones
                display: false
            }
        }
    });
}

// GRÁFICO CONTAR SECTORES CON MAYOR CANTIDAD DE FUNCIONARIOS
function crearGraficoSectconMayorCantDeFuncionarios(respuesta) {
    let jsonresp, contador;
    jsonresp = JSON.parse(respuesta);
    contador = jsonresp.length;

    // console.log("PROBAR DATOS: " + respuesta);
    // console.log("LARGO DEL ARRAY: " + contador);

    var nombre_sector = [];
    var cantidadtotal = [];

    for (var i in jsonresp) {
        nombre_sector.push(jsonresp[i].NOMBRE_SECTOR);
        cantidadtotal.push(jsonresp[i].CANTIDAD);
        // console.log("NOMBRE SECTOR: "+jsonresp[i].NOMBRE_SECTOR+"\n CANTIDAD: "+jsonresp[i].CANTIDAD);
    }

    /*======================Para excel=====================*/
    let paraexportarenExcel = jsonresp.map(function (datasss) {
        return {
            "Sector": datasss.NOMBRE_SECTOR,
            "Cantidad": datasss.CANTIDAD,
        }
    });
    ExpSectconMayorCantDeFuncionarios = paraexportarenExcel;
    /*======================Para excel=====================*/

    new Chart(document.getElementById('graficoSectconMayorCantDeFuncionarios'), {
        type: 'pie',
        data: {
            labels: nombre_sector,
            datasets: [{
                label: '# Cantidad',
                data: cantidadtotal,
                backgroundColor: ['#ff6384', '#36a2eb', "#4bc0c0", "#ffcd56", "#87d6e5", "#3cba9f", "#f3d374"],
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                display: true,
                labels: {
                    fontFamily: 'Helvetica'
                }
            },
            title: {
                display: false,
                // text: 'Titulo del gráfico'
            }
        }
    });
}

// GRÁFICO CANTIDAD DE FUNCIONARIOS POR UNIDAD
function crearGraficoCantDeFuncionariosPorUnidad(respuesta) {
    let jsonresp, contador;
    jsonresp = JSON.parse(respuesta);
    contador = jsonresp.length;

    // console.log("PROBAR DATOS: " + respuesta);
    // console.log("LARGO DEL ARRAY: " + contador);

    var nombre_unidad = [];
    var cantidadtotal = [];

    for (var i in jsonresp) {
        nombre_unidad.push(jsonresp[i].NOMBRE_UNIDAD);
        cantidadtotal.push(jsonresp[i].CANTIDAD);
        // console.log("NOMBRE SECTOR: "+jsonresp[i].NOMBRE_UNIDAD+"\n CANTIDAD: "+jsonresp[i].CANTIDAD);
    }

    /*======================Para excel=====================*/
    let paraexportarenExcel = jsonresp.map(function (datasss) {
        return {
            "Unidad": datasss.NOMBRE_UNIDAD,
            "Cantidad": datasss.CANTIDAD,
        }
    });
    ExpGraficoCantDeFuncionariosPorUnidad = paraexportarenExcel;
    /*======================Para excel=====================*/

    new Chart(document.getElementById('graficoCantDeFuncionariosPorUnidad'), {
        type: 'pie',
        data: {
            labels: nombre_unidad,
            datasets: [{
                label: '# Cantidad',
                data: cantidadtotal,
                backgroundColor: ['#ff6384', '#36a2eb', "#4bc0c0", "#ffcd56", "#87d6e5", "#3cba9f", "#f3d374"],
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                display: true,
                labels: {
                    fontFamily: 'Helvetica'
                }
            },
            title: {
                display: false,
                // text: 'Titulo del gráfico'
            }
        }
    });
}


// GRÁFICO CANTIDAD TRIMESTRAL DE MATERIALES EN BODEGA 
function crearGraficoCantMaterBodTrim(respuesta) {
    let jsonresp, contador;
    jsonresp = JSON.parse(respuesta);
    contador = jsonresp.length;

    // console.log("PROBAR DATOS: " + respuesta);
    // console.log("LARGO DEL ARRAY: " + contador);

    var TotDisponibles = [], TotEntregados = [], TotDefectuosos = [], TotPerdidos = [], TotalesDispEntVenc = [];

    for (var i in jsonresp) { //Agrupe todos los Disponibles los que tienen subindice [0],  Ej: jsonresp[0][0],jsonresp[1][0], jsonresp[2][0]...
        TotDisponibles.push(jsonresp[i][0].CANTIDAD);
    }
    for (var i in jsonresp) { //Agrupe todos los Entregados los que tienen subindice [1],  Ej: jsonresp[0][1],jsonresp[1][1], jsonresp[2][1]...
        TotEntregados.push(jsonresp[i][1].CANTIDAD);
    }
    for (var i in jsonresp) { //Agrupe todos los Vencidos los que tienen subindice [2],  Ej: jsonresp[0][1],jsonresp[1][1], jsonresp[2][1]...
        TotDefectuosos.push(jsonresp[i][2].CANTIDAD);
    }
    for (var i in jsonresp) { //Agrupe todos los Vencidos los que tienen subindice [2],  Ej: jsonresp[0][1],jsonresp[1][1], jsonresp[2][1]...
        TotPerdidos.push(jsonresp[i][3].CANTIDAD);
    }
    // for (var i in jsonresp[7]) { //Agrupe todos los Vencidos los que tienen subindice [7],  Ej: jsonresp[0][1],jsonresp[1][1], jsonresp[2][1]...
    //     TotalesDispEntVenc.push(jsonresp[7][i].TOTAL);
    // }

    // console.log(
    //     "MED Disponibles Ene/Feb/Mar: " + TotDisponibles +
    //     "\nMED Entregados Abr/May/Jun: " + TotEntregados +
    //     "\nMED Vencidos Jul/Ago/Sep: " + TotDefectuosos +
    //     "\nMED Totales Oct/Nov/Dic: " + TotalesDispEntVenc);

    // let [valorminimo, valormaximo] = TotalesDispEntVenc.reduce(([prevMin, prevMax], curr) => [Math.min(prevMin, curr), Math.max(prevMax, curr)], [Infinity, -Infinity]);

    // console.log("Min:", valorminimo);
    // console.log("Max:", valormaximo);

    /*======================Para excel=====================*/
    var paraexportarenExcel =
        [
            {
                "ESTADO": "Disponible",
                "Ene/Feb/Mar": jsonresp[0][0].CANTIDAD,
                "Abr/May/Jun": jsonresp[1][0].CANTIDAD,
                "Jul/Ago/Sep": jsonresp[2][0].CANTIDAD,
                "Oct/Nov/Dic": jsonresp[3][0].CANTIDAD
            },
            {
                "ESTADO": "Entregados",
                "Ene/Feb/Mar": jsonresp[0][1].CANTIDAD,
                "Abr/May/Jun": jsonresp[1][1].CANTIDAD,
                "Jul/Ago/Sep": jsonresp[2][1].CANTIDAD,
                "Oct/Nov/Dic": jsonresp[3][1].CANTIDAD
            },
            {
                "ESTADO": "Defectuosos",
                "Ene/Feb/Mar": jsonresp[0][2].CANTIDAD,
                "Abr/May/Jun": jsonresp[1][2].CANTIDAD,
                "Jul/Ago/Sep": jsonresp[2][2].CANTIDAD,
                "Oct/Nov/Dic": jsonresp[3][2].CANTIDAD
            },
            {
                "ESTADO": "Perdidos",
                "Ene/Feb/Mar": jsonresp[0][3].CANTIDAD,
                "Abr/May/Jun": jsonresp[1][3].CANTIDAD,
                "Jul/Ago/Sep": jsonresp[2][3].CANTIDAD,
                "Oct/Nov/Dic": jsonresp[3][3].CANTIDAD
            }
        ];
    ExpGraficoCantMaterBodTrim = paraexportarenExcel;

    /*======================Para excel=====================*/

    new Chart(document.getElementById("graficoGraficoCantMaterBodTrim"), {
        type: 'bar',
        data: {
            labels: ["Ene/Feb/Mar", "Abr/May/Jun", "Jul/Ago/Sep", "Oct/Nov/Dic"],
            datasets: [{
                data: TotDisponibles,
                label: "Disponibles",
                borderColor: "#0a90a1",
                backgroundColor: "#0a90a1",
                borderWidth: 2
            }, {
                data: TotEntregados,
                label: "Entregados",
                borderColor: "#b6d6e4",
                backgroundColor: "#b6d6e4",
                borderWidth: 2
            }, {
                data: TotDefectuosos,
                label: "Defectuosos",
                borderColor: "#57cdcd",
                backgroundColor: "#57cdcd",
                borderWidth: 2
            }, {
                data: TotPerdidos,
                label: "Perdidos",
                borderColor: "#0a9f9f",
                backgroundColor: "#0a9f9f",
                borderWidth: 2
            }]
        },
        options: {
            title: {
                display: true,
                text: ' Cantidad trimestral de materiales en bodega según su estado'
            },
            scales: {
                xAxes: [{
                    stacked: true
                }],
                yAxes: [{
                    stacked: true
                }],
            }
        },
    });
}

// GRÁFICO MEDICAMENTOS AGENDADOS EN DIAS DE SEMANA
function crearGraficoMedAgenDiaDeSemana(respuesta) {
    let jsonresp, contador;
    jsonresp = JSON.parse(respuesta);
    contador = jsonresp.length;

    // console.log("PROBAR DATOS: " + respuesta);
    // console.log("LARGO DEL ARRAY: " + contador);

    var TotRespondidos = [], TotNoRespondidos = [], TotalesMedAgenRespyNoResp = [];

    for (var i in jsonresp) { //Agrupe todos los Disponibles los que tienen subindice [0],  Ej: jsonresp[0][0],jsonresp[1][0], jsonresp[2][0]...
        TotRespondidos.push(jsonresp[i][0].CANTIDAD);
    }
    for (var i in jsonresp) { //Agrupe todos los Entregados los que tienen subindice [1],  Ej: jsonresp[0][1],jsonresp[1][1], jsonresp[2][1]...
        TotNoRespondidos.push(jsonresp[i][1].CANTIDAD);
    }
    for (var i in jsonresp[7]) { //Agrupe todos los Vencidos los que tienen subindice [1],  Ej: jsonresp[0][1],jsonresp[1][1], jsonresp[2][1]...
        TotalesMedAgenRespyNoResp.push(jsonresp[7][i].TOTAL);
    }

    // console.log(
    //     "MED Disponibles Lun-Dom: " + TotRespondidos +
    //     "\nMED Entregados Lun-Dom: " + TotNoRespondidos +
    //     "\nMED Totales Lun-Dom: " + TotalesMedAgenRespyNoResp);

    let [valorminimo, valormaximo] = TotalesMedAgenRespyNoResp.reduce(([prevMin, prevMax], curr) => [Math.min(prevMin, curr), Math.max(prevMax, curr)], [Infinity, -Infinity]);
    // console.log("Min:", valorminimo);
    // console.log("Max:", valormaximo);

    /*======================Para excel=====================*/
    var paraexportarenExcel =
        [
            {
                "ESTADOS": "Solicitudes respondidas",
                "SIGLA": "SR",
                " ": " ",
                "DIA": "Lunes",
                "\n": "SR",
                "CANTIDAD\n": jsonresp[0][0].CANTIDAD,
                "\n\n": "SNR",
                "CANTIDAD\n\n": jsonresp[0][1].CANTIDAD
            },
            {
                "ESTADOS": "Solicitudes no respondidas",
                "SIGLA": "SNR",
                "DIA": "Martes",
                "\n": "SR",
                "CANTIDAD\n": jsonresp[1][0].CANTIDAD,
                "\n\n": "SNR",
                "CANTIDAD\n\n": jsonresp[1][1].CANTIDAD
            },
            {
                "DIA": "Miercoles",
                "\n": "SR",
                "CANTIDAD\n": jsonresp[2][0].CANTIDAD,
                "\n\n": "SNR",
                "CANTIDAD\n\n": jsonresp[2][1].CANTIDAD
            },
            {
                "DIA": "Jueves",
                "\n": "SR",
                "CANTIDAD\n": jsonresp[3][0].CANTIDAD,
                "\n\n": "SNR",
                "CANTIDAD\n\n": jsonresp[3][1].CANTIDAD
            },
            {
                "DIA": "Viernes",
                "\n": "SR",
                "CANTIDAD\n": jsonresp[4][0].CANTIDAD,
                "\n\n": "SNR",
                "CANTIDAD\n\n": jsonresp[4][1].CANTIDAD
            },
            {
                "DIA": "Sábado",
                "\n": "SR",
                "CANTIDAD\n": jsonresp[5][0].CANTIDAD,
                "\n\n": "SNR",
                "CANTIDAD\n\n": jsonresp[5][1].CANTIDAD
            },
            {
                "DIA": "Domingo",
                "\n": "SR",
                "CANTIDAD\n": jsonresp[6][0].CANTIDAD,
                "\n\n": "SNR",
                "CANTIDAD\n\n": jsonresp[6][1].CANTIDAD
            }
        ];

    ExpcrearGraficoMedAgenDiaDeSemana = paraexportarenExcel;

    /*======================Para excel=====================*/
    // var yAxesticks = [];

    new Chart(document.getElementById("graficMedAgenDiaDeSemana"), {
        type: 'line',
        data: {
            labels: ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo"],
            datasets: [{
                data: TotalesMedAgenRespyNoResp,
                label: "Total",
                borderColor: "rgb(60,186,159)",
                backgroundColor: "rgb(60,186,159,0.1)",
            }, {
                data: TotRespondidos,
                label: "Solicitudes respondidas",
                borderColor: "rgb(62,149,205)",
                backgroundColor: "rgb(62,149,205,0.1)",
            }, {
                data: TotNoRespondidos,
                label: "Solicitudes no respondidas",
                borderColor: "rgb(142,94,162,1)",
                backgroundColor: "rgb(142,94,162,0.1)",
            }]
        },
        options: {
            title: {
                display: false,
                text: 'Medicamentos agendados en dias de semana'
            },
            scales: {
                yAxes: [{
                    // ticks: {
                    //     min: 0,
                    //     max: 600,
                    //     stepSize: 25
                    // }
                    ticks: {
                        beginAtZero: true,
                        // callback: function (value, index, values) {
                        //     yAxesticks = values;
                        //     return value;
                        // },
                        max: valormaximo + 1
                        //Uso  + 1 porque la linea del total se muy junta entonces al valor máximo le subo un poco más para que le de espacio
                    }
                }]
            }
        }
    });

    // var highestVal = yAxesticks[0];
    // console.log("Valor más alto: "+highestVal);
}


// GRÁFICO CONCURRENCIA DE COMENTARIOS POR USUARIO (A UN ARTICULO DE NOTICIA)
function crearGraficoConcComentarioUsuarporArticulo(respuesta) {
    let jsonresp, contador;
    jsonresp = JSON.parse(respuesta);
    contador = jsonresp.length;

    // console.log("PROBAR DATOS: " + respuesta);
    // console.log("LARGO DEL ARRAY: " + contador);

    /*======================Para excel=====================*/
    let paraexportarenExcel = jsonresp.map(function (datasss) {
        return {
            "NOMBRE": datasss.NOMBRE,
            "VECES QUE HA COMENTADO": datasss.CANTIDAD,
        }
    });
    ExpcrearGraficoConcComentarioUsuarporArticulo = paraexportarenExcel;
    /*======================Para excel=====================*/

    am4core.ready(function () {
        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end
        var chart = am4core.create("UsQueMasHanCom", am4plugins_wordCloud.WordCloud);
        chart.fontFamily = "Courier New";
        var series = chart.series.push(new am4plugins_wordCloud.WordCloudSeries());
        series.randomness = 0.1;
        series.rotationThreshold = 0.5;

        // series.data = [{"palabrastag": "javascript","count": "1765836"}, {"palabrastag": "java","count": "1517355"}];
        series.data = jsonresp;

        series.dataFields.word = "NOMBRE";
        series.dataFields.value = "CANTIDAD";

        series.heatRules.push({
            "target": series.labels.template,
            "property": "fill",
            "min": am4core.color("#0000CC"),
            "max": am4core.color("#CC00CC"),
            "dataField": "value"
        });

        // series.labels.template.url = "https://stackoverflow.com/questions/tagged/{word}";
        // series.labels.template.urlTarget = "_blank";
        series.labels.template.tooltipText = "{word} : {value}";
        // series.labels.template.tooltipText = "NOMBRE: {word} - CANTIDAD: {value}";

        var hoverState = series.labels.template.states.create("hover");
        hoverState.properties.fill = am4core.color("#FF0000");

        // var subtitle = chart.titles.create();
        // subtitle.text = "(click to open)";

        // var title = chart.titles.create();
        // title.text = "Usuarios que más han comentado";
        // title.fontSize = 20;
        // title.fontWeight = "800";

    }); // end am4core.ready()
}

// GRÁFICO ARTICULOS DE NOTICIA MÁS COMENTADOS
function crearGraficoArticuloMasComentados(respuesta) {
    let jsonresp, contador;
    jsonresp = JSON.parse(respuesta);
    contador = jsonresp.length;

    // console.log("PROBAR DATOS: " + respuesta);
    // console.log("LARGO DEL ARRAY: " + contador);

    /*======================Para excel=====================*/
    let paraexportarenExcel = jsonresp.map(function (datasss) {
        return {
            "ARTÍCULO": datasss.ARTICULO,
            "VECES COMENTADOS": datasss.CANTIDAD,
        }
    });
    ExpcrearGraficoArticuloMasComentados = paraexportarenExcel;
    /*======================Para excel=====================*/

    am4core.ready(function () {
        // Themes begin
        am4core.useTheme(am4themes_animated);
        // Themes end
        var chart = am4core.create("ArticuloMasComentados", am4plugins_wordCloud.WordCloud);
        chart.fontFamily = "Courier New";
        var series = chart.series.push(new am4plugins_wordCloud.WordCloudSeries());
        series.randomness = 0.1;
        series.rotationThreshold = 0.5;

        // series.data = [{"palabrastag": "javascript","count": "1765836"}, {"palabrastag": "java","count": "1517355"}];
        series.data = jsonresp;

        series.dataFields.word = "ARTICULO";
        series.dataFields.value = "CANTIDAD";

        series.heatRules.push({
            "target": series.labels.template,
            "property": "fill",
            "min": am4core.color("#0000CC"),
            "max": am4core.color("#CC00CC"),
            "dataField": "value"
        });

        // series.labels.template.url = "https://stackoverflow.com/questions/tagged/{word}";
        // series.labels.template.urlTarget = "_blank";
        series.labels.template.tooltipText = "{word} : {value}";
        // series.labels.template.tooltipText = "NOMBRE: {word} - CANTIDAD: {value}";

        var hoverState = series.labels.template.states.create("hover");
        hoverState.properties.fill = am4core.color("#FF0000");

        // var subtitle = chart.titles.create();
        // subtitle.text = "(click to open)";

        // var title = chart.titles.create();
        // title.text = "Usuarios que más han comentado";
        // title.fontSize = 20;
        // title.fontWeight = "800";

    }); // end am4core.ready()
}



// GRÁFICO AYUDAS SOLICITADAS A SOPORTE TÉCNICO
function crearGraficoAyudasSopTecnico(respuesta) {
    let jsonresp, contador;
    jsonresp = JSON.parse(respuesta);
    contador = jsonresp.length;

    // console.log("PROBAR DATOS: " + respuesta);
    // console.log("LARGO DEL ARRAY: " + contador);

    let agruparcantidad = [];

    for (var i in jsonresp[0]) { //Agrupe todos
        agruparcantidad.push(jsonresp[0][i].CANTIDAD);
    }

    /*======================Para excel=====================*/
    var paraexportarenExcel =
        [
            { "MES": "Enero", "CANTIDAD": jsonresp[0][0].CANTIDAD },
            { "MES": "Febrero", "CANTIDAD": jsonresp[0][1].CANTIDAD },
            { "MES": "Marzo", "CANTIDAD": jsonresp[0][2].CANTIDAD },
            { "MES": "Abril", "CANTIDAD": jsonresp[0][3].CANTIDAD },
            { "MES": "Mayo", "CANTIDAD": jsonresp[0][4].CANTIDAD },
            { "MES": "Junio", "CANTIDAD": jsonresp[0][5].CANTIDAD },
            { "MES": "Julio", "CANTIDAD": jsonresp[0][6].CANTIDAD },
            { "MES": "Agosto", "CANTIDAD": jsonresp[0][7].CANTIDAD },
            { "MES": "Septiembre", "CANTIDAD": jsonresp[0][8].CANTIDAD },
            { "MES": "Octubre", "CANTIDAD": jsonresp[0][9].CANTIDAD },
            { "MES": "Noviembre", "CANTIDAD": jsonresp[0][10].CANTIDAD },
            { "MES": "Diciembre", "CANTIDAD": jsonresp[0][11].CANTIDAD }
        ];
    ExpcrearGraficoAyudasSopTecnico = paraexportarenExcel;
    /*======================Para excel=====================*/

    new Chart(document.getElementById("GrafAyudasSopTecnico"), {
        type: 'bar',
        data: {
            labels: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            datasets: [{
                label: 'Cantidad',
                data: agruparcantidad,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(139, 195, 74, 0.2)',
                    'rgba(118, 128, 207, 0.2)',
                    'rgba(10, 120, 135, 0.2)',
                    'rgba(96, 125, 139, 0.2)',
                    'rgba(203, 46, 35, 0.2)',
                    'rgba(243, 73, 12, 0.2)'

                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(139, 195, 74, 1)',
                    'rgba(118, 128, 207, 1)',
                    'rgba(10, 120, 135, 1)',
                    'rgba(96, 125, 139, 1)',
                    'rgba(203, 46, 35, 1)',
                    'rgba(243, 73, 12, 1)'
                ],
                borderWidth: 1
            }],
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            legend: {
                display: false,
                labels: {
                    fontFamily: 'Helvetica'
                }
            },
            title: {
                display: true,
                text: 'Ayudas solicitadas a soporte técnico (mensual)'
            },
        }
    });


}

function crearGraficoSeguimientoCalificacionesDeLosArticulos(respuesta) {

    let jsonresp, contador;
    jsonresp = JSON.parse(respuesta);
    contador = jsonresp.length;

    // console.log("PROBAR DATOS: " + respuesta);
    // console.log("LARGO DEL ARRAY: " + contador);

    let fechas = [], calificacion = [];
    for (var i in jsonresp) { //Agrupe todos
        let expl = jsonresp[i].FECHA.split("-");
        fechas.push(expl[2] + ' de ' + traducirmeses(moment(jsonresp[i].FECHA).format('MMM')));
    }
    for (var i in jsonresp) { //Agrupe todos
        calificacion.push(jsonresp[i].VALOR);
    }

    // console.log("FECHAS: " + fechas);
    // console.log("CALIFICACIONES: " + calificacion);


    /*======================Para excel=====================*/
    let paraexportarenExcel = jsonresp.map(function (datasss) {
        let expl = datasss.FECHA.split("-");
        return {
            "FECHA": (expl[2] + ' de ' + traducirmeses(moment(datasss.FECHA).format('MMM')) + ' del ' + expl[0]),
            "CANTIDAD": datasss.VALOR,
        }
    });
    ExpcrearGraficoSeguimientoCalificacionesDeLosArticulos = paraexportarenExcel;
    /*======================Para excel=====================*/

    var ctx = document.getElementById('graficoSeguimientoCalificacionesDeLosArticulos').getContext('2d');

    var chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: fechas,
            legend: {
                display: true
            },
            datasets: [{
                fill: false,
                data: calificacion,
                label: 'Cantidad de calificaciones',
                backgroundColor: "rgba(54, 162, 235, 0.2)",
                borderColor: "rgba(54, 162, 235, 1)",
                type: 'bar',
                pointRadius: 1,
                lineTension: 2,
                borderWidth: 2
            },
                //   {
                //       fill: false,
                //       data: getColdTempData(),
                //       label: 'Cold Temperature',
                //       backgroundColor: "#0027FF",
                //       borderColor: "#0027FF",
                //       type: 'line',
                //       pointRadius: 1,
                //       lineTension: 2,
                //       borderWidth: 2
                //   }
            ]
        },
        options: {
            animation: false,
            responsive: true,
            scales: {
                xAxes: [{
                    scaleLabel: {
                        display: false,
                        labelString: 'Fechas'
                    },
                    ticks: {
                        maxRotation: 90,
                        minRotation: 90
                    }
                }],
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: 'Cantidad de calificaciones'
                    },
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            legend: {
                display: false,
                labels: {
                    fontFamily: 'Helvetica'
                }
            },
        }
    });


}


CambiarDatosEstadisticaVisitasYvisitantesArtNoticia('', '');

$("#formuEstadVisYVisitsArtNot").on('submit', function (event) {
    form = $("#formuEstadVisYVisitsArtNot");
    event.preventDefault();

    let desde = $('#desdeEstadVisYVisitsArtNot').val();
    let hasta = $('#hastaEstadVisYVisitsArtNot').val();

    if (compararfechas(hasta, desde)) {
        toastr.info("La fecha <strong>Hasta</strong> no debe ser mayor");
    } else {
        CambiarDatosEstadisticaVisitasYvisitantesArtNoticia(desde, hasta);
    }
    // toastr.info("DESDE: "+desde+"\nHasta: "+hasta);
});

function CambiarDatosEstadisticaVisitasYvisitantesArtNoticia(fechadesde, fechahasta) {
    $.post("funciones/acceso.php", {
        seleccionar: 38,
        fechadesde: fechadesde,
        fechahasta: fechahasta
    }, function (respuesta) {
        console.log("RES38: " + respuesta);
        crearGraficoEstadisticaVisitasYvisitantesArtNoticia(respuesta);
    }).fail(function () {
        console.log('Ha ocurrido un error al cargar el gráfico. Por favor, contacte al soporte.');
    });
}


// GRÁFICO ESTADÍSTICA DE LAS VISITAS Y VISITANTES DE LOS ARTICULOS DE NOTICIA
function crearGraficoEstadisticaVisitasYvisitantesArtNoticia(respuesta) {
    let jsonresp, contador;
    jsonresp = JSON.parse(respuesta);
    contadorVisitas = jsonresp['visitas'].length;
    contadorVisitantes = jsonresp['visitantes'].length;

    console.log("PROBAR DATOS: " + respuesta);
    console.log("LARGO ARRAY VISITAS: " + contadorVisitas);
    console.log("LARGO ARRAY VISITANTES: " + contadorVisitantes);

    var visitas = [], visitantes = [], fechas = [], paraexportarenExcel = [], paraexportarenExcel2 = [];
    let contadorvisitas = 0, contadorvisitantes = 0;

    let desde = $('#desdeEstadVisYVisitsArtNot').val();
    let hasta = $('#hastaEstadVisYVisitsArtNot').val();
    let separar1 = desde.split("-");
    let separar2 = hasta.split("-");

    paraexportarenExcel.push(
        {
            "DESDE": separar1[2]+' de '+traducirmeses(moment(separar1[1]).format('MMM')+' del '+separar1[0]),
            "HASTA": separar2[2]+' de '+traducirmeses(moment(separar2[1]).format('MMM')+' del '+separar2[0]),
            " ": " ",
        }
    );

    for (var i in jsonresp['visitas']) { //Agrupe todos los Disponibles los que tienen subindice [0],  Ej: jsonresp[0][0],jsonresp[1][0], jsonresp[2][0]...
        contadorvisitas = parseInt(contadorvisitas) + parseInt(jsonresp['visitas'][i].CANTIDAD);
        visitas.push(jsonresp['visitas'][i].CANTIDAD);
        let expl = jsonresp['visitas'][i].FECHA.split("-");
        let formatofecha = expl[2] + ' de ' + traducirmeses(moment(jsonresp['visitas'][i].FECHA).format('MMM'));
        fechas.push(formatofecha);

        paraexportarenExcel.push(
            {
                "FECHA": formatofecha,
                "VISITAS": jsonresp['visitas'][i].CANTIDAD,
                "VISITANTES": jsonresp['visitantes'][i].CANTIDAD
            }
        );

    }

    for (var i in jsonresp['visitantes']) { //Agrupe todos los Disponibles los que tienen subindice [0],  Ej: jsonresp[0][0],jsonresp[1][0], jsonresp[2][0]...
        contadorvisitantes = parseInt(contadorvisitantes) + parseInt(jsonresp['visitantes'][i].CANTIDAD);
        visitantes.push(jsonresp['visitantes'][i].CANTIDAD);
    }


    /*======================Para excel=====================*/
    ExpcrearGraficoEstadisticaVisitasYvisitantesArtNoticia = paraexportarenExcel;
    /*======================Para excel=====================*/

    // console.log("VISITAS: "+visitas);
    // console.log("VISITANTES: "+visitantes);
    // console.log("FECHAS: "+fechas);
    // console.log("CONTADOR VISITAS: "+contadorvisitas);
    // console.log("CONTADOR VISITANTES: "+contadorvisitantes);

    $('#contadorvisitasEstarticulo').text(contadorvisitas);
    $('#contadorvisitantesEstarticulo').text(contadorvisitantes);


    $('#GraficoEstadVisYVisitsArtNot').replaceWith($('<canvas id="GraficoEstadVisYVisitsArtNot" width="800" height="450"></canvas>')); // Para limpiar el canva porque sino toma el caché

    new Chart(document.getElementById("GraficoEstadVisYVisitsArtNot"), {
        type: 'line',
        data: {
            labels: fechas,
            datasets: [{
                data: visitas,
                label: "Visitas",
                borderColor: "rgba(237,78,136, 1)",
                backgroundColor: "rgba(237,78,136, 0.2)",
                borderWidth: 2,
                type: 'line',
                fill: true
            }, {
                data: visitantes,
                label: "Visitantes",
                borderColor: "rgba(93,82,247, 1)",
                backgroundColor: "rgba(93,82,247, 0.2)",
                borderWidth: 2,
                type: 'line',
                fill: true
            }]
        },
        options: {
            tooltips: {
                display: false,
                mode: 'index',
                titleFontSize: 10,
                titleFontColor: '#706F9A',
                bodyFontColor: '#706F9A',
                backgroundColor: '#fff',
                titleFontFamily: '"Muli", sans-serif',
                bodyFontFamily: '"Muli", sans-serif',
                cornerRadius: 3,
                intersect: false,
            },
            legend: {
                display: true,
                labels: {
                    usePointStyle: true,
                    // fontFamily: 'Montserrat',
                },
            },
            title: {
                display: false,
                text: 'ESTADÍSTICA DE LAS VISITAS Y VISITANTES DE LOS ARTICULOS DE NOTICIA'
            },
            scales: {
                xAxes: [{
                    scaleLabel: {
                        display: false,
                        labelString: 'Fechas'
                    },
                    ticks: {
                        maxRotation: 90,
                        minRotation: 90
                    }
                }],
                yAxes: [{
                    // ticks: {
                    //     min: 0,
                    //     max: 600,
                    //     stepSize: 25
                    // }
                    ticks: {
                        beginAtZero: true,
                        // callback: function (value, index, values) {
                        //     yAxesticks = values;
                        //     return value;
                        // },
                        // max: valormaximo + 30
                        //Uso  + 30 porque la linea del total se muy junta entonces al valor máximo le subo un poco más para que le de espacio
                    }
                }]
            }
        }
    });

}



$("#5patologiasfrec").on('click', event => ExportDataToExcel('Patologías más frecuentes en pacientes', cincopatologiasfrecuentes));
$("#exportarpacientesregistrado").on('click', event => ExportDataToExcel('Pacientes Registrados mensualmente en el año en curso', PacientesIngresadosPorMes));
$("#expRangoEdadySexo").on('click', event => ExportDataToExcel('Pacientes por Rango de Edad y Género', ExpPacPorRangoEdadYGenero));
$("#expMaterialesPorCat").on('click', event => ExportDataToExcel('Frecuencia de las categorías (aseo, oficina e higiene) presentes en los materiales.', ExpMaterialDeAseoOficinaHigienePorCategoria));
$("#exp5ArtMejorCalif").on('click', event => ExportDataToExcel('5 Articulos mejor calificados', Exp5articulosmascalificados));
$("#BNDJYPORSEM").on('click', event => ExportDataToExcel('Mensajes en la bandeja de contacto vs Semestre', ExpBandejaMensajesPorSemestre));
$("#expStockmensualmaterialesBodega").on('click', event => ExportDataToExcel('Stock mensual de los materiales de bodega', ExpStockMensualMaterialesBodega));
$("#expBannerIMGeVID").on('click', event => ExportDataToExcel('Estados de actividad de los banner de Imágenes y Videos', ExpBannerIMGeVID));
$("#expSolAprbRechzAgenRetMed").on('click', event => ExportDataToExcel('Solicitudes trimestrales de retiro de medicamentos', ExpSolAprbRechzAgenRetMed));
$("#expSolicDeMedTrimestral").on('click', event => ExportDataToExcel('Solicitudes trimestrales de medicamentos', ExpSolicDeMedTrimestral));
$("#expGraficoCantTotalSolAgendaRetMed").on('click', event => ExportDataToExcel('Cantidad total de solicitudes de agenda de retiro de medicamentos (Respondidas y No respondidas)', ExpSolTotalRespoYnoRespAgenRetMed));
$("#expCantidadSolicDePermisosEspAdminFerLeg").on('click', event => ExportDataToExcel('Cantidad total de solicitudes de permiso especial, administrativo y feriado legal', ExpCantTotalSolicDePermisoEspAdmiFerLeg));
$("#expMotivoSolcPermEspecial").on('click', event => ExportDataToExcel('Motivo de las solicitudes de permiso especial (Historial)', ExpoMotivoSolcPermEspecial));
$("#expCantTotalTipoRemSolPermAdmin").on('click', event => ExportDataToExcel('Tipo de remuneraciones en solicitudes de permiso administrativo (Historial)', ExpTipoRemSolcPermAdminHistorial));
$("#expCantTotalMedPorEstadoDispoEntrVenc").on('click', event => ExportDataToExcel('Stock de medicamentos según estado (Disponible, Entregados, Vencidos)', ExpCantTotalMedPorEstadoDispoEntrVenc));
$("#expGraficoHistoricoRegMedPorDiaDeSemana").on('click', event => ExportDataToExcel('Histórico Cantidad de medicamentos registrados en dias de semana', ExpGraficoHistoricoRegMedPorDiaDeSemana));
$("#expGraficoCantMedEstDiaSem").on('click', event => ExportDataToExcel('Cantidad total de medicamentos según estado y dia de semana', ExpCrearGraficoHistoricoEstadosMedPorDiaDeSemana));
$("#expGraficoCantMedEstadosMedPorTrimestre").on('click', event => ExportDataToExcel('Cantidad total de medicamentos según su estado y trimestre', ExpGraficoHistoricoEstadosMedPorTrimestre));
$("#expCantRespSolicitudesReclamosSugerencias").on('click', event => ExportDataToExcel('Estado de respuesta a las solicitudes reclamos(RCL) y/o sugerencias(SG)', ExpGraficoCantRespSolicitudesReclamosSugerencias));
$("#expgraficoCantTipSolicLibroRSF").on('click', event => ExportDataToExcel('Cantidad según tipo de solicitud en el Libro R.S.F', ExpGraficoCantTipSolicLibroRSF));
$("#expgraficoInstMayorCantDeSolicReclamos").on('click', event => ExportDataToExcel('Instituciones con mayor cantidad de solicitudes de reclamos', ExpGraficoInstMayorCantDeSolicReclamos));
$("#exportarSectconMayorCantDeFuncionarios").on('click', event => ExportDataToExcel('Cantidad de funcionarios por sector', ExpSectconMayorCantDeFuncionarios));
$("#expCantDeFuncionariosPorUnidad").on('click', event => ExportDataToExcel('Cantidad de funcionarios por unidad', ExpGraficoCantDeFuncionariosPorUnidad));
$("#expgraficoGraficoCantMaterBodTrim").on('click', event => ExportDataToExcel('Cantidad trimestral de materiales en bodega según su estado', ExpGraficoCantMaterBodTrim));
$("#expgraficoMedAgenDiaDeSemana").on('click', event => ExportDataToExcel('Cantidad de medicamentos agendados en dias de semana', ExpcrearGraficoMedAgenDiaDeSemana));
$("#expgraficoConcComentarioUsuarporArticulo").on('click', event => ExportDataToExcel('Concurrencia de comentarios por usuario y artículo de noticia', ExpcrearGraficoConcComentarioUsuarporArticulo));
$("#expgraficoArticuloMasComentados").on('click', event => ExportDataToExcel('Artículo de noticia más comentados', ExpcrearGraficoArticuloMasComentados));
$("#expgraficoAyudasSopTecnico").on('click', event => ExportDataToExcel('Ayudas solicitadas a soporte técnico (mensual)', ExpcrearGraficoAyudasSopTecnico));
$("#expGraficoSeguimientoCalificacionesDeLosArticulos").on('click', event => ExportDataToExcel('Seguimiento de calificaciones de los artículos', ExpcrearGraficoSeguimientoCalificacionesDeLosArticulos));
$("#expGraficoEstadisticaVisitasYvisitantesArtNoticia").on('click', event => ExportDataToExcel('Estadisticas de Visitas/Visitantes de un artículo de noticias por rango de fechas', ExpcrearGraficoEstadisticaVisitasYvisitantesArtNoticia));




//  FUNCIÓN PARA EXPORTAR A EXCEL
function ExportDataToExcel(nombreArchivo, obj) {
    filename = nombreArchivo + '.xlsx';
    data = obj;
    var ws = XLSX.utils.json_to_sheet(data);
    var wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Datos");
    XLSX.writeFile(wb, filename);
}
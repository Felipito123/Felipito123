var ExportarDatoscomunal;

function covidComunaLosAlamos(opcion) {

    var graficocomunal = document.getElementById('graficocovidcomunal').getContext('2d');
    let textolabel;
    let Buscar;

    if (opcion == 1) {
        textolabel = " casos activos";
        Buscar = "casosactivos";
    } else if (opcion == 2) {
        textolabel = " casos acumulados";
        Buscar = "acumulados";
    } else if (opcion == 3) {
        textolabel = " casos recuperados";
        Buscar = "recuperados";
    } else if (opcion == 4) {
        textolabel = " fallecidos";
        Buscar = "fallecidos";
    }

    var chart = new Chart(graficocomunal, {
        type: 'line',
        data: {
            datasets: [{
                borderColor: '#DE0909',
                backgroundColor: 'rgba(222, 9, 9, 0.2)',
                borderWidth: 1.5
            }]
        },
        options: {
            title: {
                display: false
            },
            layout: {
                padding: {
                    left: -5
                }
            },
            scales: {
                xAxes: [{
                    type: 'time',
                    time: {
                        unit: 'month',
                        displayFormats: {
                            month: 'MMM'
                        }
                    },
                    ticks: {
                        fontColor: '#464646',
                        fontSize: 12,
                        callback: function (label, index, labels) {

                            return traducir_label(label);
                        }
                    },
                    gridLines: {
                        display: false
                    }
                }],
                yAxes: [{
                    ticks: {
                        fontColor: '#464646',
                        display: true,
                        beginAtZero: false,
                        padding: 9
                    },
                    gridLines: {
                        color: 'rgba(136,153,166, .3)',
                        drawBorder: false,
                        drawTicks: false
                    }
                }]

            },
            legend: {
                display: false
            },
            elements: {
                point: {
                    radius: 0
                }
            },
            tooltips: {
                enabled: true,
                intersect: false,
                mode: 'index',
                callbacks: {
                    title: function (tooltipItem, data) {
                        return '';
                    },
                    label: function (tooltipItem, data) {
                        let informacion = data.labels[tooltipItem.index];

                        let var1 = moment(informacion).format('DD-MMM');

                        // console.log("VAR1: "+ data.labels[tooltipItem.index]);

                        let expl = var1.split("-");
                        let obteneraño = informacion.split("-");

                        return expl[0] + ' ' + traducirmeses(expl[1]) + " " + obteneraño[0] + ": " + data.datasets[0].data[tooltipItem.index] + textolabel;
                    }
                }
            }
        }
    });

    //puede llenarse con el json de prueba: CovidRegionesJson/AricYParic.json
    $.getJSON("js/losalamos.json", {
        _: new Date().getTime()
    }, function (data) {

        console.log(data);

        chart.data.labels = data.datos.map(function (item) {
            return Object.values(item)[0]
        })
        chart.data.datasets[0].data = data.datos.map(function (item) {
            return Object.values(item)[1]
        })
        var filtrar = data.Buscar;
        chart.options.tooltips.callbacks.title = function (tooltipItem, data) {
            return filtrar
        }
        chart.update();

    });
}


$.getJSON("js/losalamos.json", function(json) {
    let jsonparseado = JSON.stringify(json); 
    llenarDatosComunal(jsonparseado);
});

// GRAFICO LLENAR DATOS PARA EXPORTAR
function llenarDatosComunal(variable) {
    var obj = JSON.parse(variable);

    // console.log("asjajs: " + variable);

    /*======================Para excel=====================*/
    let setearnombresparaexcel = obj.datos.map(function (datasss) {
        return {
            "Casos activos": datasss.casosactivos,
            "Casos acumulados": datasss.acumulados,
            "Casos recuperados": datasss.recuperados,
            "Fallecidos": datasss.fallecidos,
            "Fecha": datasss.fecha
        }
    });
    ExportarDatoscomunal = setearnombresparaexcel;
    /*======================Para excel=====================*/
}


$("#casoscomunal").on('click', event => ExportDataToExcel('Datos covid comunal', ExportarDatoscomunal));

//  FUNCIÓN PARA EXPORTAR A EXCEL
function ExportDataToExcel(nombreArchivo, obj) {
    filename = nombreArchivo + '.xlsx';
    data = obj;
    var ws = XLSX.utils.json_to_sheet(data);
    var wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Datos");
    XLSX.writeFile(wb, filename);
}
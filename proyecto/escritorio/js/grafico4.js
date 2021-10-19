var datosGrafico4Exportar;


$.post("funciones/llenargrafico4.php", function (data) {
    crearGrafico4(data);
    // console.log("TEMP: \n"+data);
    // let temp = JSON.parse(data);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar los usuarios activos e inactivos. Por favor, contacte al soporte.');
});

// GRAFICO DE TORTA
function crearGrafico4(respuesta) {
    var obj = JSON.parse(respuesta);

    let usuarioActivo = 0;
    let usuarioInactivo = 0;

    usuarioActivo = obj[0].USUARIOACTIVO;
    usuarioInactivo = obj[0].USUARIOINACTIVO;

    /*======================Para excel=====================*/
    let setearnombresparaexcel = obj.map(function (datasss) {
        return {
            "Activos": usuarioActivo,
            "Inactivos": usuarioInactivo,
        }
    });
    datosGrafico4Exportar = setearnombresparaexcel;

    // console.log("Datos Graficoooos:\n"+ JSON.stringify(datosGrafico4Exportar));
    /*======================Para excel=====================*/

    // GRAFICO 4 - TORTA
    ctx = document.getElementById('grafico4').getContext('2d');
    myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Activos', 'Inactivos'],
            datasets: [{
                label: '# de materiales',
                data: [usuarioActivo, usuarioInactivo],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)'
                ],
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


$("#exportarexcel6").on('click', event => ExportDataToExcel('Usuarios activos vs Usuarios Inactivos', datosGrafico4Exportar));


//  FUNCIÓN PARA EXPORTAR A EXCEL
function ExportDataToExcel(nombreArchivo, obj) {
    filename = nombreArchivo + '.xlsx';
    data = obj;
    var ws = XLSX.utils.json_to_sheet(data);
    var wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Datos");
    XLSX.writeFile(wb, filename);
}
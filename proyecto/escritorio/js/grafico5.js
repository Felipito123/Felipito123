var datosGrafico5Exportar;


$.post("funciones/llenargrafico5.php", function (data) {
    crearGrafico5(data);
    // console.log("TEMP: \n"+data);
    // let temp = JSON.parse(data);
}).fail(function () {
    console.log('Ha ocurrido un error al cargar los datoa del gráfico. Por favor, contacte al soporte.');
});

// GRAFICO DE TORTA
function crearGrafico5(respuesta) {
    var obj = JSON.parse(respuesta);

    var nombreusuario = [];
    var diastomados = [];

    for (var i in obj) {
        nombreusuario.push(obj[i].NOMBREUSUARIO);
        diastomados.push(obj[i].DIASTOMADOS);
    }

    /*======================Para excel=====================*/
    let setearnombresparaexcel = obj.map(function (datasss) {
        return {
            "Nombre Funcionario": datasss.NOMBREUSUARIO,
            "Dias tomados": datasss.DIASTOMADOS,
        }
    });
    datosGrafico5Exportar = setearnombresparaexcel;
    /*======================Para excel=====================*/

    // GRAFICO 5 - BARRA
    var ctx = document.getElementById('grafico7').getContext('2d');
    var myBarChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: nombreusuario,
            datasets: [{
                label: "Dias tomados acumulado",
                backgroundColor: ["#3e95cd", "#8e5ea2", "#3cba9f", "#ff8a80", "#66bb6a"],
                data: diastomados
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: 'Histórico Mayor cantidad de vacaciones por funcionario'
            },
            scales: {
                yAxes: [{
                    display: true,
                    stacked: true,
                    ticks: {
                        min: 0, // minimum value
                    }
                }]
            }
        }
    });
}


$("#exportarexcel4").on('click', event => ExportDataToExcel('Mayor cantidad de vacaciones por funcionario', datosGrafico5Exportar));


//  FUNCIÓN PARA EXPORTAR A EXCEL
function ExportDataToExcel(nombreArchivo, obj) {
    filename = nombreArchivo + '.xlsx';
    data = obj;
    var ws = XLSX.utils.json_to_sheet(data);
    var wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Datos");
    XLSX.writeFile(wb, filename);
}
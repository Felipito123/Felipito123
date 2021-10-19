// Set new default font family and font color to mimic Bootstrap's default styling
// Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
// Chart.defaults.global.defaultFontColor = '#858796';

function number_format(number, decimals, dec_point, thousands_sep) {
  // *     example: number_format(1234.56, 2, ',', ' ');
  // *     return: '1 234,56'
  number = (number + '').replace(',', '').replace(' ', '');
  var n = !isFinite(+number) ? 0 : +number,
    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
    s = '',
    toFixedFix = function (n, prec) {
      var k = Math.pow(10, prec);
      return '' + Math.round(n * k) / k;
    };
  // Fix for IE parseFloat(0.55).toFixed(0) = 0;
  s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
  if (s[0].length > 3) {
    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
  }
  if ((s[1] || '').length < prec) {
    s[1] = s[1] || '';
    s[1] += new Array(prec - s[1].length + 1).join('0');
  }
  return s.join(dec);
}

let arreglogeneral = [];
let contar_arreglo = [];
var datosGrafico3;
var j=-1;
var nombresdelmes = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
var enero = []; var febrero = []; var marzo = []; var abril = []; var mayo = []; var junio = []; var julio = [];
var agosto = []; var septiembre = []; var octubre = []; var noviembre = []; var diciembre = [];

// Area Chart Example
$.ajaxSetup({ async: false });
$.post("funciones/llenargrafico3.php", function (data) {
  jsonNuevo = JSON.parse(data);

  enero = jsonNuevo[0].MESENERO;
  febrero = jsonNuevo[0].MESFEBRERO;
  marzo = jsonNuevo[0].MESMARZO;
  abril = jsonNuevo[0].MESABRIL;
  mayo = jsonNuevo[0].MESMAYO;
  junio = jsonNuevo[0].MESJUNIO;
  julio = jsonNuevo[0].MESJULIO;
  agosto = jsonNuevo[0].MESAGOSTO;
  septiembre = jsonNuevo[0].MESSEPTIEMBRE;
  octubre = jsonNuevo[0].MESOCTUBRE;
  noviembre = jsonNuevo[0].MESNOVIEMBRE;
  diciembre = jsonNuevo[0].MESDICIEMBRE;

  arreglogeneral = [enero, febrero, marzo, abril, mayo, junio, julio, agosto, septiembre, octubre, noviembre, diciembre];

  /*======================Para excel=====================*/
  let setearnombresparaexcel = arreglogeneral.map(function (obj) {
    j++;
    return {
      "Mes": nombresdelmes[j], "Cantidad": obj[0]
    }
  });
  datosGrafico3 = setearnombresparaexcel;
  // console.log("DATO MAPEADO: " + datosGrafico3);
  /*======================Para excel=====================*/


});

// console.log("enero: " + enero + "\nfebrero: " + febrero + "\nmarzo: " + marzo + "\nabril: " + abril + "\nmayo: " + mayo + "\njunio: " + junio + "\njulio: " + julio
//   + "\nagosto: " + agosto + "\nseptiembre: " + septiembre + "\nOctubre: " + octubre + "\nnoviembre: " + noviembre + "\ndiciembre: " + diciembre);


arreglogeneral.forEach(el => contar_arreglo[el] = 1 + (contar_arreglo[el] || 0)); //cuenta los valores distintos en el arreglo
//Se necesitan 4 parametros como minimo en el eje Y
if (contar_arreglo.length <= 3) {
  // $('#cardbodygraficodearea').html('<div class="alert alert-danger" role="alert">Aún no hay datos disponibles</div>');
  $('#cardgraficodearea').hide();
  $('#cardCantidadMensualFuncionarioEnVacaciones').hide();
}

else {

  var ctx = document.getElementById("grafico3");
  var myLineChart = new Chart(ctx, {
    type: 'line',
    data: {
      labels: nombresdelmes,
      datasets: [{
        label: "Funcionarios en vacaciones",
        lineTension: 0.3,
        backgroundColor: "rgba(78, 115, 223, 0.05)",
        borderColor: "#6ed9e6", //color de la linea del gráfico
        pointRadius: 3,
        pointBackgroundColor: "#6ed9e6",
        pointBorderColor: "#6ed9e6",
        pointHoverRadius: 3,
        pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
        pointHoverBorderColor: "rgba(78, 115, 223, 1)",
        pointHitRadius: 10,
        pointBorderWidth: 2,
        data: [parseInt(enero), parseInt(febrero), parseInt(marzo), parseInt(abril), parseInt(mayo), parseInt(junio), parseInt(julio),
        parseInt(agosto), parseInt(septiembre), parseInt(octubre), parseInt(noviembre), parseInt(diciembre)],
      }],
    },
    options: {
      maintainAspectRatio: false,
      layout: {
        padding: {
          left: 10,
          right: 25,
          top: 25,
          bottom: 0
        }
      },
      scales: {
        xAxes: [{
          time: {
            unit: 'date'
          },
          gridLines: {
            display: false,
            drawBorder: false
          },
          ticks: {
            maxTicksLimit: 7
          }
        }],
        yAxes: [{
          ticks: {
            maxTicksLimit: 5,
            padding: 10,
            beginAtZero: true,
            // Include a dollar sign in the ticks
            callback: function (value, index, values) {
              let valor = parseInt(value);
              return valor;
              // return '$m,' + number_format(value);
              // return number_format(value);
            }
          },
          gridLines: {
            color: "rgb(234, 236, 244)",
            zeroLineColor: "rgb(234, 236, 244)",
            drawBorder: false,
            borderDash: [2],
            zeroLineBorderDash: [2]
          }
        }],
      },
      legend: {
        display: false
      },
      tooltips: {
        backgroundColor: "rgb(255,255,255)",
        bodyFontColor: "#858796",
        titleMarginBottom: 10,
        titleFontColor: '#6e707e',
        titleFontSize: 14,
        borderColor: '#dddfeb',
        borderWidth: 1,
        xPadding: 15,
        yPadding: 15,
        displayColors: false,
        intersect: false,
        mode: 'index',
        caretPadding: 10,
        callbacks: {
          label: function (tooltipItem, chart) {
            var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
            // return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
            return datasetLabel + ': ' + tooltipItem.yLabel;
          }
        }
      }
    }
  });
}


$("#exportarexcel3").on('click', event => ExportDataToExcel('Cantidad mensual de funcionarios en Vacaciones', datosGrafico3));


//  FUNCIÓN PARA EXPORTAR A EXCEL
function ExportDataToExcel(nombreArchivo, obj) {
  filename = nombreArchivo + '.xlsx';
  data = obj;
  var ws = XLSX.utils.json_to_sheet(data);
  var wb = XLSX.utils.book_new();
  XLSX.utils.book_append_sheet(wb, ws, "Datos");
  XLSX.writeFile(wb, filename);
}

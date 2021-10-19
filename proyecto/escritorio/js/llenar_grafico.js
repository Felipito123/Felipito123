$(document).ready(function () {
  var datosGrafico1;
  var datosGrafico2;
  //GRÁFICO DE BARRA
  $.post("funciones/llenargraficodebarra.php",
    function (data) {

      /*======================Para excel=====================*/
      let setearnombresparaexcel = data.map(function (obj) {
        return {
          "Articulo": obj.id_articulo,
          "titulo": obj.titulo_articulo,
          "visualizaciones": obj.visitas
        }
      });
      datosGrafico1 = setearnombresparaexcel;
      /*======================Para excel=====================*/


      var titulo = [];
      var cantidad = [];

      for (var i in data) {
        titulo.push(data[i].titulo_articulo.substring(0, 23) + '...');
        cantidad.push(data[i].visitas);
      }

      var chartdata = {
        labels: titulo,
        datasets: [{
          label: 'Visitas',
          backgroundColor: '#49e2ff',
          borderColor: '#46d5f1',
          hoverBackgroundColor: '#CCCCCC',
          hoverBorderColor: '#666666',
          data: cantidad
        }]
      };

      var graphTarget = document.getElementById("graficoCanvas");//document.getElementById("graficoCanvas"); $("#graficoCanvas")

      var barGraph = new Chart(graphTarget, {
        type: 'bar',
        data: chartdata
      });
    });


  // Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  // Chart.defaults.global.defaultFontColor = '#858796';

  //GRÁFICO DE BARRA
  $.post("funciones/llenargraficodetorta.php", function (data) {
    //console.log(data);

    /*======================Para excel=====================*/
    let setearnombresparaexcel = data.map(function (obj) {
      return {
        "Articulo": obj.id_articulo,
        "titulo": obj.titulo,
        "visualizaciones": obj.visitas
      }
    });
    datosGrafico2 = setearnombresparaexcel;
    /*======================Para excel=====================*/


    var titulo = [];
    var cantidad = [];
    var Colores = [];

    var tpcolor = ['#4e73df', '#1cc88a', '#36b9cc', '#0BDAF9', '#166D4E'];

    for (var i in data) {
      titulo.push(data[i].titulo);
      cantidad.push(data[i].visitas);
      Colores.push(tpcolor[i % tpcolor.length]);
    }
    // Pie Chart Example
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: titulo,
        datasets: [{
          data: cantidad,
          backgroundColor: Colores,
          // hoverBackgroundColor:hoverBackgroundColores //['#2e59d9', '#17a673', '#2c9faf'],
          //hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false,
          labels: {
            fontFamily: 'Helvetica'
          }
        },
        cutoutPercentage: 80,
      }

    });

  });


  function usuariosenlinea() {
    $.post('funciones/fun_llenar_panel.php', { opcionuno: 1 }, function (response) {
      //console.log(response);
      document.getElementById("usuarioactivo").innerHTML = response;
    }).fail(function () {
      $('#gif').hide();
    });
  }

  function usuariosregistrados() {
    $.post('funciones/fun_llenar_panel.php', { opciondos: 2 }, function (response) {
      //console.log(response);
      document.getElementById("usuarioregistrado").innerHTML = response;
    }).fail(function () {
      toastr.info("Ha ocurrido un error al cargar datos, si el problema persiste contacte a soporte.");
      // $('#gif').hide();
    });
  }

  function articulostotales() {
    $.post('funciones/fun_llenar_panel.php', { opciontres: 3 }, function (response) {
      //console.log(response);
      document.getElementById("articulostotales").innerHTML = response;
    }).fail(function () {
      toastr.info("Ha ocurrido un error al cargar datos, si el problema persiste contacte a soporte.");
      // $('#gif').hide();
    });
  }

  function promediovisualizacion() {
    $.post('funciones/fun_llenar_panel.php', { opcioncuatro: 4 }, function (response) {
      //console.log(response);
      document.getElementById("barradeprogreso").innerHTML = response;
    }).fail(function () {
      toastr.info("Ha ocurrido un error al cargar datos, si el problema persiste contacte a soporte.");
      // $('#gif').hide();
    });
  }



  $("#exportarexcel1").on('click', event => ExportDataToExcel('Articulos más vistos', datosGrafico1));
  $("#exportarexcel2").on('click', event => ExportDataToExcel('Articulos menos vistos', datosGrafico2));

  //  FUNCIÓN PARA EXPORTAR A EXCEL
  function ExportDataToExcel(nombreArchivo, obj) {
    filename = nombreArchivo + '.xlsx';
    data = obj;
    var ws = XLSX.utils.json_to_sheet(data);
    var wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Datos");
    XLSX.writeFile(wb, filename);
  }

  setInterval(usuariosenlinea, 2500);
  setInterval(usuariosregistrados, 2500);
  setInterval(articulostotales, 2500);
  setInterval(promediovisualizacion, 2500);
});


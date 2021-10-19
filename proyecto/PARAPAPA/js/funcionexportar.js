//  FUNCIÓN PARA EXPORTAR A EXCEL
function ExportDataToExcel(nombreArchivo, obj) {
    filename = nombreArchivo + '.xlsx';
    data = obj;
    var ws = XLSX.utils.json_to_sheet(data);
    var wb = XLSX.utils.book_new();
    XLSX.utils.book_append_sheet(wb, ws, "Datos");
    XLSX.writeFile(wb, filename);
  }
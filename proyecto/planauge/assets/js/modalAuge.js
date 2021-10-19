function modalAuge() {

    let comprobarDirectorio = new Request('assets/archivos/auge.pdf');
    let direccion='../../imgpordefecto/no-imagen.jpg';
  
  
    fetch(comprobarDirectorio).then(function (respuesta) {
      console.log(respuesta.status); // returns 200
      if (respuesta.status == 200) {
        direccion='assets/archivos/auge.pdf';
        swalauge('750px','si','1100px',direccion);
      }else{
        swalauge('400px','no','600px',direccion);
      }
    }).catch(function (error) {
      console.log("Error:"+error);
    });
  }
  
  
  function swalauge(altura,scroll,ancho,direccion){
    Swal.fire({
      title: "Plan de Acceso Universal a Garantías Explícitas (AUGE)",
      html: `
        <div class="card shadow">
          <div class="card-body">
          <iframe src="`+direccion+`" frameborder="0" scrolling="`+scroll+`" width="100%" height="`+altura+`"></iframe>
          </div>
        </div>`,
      focusConfirm: false,
      showCancelButton: true,
      showConfirmButton: false,
      // confirmButtonText: 'Guardar',
      cancelButtonText: '<div class="container-fluid"><div class="row justify-content-center" style="width:270px;">Cerrar ventana</div></div>',
      // confirmButtonColor: "#e74a3b",
      cancelButtonColor: "#757575",
      width: ancho
    });
  
  }
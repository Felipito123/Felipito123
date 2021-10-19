function swalalerta(titulo, tipoicono) {

  swal(titulo, {
    icon: tipoicono,
    buttons: false,
  });

}

function swalfire(titulo, icono) {
    let color;
  if(icono=="success"){  color="#1d7d4d";}
  else if(icono=="error"){ color="#dd3333"; }
  else if(icono=="info"){ color="#17a2b8"; }
  Swal.fire({
    // title: titulo,
    showClass: { //para esta animación del modal integre un css llamado animate.min.css
        popup: 'animate__animated animate__fadeInDown'
    },
    hideClass: {
        popup: 'animate__animated animate__fadeOutUp'
    },
    icon: icono,
    // inputLabel: titulo,
    title: titulo,
    showCloseButton: false,
    showCancelButton: true,
    showConfirmButton: false,
    showDenyButton: false,
    focusConfirm: false,
    width: '500px',
    // confirmButtonText: 'OK',
    // denyButtonText: 'Continuar',
    cancelButtonText: '<div style="width:310px">Esta bien</div>', //Ya toma el color gris por defecto
    //confirmButtonColor: "#dd3333", 

    cancelButtonColor: color//1d7d4d 

  });
}


function swaljefesdesector(textohtml) {
  Swal.fire({
    // title: "Error al mostrar el último ids",
    showClass: { //para esta animación del modal integre un css llamado animate.min.css
        popup: 'animate__animated animate__fadeInDown'
    },
    hideClass: {
        popup: 'animate__animated animate__fadeOutUp'
    },
    html: textohtml, 

    showCloseButton: false,
    showCancelButton: true,
    showConfirmButton: false,
    showDenyButton: false,
    focusConfirm: false,
    width: '1500px',
    cancelButtonText: '<div class="au">Cerrar</div>',
    cancelButtonColor: "#dd3333", //1d7d4d 

});
}


function cargadecorreo() {
  Swal.fire({
    title: 'Cargando...',
    cancelButtonText: 'Cancelar ',
    showCancelButton: false,
    showConfirmButton: false,
    allowOutsideClick: false, //no permite que el usuario cancele el swal
    html: `
    <div class="container">
     <div class="row justify-content-center">
      <img class="pb-2" id="gif" src="../../importantes/gif3.gif" style="width:100px;height:100px;" />
      Enviando notificacion al correo electronico
      </div>
    </div>
    `,
    width: '484px',
  });
  // .then((result) => { 
  //   // if (result.dismiss) {
  //   //   console.log('Ha cerrado session');
  //   // }
  // });

}

function cargadecorreozoom() {
  Swal.fire({
    title: 'Cargando...',
    cancelButtonText: 'Cancelar ',
    showCancelButton: false,
    showConfirmButton: false,
    allowOutsideClick: false, //no permite que el usuario cancele el swal
    html: `
    <div class="container">
     <div class="row justify-content-center">
      <img class="pb-2" id="gif" src="../../importantes/gif3.gif" style="width:100px;height:100px;" />
      Enviando notificaciones de correo electronico a los funcionarios
      </div>
    </div>
    `,
    width: '484px',
  });
}
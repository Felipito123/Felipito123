var html = `
<div class="row justify-content-center">

  <div class="col-lg-12">
    <!-- style="border: 3px solid #ccedef;" -->
    <h4 id="alertaswal" class="pt-5" style="font-size: 1.1em;font-weight: 500;text-align: center;text-transform: none;word-wrap: break-word;">Cargando...</h4>
    <iframe id="framenuevo" class="blur" frameborder="0" height="200" marginheight="0" marginwidth="0" scrolling="no" style="max-width:100%;" src="https://maps.google.com/maps/ms?hl=es&amp;ie=UTF8&amp;oe=UTF8&amp;msa=0&amp;msid=207653898476044679432.0004dcc8645f67da0bf1c&amp;t=h&amp;ll=-37.696861,-73.295288&amp;spn=0.52158,0.878906&amp;z=10&amp;output=embed" width="1000">Cargando</iframe>
  </div>

</div>

`;

function versectorizacion() {
    Swal.fire({
        title: "SECTORIZACIÓN",
        html: html,
        allowOutsideClick: false,
        // onBeforeOpen: () => {
        //   Swal.showLoading();
        // },
        focusConfirm: false,
        showCancelButton: true,
        showConfirmButton: false,
        // confirmButtonText: 'Guardar',
        cancelButtonText: '<div class="container-fluid"><div class="row justify-content-center" style="width:270px;">Cerrar ventana</div></div>',
        // confirmButtonColor: "#e74a3b",
        cancelButtonColor: "#757575",
        width: '1000px'
    });

    // $('.swal2-content').css('padding', '0px'); 
    // $('.swal2-container').css('style', 'padding: 0px'); 

    var frame = document.getElementById("framenuevo");
    frame.onload = function () {
        $('#alertaswal').fadeOut();

        // $('#alertaswal').text('');
        frame.className = "noblur";
        // $('#alertaswal').attr("hidden",true);
        $('#framenuevo').css('height', '780px');
        // toastr.success("ya cargo el frame");
    }

}
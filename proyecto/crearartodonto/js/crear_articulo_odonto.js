$(document).ready(function (event) {

  /* ==========================PARA REMOVER O AGREGAR (ATTR), ANTES TIENE QUE ESTAR EN EL HTML EL VALOR(required, disabled)===========================*/
  
  //Valor por defecto: Oculto el ul cuando se carga la página y le quito el required de los HTMLs de esos inputs. 
  //Esto es porque genera error al enviar el formulario si el required esta oculto (Ya que el navegador no lo puede analizar)
  $('#idcitas').hide();
  $("#frase").removeAttr("required"); 
  $("#cita").removeAttr("required"); 
  
  document.getElementById('botoncheckbox').onchange = function(){ //DETECTO EL CAMBIO DEL CHECKBOX
    if(this.checked) {
      //$('#idcitas').show();
      $("#idcitas").fadeIn(); //para que aparezca con una leve animación
      $("#frase").attr("required", "required");
      $("#cita").attr("required", "required");
   
    }
    else {
      // $('#idcitas').hide();
      $("#idcitas").fadeOut();//para que se desvanezca con una leve animación
      $("#frase").val('');
      $("#cita").val('');
      $("#frase").removeAttr("required");
      $("#cita").removeAttr("required"); 
  
    }
  }
  /* ==========================PARA REMOVER O AGREGAR (ATTR), ANTES TIENE QUE ESTAR EN EL HTML EL VALOR(required, disabled)===========================*/
  
  
  
    $("#formcreararticulo_odonto").on('submit', function (event) {
      event.preventDefault();
      formularioRegistroOdonto();
    });


  });
  
  function limpiardescripcion() {
    //$("#nombreimagen").html(""); ESTE ES DEL PDF
    $('#descripcion_odonto').summernote('code', '<p><br></p>');
  }
  
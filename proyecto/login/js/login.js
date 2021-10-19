$(document).ready(function (event) {


  $('#contrasena').on('keydown', function (ev) { //si se presiona enter en el último input se activa el formulario
    if (ev.key === 'Enter') {
      $('#btnlogin').trigger("click");
    }
  });


  $("#formulogin").on('submit', function (event) {
    event.preventDefault();
    form = $("#formulogin");

    let rut = $("#rut").val();
    let rut2;
    let contrasena = $("#contrasena").val();
    let recordarme = $('#recordarme').is(':checked');//true or false
    let rec;
    rut2 = rut.trim(); //Quito los espacios en blanco al principio y al final de la cadena, esto ya que en el celular la validacion en keyup no funciona

    // let largo1 = rut.length;
    // let largo2 = rut2.length;
    // alert("RUT1: "+largo1+" RUT2: "+largo2);

    if (recordarme) { rec = 'sirecordar'; } else { rec = 'norecordar' }

    if (validavacioynulo([rut2, contrasena])) { swalfire("¡Campos inválidos!", "error"); }
    else if (rut2.length < 8 || rut2.length > 11) { swalfire("¡Longitud del Rut inválido, minimo 8 y máximo 11 caracteres permitidos!", "error"); }
    else if (contrasena.length < 2 || contrasena.length > 250) { swalfire("¡Longitud de la contraseña inválida, minimo 2 ymáximo 250 caracteres permitidos!", "error"); }
    else if (!esunrut(rut2)) { swalfire("¡Rut inválido!", "error"); }
    else {
      $.ajax({
        type: 'POST',
        url: 'funciones/fun_login.php',
        data: new FormData(this),
        dataType: 'json',
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function () {
          //form[0].reset(); //LUEGO DE ENVIAR SE RESETE O LIMPIE EL FORMULARIO, SINO QUEDAN GUARDADOS ALGUNOS DATOS AL VOLVER ATRÁS
        }
      }).done(function (respuesta) {
        console.log(respuesta);

        if (respuesta == 1) {
          // swalalerta("¡1!","success");
          crearcookie("lg", Base64.encode(rut2) + "-" + Base64.encode(contrasena) + "-" + rec, 2); //Por dos años la expiración
          window.setTimeout(function () { location.href = '../indice/'; }, 1000);
        }else if (respuesta == 2) {
          swalfire("La contraseña no es correcta", "error");
        } else if (respuesta == 3) {
          swalfire("No esta registrado o verifique datos", "error");
        } else if (respuesta == 4) {
          swalfire("¡Parámetros vacíos!", "info");
        } else if (respuesta == 5) {
          swalfire("¡Longitud de los campos no válidos!", "info");
        } else if (respuesta == 6) {
          swalfire("¡No se pudo informar el usuario o bien este usuario ha dejado de ejercer sus funciones en el CESFAM!", "error");
        } else if (respuesta == 7) {
          swalfire("¡Usted ha dejado de ejercer sus funciones en el CESFAM o su cuenta esta inactiva!", "error");
        }
      }).fail(function (res) {
        console.log(res);
        swalfire("Al parecer ocurrió un error, estamos trabajando para solucionar lo antes posible, si el problema persiste, contacte a soporte. ", "error");
      });
    }
  });


  $(document).on("click", "#olvidecontra", function () {

    Swal.mixin({
      icon: "warning",
      //puede ser text, number, email, password, textarea, select, radio
      confirmButtonText: 'Confirmar ',
      cancelButtonText: 'Cancelar ',
      confirmButtonColor: "#0091e5",
      showCancelButton: true,
    }).queue([

      {    //value[0]
        title: '¡Recuperación!',
        input: 'email',
        inputPlaceholder: 'Escriba su correo electrónico',
        inputValidator: (value) => {
          if (!value) {
            return 'Campo vacio'
          } else if (!validarcorreo(value)) {
            return 'Correo Inválido'
          }
        }
        //text: 'Todos los datos de su cuenta serán eliminados y por consecuencia no podrá recuperar su cuenta. Confirme que desea realizar esta acción.',

      },
    ]).then((result) => {

      if (result.value) {
        let correo = result.value[0]; //correo lo saco del input del swal
        //console.log(correo);
        cargadecorreo();
        $.post('../Notificaciones/reestablecercontra/', { correo: correo }, function (response) {
          //console.log(response);
          if (response == 1) {
            swalfire("Hemos enviado un mensaje a su correo electrónico", "success");
          } else if (response == 2) {
            swalfire("No existe correo asociado", "error");
          } else if (response == 3) {
            alertify.error("No se han recibido parámetros");
          }
        }).fail(function (res) {
          console.log(res);
        });

      } else {
        // swal("¡Cancelado!", "Eliminación cancelada", "info");
      }

    });

  });

  function crearcookie(s_nombre, s_contenido, s_expiracion) {
    let d = new Date();
    d.setTime(d.getTime() + s_expiracion * 60 * 60 * 24 * 365 * 1000); //cada un año la expiracion 60segundos x 60 minutos * 24 horas * 356 dias del año
    var exp = "expires=" + d.toUTCString(); // d.toGMTString()
    document.cookie = s_nombre + "=" + s_contenido + ";" + exp + ";path=/";
  }

  function validarcorreo(email) {
    const re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
  }

});


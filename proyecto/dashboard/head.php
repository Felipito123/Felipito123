<!DOCTYPE html>
<!--Le estás diciendo al navegador que te lo procese como navegador más actual -->
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"> <!-- X-UA-Compatible-->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="../../importantes/logocesfam-head.png" />

    <!-- <link rel="stylesheet" href="../../css/efectosawesome.css"> -->
    <!-- <script src="https://pro.fontawesome.com/releases/v6.0.0-beta1/js/all.js" data-auto-add-css="false" data-auto-replace-svg="false"></script> -->
    <script src="https://kit.fontawesome.com/b1224f57be.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../../css/icofont/icofont.css">
    <link rel="stylesheet" href="../../css/icofont/icofont.min.css">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Estilo del calendario de eventos -->
    <link href="../../css/fullcalendar.min.css" rel="stylesheet">

    <!-- Estilo animaciones de los iconos del topbar -->
    <link href="../../css/animacion-topbar.css" rel="stylesheet">

    <!-- ALERTIFY CSS -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />


    <!-- CON ESTOS SCRIPTS PUEDES USAR LAS ALERTAS de SWEETALERT Y ALERFITY -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>

    <!--ANIMACIONES -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/animate.css@3/animate.min.css">
    <!-- JavaScript -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="../../jsdashboard/jquery.min.js"></script>
    <script src="../../jsdashboard/bootstrap.bundle.min.js"></script>
    <script src="../../jsdashboard/jquery.easing.min.js"></script>

    <!--TOASTR -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

    <!--datables CSS básico-->
    <link rel="stylesheet" type="text/css" href="../../assets/datatables/datatables.min.css" />
    <link rel="stylesheet" href="../../css/cambiartema.css">

    <!-- include summernote css/js -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>

    <!--TIPO DE FUENTE PARA LOS TITULOS  -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Inline+Text:wght@100&family=Kaushan+Script&display=swap" rel="stylesheet">

    <!--EFECTOS DEL MODAL  -->
    <!--OJO QUE PARA USAR VELOCITY NO DEBO SUBIR LA VERSIÓN SINO TENDRÉ ERRORES Y TAMBIÉN EL JQUERY SE DEBE CARGAR ANTES -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.2/velocity.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.2/velocity.ui.min.js'></script>

    <script src="../js/notify/bootstrap-notify.js"></script>
    <script src="../js/notify/bootstrap-notify.min.js"></script>
    <script src="../js/notify/notificacion_tipo_intranet.js"></script>

    <style>
        .swal2-title {
            font-weight: 650 !important;
        }

        .btn-purple {
            background-color: #e052b4;
            color: white;
        }

        .btn-purple:hover {
            background-color: #cc369d;
            color: white;
        }

        .btn-brown {
            background-color: #de5d30;
            color: white;
        }

        .btn-brown:hover {
            background-color: #c7532b;
            color: white;
        }

        .badge-brown {
            background-color: #de5d30;
            color: white;
        }

        .btn-default {
            background-color: #3ddacb;
            color: white;
        }

        .btn-default:hover {
            background-color: #5ca59d;
            color: white;
        }

        #labelparaswal {
            color: #545454;
            font-size: 14px;
            font-weight: 400;
            line-height: normal;
            float: left;
            word-wrap: break-word;
        }

        #avisoheader {
            background-color: #d0a7c2;
            border-color: #d0a7c2;
        }

        /* COLOR DE ALERTAS TIPO INTRANET ... EJEMPLOS EN LA PANTALLA FIRMADIGITAL*/
        .alert-tipo_warning {
            background-color: #be701feb;
            color: white;
        }

        .alert-tipo_danger {
            background-color: rgba(153, 40, 18, .92);
            color: #fff;
        }

        .alert-tipo_success {
            background-color: rgba(89, 131, 75, .92);
            color: #fff;
        }

        .alert-tipo_info {
            background-color: rgba(49, 81, 133, .92);
            color: #fff;
        }
    </style>

    <script>
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "100",
            "hideDuration": "1000",
            "timeOut": "2500",
            "extendedTimeOut": "500",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "show",
            "hideMethod": "hide" // ,"showMethod": "slideDown","hideMethod": "slideUp"
        };
    </script>

    <link rel="stylesheet" href="../js/circulodetiempo/TimeCircles.css">
    <script src="../js/circulodetiempo/TimeCircles.js"></script>

    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
    
<?php
date_default_timezone_set("America/Santiago");
setlocale(LC_TIME, "spanish");
$fechaenvionotificacion = strftime("%d de %B, %Y %X"); // 04 de septiembre, 2029  %A= dia de la semana, %d= numero del dia,  %B=nombre del mes,   %Y= numero del año

$hora = strftime("%X"); //14:23:10
$minutoAnadir = 70; //DURACION 40 MINUTOS
$horaInicial = strtotime($hora);
$duracion_minutos = $minutoAnadir * 60;
$horafinalizar = date("H:i:s", $horaInicial + $duracion_minutos);

// echo $hora . '<br>';
// echo $horafinalizar;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reunión agendada</title>
</head>

<body>

    <table width="100%" height="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#E4E6E9">
        <tbody>
            <tr>
                <td style="background-color:#e4e6e9;min-height:200px" width="100%" valign="top" bgcolor="#E4E6E9" align="center">
                    <table>
                        <tbody>
                            <tr>
                                <td width="608" align="center">
                                    <table style="table-layout:auto;padding-right:24px;padding-left:24px;width:600px;background-color:#ffffff" width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">
                                        <tbody>
                                            <tr style="font-family:Arial,sans-serif;line-height:19px;color:#444444;font-size:13px;height:55px" height="55px">
                                                <td style="height:55px;padding-right:16px;font-family:Arial,sans-serif;line-height:19px;color:#444444;font-size:13px;font-weight:normal;vertical-align:middle" valign="middle" align="left">
                                                    <img src="https://www.munilosalamos.cl/web/wp-content/uploads/2017/04/Escudo_de_Los_%C3%81lamos.png" style="max-height:70px;border:0px none #444444;vertical-align:middle;display:block;padding-bottom:9px" vspace="0" hspace="0" border="0" class="CToWUd">
                                                </td>
                                                <td style="height:55px;font-family:Arial,sans-serif;line-height:19px;color:#444444;font-size:13px;font-weight:normal;text-align:right;vertical-align:middle" valign="middle" align="right">
                                                    <p href="#m_1846476139514098355_" style="color:#2d353a;text-decoration:none;font-size:15px;background-color:transparent">
                                                        Sistema Automatizado de Correos
                                                    </p>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table style="height:6px;font-size:0px;line-height:0;width:600px;background-color:#e4e6e9" width="600" height="6" cellspacing="0" cellpadding="0" border="0" bgcolor="#E4E6E9">
                                        <tbody>
                                            <tr>
                                                <td style="height:6px;width:600px;background-color:#e4e6e9" width="600" valign="middle" height="6" bgcolor="#E4E6E9" align="left">
                                                    &nbsp;
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table style="height:16px;font-size:0px;line-height:0;width:600px;background-color:#ffffff" width="600" height="16" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">
                                        <tbody>
                                            <tr>
                                                <td style="height:16px;width:600px;background-color:#ffffff" width="600" valign="middle" height="16" bgcolor="#FFFFFF" align="left">
                                                    &nbsp;
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table style="table-layout:fixed;background-color:#ffffff" width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">
                                        <tbody>
                                            <tr>
                                                <td style="font-family:Arial,sans-serif;line-height:19px;color:#444444;font-size:13px;font-weight:normal;padding-left:36px;padding-right:36px" valign="top" align="left">
                                                    <table style="table-layout:fixed" width="528" cellspacing="0" cellpadding="0" border="0" align="left">
                                                        <tbody>
                                                            <tr>
                                                                <td style="font-family:Arial,sans-serif;line-height:19px;color:#444444;font-size:13px;font-weight:normal" width="528" valign="top" align="left">
                                                                    <table style="table-layout:fixed" width="528" cellspacing="0" cellpadding="0" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="font-size:28px;margin:0px;font-family:Arial,sans-serif;font-weight:normal;line-height:19px;color:#806520;padding-bottom:10px;padding-top:15px" width="528" valign="top" align="center">
                                                                                    ¡Saludos cordiales!
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                    <table style="table-layout:fixed" width="528" cellspacing="0" cellpadding="0" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="font-family:Arial,sans-serif;font-weight:normal;line-height:19px;color:#444444;margin:0px;font-size:16px;padding-bottom:8px;padding-top:10px;text-align:justify" width="528" valign="top" align="left">
                                                                                    Te contamos que <strong>Patricio Galdames Sepúlveda</strong> ha agendado en el curso una nueva actividad llamada <strong>"Examen"</strong>. Su información básica la dejamos a continuación:
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table style="height:12px;font-size:0px;line-height:0;width:600px;background-color:#ffffff" width="600" height="12" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">
                                        <tbody>
                                            <tr>
                                                <td style="height:12px;width:600px;background-color:#ffffff" width="600" valign="middle" height="12" bgcolor="#FFFFFF" align="left">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table style="table-layout:fixed;background-color:#ffffff" width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">
                                        <tbody>
                                            <tr>
                                                <td style="font-family:Arial,sans-serif;line-height:19px;color:#444444;font-size:13px;font-weight:normal;padding-left:36px;padding-right:36px" valign="top" align="left">
                                                    <table style="table-layout:fixed" width="528" cellspacing="0" cellpadding="0" border="0" align="left">
                                                        <tbody>
                                                            <tr>
                                                                <td style="font-family:Arial,sans-serif;line-height:19px;color:#444444;font-size:13px;font-weight:normal" width="528" valign="top" align="left">
                                                                    <table style="table-layout:fixed" width="100%" cellspacing="0" cellpadding="0" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="font-family:Arial,sans-serif;line-height:19px;color:#2d353a;font-size:14px;font-weight:normal;padding:15px;border:1px solid #fdf3d8;background-color:#fdf3d8" width="100%" valign="top" bgcolor="#d9edf7" align="left">
                                                                                    <ul>
                                                                                        <li><strong>Tipo: </strong>Reunión zoom</li>
                                                                                        <li><strong>Fecha de Activación: </strong>22-01-2021 14:00</li>
                                                                                        <li><strong>Fecha Vencimiento: </strong>22-01-2021 17:00</li>
                                                                                    </ul>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table style="table-layout:fixed;background-color:#ffffff" width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">
                                        <tbody>
                                            <tr>
                                                <td style="font-family:Arial,sans-serif;line-height:19px;color:#444444;font-size:13px;font-weight:normal;padding-left:36px;padding-right:36px" valign="top" align="left">
                                                    <table style="table-layout:fixed" width="528" cellspacing="0" cellpadding="0" border="0" align="left">
                                                        <tbody>
                                                            <tr>
                                                                <td style="font-family:Arial,sans-serif;line-height:19px;color:#444444;font-size:13px;font-weight:normal" width="528" valign="top" align="left">
                                                                    <table style="table-layout:fixed" width="528" cellspacing="0" cellpadding="0" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="font-family:Arial,sans-serif;font-weight:normal;line-height:19px;color:#444444;margin:0px;font-size:16px;padding-bottom:8px;padding-top:10px;text-align:justify" width="528" valign="top" align="left">
                                                                                    Puedes ver la información completa ingresando en nuestro sistema en la pestaña <strong>Videochat</strong> y buscarlo en el listado de <strong>reuniones próximas</strong> (menú superior izquierdo).
                                                                                    Si tienes alguna duda, por favor contáctate directamente
                                                                                    a nuestro correo electrónico <a href="mailto:saludlosalamos@gmail.com" target="_blank">saludlosalamos@gmail.com</a>.
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table style="table-layout:fixed;background-color:#ffffff" width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">
                                        <tbody>
                                            <tr>
                                                <td style="font-family:Arial,sans-serif;line-height:19px;color:#444444;font-size:13px;font-weight:normal;padding-left:36px;padding-right:36px" valign="top" align="left">
                                                    <table style="table-layout:fixed" width="528" cellspacing="0" cellpadding="0" border="0" align="left">
                                                        <tbody>
                                                            <tr>
                                                                <td style="font-family:Arial,sans-serif;line-height:19px;color:#444444;font-size:13px;font-weight:normal" width="528" valign="top" align="left">
                                                                    <table style="table-layout:fixed" width="528" cellspacing="0" cellpadding="0" border="0">
                                                                        <tbody>
                                                                            <tr>
                                                                                <!-- <td style="font-family:Arial,sans-serif;font-weight:normal;line-height:19px;color:#444444;margin:0px;font-size:18px;padding-bottom:8px;padding-top:10px" width="528" valign="top" align="center">
        Te saluda con atención el equipo Adecca UBB.
        </td> -->
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table style="height:12px;font-size:0px;line-height:0;width:600px;background-color:#ffffff" width="600" height="12" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">
                                        <tbody>
                                            <tr>
                                                <td style="height:12px;width:600px;background-color:#ffffff" width="600" valign="middle" height="12" bgcolor="#FFFFFF" align="left">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table style="table-layout:fixed;background-color:#ffffff" width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">
                                        <tbody>
                                            <tr>
                                                <td style="font-family:Arial,sans-serif;line-height:19px;color:#444444;font-size:13px;font-weight:normal;padding-left:36px;padding-right:36px" valign="top" align="left">
                                                    <table style="table-layout:fixed" width="528" cellspacing="0" cellpadding="0" border="0" align="left">
                                                        <tbody>
                                                            <tr>
                                                                <td style="font-family:Arial,sans-serif;line-height:19px;color:#444444;font-size:13px;font-weight:normal" width="528" valign="top" align="right">
                                                                    <span style="font-family:Arial,sans-serif;line-height:19px;color:#444444;font-size:12px">
                                                                        <!-- Fecha y hora de la notificación: 22-01-2021 13:59:23. -->
                                                                        Fecha y hora de la notificación: <?php echo $fechaenvionotificacion; ?>
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table style="height:32px;font-size:0px;line-height:0;width:600px;background-color:#ffffff" width="600" height="32" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">
                                        <tbody>
                                            <tr>
                                                <td style="height:32px;width:600px;padding-left:18px;padding-right:18px;background-color:#ffffff" width="600" valign="middle" height="32" bgcolor="#FFFFFF" align="center">
                                                    &nbsp;
                                                    <table width="100%" height="0" cellspacing="0" cellpadding="0" border="0" bgcolor="#E8E8E8">
                                                        <tbody>
                                                            <tr>
                                                                <td style="height:1px;font-size:0" width="100%" valign="top" height="1" bgcolor="#E8E8E8" align="left">
                                                                    &nbsp;
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table style="table-layout:fixed;background-color:#ffffff" width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">
                                        <tbody>
                                            <tr>
                                                <td style="font-family:Arial,sans-serif;line-height:19px;color:#444444;font-size:13px;font-weight:normal;padding-left:36px;padding-right:36px" valign="top" align="left">
                                                    <table style="table-layout:fixed" width="528" cellspacing="0" cellpadding="0" border="0" align="left">
                                                        <tbody>
                                                            <tr>
                                                                <td style="font-family:Arial,sans-serif;line-height:19px;color:#444444;font-size:13px;font-weight:normal" width="528" valign="top" align="left">
                                                                    <span style="font-family:Arial,sans-serif;line-height:19px;color:#444444;font-size:14px">
                                                                        Por tu seguridad, nuestros correos electrónicos no contienen enlaces a ningún sitio web y tampoco enviaremos archivos adjuntos en ellos.
                                                                    </span>

                                                                    <table style="height:12px;font-size:0px;line-height:0;width:528px;background-color:#ffffff" width="528" height="12" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="height:12px;width:528px;background-color:#ffffff" width="528" valign="middle" height="12" bgcolor="#FFFFFF" align="left">
                                                                                    &nbsp;
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

                                                                    <i style="color:#a94442;display:block;margin-left:auto;margin-right:auto">Este es un correo electrónico generado automáticamente. Por favor no responder.</i>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table style="height:16px;font-size:0px;line-height:0;width:600px;background-color:#ffffff" width="600" height="16" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">
                                        <tbody>
                                            <tr>
                                                <td style="height:16px;width:600px;background-color:#ffffff" width="600" valign="middle" height="16" bgcolor="#FFFFFF" align="left">&nbsp;</td>
                                            </tr>
                                        </tbody>
                                    </table>


                                    <table style="height:6px;font-size:0px;line-height:0;width:600px;background-color:#e4e6e9" width="600" height="6" cellspacing="0" cellpadding="0" border="0" bgcolor="#E4E6E9">
                                        <tbody>
                                            <tr>
                                                <td style="height:6px;width:600px;background-color:#e4e6e9" width="600" valign="middle" height="6" bgcolor="#E4E6E9" align="left">
                                                    &nbsp;
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table style="table-layout:fixed;background-color:#ffffff" width="600" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">
                                        <tbody>
                                            <tr>
                                                <td style="font-family:Arial,sans-serif;line-height:19px;color:#444444;font-size:13px;font-weight:normal;padding-left:36px;padding-right:36px" valign="top" align="left">
                                                    <table style="table-layout:fixed" width="528" cellspacing="0" cellpadding="0" border="0" align="left">
                                                        <tbody>
                                                            <tr>
                                                                <td style="font-family:Arial,sans-serif;line-height:19px;color:#444444;font-size:13px;font-weight:normal" width="528" valign="top" align="left">
                                                                    <table style="height:16px;font-size:0px;line-height:0;width:528px;background-color:#ffffff" width="528" height="16" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="height:16px;width:528px;background-color:#ffffff" width="528" valign="middle" height="16" bgcolor="#FFFFFF" align="left">
                                                                                    &nbsp;
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>

                                                                    <div style="font-family:Arial,sans-serif;line-height:19px;color:#777777;font-size:14px;text-align:center">
                                                                        <img src="https://sonix.ai/packs/media/images/corp/logos/partners/zoom-video-conferencing-logo-7bde38062e4a0eaf7432215c95ccc38a.png" style="max-height:55px;border:0px none #444444;vertical-align:middle;display:block;margin-left:auto;margin-right:auto;padding-bottom:9px" vspace="0" hspace="0" border="0" class="CToWUd">
                                                                        Cesfam - Salud los álamos © 2021
                                                                    </div>

                                                                    <table style="height:16px;font-size:0px;line-height:0;width:528px;background-color:#ffffff" width="528" height="16" cellspacing="0" cellpadding="0" border="0" bgcolor="#FFFFFF">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td style="height:16px;width:528px;background-color:#ffffff" width="528" valign="middle" height="16" bgcolor="#FFFFFF" align="left">
                                                                                    &nbsp;
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <table style="height:8px;font-size:0px;line-height:0;width:600px;background-color:#e4e6e9" width="600" height="8" cellspacing="0" cellpadding="0" border="0" bgcolor="#E4E6E9">
                                        <tbody>
                                            <tr>
                                                <td style="height:8px;width:600px;background-color:#e4e6e9" width="600" valign="middle" height="8" bgcolor="#E4E6E9" align="left">
                                                    &nbsp;
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </td>
            </tr>
        </tbody>
    </table>


</body>

</html>
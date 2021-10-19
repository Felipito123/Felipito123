<?php

$linkprevio  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . "/";

$mensaje  = '
<html>

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0;">
  <meta name="format-detection" content="telephone=no" />

  <!-- Responsive Mobile-First Email Template by Konstantin Savchenko, 2015.
    https://github.com/konsav/email-templates/  -->

  <style>
    /* Reset styles */
    body {
      margin: 0;
      padding: 0;
      min-width: 100%;
      width: 100% !important;
      height: 100% !important;
    }

    body,
    table,
    td,
    div,
    p,
    a {
      -webkit-font-smoothing: antialiased;
      text-size-adjust: 100%;
      -ms-text-size-adjust: 100%;
      -webkit-text-size-adjust: 100%;
      line-height: 100%;
    }

    table,
    td {
      mso-table-lspace: 0pt;
      mso-table-rspace: 0pt;
      border-collapse: collapse !important;
      border-spacing: 0;
    }

    img {
      border: 0;
      line-height: 100%;
      outline: none;
      text-decoration: none;
      -ms-interpolation-mode: bicubic;
    }

    #outlook a {
      padding: 0;
    }

    .ReadMsgBody {
      width: 100%;
    }

    .ExternalClass {
      width: 100%;
    }

    .ExternalClass,
    .ExternalClass p,
    .ExternalClass span,
    .ExternalClass font,
    .ExternalClass td,
    .ExternalClass div {
      line-height: 100%;
    }

    /* Rounded corners for advanced mail clients only */
    @media all and (min-width: 560px) {
      .container {
        border-radius: 8px;
        -webkit-border-radius: 8px;
        -moz-border-radius: 8px;
        -khtml-border-radius: 8px;
      }
    }

    /* Set color for auto links (addresses, dates, etc.) */
    a,
    a:hover {
      color: #127DB3;
    }

    .footer a,
    .footer a:hover {
      color: #999999;
    }
  </style>

  <!-- MESSAGE SUBJECT -->
  <title>Get this responsive email template</title>

</head>


<body topmargin="0" rightmargin="0" bottommargin="0" leftmargin="0" marginwidth="0" marginheight="0" width="100%" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%; height: 100%; -webkit-font-smoothing: antialiased; text-size-adjust: 100%; -ms-text-size-adjust: 100%; -webkit-text-size-adjust: 100%; line-height: 100%;
    background-color: #F0F0F0;
    color: #000000;" bgcolor="#F0F0F0" text="#000000">

  <!-- SECTION / BACKGROUND -->
  <!-- Set message background color one again -->
  <table width="100%" align="center" border="0" cellpadding="0" cellspacing="0" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; width: 100%;" class="background">
    <tr>
      <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;" bgcolor="#F0F0F0">

        <!-- WRAPPER / CONTEINER -->
        <!-- Set conteiner background color -->
        <table border="0" cellpadding="0" cellspacing="0" align="center" bgcolor="#FFFFFF" width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
    max-width: 560px;" class="container">


          <tr>
            <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0;
            padding-top: 0px;" class="hero"><img border="0" vspace="0" hspace="0" src="https://securityintelligence.com/wp-content/uploads/2018/10/si-eight-character-password-feature-630x330.jpg" alt="No se puede mostrar la imagen" title="Imagen" width="560" style="
            width: 100%;
            max-width: 560px;
            color: #000000; font-size: 13px; margin: 0; padding: 0; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; border: none; display: block;" /></td>
          </tr>

          <!-- PARAGRAPH -->
          <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
          <tr>
            <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 17px; font-weight: 400; line-height: 160%;
            padding-top: 25px; 
            color: #000000;
      font-family: Arial, sans-serif;" class="paragraph">

              <h2>Reestablecimiento de contraseña</h2>
              Haga clic en el siguiente botón para restablecer su contraseña. Si no ha solicitado una nueva contraseña, ignore este correo. <br>
              <strong>Recuerde: </strong> Tiene un minuto como máximo para hacerlo efectivo.
            </td>
          </tr>

          <!-- BUTTON -->
          <!-- Set button background color at TD, link/text color at A and TD, font family ("sans-serif" or "Georgia, serif") at TD. For verification codes add "letter-spacing: 5px;". Link format: http://domain.com/?utm_source={{Campaign-Source}}&utm_medium=email&utm_content={{Button-Name}}&utm_campaign={{Campaign-Name}} -->
          <tr>
            <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%;
            padding-top: 15px;
            padding-bottom: 15px;" class="button">
                <table border="0" cellpadding="0" cellspacing="0" align="center" style="max-width: 240px; min-width: 120px; border-collapse: collapse; border-spacing: 0; padding: 0;">
                  <tr style="text-decoration: none;">

                    <div>
                       <a href="' . $linkprevio . 'tesisactual/proyecto/reestablecer/?c=' . base64_encode($correodelolvidado) . '" target="_blank" width="160" height="65" border="0" bgcolor="#5ECFF3" style="border: none; outline: none; display: block; width:160px; height: 40px; text-transform: uppercase; text-decoration: none; font-size: 13px; line-height: 40px; color: #ffffff; font-family: Verdana, Geneva, sans-serif; text-align: center; background-color: #5ECFF3;  -webkit-text-size-adjust:none;border-radius:20px;">
                          Reestablecer
                       </a>
                     </div>
                  </tr>
                </table>
            </td>
          </tr>

        </table>

        <!-- WRAPPER -->
        <!-- Set wrapper width (twice) -->
        <table border="0" cellpadding="0" cellspacing="0" align="center" width="560" style="border-collapse: collapse; border-spacing: 0; padding: 0; width: inherit;
    max-width: 560px;" class="wrapper">
          <!-- FOOTER -->
          <!-- Set text color and font family ("sans-serif" or "Georgia, serif"). Duplicate all text styles in links, including line-height -->
          <tr>
            <td align="center" valign="top" style="border-collapse: collapse; border-spacing: 0; margin: 0; padding: 0; padding-left: 6.25%; padding-right: 6.25%; width: 87.5%; font-size: 13px; font-weight: 400; line-height: 150%;
            padding-top: 20px;
            padding-bottom: 20px;
            color: #999999;
            font-family: sans-serif;" class="footer">

              Este es un correo electrónico generado automáticamente. Por favor no responder.


            </td>
          </tr>

          <!-- End of WRAPPER -->
        </table>

        <!-- End of SECTION / BACKGROUND -->
      </td>
    </tr>
  </table>

</body>


</html>
';

<?php

function codificarfolio($rutsinguion)
{

    //Muestra los caracteres del rut de derecha a izquierda y guarda la mitad del rut en ambas variables
    // $longituddelrut=strlen($cortarrut)-1;
    // $parte1rut="";
    // $parte2rut="";
    // for ($i=$longituddelrut; $i>=0;--$i){ 

    //     if($i<($longituddelrut/2)){
    //         $parte1rut.=$cortarrut[$i];
    //     }else{
    //         $parte2rut.=$cortarrut[$i];
    //     }
    // }

    $parte1rut = "";
    $parte2rut = "";


    //Muestra los caracteres del rut de izquierda a derecha y guarda la mitad del rut en ambas variables
    $longitud = strlen($rutsinguion);
    for ($i = 0; $i < $longitud; $i++) {
        if ($i < ($longitud / 2)) {
            $parte1rut .= $rutsinguion[$i];
        } else {
            $parte2rut .= $rutsinguion[$i];
        }
    }

    // $sumadiastomados = 1000 + 2;
    $sumaparte1rut = 25 + (int)$parte1rut;
    $sumaparte2rut = 55 + (int)$parte2rut;

    //$folio = $sumaparte2rut . ':' . $sumadiastomados .':' . $sumaparte1rut;
    $folio = $sumaparte2rut . $sumaparte1rut;
    return $folio;

    //DECODIFICARFOLIO
    // $decodificarfolio = "717910021963";
    // $decodificarfolio = str_split($decodificarfolio, 4); //separa de a 4 digitos el numero
    // echo $decodificarfolio[0] . '<br>' . $decodificarfolio[1]. '<br>' . $decodificarfolio[2]; //devolverá 7179 2146 1963
    // echo '<br><br>';
    // $devparte2rut=$decodificarfolio[0]-55;
    // $devparte1rut=$decodificarfolio[2]-25;
    // $devdiastomados=$decodificarfolio[1]-1000;

    // $foliodecodificado = $devparte1rut.$devparte2rut;
    // echo $foliodecodificado;

}

function RutConCodVerificador($rutrecibido)
{
    /*==============================FORMATEAR EL RUT AGREGANDO EL GUIÓN O DIGITO VERIFICADOR ================================*/
    $digitoverificador = substr($rutrecibido, -1); //Ej: 193871240, extrae el último dígito, quedando en la variable el 0
    $cortarrut = substr($rutrecibido, 0, -1); //Ej: 193871240, extrae el último dígito, quedando 19387124
    $rutcondigitoverificador = $cortarrut . '-' . $digitoverificador; //agrego e formato final 19387124-0

    return $rutcondigitoverificador;
    /*==============================FORMATEAR EL RUT AGREGANDO EL GUIÓN O DIGITO VERIFICADOR ================================*/
}

// obtienedatos($pdf, $rutsolicitante, $nombreusuario, $SectoroUnidad, $motivo, $diamesano, $horainicio, $horatermino);


function ExportaPDFJefesDirecto(
    $exp1,
    $rutusuario,
    $nombreusuario,
    $SectoroUnidad,
    $motivo,
    $diamesano,
    $firmasolicitante,
    $firmaJefeDirecto,
    $rutdelJefeDirecto,
    $rutReemplazo,
    $nombre_reemplazante,
    $TipoRemuneracion,
    $TipoDia
) {

    /*==============================FORMATEAR EL RUT AGREGANDO EL GUIÓN O DIGITO VERIFICADOR ================================*/
    // $digitoverificador = substr($rutusuario, -1); //Ej: 193871240, extrae el último dígito, quedando en la variable el 0
    $cortarrut = substr($rutusuario, 0, -1); //Ej: 193871240, extrae el último dígito, quedando 19387124
    // $rutcondigitoverificador = $cortarrut . '-' . $digitoverificador; //agrego e formato final 19387124-0
    /*==============================FORMATEAR EL RUT AGREGANDO EL GUIÓN O DIGITO VERIFICADOR ================================*/


    /*=============================================PARA FORMATEAR LA FECHA ======================================*/
    $fechainicio = explode("-", $diamesano);
    $diainicio = $fechainicio[0];
    $mesinicio = $fechainicio[1];
    $anoinicio = $fechainicio[2];
    $nombredelmesinicio = strftime('%B', mktime(0, 0, 0, number_format($mesinicio)));

    // $fechafin = explode("-", $fechafinvacaciones);
    // $diafin = $fechafin[0];
    // $mesfin = $fechafin[1];
    // $anofin = $fechafin[2];
    // $nombredelmesfin = strftime('%B', mktime(0, 0, 0, number_format($mesfin)));

    $hoy = date('d-m-Y');
    $porcion = explode("-", $hoy);
    $diaactual = $porcion[0];
    $mesactual = $porcion[1];
    $anoactual = $porcion[2];
    $nombredelmesactual = strftime('%B', mktime(0, 0, 0, number_format($mesactual)));
    /*=============================================PARA FORMATEAR LA FECHA ======================================*/

    $exp1->ADDPage();
    $exp1->SetMargins(30, 44, 30); //hice que el margen de todos lados fuera más corto y estuviera centrado
    $exp1->SetFillColor(200, 200, 200);
    $exp1->SetTextColor(0);
    $exp1->SetDrawColor(0, 0, 0);
    $exp1->SetLineWidth(.2);

    $exp1->Image('../../../imagencertificado/logocesfam.png', 35, 10, 35, 0, 'PNG'); //el segundo parámetro es padding left, el cuarto parámetro es el tamaño de la imagen 
    $exp1->Ln(40); //saltos de lineas o tabuladores
    // $exp1->SetFont('Times', '', 11);
    $exp1->SetFont('Courier', '', 11);
    $exp1->MultiCell(150, 5, utf8_decode("FOLIO: ") . codificarfolio($cortarrut), 0, 'R', 0); //encriptar($fila['id_articulo'], 'e');"  2020010109367

    $exp1->Ln(7);


    $exp1->SetFont('Courier', 'B', 15);
    // $exp1->SetFont('Courier', 'B', 15); 
    $exp1->Cell(2);
    $exp1->MultiCell(145, 10, "S O L I C I T U D  D E  P E R M I S O ", 0, 'C', 0); //ancho,altura
    $exp1->MultiCell(145, 10, "A D M I N I S T R A T I V O", 0, 'C', 0); //ancho,altura

    $exp1->Ln(2);


    // $exp1->SetFont('Times', '', 12);
    $exp1->SetFont('Courier', '', 12);
    $exp1->MultiCell(150, 7, utf8_decode("Certifico que el(la) Sr(a) Funcionario(a) ") . utf8_decode($nombreusuario) .
        utf8_decode(", con cédula nacional de identidad N° ") . RutConCodVerificador($rutusuario) .
        utf8_decode(", perteneciente a ") . utf8_decode($SectoroUnidad) .
        utf8_decode(". Solicitó el permiso administrativo, ") .
        utf8_decode("para el dia ") . $diainicio . utf8_decode(" de ") . $nombredelmesinicio . ".");

    $exp1->SetFont('Courier', 'B', 15);
    $exp1->MultiCell(150, 7, utf8_decode("\nDETALLE DEL REGISTRO"));
    $exp1->SetFont('Courier', '', 12);
    $exp1->MultiCell(150, 7, utf8_decode("TIPO REMUNERACION: " . $TipoRemuneracion));
    $exp1->MultiCell(150, 7, utf8_decode("RUT REEMPLAZANTE: " . RutConCodVerificador($rutReemplazo)));
    $exp1->MultiCell(150, 7, utf8_decode("NOMBRE REEMPLAZANTE: " . $nombre_reemplazante));
    $exp1->MultiCell(150, 7, utf8_decode("TIPO DIA: " . $TipoDia));
    $exp1->MultiCell(150, 7, utf8_decode("MOTIVO: " . $motivo));

    // $exp1->MultiCell(150, 7, utf8_decode("\n,a partir del dia ") . $diainicio . utf8_decode(" de ") . $nombredelmesinicio . ".");
    // EJ: 0, 'C', 0 para centrar, 0,'R',0 para la derecha
    // $exp1->SetFont('Courier', 'B', 12)
    // $exp1->SetFont('Arial', '', 11);
    $hoy = date('d-m-Y');

    $exp1->Ln(6);

    $exp1->SetFont('Courier', '', 12);
    $exp1->MultiCell(150, 7, utf8_decode("Se extiende el presente certificado como comprobante."));

    $exp1->Ln(2);
    $exp1->SetFont('Courier', '', 7);
    $exp1->MultiCell(150, 4, utf8_decode("A la información que Ud. ha indicado como permanente en el sistema,\nvinculamos datos personales, tales como: NOMBRE, R.U.T y Firma Digital."));

    $exp1->Ln(7);

    $exp1->SetFont('Courier', '', 11);
    $exp1->MultiCell(150, 8, utf8_decode("Los Álamos Chile, " . $diaactual . ' de ' . $nombredelmesactual . ' del ' . $anoactual . "."));

    $exp1->Ln(8);

    $altoimg1 = 210;
    $altoimg2 = 212;
    $saltoimg1 = 25;
    $saltolinea1 = 6;
    $saltoimg2 = 4;
    $saltolinea2 = 5;


    $exp1->Cell(4);

    $exp1->Image('../../perfil/firmas/' . $rutusuario . '/' . $firmasolicitante, 43, $altoimg1, 30, 0, ''); //width,heigth,size
    // $exp1->Cell(0,10,"Aqui va la firma");
    $exp1->Ln($saltoimg1);
    $exp1->Cell(140, 5, '____________________________', 0, 0, 'L');
    $exp1->Ln($saltolinea1);
    $exp1->Cell(10); //paddinf left a a la linea de abajo de 3cm
    $exp1->Cell(140, 5, "Firma Funcionario", 0, 1, 'L');


    // $exp1 -> Cell(-3);
    // $exp1->Image('../../perfil/firmas/33221105/firma.png', 135, $altoimg2, 30, 0, 'PNG'); //width,heigth,size
    $exp1->Image('../../perfil/firmas/' . $rutdelJefeDirecto . '/' . $firmaJefeDirecto, 135, $altoimg2, 30, 0, ''); //width,heigth,size
    // $exp1->Image('../../../imagencertificado/firmasola2.png', 135, 220, 30, 0, 'PNG'); //width,heigth,size
    // $exp1->Cell(145,-18,"Aqui va la firma 2",0, 0, 'R'); //2do parámetro es el padding top o bottom
    $exp1->Ln($saltoimg2);
    // $exp1 -> Cell(-10);
    $exp1->Cell(0, -26, '____________________________', 0, 0, 'R');
    $exp1->Ln($saltolinea2);
    // $exp1 -> Cell(30); //paddinf left a a la linea de abajo de 3cm
    $exp1->Cell(148, -26, "Firma Jefe Directo " . "  " . " ", 0, 0, 'R');
}


function ExportaPDFEncPersonal(
    $pdf,
    $rutusuario,
    $nombreusuario,
    $SectoroUnidad,
    $motivo,
    $diamesano,
    $firmasolicitante,
    $firmaJefeDirecto,
    $rutdelJefeDirecto,
    $rutReemplazo,
    $nombre_reemplazante,
    $TipoRemuneracion,
    $TipoDia,
    $DiasConGoceAc,
    $DiasSinGoceAc,
    $otros
) {

    /*==============================FORMATEAR EL RUT AGREGANDO EL GUIÓN O DIGITO VERIFICADOR ================================*/
    // $digitoverificador = substr($rutusuario, -1); //Ej: 193871240, extrae el último dígito, quedando en la variable el 0
    $cortarrut = substr($rutusuario, 0, -1); //Ej: 193871240, extrae el último dígito, quedando 19387124
    // $rutcondigitoverificador = $cortarrut . '-' . $digitoverificador; //agrego e formato final 19387124-0
    /*==============================FORMATEAR EL RUT AGREGANDO EL GUIÓN O DIGITO VERIFICADOR ================================*/


    /*=============================================PARA FORMATEAR LA FECHA ======================================*/
    $fechainicio = explode("-", $diamesano);
    $diainicio = $fechainicio[0];
    $mesinicio = $fechainicio[1];
    $anoinicio = $fechainicio[2];
    $nombredelmesinicio = strftime('%B', mktime(0, 0, 0, number_format($mesinicio)));

    // $fechafin = explode("-", $fechafinvacaciones);
    // $diafin = $fechafin[0];
    // $mesfin = $fechafin[1];
    // $anofin = $fechafin[2];
    // $nombredelmesfin = strftime('%B', mktime(0, 0, 0, number_format($mesfin)));

    $hoy = date('d-m-Y');
    $porcion = explode("-", $hoy);
    $diaactual = $porcion[0];
    $mesactual = $porcion[1];
    $anoactual = $porcion[2];
    $nombredelmesactual = strftime('%B', mktime(0, 0, 0, number_format($mesactual)));
    /*=============================================PARA FORMATEAR LA FECHA ======================================*/

    $pdf->ADDPage();
    $pdf->SetMargins(30, 44, 30); //hice que el margen de todos lados fuera más corto y estuviera centrado
    $pdf->SetFillColor(200, 200, 200);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->SetLineWidth(.2);

    $pdf->Image('../../../imagencertificado/logocesfam.png', 35, 10, 35, 0, 'PNG'); //el segundo parámetro es padding left, el cuarto parámetro es el tamaño de la imagen 
    $pdf->Ln(40); //saltos de lineas o tabuladores
    // $pdf->SetFont('Times', '', 11);
    $pdf->SetFont('Courier', '', 11);
    $pdf->MultiCell(150, 5, utf8_decode("FOLIO: ") . codificarfolio($cortarrut), 0, 'R', 0); //encriptar($fila['id_articulo'], 'e');"  2020010109367


    $pdf->Ln(7);

    $pdf->SetFont('Courier', 'B', 15);
    // $pdf->SetFont('Courier', 'B', 15); 
    $pdf->Cell(2);
    $pdf->MultiCell(145, 10, "S O L I C I T U D  D E  P E R M I S O ", 0, 'C', 0); //ancho,altura
    $pdf->MultiCell(145, 10, "A D M I N I S T R A T I V O", 0, 'C', 0); //ancho,altura

    $pdf->Ln(2);

    // $pdf->SetFont('Times', '', 12);
    $pdf->SetFont('Courier', '', 12);
    $pdf->MultiCell(150, 7, utf8_decode("Certifico que el(la) Sr(a) Funcionario(a) ") . utf8_decode($nombreusuario) .
        utf8_decode(", con cédula nacional de identidad N° ") . RutConCodVerificador($rutusuario) .
        utf8_decode(", perteneciente a ") . utf8_decode($SectoroUnidad) .
        utf8_decode(". Solicitó el permiso administrativo, ") .
        utf8_decode("para el dia ") . $diainicio . utf8_decode(" de ") . $nombredelmesinicio . ".");

    $pdf->SetFont('Courier', 'B', 15);
    $pdf->MultiCell(150, 7, utf8_decode("\nDETALLE DEL REGISTRO"));
    $pdf->SetFont('Courier', '', 12);
    $pdf->MultiCell(150, 7, utf8_decode("TIPO REMUNERACION: " . $TipoRemuneracion));
    $pdf->MultiCell(150, 7, utf8_decode("RUT REEMPLAZANTE: " . RutConCodVerificador($rutReemplazo)));
    $pdf->MultiCell(150, 7, utf8_decode("NOMBRE REEMPLAZANTE: " . $nombre_reemplazante));
    $pdf->MultiCell(150, 7, utf8_decode("TIPO DIA: " . $TipoDia));
    $pdf->MultiCell(150, 7, utf8_decode("MOTIVO: " . $motivo));


    $pdf->SetFont('Courier', 'B', 15);
    $pdf->MultiCell(150, 7, utf8_decode("\nOBSERVACIÓN DE PERSONAL "));
    $pdf->SetFont('Courier', '', 12);
    $pdf->MultiCell(150, 7, utf8_decode("CON GOCE DE REMUNERACION ACUMULADO: " . $DiasConGoceAc));
    $pdf->MultiCell(150, 7, utf8_decode("SIN GOCE DE REMUNERACION ACUMULADO: " . $DiasSinGoceAc));
    $pdf->MultiCell(150, 7, utf8_decode("OTROS: " . $otros));

    $hoy = date('d-m-Y');
    $pdf->Ln(2);

    $pdf->SetFont('Courier', '', 12);
    $pdf->MultiCell(150, 7, utf8_decode("Se extiende el presente certificado como comprobante."));

    $pdf->Ln(2);

    $pdf->SetFont('Courier', '', 11);
    $pdf->MultiCell(150, 8, utf8_decode("Los Álamos Chile, " . $diaactual . ' de ' . $nombredelmesactual . ' del ' . $anoactual . "."));

    $pdf->Ln(5);

    $altoimg1 = 219;
    $altoimg2 = 221;
    $saltoimg1 = 18; //Este toma las dos firmas para subir y bajar (padding)
    $saltolinea1 = 6;
    $saltoimg2 = 4;
    $saltolinea2 = 5;

    $pdf->Cell(4);

    $pdf->Image('../../perfil/firmas/' . $rutusuario . '/' . $firmasolicitante, 43, $altoimg1, 30, 0, ''); //width,heigth,size

    $pdf->Ln($saltoimg1);
    $pdf->Cell(140, 5, '____________________________', 0, 0, 'L');
    $pdf->Ln($saltolinea1);
    $pdf->Cell(10); //paddinf left a a la linea de abajo de 3cm
    $pdf->Cell(140, 5, "Firma Funcionario", 0, 1, 'L');

    $pdf->Image('../../perfil/firmas/' . $rutdelJefeDirecto . '/' . $firmaJefeDirecto, 135, $altoimg2, 30, 0, ''); //width,heigth,size
    // $pdf->Image('../../../imagencertificado/firmasola2.png', 135, 220, 30, 0, 'PNG'); //width,heigth,size
    // $pdf->Cell(145,-18,"Aqui va la firma 2",0, 0, 'R'); //2do parámetro es el padding top o bottom
    $pdf->Ln($saltoimg2);
    // $pdf -> Cell(-10);
    $pdf->Cell(0, -26, '____________________________', 0, 0, 'R');
    $pdf->Ln($saltolinea2);
    // $pdf -> Cell(30); //paddinf left a a la linea de abajo de 3cm
    $pdf->Cell(148, -26, "Firma Jefe Directo " . "  " . " ", 0, 0, 'R');

    $pdf->Ln(9);
    $pdf->Cell(38); //padding left
    $pdf->Cell(140, 3, '____________________________', 0, 0, 'L');
    $pdf->Ln(5);
    $pdf->Cell(42); //padding left
    $pdf->Cell(148, 3, "Firma Jefe Sistema Salud " . "  " . " ", 0, 0, 'L');
}




function obtienedatos(
    $pdf,
    $rutusuario,
    $nombreusuario,
    $SectoroUnidad,
    $motivo,
    $diamesano,
    $firmasolicitante,
    $firmaJefeDirecto,
    $rutdelJefeDirecto,
    $rutReemplazo,
    $nombre_reemplazante,
    $TipoRemuneracion,
    $TipoDia,
    $DiasConGoceAc,
    $DiasSinGoceAc,
    $otros,
    $rutJefeSistemaSalud,
    $imagenfirmaJefeSistemaSalud
) {

    /*==============================FORMATEAR EL RUT AGREGANDO EL GUIÓN O DIGITO VERIFICADOR ================================*/
    // $digitoverificador = substr($rutusuario, -1); //Ej: 193871240, extrae el último dígito, quedando en la variable el 0
    $cortarrut = substr($rutusuario, 0, -1); //Ej: 193871240, extrae el último dígito, quedando 19387124
    // $rutcondigitoverificador = $cortarrut . '-' . $digitoverificador; //agrego e formato final 19387124-0
    /*==============================FORMATEAR EL RUT AGREGANDO EL GUIÓN O DIGITO VERIFICADOR ================================*/


    /*=============================================PARA FORMATEAR LA FECHA ======================================*/
    $fechainicio = explode("-", $diamesano);
    $diainicio = $fechainicio[0];
    $mesinicio = $fechainicio[1];
    $anoinicio = $fechainicio[2];
    $nombredelmesinicio = strftime('%B', mktime(0, 0, 0, number_format($mesinicio)));

    $hoy = date('d-m-Y');
    $porcion = explode("-", $hoy);
    $diaactual = $porcion[0];
    $mesactual = $porcion[1];
    $anoactual = $porcion[2];
    $nombredelmesactual = strftime('%B', mktime(0, 0, 0, number_format($mesactual)));
    /*=============================================PARA FORMATEAR LA FECHA ======================================*/

    $pdf->ADDPage();
    $pdf->SetMargins(30, 40, 30); //hice que el margen de todos lados fuera más corto y estuviera centrado: left,top,right
    $pdf->SetFillColor(200, 200, 200);
    $pdf->SetTextColor(0);
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->SetLineWidth(.2);

    $pdf->Image('../../../imagencertificado/logocesfam.png', 35, 10, 35, 0, 'PNG'); //el segundo parámetro es padding left, el cuarto parámetro es el tamaño de la imagen 
    $pdf->Ln(40); //saltos de lineas o tabuladores
    // $pdf->SetFont('Times', '', 11);
    $pdf->SetFont('Courier', '', 11);
    $pdf->MultiCell(150, 5, utf8_decode("FOLIO: ") . codificarfolio($cortarrut), 0, 'R', 0); //encriptar($fila['id_articulo'], 'e');"  2020010109367

    $pdf->Ln(15);

    // $pdf->SetMargins(25, 44, 25); //hice que el margen de todos lados fuera más corto y estuviera centrado

    $pdf->SetFont('Courier', 'B', 15);
    $pdf->Cell(2);
    $pdf->MultiCell(145, 10, "S O L I C I T U D  D E  P E R M I S O ", 0, 'C', 0); //ancho,altura
    $pdf->MultiCell(145, 10, "A D M I N I S T R A T I V O", 0, 'C', 0); //ancho,altura
    $pdf->Ln(2);

    $pdf->SetFont('Courier', '', 12);
    $pdf->MultiCell(150, 7, utf8_decode("Certifico que el(la) Sr(a) Funcionario(a) ") . utf8_decode($nombreusuario) .
        utf8_decode(", con cédula nacional de identidad N° ") . RutConCodVerificador($rutusuario) .
        utf8_decode(", perteneciente a ") . utf8_decode($SectoroUnidad) .
        utf8_decode(". Solicitó el permiso administrativo, ") .
        utf8_decode("para el dia ") . $diainicio . utf8_decode(" de ") . $nombredelmesinicio . ".");

    $pdf->SetFont('Courier', 'B', 15);
    $pdf->MultiCell(150, 7, utf8_decode("\nDETALLE DEL REGISTRO"));
    $pdf->SetFont('Courier', '', 12);
    $pdf->MultiCell(150, 7, utf8_decode("TIPO REMUNERACION: " . $TipoRemuneracion));
    $pdf->MultiCell(150, 7, utf8_decode("RUT REEMPLAZANTE: " . RutConCodVerificador($rutReemplazo)));
    $pdf->MultiCell(150, 7, utf8_decode("NOMBRE REEMPLAZANTE: " . $nombre_reemplazante));
    $pdf->MultiCell(150, 7, utf8_decode("TIPO DIA: " . $TipoDia));
    $pdf->MultiCell(150, 7, utf8_decode("MOTIVO: " . $motivo));

    $pdf->SetFont('Courier', 'B', 15);
    $pdf->MultiCell(150, 7, utf8_decode("\nOBSERVACIÓN DE PERSONAL "));
    $pdf->SetFont('Courier', '', 12);
    $pdf->MultiCell(150, 7, utf8_decode("CON GOCE DE REMUNERACION ACUMULADO: " . $DiasConGoceAc));
    $pdf->MultiCell(150, 7, utf8_decode("SIN GOCE DE REMUNERACION ACUMULADO: " . $DiasSinGoceAc));
    $pdf->MultiCell(150, 7, utf8_decode("OTROS: " . $otros));

    $hoy = date('d-m-Y');

    $pdf->Ln(2);
    $pdf->SetFont('Courier', '', 12);
    $pdf->MultiCell(150, 7, utf8_decode("Se extiende el presente certificado como comprobante."));

    $pdf->Ln(2);

    $pdf->SetFont('Courier', '', 11);
    $pdf->MultiCell(150, 8, utf8_decode("Los Álamos Chile, " . $diaactual . ' de ' . $nombredelmesactual . ' del ' . $anoactual . "."));

    $pdf->Ln(6);

    // $pdf->SetFont('Helvetica', '', 11);

    //DIMENSIONES PARA ROL 13
    $altoimg1 = 224;
    $altoimg2 = 227;
    $saltoimg1 = 14; //Este toma las dos firmas para subir y bajar (padding)
    $saltolinea1 = 6;
    $saltoimg2 = 4;
    $saltolinea2 = 5;

    $pdf->Cell(4);

    $pdf->Image('../../perfil/firmas/' . $rutusuario . '/' . $firmasolicitante, 43, $altoimg1, 30, 0, ''); //width,heigth,size
    // $pdf->Cell(0,10,"Aqui va la firma");
    $pdf->Ln($saltoimg1);
    $pdf->Cell(140, 5, '____________________________', 0, 0, 'L');
    $pdf->Ln($saltolinea1);
    $pdf->Cell(10); //paddinf left a a la linea de abajo de 3cm
    $pdf->Cell(140, 5, "Firma Funcionario", 0, 1, 'L');

    // $pdf->Image('../../perfil/firmas/33221105/firma.png', 135, $altoimg2, 30, 0, 'PNG'); //width,heigth,size
    $pdf->Image('../../perfil/firmas/' . $rutdelJefeDirecto . '/' . $firmaJefeDirecto, 135, $altoimg2, 30, 0, ''); //width,heigth,size
    // $pdf->Image('../../../imagencertificado/firmasola2.png', 135, 220, 30, 0, 'PNG'); //width,heigth,size
    // $pdf->Cell(145,-18,"Aqui va la firma 2",0, 0, 'R'); //2do parámetro es el padding top o bottom
    $pdf->Ln($saltoimg2);
    // $pdf -> Cell(-10);
    $pdf->Cell(0, -26, '____________________________', 0, 0, 'R');
    $pdf->Ln($saltolinea2);
    // $pdf -> Cell(30); //paddinf left a a la linea de abajo de 3cm
    $pdf->Cell(148, -26, "Firma Jefe Directo " . "  " . " ", 0, 0, 'R');


    // $pdf->Image('../../../imgpordefecto/lupaceleste.png', 85, 250, 30, 0, 'PNG'); //width,heigth,size
    // $pdf->Image('../../perfil/firmas/33221105/firma.png', 85, 253, 30, 0, 'PNG'); //width,heigth,size

    $pdf->Image('../../perfil/firmas/' . $rutJefeSistemaSalud . '/' . $imagenfirmaJefeSistemaSalud, 85, 253, 30, 0, ''); //width,heigth,size
    $pdf->Ln(6);
    $pdf->Cell(38); //padding left
    $pdf->Cell(140, 3, '____________________________', 0, 0, 'L');
    $pdf->Ln(4);
    $pdf->Cell(42); //padding left
    $pdf->Cell(148, 3, "Firma Jefe Sistema Salud " . "  " . " ", 0, 0, 'L');
}

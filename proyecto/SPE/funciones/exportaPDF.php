<?php

function codificarfolio($rutsinguion, $diastomados)
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


    $sumadiastomados = 1000 + $diastomados;
    // $sumadiastomados = 1000 + 2;
    $sumaparte1rut = 25 + (int)$parte1rut;
    $sumaparte2rut = 55 + (int)$parte2rut;

    //$folio = $sumaparte2rut . ':' . $sumadiastomados .':' . $sumaparte1rut;
    $folio = $sumaparte2rut . $sumadiastomados . $sumaparte1rut;
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

// obtienedatos($pdf, $rutsolicitante, $nombreusuario, $SectoroUnidad, $motivo, $diamesano, $horainicio, $horatermino);

function obtienedatos($pdf, $rutusuario, $nombreusuario, $SectoroUnidad, $motivo, $comuna, $diamesano, $horainicio, $horatermino, $firmasolicitante, $firmaJSectoroUnidad, $rutdeJSectorOUnidad)
{
    /*==============================FORMATEAR EL RUT AGREGANDO EL GUIÓN O DIGITO VERIFICADOR ================================*/
    $digitoverificador = substr($rutusuario, -1); //Ej: 193871240, extrae el último dígito, quedando en la variable el 0
    $cortarrut = substr($rutusuario, 0, -1); //Ej: 193871240, extrae el último dígito, quedando 19387124
    $rutcondigitoverificador = $cortarrut . '-' . $digitoverificador; //agrego e formato final 19387124-0
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
    $pdf->MultiCell(150, 5, utf8_decode("FOLIO: ") . codificarfolio($cortarrut, 2), 0, 'R', 0); //encriptar($fila['id_articulo'], 'e');"  2020010109367

    $pdf->Ln(15);
    $pdf->SetFont('Courier', 'B', 15);
    // $pdf->SetFont('Courier', 'B', 15); 
    $pdf->Cell(2);
    $pdf->MultiCell(145, 10, "S O L I C I T U D  D E  P E R M I S O ", 0, 'C', 0); //ancho,altura
    $pdf->MultiCell(145, 10, "E S P E C I A L", 0, 'C', 0); //ancho,altura

    $pdf->Ln(13);

    // $pdf->SetFont('Times', '', 12);
    $pdf->SetFont('Courier', '', 12);
    $pdf->MultiCell(150, 7, utf8_decode("Certifico que el(la) Sr(a) Funcionario(a) ") . utf8_decode($nombreusuario) . utf8_decode(", con cédula nacional de identidad N° ") . $rutcondigitoverificador . utf8_decode(", perteneciente a ") . utf8_decode($SectoroUnidad) . utf8_decode(". Solicitó el permiso especial con el motivo de ") . utf8_decode($motivo) . utf8_decode(", en la comuna de  ") . utf8_decode($comuna) . utf8_decode(", a partir del dia ") . $diainicio . utf8_decode(" de ") . $nombredelmesinicio . utf8_decode(" del ") . $anoinicio . utf8_decode(", desde las ") . $horainicio . utf8_decode(" hrs hasta las ") . $horatermino . utf8_decode(" hrs. "));

    $hoy = date('d-m-Y');
    $pdf->Ln(10);
    // EJ: 0, 'C', 0 para centrar, 0,'R',0 para la derecha
    // $pdf->SetFont('Arial', '', 11);  
    $pdf->SetFont('Courier', '', 12);
    $pdf->MultiCell(150, 7, utf8_decode("Se extiende el presente certificado como comprobante."));
    $pdf->Ln(2);
    $pdf->SetFont('Courier', '', 7);
    $pdf->MultiCell(150, 4, utf8_decode("A la información que Ud. ha indicado como permanente en el sistema,\nvinculamos datos personales, tales como: NOMBRE, R.U.T y Firma Digital."));


    $pdf->Ln(10);
    $pdf->SetFont('Courier', '', 11);
    $pdf->MultiCell(150, 8, utf8_decode("Los Álamos Chile, " . $diaactual . ' de ' . $nombredelmesactual . ' del ' . $anoactual . "."));

    // $pdf->Image('../../../imagencertificado/sello.png', 80, 155, 50, 0, 'PNG',); //width,heigth,size
    // $pdf->Image('../../../imagencertificado/firmasola2.png', 116, 165, 50, 0, 'PNG',);

    // $pdf->Ln(50);
    // $pdf->SetFont('Times', '', 11);
    // $pdf->MultiCell(148, 4, utf8_decode("El funcionario puede verificar este certificado en el sistema web www.saludlosalamos.cl. Una vez ingresado con su rut y contraseña podrá dirigirse a la pestaña de Mi cuenta."), 0, 'C', 0);

    $pdf->Ln(10);
    // $pdf->MultiCell(148, 4, utf8_decode("___________________"), 0, 'L', 0);
    // $pdf->MultiCell(148, 4, utf8_decode("___________________"), -10, 'R', 0);
    // $pdf->MultiCell(148, 4, utf8_decode("___________________A"), 0, 'R', 0);

    // $pdf->Cell(50, 5, utf8_decode('NOMBRE: '));
    // $pdf->Cell(60, 5, utf8_decode('Juan de montreal'));
    // $pdf->Ln();
    // $pdf->Cell(50, 5, utf8_decode('SECTOR: '));
    // $pdf->Cell(60, 5, utf8_decode('Sector Rojo'));
    // $pdf->Ln();
    // $pdf->Cell(50, 5, utf8_decode('TURNO: '));
    // $pdf->Cell(60, 5, utf8_decode('De noche'));
    // $pdf->Ln(5);

    // $pdf->Cell(0,10," NOMBRE _______________________________________________");
    // $pdf->Ln(10);
    // $pdf->Cell(0,11," DIRECCION ___________________________________");
    // $pdf->Ln(10);
    // $pdf->Cell(0,10," FECHA DE INGRESO _______as________ HORA _________");
    // $pdf->Ln(12);

    // $pdf->Ln(4);

    // $pdf->SetFont('Helvetica', '', 11);

    $pdf->Cell(4);

    $pdf->Image('../../perfil/firmas/' . $rutusuario . '/' . $firmasolicitante, 43, 208, 30, 0, ''); //width,heigth,size
    // $pdf->Cell(0,10,"Aqui va la firma");
    $pdf->Ln(25);
    $pdf->Cell(140, 5, '____________________________', 0, 0, 'L');
    $pdf->Ln(6);
    $pdf->Cell(10); //paddinf left a a la linea de abajo de 3cm
    $pdf->Cell(140, 5, "Firma Funcionario", 0, 1, 'L');

    // $pdf -> Cell(-3);
    $pdf->Image('../../perfil/firmas/' . $rutdeJSectorOUnidad . '/' . $firmaJSectoroUnidad, 135, 208, 30, 0, ''); //width,heigth,size
    // $pdf->Image('../../../imagencertificado/firmasola2.png', 135, 220, 30, 0, 'PNG'); //width,heigth,size
    // $pdf->Cell(145,-18,"Aqui va la firma 2",0, 0, 'R'); //2do parámetro es el padding top o bottom
    $pdf->Ln(4);
    // $pdf -> Cell(-10);
    $pdf->Cell(0, -26, '____________________________', 0, 0, 'R');
    $pdf->Ln(5);
    // $pdf -> Cell(30); //paddinf left a a la linea de abajo de 3cm
    $pdf->Cell(148, -24, "Firma Jefe Sector o Unidad", 0, 0, 'R');

    // $pdf->Cell( 0, 10, 'Right text', 0, 0, 'R' ); 
    // $pdf->Cell(40,14,"Segunda firma amigo.","T","1","C");
    // $pdf->Cell(40,14,"Segunda firma amigo.","T","1","C");

    // $pdf->MultiCell(60, 5, utf8_decode("___________________"), 0, 'L', 0);
    // $pdf->MultiCell(60, 5, utf8_decode('Firma que se yo'), 0, 'L', 0);


    // $pdf->Cell(60,8,"Anything is possible. In any color.","T","1","C");
    // $pdf->Cell(60,18,"Segunda firma amigo.","T","1","C");
    // $pdf->Ln(); 
    // $pdf->SetY(-10);
}

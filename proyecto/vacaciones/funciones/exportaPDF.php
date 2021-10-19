<?php

function codificarfolio($variableuno, $variabledos)
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
    $longitud = strlen($variableuno);
    for ($i = 0; $i < $longitud; $i++) {
        if ($i < ($longitud / 2)) {
            $parte1rut .= $variableuno[$i];
        } else {
            $parte2rut .= $variableuno[$i];
        }
    }


    $sumadiastomados = 1000 + $variabledos;
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

function obtienedatos($pdf, $rutusuario, $nombreusuario, $tipo, $asunto, $diamesano, $diastomados, $fechafinvacaciones, $IDD)
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

        $fechafin = explode("-", $fechafinvacaciones);
        $diafin = $fechafin[0];
        $mesfin = $fechafin[1];
        $anofin = $fechafin[2];
        $nombredelmesfin = strftime('%B', mktime(0, 0, 0, number_format($mesfin)));

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

    $pdf->Image('../../../imagencertificado/ubb.png', 75, 10, 50, 0, 'PNG',);
    $pdf->Ln(40); //saltos de lineas o tabuladores
    $pdf->SetFont('Times', '', 11);
    $pdf->MultiCell(150, 5, utf8_decode("FOLIO: ") . codificarfolio($cortarrut, $diastomados), 0, 'R', 0); //encriptar($fila['id_articulo'], 'e');"  2020010109367

    $pdf->Ln(13);
    $pdf->SetFont('Times', 'B', 20);
    $pdf->MultiCell(140, 10, "C E R T I F I C A D O", 0, 'C', 0); //ancho,altura

    $pdf->Ln(13);

    $pdf->SetFont('Times', '', 12);

    $pdf->MultiCell(150, 5, utf8_decode("Certifico que el(la) Sr(a) funcionario(a) ") . utf8_decode($nombreusuario) . utf8_decode(", Cédula Nacional de Identidad N° ") . $rutcondigitoverificador . utf8_decode(", Tipo de la vacacion: ") . $tipo . utf8_decode(", Asunto de la vacacion: ") ."''". utf8_decode($asunto)."''" . utf8_decode(", a partir del ") . $diainicio. utf8_decode(" de ").$nombredelmesinicio .utf8_decode(" del ") .$anoinicio. utf8_decode(", con duración de ") . $diastomados . utf8_decode(" días, ") . utf8_decode("tendrá descanso, retornando a sus labores ordinarias el dia " . $diafin. utf8_decode(" de ").$nombredelmesfin .utf8_decode(" del ") .$anofin . '.'));

    $hoy = date('d-m-Y');
    $pdf->Ln(10);
    // EJ: 0, 'C', 0 para centrar, 0,'R',0 para la derecha
    $pdf->MultiCell(150, 5, utf8_decode("En nombre de la institución le deseamos que sea un provechoso descanso."));
    $pdf->MultiCell(150, 5, utf8_decode("Se extiende el presente certificado como comprobante."));
    $pdf->Ln(10);
    $pdf->MultiCell(150, 8, utf8_decode("Los Álamos Chile, " .$diaactual.' de '.$nombredelmesactual.' del '. $anoactual . "."));

    $pdf->Image('../../../imagencertificado/sello.png', 80, 155, 50, 0, 'PNG',); //width,heigth,size
    $pdf->Image('../../../imagencertificado/firmasola2.png', 116, 165, 50, 0, 'PNG',);

    $pdf->Ln(60);
    $pdf->SetFont('Times', '', 11);
    $pdf->MultiCell(148, 4, utf8_decode("El funcionario puede verificar este certificado en el sistema web www.saludlosalamos.cl. Una vez ingresado con su rut y contraseña podrá dirigirse a la pestaña de Mi cuenta."), 0, 'C', 0);
}

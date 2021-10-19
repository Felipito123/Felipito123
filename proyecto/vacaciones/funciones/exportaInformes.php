<?php

function obtenerdatosinformemensual($datorecibido,$anorecibido,$mesrecibido){

$nombredelmes = strftime('%B', mktime(0, 0, 0, number_format($mesrecibido)));
$datorecibido->ADDPage();
$datorecibido->SetFont('Arial', 'B', 18);

$datorecibido->SetFillColor(200, 200, 200);
$datorecibido->SetTextColor(0);
$datorecibido->SetDrawColor(0, 0, 0);
$datorecibido->SetLineWidth(.2);

$datorecibido->Image('../../../imagencertificado/ubb.png', 180, 10, 25, 0, 'PNG',);
$datorecibido->Ln(6);
$datorecibido->MultiCell(175, 8, "INFORME MENSUAL", 0, 'C', 0);

$datorecibido->SetFont('Arial', 'B', 8);
$datorecibido->MultiCell(175, 5, utf8_decode("Mes de ").$nombredelmes.utf8_decode(" del ").$anorecibido, 0, 'C', 0);

$datorecibido->SetFont('Arial', '', 5); //U para subrayar, y el tercer parámetro es para definir el tamaño de la siguiente linea, es decir, el tamaño del titulo C E S F A M  L O S  Á L A M O S
$datorecibido->MultiCell(175, 5, utf8_decode("C E S F A M  L O S  Á L A M O S"), 0, 'C', 0);
$datorecibido->Ln(6);
$datorecibido->SetFont('Arial', 'B', 10);
$datorecibido->SetFillColor(100, 157, 216);

$datorecibido->Cell(18, 5, utf8_decode("RUT"), "LBRT", 0, "C", TRUE);
$datorecibido->Cell(30, 5, utf8_decode("Nombre"), "LBRT", 0, "C", TRUE);
$datorecibido->Cell(15, 5, utf8_decode("Tipo"), "LBRT", 0, "C", TRUE);
$datorecibido->Cell(45, 5, utf8_decode("Razón"), "LBRT", 0, "C", TRUE);
$datorecibido->Cell(10, 5, utf8_decode("Dias"), "LBRT", 0, "C", TRUE);
$datorecibido->Cell(39, 5, utf8_decode("Fecha Inicio"), "LBRT", 0, "C", TRUE);
$datorecibido->Cell(39, 5, utf8_decode("Fecha Fin"), "LBRT", 0, "C", TRUE);

$datorecibido->Ln(5);

$datorecibido->SetFont('Arial', '', 10);
}



function obtenerdatosinformesemestral($datorecibido,$semestrerecibido,$anorecibido){

    $datorecibido->ADDPage();
    $datorecibido->SetFont('Arial', 'B', 18);
    
    $datorecibido->SetFillColor(200, 200, 200);
    $datorecibido->SetTextColor(0);
    $datorecibido->SetDrawColor(0, 0, 0);
    $datorecibido->SetLineWidth(.2);
    
    $datorecibido->Image('../../../imagencertificado/ubb.png', 180, 10, 25, 0, 'PNG',);
    $datorecibido->Ln(6);
    $datorecibido->MultiCell(175, 8, "INFORME SEMESTRAL", 0, 'C', 0);
    
    $datorecibido->SetFont('Arial', 'B', 8);
    $datorecibido->MultiCell(175, 5, utf8_decode("Semestre ").$semestrerecibido.utf8_decode(" - Año ").$anorecibido, 0, 'C', 0);
    
    $datorecibido->SetFont('Arial', '', 5); //U para subrayar, y el tercer parámetro es para definir el tamaño de la siguiente linea, es decir, el tamaño del titulo C E S F A M  L O S  Á L A M O S
    $datorecibido->MultiCell(175, 5, utf8_decode("C E S F A M  L O S  Á L A M O S"), 0, 'C', 0);
    $datorecibido->Ln(6);
    $datorecibido->SetFont('Arial', 'B', 10);
    $datorecibido->SetFillColor(100, 157, 216);
    
    $datorecibido->Cell(19, 5, utf8_decode("RUT"), "LBRT", 0, "C", TRUE);
    $datorecibido->Cell(30, 5, utf8_decode("Nombre"), "LBRT", 0, "C", TRUE);
    $datorecibido->Cell(15, 5, utf8_decode("Tipo"), "LBRT", 0, "C", TRUE);
    $datorecibido->Cell(45, 5, utf8_decode("Razón"), "LBRT", 0, "C", TRUE);
    $datorecibido->Cell(10, 5, utf8_decode("Dias"), "LBRT", 0, "C", TRUE);
    $datorecibido->Cell(39, 5, utf8_decode("Fecha Inicio"), "LBRT", 0, "C", TRUE);
    $datorecibido->Cell(39, 5, utf8_decode("Fecha Fin"), "LBRT", 0, "C", TRUE);
    
    $datorecibido->Ln(5);
    
    $datorecibido->SetFont('Arial', '', 10);
    }
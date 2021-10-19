<?php

/**
 *Funcion que sirve para validar y limpiar un campo
 *
 *@param input $campo Tiene que ser campo de tipo POST
 *@return string
 */

function limpiar_campo($campo)
{
	$campo = trim($campo);
	$campo = stripcslashes($campo);
	$campo = htmlspecialchars($campo);

	return $campo;
}


function fecha($campo) ////mantiene varios carácteres de conversación
{
	///deja solo lo que esta dentro de []
	$campo = preg_replace('([^abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0-9áéíóúÁÉÍÓÚ, ])', '', $campo);
	$campo = trim($campo);
	$campo = stripcslashes($campo);
	$campo = htmlspecialchars($campo);

	return $campo;
}

function fechaconslash($campo) ////mantiene varios carácteres de conversación
{
	///deja solo lo que esta dentro de []
	$campo = preg_replace('([^0-9/])', '', $campo);
	$campo = trim($campo);
	$campo = stripcslashes($campo);
	$campo = htmlspecialchars($campo);

	return $campo;
}


function fechausuarios($campo) ////mantiene carácteres del 0 al 9 y el guión por la fecha 07-08-2021
{
	///deja solo lo que esta dentro de []
	$campo = preg_replace('([^0-9-])', '', $campo);
	$campo = trim($campo);
	$campo = stripcslashes($campo);
	$campo = htmlspecialchars($campo);

	return $campo;
}

function fechayhoraEventos($campo) //mantiene carácteres del 0 al 9 y el guión (-) por la fecha  ej: 07-08-2021, : por la hora ej: 11:08 y un espacio
{
	///deja solo lo que esta dentro de []
	$campo = preg_replace('([^0-9-: ])', '', $campo);
	$campo = trim($campo);
	$campo = stripcslashes($campo);
	$campo = htmlspecialchars($campo);

	return $campo;
}

function limpiahorario($campo) //mantiene carácteres del 0 al 9 y : por la hora ej: 11:08 y un espacio
{
	///deja solo lo que esta dentro de []
	$campo = preg_replace('([^0-9:])', '', $campo);
	$campo = trim($campo);
	$campo = stripcslashes($campo);
	$campo = htmlspecialchars($campo);

	return $campo;
}


function fechavacacion($campo) //mantiene carácteres del 0 al 9 y el guión (-) por la fecha  ej: 07-08-2021
{
	///deja solo lo que esta dentro de []
	$campo = preg_replace('([^0-9-])', '', $campo);
	$campo = trim($campo);
	$campo = stripcslashes($campo);
	$campo = htmlspecialchars($campo);

	return $campo;
}

function fechaconguion($campo) //mantiene carácteres del 0 al 9 y el guión (-) por la fecha  ej: 07-08-2021
{
	///deja solo lo que esta dentro de []
	$campo = preg_replace('([^0-9-])', '', $campo);
	$campo = trim($campo);
	$campo = stripcslashes($campo);
	$campo = htmlspecialchars($campo);

	return $campo;
}

function colorEventos($campo) ////mantiene carácteres del 0 al 9, del A-F y a-f, el signo #
{
	///deja solo lo que esta dentro de []
	$campo = preg_replace('([^a-fA-F0-9#])', '', $campo); //abcdefABCDEF0-9#
	$campo = trim($campo);
	$campo = stripcslashes($campo);
	$campo = htmlspecialchars($campo);

	return $campo;
}


function validacontrasena($campo) ////valida contraseña
{
	///deja solo lo que esta dentro de []
	$campo = preg_replace('([^abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0-9.,:;!?$()_áéíóúÁÉÍÓÚ])', '', $campo);
	$campo = trim($campo);
	$campo = stripcslashes($campo);
	$campo = htmlspecialchars($campo);

	return $campo;
}

function validarut($campo) //// valida números y que contenga la k 
{
	///deja solo lo que esta dentro de []
	$campo = preg_replace('([^0-9kK])', '', $campo);
	$campo = trim($campo);
	$campo = stripcslashes($campo);
	$campo = htmlspecialchars($campo);

	return $campo;
}

function validarutConPuntosyGuion($campo) //// valida números y que contenga la k 
{
	///deja solo lo que esta dentro de []
	$campo = preg_replace('([^0-9kK.-])', '', $campo);
	$campo = trim($campo);
	$campo = stripcslashes($campo);
	$campo = htmlspecialchars($campo);

	return $campo;
}

function solodireccion($campo)
{
	///deja solo lo que esta dentro de []
	$campo = preg_replace('([^abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0-9áéíóúÁÉÍÓÚ-°#, ])', '', $campo);
	$campo = trim($campo);
	$campo = stripcslashes($campo);
	$campo = htmlspecialchars($campo);

	return $campo;
}

function soloCaractDeConversacion($campo) ////mantiene varios carácteres de conversación
{
	///deja solo lo que esta dentro de []
	$campo = preg_replace('([^abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0-9.,:;!?%$/"() _-áéíóúÁÉÍÓÚ])', '', $campo);
	$campo = trim($campo);
	$campo = stripcslashes($campo);
	$campo = htmlspecialchars($campo);

	return $campo;
}


function soloNombreMaterialBodega($campo) ////mantiene varios carácteres de conversación
{
	///deja solo lo que esta dentro de []
	$campo = preg_replace('([^abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ0-9./() -])', '', $campo);
	$campo = trim($campo);
	$campo = stripcslashes($campo);
	$campo = htmlspecialchars($campo);

	return $campo;
}

function limpiarimagen($campo) ////mantiene varios carácteres de conversación
{
	///deja solo lo que esta dentro de []
	$campo = preg_replace('([^abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0-9 _-áéíóúÁÉÍÓÚ])', '', $campo);
	$campo = trim($campo);
	$campo = stripcslashes($campo);
	$campo = htmlspecialchars($campo);

	return $campo;
}

function numerosyletras($campo) ////mantiene carácteres numericos y letras
{
	///deja solo lo que esta dentro de []
	// $campo = preg_replace('([^abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0-9.,:;!?%$/"() _-áéíóúÁÉÍÓÚ])', '', $campo);
	$campo = preg_replace('([^abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0-9áéíóúÁÉÍÓÚ ])', '', $campo);
	$campo = trim($campo);
	$campo = stripcslashes($campo);
	$campo = htmlspecialchars($campo);

	return $campo;
}

function bannerVideos($campo) ////mantiene carácteres numericos y letras
{
	///deja solo lo que esta dentro de []
	// $campo = preg_replace('([^abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0-9.,:;!?%$/"() _-áéíóúÁÉÍÓÚ])', '', $campo);
	$campo = preg_replace('([^abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0-9áéíóúÁÉÍÓÚ# ])', '', $campo);
	$campo = trim($campo);
	$campo = stripcslashes($campo);
	$campo = htmlspecialchars($campo);

	return $campo;
}

function dosificacion($campo) ////mantiene carácteres numericos y letras
{
	///deja solo lo que esta dentro de []
	// $campo = preg_replace('([^abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0-9.,:;!?%$/"() _-áéíóúÁÉÍÓÚ])', '', $campo);
	$campo = preg_replace('([^abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0-9áéíóúÁÉÍÓÚ ,./])', '', $campo);
	$campo = trim($campo);
	$campo = stripcslashes($campo);
	$campo = htmlspecialchars($campo);

	return $campo;
}


function sololetras($campo) ////mantiene solo letras
{
	///deja solo lo que esta dentro de []
	$campo = preg_replace('([^abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ ])', '', $campo);
	$campo = trim($campo);
	$campo = stripcslashes($campo);
	$campo = htmlspecialchars($campo);

	return $campo;
}

function solonumeros($campo) ////mantiene sólo números
{
	///deja solo lo que esta dentro de []
	$campo = preg_replace('([^0-9])', '', $campo);
	$campo = trim($campo);
	$campo = stripcslashes($campo);
	$campo = htmlspecialchars($campo);

	return $campo;
}

function sololink($campo) ////mantiene sólo parámetros permitidos para el link
{
	///deja solo lo que esta dentro de []
	$campo = preg_replace('([^abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ0-9.:/&=%?_-])', '', $campo);
	$campo = trim($campo);
	$campo = stripcslashes($campo);
	$campo = htmlspecialchars($campo);

	return $campo;
}

function solocorreo($campo) ////mantiene sólo parámetros permitidos para el link
{
	///deja solo lo que esta dentro de []
	$campo = preg_replace('([^abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0-9.@])', '', $campo); //no son válidos los caracteres áéíóúÁÉÍÓÚÑñ
	$campo = trim($campo);
	$campo = stripcslashes($campo);
	$campo = htmlspecialchars($campo);

	return $campo;
}

function solotelefono($campo) ////mantiene sólo parámetros permitidos para el link
{
	///deja solo lo que esta dentro de []
	$campo = preg_replace('([^0-9+-])', '', $campo);
	$campo = trim($campo);
	$campo = stripcslashes($campo);
	$campo = htmlspecialchars($campo);

	return $campo;
}

function limpiabuscador($campo) ////mantiene varios carácteres de conversación
{
	///deja solo lo que esta dentro de []
	$campo = preg_replace("([^abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZáéíóúÁÉÍÓÚ' ])", "", $campo);
	// $campo = preg_replace('([^abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0-9áéíóúÁÉÍÓÚ ])', '', $campo);
	$campo = trim($campo);
	$campo = stripcslashes($campo);
	$campo = htmlspecialchars($campo);

	return $campo;
}

function validanumeroenarreglo($parametro) //valida si es un número(is_numeric es para entero y flotantes) y si es negativo
{
	foreach ($parametro as $val) {

		if (!is_numeric($val)) { //Si no es un numero 
			return true;
		} else if (is_numeric($val) && ($val <= 0)) { //si es un numero pero es negativo o igual a cero
			return true;
		}
	}
}


function validavacioenarreglo($parametro) //valida si es vacío
{
	foreach ($parametro as $val) {

		if (is_null($val) || empty($val) || $val == '<p><br></p>') { //<p><br></p> es el vacío del summernote
			return true;
		}
	}
}

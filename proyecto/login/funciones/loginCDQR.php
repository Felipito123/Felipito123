<?php
include '../../conexion/conexion.php';
include '../../funcionesphp/limpiarCampo.php';
session_start();
if (isset($_POST["rut"]) && isset($_POST["contrasena"])) {

    $rut = validarut($_POST["rut"]);
    $clave = validacontrasena($_POST["contrasena"]);

    if (validavacioenarreglo(array($rut, $clave))) {
        echo 1;  //  echo 9;
        return;
    }

    if (strlen($rut) < 8 || strlen($rut) > 11 || strlen($clave) > 250) {
        echo 2;  //  echo 10;
        return;
    }
    $sql = "SELECT rut,contrasena_usuario FROM usuario WHERE rut='$rut' and estado_usuario=1";
    $respuesta = mysqli_query($mysqli, $sql);

    if (!$respuesta) {
        echo 3;  //error en la consulta
        return;
    } else {
        $contarestadousuario = mysqli_num_rows($respuesta);

        if ($contarestadousuario > 0) {

            $resultado = mysqli_fetch_array($respuesta);
            $rutbd = $resultado['rut'];
            $contrabd = $resultado['contrasena_usuario'];

            if ($clave == $contrabd) {

                $sql_consulta_sector = "SELECT id_sector, id_unidad FROM usuario WHERE rut='$rut'";
                $resp_sector = mysqli_query($mysqli, $sql_consulta_sector);
                $asociar = mysqli_fetch_assoc($resp_sector);

                if (($asociar['id_sector'] == NULL || $asociar['id_sector'] == null) && ($asociar['id_unidad'] == NULL || $asociar['id_unidad'] == null)) {
                    sesion1($mysqli, $rut);
                    echo 4;
                    return;
                } else if ($asociar['id_sector'] != NULL && $asociar['id_unidad'] != NULL) {
                    sesion2($mysqli, $rut);
                    echo 4;
                    return;
                } else if (($asociar['id_sector'] == NULL || $asociar['id_sector'] == null) && ($asociar['id_unidad'] != NULL || $asociar['id_unidad'] != null)) {
                    sesion3($mysqli, $rut);
                    echo 4;
                    return;
                } else {
                    sesion4($mysqli, $rut);
                    echo 4;
                    return;
                }
            } else { //no coinciden las constraseñas
                echo 5;
                return;
            }
        } else { //Usuario Inactivo o no registrado en la BD

            $sqlInactivo = "SELECT rut,contrasena_usuario FROM usuario WHERE rut='$rut' and estado_usuario=0";
            $respuestaInactivo = mysqli_query($mysqli, $sqlInactivo);
            $filaInactivo = mysqli_num_rows($respuestaInactivo);

            if ($filaInactivo > 0) {
                echo 7;
                return;
            } else {
                echo 6;
                return;
            }
            // echo 6;
            // return;
        }
    }
}




function sesion1($mysqli, $rut)
{
    $sql1 = "SELECT us.rut, us.nombre_usuario, us.correo_usuario, us.contrasena_usuario, 
    us.id_rol, us.id_comuna, us.imagen_usuario, c.nombre_comuna, c.id_region, r.nombre_region, us.telefono_usuario, carg.nombre_cargo
    FROM usuario us, comuna c, region r, cargo carg WHERE us.id_comuna=c.id_comuna and c.id_region=r.id_region 
    and us.id_cargo=carg.id_cargo and us.rut='$rut' and us.estado_usuario=1";
    $resp1 = mysqli_query($mysqli, $sql1);
    while ($row = mysqli_fetch_array($resp1)) {
        $_SESSION["sesionCESFAM"] = array(
            "rut"                   => $row["rut"],
            "nombre_usuario"        => $row["nombre_usuario"],
            "correo"                => $row["correo_usuario"],
            "contrasena"            => $row["contrasena_usuario"],
            "id_rol"                => $row["id_rol"],
            "id_comuna"             => $row["id_comuna"],
            "nombre_comuna"         => $row["nombre_comuna"],
            "id_region"             => $row["id_region"],
            "nombre_region"         => $row["nombre_region"],
            "nombre_sector"         => NULL,
            "nombre_unidad"         => NULL,
            "cargo"                 => $row["nombre_cargo"],
            "telefono"              => $row["telefono_usuario"],
            "imagenusuario"         => $row["imagen_usuario"]
        );
        $enlinea = $_SESSION['sesionCESFAM']['rut']; //PARA AGREGAR AL USUARIO A QUE ESTE EN LINEA
        mysqli_query($mysqli, "UPDATE usuario SET enlinea_usuario='1' WHERE rut='$enlinea'");
    }
}


function sesion2($mysqli, $rut)
{
    $sql1 = "SELECT us.rut, us.nombre_usuario, us.correo_usuario, us.contrasena_usuario, 
    us.id_rol, us.id_comuna, us.imagen_usuario, c.nombre_comuna, c.id_region, r.nombre_region, us.telefono_usuario, carg.nombre_cargo,
    sec.nombre_sector,uni.nombre_unidad
    FROM usuario us, comuna c, region r, cargo carg, sector sec, unidad uni WHERE us.id_comuna=c.id_comuna and c.id_region=r.id_region 
    and us.id_cargo=carg.id_cargo and us.rut='$rut' and sec.id_sector=us.id_sector and uni.id_unidad=us.id_unidad and us.estado_usuario=1";
    $resp1 = mysqli_query($mysqli, $sql1);
    while ($row = mysqli_fetch_array($resp1)) {
        $_SESSION["sesionCESFAM"] = array(
            "rut"                   => $row["rut"],
            "nombre_usuario"        => $row["nombre_usuario"],
            "correo"                => $row["correo_usuario"],
            "contrasena"            => $row["contrasena_usuario"],
            "id_rol"                => $row["id_rol"],
            "id_comuna"             => $row["id_comuna"],
            "nombre_comuna"         => $row["nombre_comuna"],
            "id_region"             => $row["id_region"],
            "nombre_region"         => $row["nombre_region"],
            "nombre_sector"         => $row["nombre_sector"],
            "nombre_unidad"         => $row["nombre_unidad"],
            "cargo"                 => $row["nombre_cargo"],
            "telefono"              => $row["telefono_usuario"],
            "imagenusuario"         => $row["imagen_usuario"]
        );
        $enlinea = $_SESSION['sesionCESFAM']['rut']; //PARA AGREGAR AL USUARIO A QUE ESTE EN LINEA
        mysqli_query($mysqli, "UPDATE usuario SET enlinea_usuario='1' WHERE rut='$enlinea'");
    }
}

function sesion3($mysqli, $rut)
{
    $sql1 = "SELECT us.rut, us.nombre_usuario, us.correo_usuario, us.contrasena_usuario, 
    us.id_rol, us.id_comuna, us.imagen_usuario, c.nombre_comuna, c.id_region, r.nombre_region, us.telefono_usuario, carg.nombre_cargo,
    uni.nombre_unidad
    FROM usuario us, comuna c, region r, cargo carg, unidad uni WHERE us.id_comuna=c.id_comuna and c.id_region=r.id_region 
    and us.id_cargo=carg.id_cargo and us.rut='$rut' and uni.id_unidad=us.id_unidad and us.estado_usuario=1";
    $resp1 = mysqli_query($mysqli, $sql1);
    while ($row = mysqli_fetch_array($resp1)) {
        $_SESSION["sesionCESFAM"] = array(
            "rut"                   => $row["rut"],
            "nombre_usuario"        => $row["nombre_usuario"],
            "correo"                => $row["correo_usuario"],
            "contrasena"            => $row["contrasena_usuario"],
            "id_rol"                => $row["id_rol"],
            "id_comuna"             => $row["id_comuna"],
            "nombre_comuna"         => $row["nombre_comuna"],
            "id_region"             => $row["id_region"],
            "nombre_region"         => $row["nombre_region"],
            "nombre_sector"         => NULL,
            "nombre_unidad"         => $row["nombre_unidad"],
            "cargo"                 => $row["nombre_cargo"],
            "telefono"              => $row["telefono_usuario"],
            "imagenusuario"         => $row["imagen_usuario"]
        );
        $enlinea = $_SESSION['sesionCESFAM']['rut']; //PARA AGREGAR AL USUARIO A QUE ESTE EN LINEA
        mysqli_query($mysqli, "UPDATE usuario SET enlinea_usuario='1' WHERE rut='$enlinea'");
    }
}

function sesion4($mysqli, $rut)
{
    $sql1 = "SELECT us.rut, us.nombre_usuario, us.correo_usuario, us.contrasena_usuario, 
    us.id_rol, us.id_comuna, us.imagen_usuario, c.nombre_comuna, c.id_region, r.nombre_region, us.telefono_usuario, carg.nombre_cargo,
    sec.nombre_sector
    FROM usuario us, comuna c, region r, cargo carg, sector sec WHERE us.id_comuna=c.id_comuna and c.id_region=r.id_region 
    and us.id_cargo=carg.id_cargo and us.rut='$rut' and sec.id_sector=us.id_sector and us.estado_usuario=1";
    $resp1 = mysqli_query($mysqli, $sql1);
    while ($row = mysqli_fetch_array($resp1)) {
        $_SESSION["sesionCESFAM"] = array(
            "rut"                   => $row["rut"],
            "nombre_usuario"        => $row["nombre_usuario"],
            "correo"                => $row["correo_usuario"],
            "contrasena"            => $row["contrasena_usuario"],
            "id_rol"                => $row["id_rol"],
            "id_comuna"             => $row["id_comuna"],
            "nombre_comuna"         => $row["nombre_comuna"],
            "id_region"             => $row["id_region"],
            "nombre_region"         => $row["nombre_region"],
            "nombre_sector"         => $row["nombre_sector"],
            "nombre_unidad"         => NULL,
            "cargo"                 => $row["nombre_cargo"],
            "telefono"              => $row["telefono_usuario"],
            "imagenusuario"         => $row["imagen_usuario"]
        );
        $enlinea = $_SESSION['sesionCESFAM']['rut']; //PARA AGREGAR AL USUARIO A QUE ESTE EN LINEA
        mysqli_query($mysqli, "UPDATE usuario SET enlinea_usuario='1' WHERE rut='$enlinea'");
    }
}

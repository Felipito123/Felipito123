<?php

class DB
{
    // Database credentials
    private $dbHost     = "localhost";
    private $dbUsername = "root";
    private $dbPassword = "";
    private $dbName     = "saludlosalamos2";

    public function __construct()
    {
        if (!isset($this->db)) {
            // Connect to the database
            $conn = new mysqli($this->dbHost, $this->dbUsername, $this->dbPassword, $this->dbName);
            if ($conn->connect_error) {
                die("Failed to connect with MySQL: " . $conn->connect_error);
            } else {
                $this->db = $conn;
                //echo 'conectado';
            }
        }
    }

    // Check is table empty
    public function is_table_empty()
    {
        $result = $this->db->query("SELECT id_token FROM token");
        if ($result->num_rows) {
            return false;
        }

        return true;
    }

    // Get access token
    public function get_access_token()
    {
        $sql = $this->db->query("SELECT token_de_acceso FROM token");
        $result = $sql->fetch_assoc();
        return json_decode($result['token_de_acceso']);
    }

    // Get referesh token
    public function get_refersh_token()
    {
        $result = $this->get_access_token();
        return $result->refresh_token;
    }

    // Update access token
    public function update_access_token($token, $rut)
    {
        //$rut=$_SESSION['sesionCESFAM']['rut'];
        if ($this->is_table_empty()) {
            $this->db->query("INSERT INTO token (token_de_acceso,rut)  VALUES('$token','$rut')");
        } else {
            $this->db->query("UPDATE token SET token_de_acceso = '$token' WHERE id_token = (SELECT id_token FROM token)");
        }
    }

    public function insertar($cod_reu, $asunto, $url, $fecha, $fechaconformato, $duracion, $contra, $rut)
    {
        $this->db->query("INSERT INTO reunion (id_reunion,codigo_reunion,asunto_reunion,url_reunion,fecha_reunion,fecha_con_formato,duracion_reunion,contrasena_reunion,rut_creador) VALUES('','$cod_reu','$asunto','$url','$fecha','$fechaconformato','$duracion','$contra','$rut')");
    }

    public function eliminar($id)
    {
        $this->db->query("DELETE FROM destinatario_reunion WHERE id_reunion='$id'");
        $this->db->query("DELETE FROM reunion WHERE id_reunion='$id'");
    }
    public function modificarvideoconferencia($id, $asunto, $fecha, $fechaconformato, $duracion, $contrasena)
    {
        $this->db->query("UPDATE reunion SET asunto_reunion ='$asunto',fecha_reunion ='$fecha',fecha_con_formato='$fechaconformato',duracion_reunion ='$duracion',contrasena_reunion ='$contrasena' WHERE id_reunion='$id'");
    }
}

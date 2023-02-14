<?php

require_once("database.php");
class Usuario extends Database
{

    public function login($email, $password, $table)
    {
        $consulta = $this->db->prepare("SELECT * FROM $table WHERE email LIKE '$email' and password LIKE '$password' and actiu like 'si'");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;

    }
    
    public function obtenerPerfil($email, $table)
    {
        $consulta = $this->db->prepare("SELECT * FROM $table WHERE email LIKE '$email' ");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
}

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

    public function signin($dni, $nom, $cognoms, $edat, $foto, $email, $password)
    {
        $consulta = $this->db->prepare("INSERT INTO alumnes (dni, nom, cognoms, edat, foto, email, actiu, password) VALUES ('$dni', '$nom', '$cognoms', '$edat', '$foto', '$email', 'si', '$password')");
        if($consulta->execute()){
            $last_id = $this->db->lastInsertId();
            return true;
        }else{
            return false;
        }
    }
    
    public function obtenerPerfil($email, $table)
    {
        $consulta = $this->db->prepare("SELECT * FROM $table WHERE email LIKE '$email' ");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function obtenerProfessores()
    {
        $consulta = $this->db->prepare("SELECT * FROM professor");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
}

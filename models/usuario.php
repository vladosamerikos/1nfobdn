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

    public function crearProfessor($dni, $nom, $cognoms, $edat, $titolAcademic, $foto, $email, $password)
    {
        $consulta = $this->db->prepare("INSERT INTO professor (dni, nom, cognoms, edat, titolAcademic, foto, email, actiu, password) VALUES ('$dni', '$nom', '$cognoms', '$edat', '$titolAcademic', '$foto', '$email', 'si', '$password')");
        if($consulta->execute()){
            $last_id = $this->db->lastInsertId();
            return true;
        }else{
            return false;
        }
    }

    public function desactivarProfessor($dni)
    {
        $consulta = $this->db->prepare("UPDATE professor SET actiu='no' WHERE dni LIKE '$dni'");
        $count =$consulta->execute();
        echo $count." registros actualizados correctamente";
    }

    public function activarProfessor($dni)
    {
        $consulta = $this->db->prepare("UPDATE professor SET actiu='si' WHERE dni LIKE '$dni'");
        $count =$consulta->execute();
        echo $count." registros actualizados correctamente";
    }

    public function eliminarProfessor($dni)
    {
        $consulta = $this->db->prepare("DELETE FROM professor WHERE dni LIKE '$dni'");
        $count =$consulta->execute();
        echo $count." registros actualizados correctamente";
    }

    public function obtenerProfessoresBusqueda($busqueda)
    {
        $consulta = $this->db->prepare("SELECT * FROM professor WHERE nom like '%$busqueda%'");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function obtenerProfessor($dni)
    {
        $consulta = $this->db->prepare("SELECT * FROM professor WHERE dni like '$dni'");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function editarProfessor($dni, $nom, $cognoms, $edat, $titolAcademic,$email, $password)
    {
        $consulta = $this->db->prepare("UPDATE professor SET nom='$nom', cognoms='$cognoms', edat='$edat', titolAcademic='$titolAcademic', email='$email', password='$password' WHERE dni LIKE '$dni'");
        $count =$consulta->execute();
        echo $count." registros actualizados correctamente";
    }
}

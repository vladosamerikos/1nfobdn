<?php

require_once("database.php");
class Curso extends Database
{
    
    public function getFourActual($dni)
    {
        $fechaActual = date('Y-m-d');
        $consulta = $this->db->prepare("SELECT * FROM cursos WHERE dataInici>'$fechaActual' and actiu like 'si' and codi NOT IN ( SELECT codiCurs FROM matricula WHERE dniAlum like '$dni') ORDER BY dataInici ASC LIMIT 4");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;

    }

}
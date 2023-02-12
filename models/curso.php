<?php

require_once("database.php");
class Curso extends Database
{
    
    public function getFourActual($dni)
    {
        $fechaActual = date('Y-m-d');
        $consulta = $this->db->prepare("SELECT * FROM cursos WHERE data_inici>'$fechaActual' and actiu like 'si' and codi NOT IN ( SELECT codi_curs FROM matricula WHERE DNI_alum like '$dni') ORDER BY data_inici ASC LIMIT 4");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;

    }

}
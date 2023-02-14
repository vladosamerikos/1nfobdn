<?php

require_once("database.php");
class Curso extends Database
{
    
    public function obtenerCuatroActual($dni)
    {
        $fechaActual = date('Y-m-d');
        $consulta = $this->db->prepare("SELECT * FROM cursos WHERE dataInici>'$fechaActual' and actiu like 'si' and codi NOT IN ( SELECT codiCurs FROM matricula WHERE dniAlum like '$dni') ORDER BY dataInici ASC LIMIT 4");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;

    }

    public function obtenerCursosAlum($dni)
    {
        $fechaActual = date('Y-m-d');
        $consulta = $this->db->prepare("SELECT codi, C.nom as nomCurs, descripcio, horresDurara, dataInici, dataFinal, dniProf, C.foto as fotoCurs, P.nom as nomProf, cognoms, nota FROM cursos C INNER JOIN professor P ON P.dni=dniProf Inner Join matricula M on M.codiCurs=Codi WHERE C.actiu like 'si' and dataFinal>'$fechaActual' and M.dniAlum like '$dni' ");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function desmatricularAlum($dni,$codi)
    {
        $consulta = $this->db->prepare("DELETE FROM matricula WHERE codiCurs like '$codi' and dniAlum like '$dni'");
        $count = $consulta->execute();
    }

    public function obtenerCursosDisponibles($dni)
    {
        $fechaActual = date('Y-m-d');
        $consulta = $this->db->prepare("SELECT codi, C.nom as nomCurs, descripcio, horresDurara, dataInici, dataFinal, dniProf, C.foto as fotoCurs, P.nom as nomProf, cognoms FROM cursos C INNER JOIN professor P ON P.dni=dniProf WHERE C.actiu like 'si' and dataInici>'$fechaActual' and codi  NOT IN ( SELECT codiCurs FROM matricula WHERE dniAlum like '$dni') ");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function matricularAlum($dni,$codi)
    {
        $consulta = $this->db->prepare("INSERT INTO matricula VALUES ('$dni', '$codi', '0')");
        $count = $consulta->execute();
    }
}
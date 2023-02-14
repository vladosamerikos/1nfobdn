<?php

require_once("database.php");
class Nota extends Database
{
    
    public function obtenerNotasAlum($dni)
    {
        $fechaActual = date('Y-m-d');
        $consulta = $this->db->prepare("SELECT codi, C.nom as nomCurs, descripcio, horresDurara, dataInici, dataFinal, dniProf, C.foto as fotoCurs, P.nom as nomProf, cognoms, nota 
        FROM cursos C INNER JOIN professor P ON P.dni=dniProf Inner Join matricula M on M.codiCurs=Codi WHERE C.actiu like 'si' and dataFinal<'$fechaActual' and M.dniAlum like '$dni' ");

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function obtenerNotaAlum($codi,$dni)
    {
        $consulta = $this->db->prepare("SELECT  A.foto, A.nom as nomAlum, A.cognoms, A.dni, C.codi, C.nom as nomCurs, M.nota
        FROM alumnes A INNER JOIN matricula M ON A.dni=M.dniAlum INNER JOIN cursos C on M.codiCurs= C.codi WHERE A.dni like '$dni' and C.codi like '$codi' ");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function ponerNotaAlum($codi,$dni,$nota)
    {
        $consulta = $this->db->prepare("UPDATE matricula SET nota='$nota' WHERE dniAlum LIKE '$dni' and codiCurs like '$codi'") ;
        $count =$consulta->execute();
    }

    // busquedas

    public function obtenerNotasAlumBusqueda($dni,$busqueda)
    {
        $fechaActual = date('Y-m-d');
        $consulta = $this->db->prepare("SELECT codi, C.nom as nomCurs, descripcio, horresDurara, dataInici, dataFinal, dniProf, C.foto as fotoCurs, P.nom as nomProf, cognoms, nota 
        FROM cursos C INNER JOIN professor P ON P.dni=dniProf Inner Join matricula M on M.codiCurs=Codi WHERE C.actiu like 'si' and dataFinal<'$fechaActual' and C.nom like '%$busqueda%' and M.dniAlum like '$dni' ");

        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }
    

}
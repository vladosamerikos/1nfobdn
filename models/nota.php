<?php

require_once("database.php");
class Nota extends Database
{
    
    public function obtenerNotasAlum($dni)
    {
        $fechaActual = date('Y-m-d');
        $consulta = $this->db->prepare("SELECT codi, C.nom as nomCurs, descripcio, horresDurara, dataInici, dataFinal, dniProf, C.foto as fotoCurs, P.nom as nomProf, cognoms, nota FROM cursos C INNER JOIN professor P ON P.dni=dniProf Inner Join matricula M on M.codiCurs=Codi WHERE C.actiu like 'si' and dataFinal<'$fechaActual' and M.dniAlum like '$dni' ");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }


    

}
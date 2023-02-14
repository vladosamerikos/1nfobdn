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

    public function obtenerCursosProf($dni)
    {
        $consulta = $this->db->prepare("SELECT * FROM cursos WHERE actiu like 'si' and dniProf like '$dni' ");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function obtenerAlumnosCurso($codi)
    {
        $consulta = $this->db->prepare("SELECT * FROM matricula M INNER JOIN alumnes A on M.dniAlum= A.dni WHERE codiCurs like '$codi'");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
        
    }

    // Busquedas Alum

    public function obtenerCursosDisponiblesBusqueda($dni,$busqueda)
    {
        $fechaActual = date('Y-m-d');
        $consulta = $this->db->prepare("SELECT codi, C.nom as nomCurs, descripcio, horresDurara, dataInici, dataFinal, dniProf, C.foto as fotoCurs, P.nom as nomProf, cognoms FROM cursos C INNER JOIN professor P ON P.dni=dniProf WHERE C.actiu like 'si' and dataInici>'$fechaActual' and C.nom like '%$busqueda%' and codi  NOT IN ( SELECT codiCurs FROM matricula WHERE dniAlum like '$dni') ");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function obtenerCursosAlumBusqueda($dni,$busqueda)
    {
        $fechaActual = date('Y-m-d');
        $consulta = $this->db->prepare("SELECT codi, C.nom as nomCurs, descripcio, horresDurara, dataInici, dataFinal, dniProf, C.foto as fotoCurs, P.nom as nomProf, cognoms, nota FROM cursos C INNER JOIN professor P ON P.dni=dniProf Inner Join matricula M on M.codiCurs=Codi WHERE C.actiu like 'si' and C.nom like '%$busqueda%' and dataFinal>'$fechaActual' and M.dniAlum like '$dni' ");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    

    // Busquedas Prof

    
    public function obtenerCursosProfBusqueda($dni,$busqueda)
    {
        $consulta = $this->db->prepare("SELECT * FROM cursos WHERE actiu like 'si' and dniProf like '$dni' and nom like'%$busqueda%'");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    // Parte admin

    public function obtenerCursos()
    {
        $consulta = $this->db->prepare("SELECT * FROM cursos");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    public function crearCurso($codi, $nom, $descripcio, $horresDurara, $dataInici, $dataFinal, $dniProf, $foto)
    {
        $consulta = $this->db->prepare("INSERT INTO cursos (codi, nom, descripcio, horresDurara, dataInici, dataFinal, dniProf, actiu, foto) VALUES ('$codi', '$nom', '$descripcio', '$horresDurara', '$dataInici', '$dataFinal', '$dniProf', 'si', '$foto')");
        if($consulta->execute()){
            $last_id = $this->db->lastInsertId();
            return true;
        }else{
            return false;
        }
    }

    public function editarCurso($codi, $nom, $descripcio, $horresDurara, $dataInici, $dataFinal, $dniProf)
    {
        $consulta = $this->db->prepare("UPDATE cursos SET nom='$nom', descripcio='$descripcio', horresDurara='$horresDurara', dataInici='$dataInici', dataFinal='$dataFinal', dniProf='$dniProf' WHERE codi='$codi'");
        $count =$consulta->execute();
        echo $count." registros actualizados correctamente";
    }

    public function editarFotoCurso($codi, $foto)
    {
        $consulta = $this->db->prepare("UPDATE cursos SET foto='$foto' WHERE codi='$codi'");
        $count =$consulta->execute();
        echo $count." registros actualizados correctamente";
    }

    public function desactivarCurso($codi)
    {
        $consulta = $this->db->prepare("UPDATE cursos SET actiu='no' WHERE codi LIKE '$codi'");
        $count =$consulta->execute();
        echo $count." registros actualizados correctamente";
    }

    public function activarCurso($codi)
    {
        $consulta = $this->db->prepare("UPDATE cursos SET actiu='si' WHERE codi LIKE '$codi'");
        $count =$consulta->execute();
        echo $count." registros actualizados correctamente";
    }

    public function eliminarCurso($codi)
    {
        $consulta = $this->db->prepare("DELETE FROM cursos WHERE codi LIKE '$codi'");
        $count =$consulta->execute();
        echo $count." registros actualizados correctamente";
    }

    public function obtenerCurso($codi)
    {        
        $consulta = $this->db->prepare("SELECT * FROM cursos WHERE codi LIKE '$codi'");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }

    // Busqueda Admin
    public function obtenerCursosBusqueda($busqueda)
    {
        $consulta = $this->db->prepare("SELECT * FROM cursos WHERE nom like '%$busqueda%'");
        $consulta->execute();
        $resultado = $consulta->fetchAll();
        return $resultado;
    }


}
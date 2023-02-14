<?php
require "models/admin.php";
require "models/usuario.php";
require "models/curso.php";
require "models/nota.php";


class UserController
{

    public function mostrarPrincipalAlum()
    {
        $curso = new Curso();
        $cursos = $curso->obtenerCuatroActual($_SESSION['dni']);
        require "views/principal/alum.php";
    }

    public function mostrarPrincipalProf()
    {
        require "views/principal/prof.php";
    }

    // part Alumn

    public function mostrarNotasAlum()
    {
        $nota = new Nota();
        $cursos = $nota->obtenerNotasAlum($_SESSION['dni']);
        require "views/alumne/minotas.php";
    }

    public function mostrarCursosAlum()
    {
        $curso = new Curso();
        $cursos = $curso->obtenerCursosAlum($_SESSION['dni']);
        require "views/alumne/micursos.php";
    }

    public function desmatricularCursAlum()
    {
        $codi =  $_GET['codi'];
        $curso = new Curso();
        $cursos = $curso->desmatricularAlum($_SESSION['dni'],$codi);
        header('Location: index.php?controller=User&action=mostrarCursosAlum');
        die();
    }

    public function mostrarCursosDisponiblesAlum()
    {
        $curso = new Curso();
        $cursos = $curso->obtenerCursosDisponibles($_SESSION['dni']);
        require "views/alumne/cursosdisponibles.php";
    }

    public function mostrarMiPerfil()
    {
        $user = new Usuario();
        $table = '';
        if($_SESSION['role']=='prof'){
            $table ='professor';
        }else if($_SESSION['role']=='alum'){
            $table ='alumnes';
        }
        $perfil= $user->obtenerPerfil($_SESSION["email"],$table);
        require "views/perfil/miperfil.php";
    }

    public function matricularCursAlum()
    {
        $codi =  $_GET['codi'];
        $curso = new Curso();
        $curso = $curso->matricularAlum($_SESSION['dni'],$codi);
        header('Location: index.php?controller=User&action=mostrarCursosAlum');
        die();
    }

    // Buscadors Alum
    public function buscarCursosDisponiblesAlum()
    {
        $busqueda = $_POST['search'];
        $curso = new Curso();
        $cursos = $curso->obtenerCursosDisponiblesBusqueda($_SESSION['dni'],$busqueda);
        require "views/alumne/cursosdisponibles.php";
    }

    public function buscarCursosAlum()
    {
        $busqueda = $_POST['search'];
        $curso = new Curso();
        $cursos = $curso->obtenerCursosAlumBusqueda($_SESSION['dni'],$busqueda);
        require "views/alumne/micursos.php";
    }

    public function buscarNotasAlum()
    {
        $busqueda = $_POST['search'];
        $nota = new Nota();
        $cursos = $nota->obtenerNotasAlumBusqueda($_SESSION['dni'],$busqueda);
        require "views/alumne/minotas.php";
    }

    // Part prof

    public function mostrarCursosProf()
    {
        $curso = new Curso();
        $cursos = $curso->obtenerCursosProf($_SESSION['dni']);
        require "views/professor/meuscursos.php";
    }

    public function mostrarAlumnosCurso()
    {
        $codi =  $_GET['codi'];
        $nomcurs =  $_GET['nomcurs'];

        $curso = new Curso();
        $alumnes = $curso->obtenerAlumnosCurso($codi);
        require "views/professor/alumnescurs.php";
    }

    public function mostrarEditNotaAlumn()
    {
        $codi =  $_GET['codi'];
        $dni =  $_GET['dni'];

        $nota = new Nota();
        $alumne = $nota->obtenerNotaAlum($codi,$dni);
        require "views/professor/editnota.php";
    }

    public function editNotaAlumn()
    {
        $dni = $_POST['dni'];
        $codi = $_POST['codi'];
        $nota = $_POST['nota'];
        $nomcurs = $_POST['curs'];

        $notaObj = new Nota();
        $alumne = $notaObj->ponerNotaAlum($codi,$dni,$nota);
        header("Location: index.php?controller=User&action=mostrarAlumnosCurso&codi=".$codi."&nomcurs=".$nomcurs."");
    }

    // Buscadors Prof

    public function buscarCursosProf()
    {
        $busqueda = $_POST['search'];
        $curso = new Curso();
        $cursos = $curso->obtenerCursosProfBusqueda($_SESSION['dni'],$busqueda);
        require "views/professor/meuscursos.php";
    }



}
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



}
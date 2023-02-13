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
        $cursos = $curso->getFourActual($_SESSION['dni']);
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


}
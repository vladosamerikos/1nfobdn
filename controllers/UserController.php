<?php
require "models/admin.php";
require "models/usuario.php";
require "models/curso.php";

class UserController
{

    public function mostrarPrincipalAlum()
    {
        $curso = new Curso();
        $cursos = $curso->getFourActual($_SESSION['dni']);
        require "views/principal/alum.php";
    }


}
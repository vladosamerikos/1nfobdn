<?php
require "models/admin.php";
require "models/usuario.php";
require "models/curso.php";
require "models/nota.php";


class AdminController
{
    public function mostrarPrincipalAdmin()
    {
        require "views/principal/admin.php";
    }

    public function mostrarAdministrarCursos()
    {
        $curso = new Curso();
        $cursos = $curso->obtenerCursos();
        require "views/adminPanel/tablacursos.php";
    }

    public function mostrarCrearCurso()
    {
        $user = new Usuario();
        $professors= $user->obtenerProfessores();
        $fechaActual = date('Y-m-d');
        require "views/adminPanel/crearcurso.php";
    }


    public function crearCurso()
    {
        $_codi = $_POST['codi'];
        $_nom = $_POST['nom'];
        $_descripcio = $_POST['descrip'];
        $_horesDurara = $_POST['hdurara'];
        $_dataInici = $_POST['dinici'];
        $_dataFinal = $_POST['dfinal'];
        $_dniProf = $_POST['dniprof'];

        if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
            $nombreDirectorio = "img/";
            $idUnico = $_codi;
            $nomorig = $_FILES['foto']['name'];
            $cont = explode(".", $nomorig);
            $ext = $cont[1];
            $nombreFichero = $idUnico . "." . $ext;
            move_uploaded_file(
                $_FILES['foto']['tmp_name'],
                $nombreDirectorio . $nombreFichero
            );
        }
        $_foto = $nombreDirectorio . $nombreFichero;

        $curso = new Curso();
        $result= $curso->crearCurso($_codi, $_nom, $_descripcio, $_horesDurara, $_dataInici, $_dataFinal, $_dniProf, $_foto);
        if ($result) {
            echo "Curso creado correctamente";
            header('Location: index.php?controller=Admin&action=mostrarAdministrarCursos');
            die();
        } else {
            echo "Error al crear el curso";
        }
    }


    public function desactivarCurso()
    {
        $codi = $_GET['codi'];
        $curso = new Curso();
        $curso->desactivarCurso($codi);
        header('Location: index.php?controller=Admin&action=mostrarAdministrarCursos');
        die();
    }

    public function activarCurso()
    {
        $codi = $_GET['codi'];
        $curso = new Curso();
        $curso->activarCurso($codi);
        header('Location: index.php?controller=Admin&action=mostrarAdministrarCursos');
        die();
    }

    public function eliminarCurso()
    {
        $codi = $_GET['codi'];
        $curso = new Curso();
        $curso->eliminarCurso($codi);
        header('Location: index.php?controller=Admin&action=mostrarAdministrarCursos');
        die();
    }

    public function mostrarEditarCurso()
    {
        $codi = $_GET['codi'];
        $curso = new Curso();
        $curs=$curso->obtenerCurso($codi);
        $user = new Usuario();
        $professors= $user->obtenerProfessores();
        require "views/adminPanel/editarcurso.php";
    }


    public function editarCurso()
    {
        $_codi = $_POST['codi'];
        $_nom = $_POST['nom'];
        $_descripcio = $_POST['descrip'];
        $_horesDurara = $_POST['hdurara'];
        $_dataInici = $_POST['dinici'];
        $_dataFinal = $_POST['dfinal'];
        $_dniProf = $_POST['dniprof'];
        $curso = new Curso();
        $curso->editarCurso($_codi, $_nom, $_descripcio, $_horesDurara, $_dataInici, $_dataFinal, $_dniProf);
        header('Location: index.php?controller=Admin&action=mostrarAdministrarCursos');
        die();
    }

    public function mostrarEditarFotoCurso()
    {
        $codi = $_GET['codi'];
        $curso = new Curso();
        $curs=$curso->obtenerCurso($codi);
        require "views/adminPanel/editarfotocurso.php";
    }


    public function editarFotoCurso()
    {
        $_codi = $_POST['codi'];
        $_oldfoto = $_POST['oldfoto'];
        $curso = new Curso();

        if ($_oldfoto != '') {
            if (unlink($_oldfoto)) {
                echo "<p>Foto anterior eliminada exitosamente</p>";
            } else {
                echo "<p>Error a la hora de eliminar la foto</p>";
            }
        } else {
            echo "<p>El curs no tenia foto</p>";
        }

        if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
            $nombreDirectorio = "img/";
            $idUnico = $_codi;
            $nomorig = $_FILES['foto']['name'];
            $cont = explode(".", $nomorig);
            $ext = $cont[1];
            $nombreFichero = $idUnico . "." . $ext;
            move_uploaded_file(
                $_FILES['foto']['tmp_name'],
                $nombreDirectorio . $nombreFichero
            );
            $_foto = $nombreDirectorio . $nombreFichero;
            $curso->editarFotoCurso($_codi,$_foto);
        } else {
            print("<p>No has subido foto nueva</p>");
        }
        header('Location: index.php?controller=Admin&action=mostrarAdministrarCursos');
        die();
    }

    // Busqueda

    public function buscarAdministrarCursos()
    {
        $busqueda = $_POST['search'];
        $curso = new Curso();
        $cursos = $curso->obtenerCursosBusqueda($busqueda);
        require "views/adminPanel/tablacursos.php";

    }


}
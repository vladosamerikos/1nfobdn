<?php
require "models/admin.php";
require "models/usuario.php";

class LoginController
{

    public function index()
    {
        if (isset($_SESSION['email']) && $_SESSION['role'] == 'alum') {
            header('Location: index.php?controller=User&action=mostrarPrincipalAlum');
        } else if (isset($_SESSION['email']) && $_SESSION['role'] == 'prof') {
            header('Location: index.php?controller=User&action=mostrarPrincipalProf');
        } else if (isset($_SESSION['email']) && $_SESSION['role'] == 'admin') {
            header('Location: index.php?controller=Admin&action=mostrarPrincipalAdmin');
        } else {
            header('Location: index.php?controller=Login&action=mostrarLoginUser');
        }
    }

    public function mostrarLoginAdmin()
    {
        require "views/loginAdmin/formulario.php";
    }

    public function loginAdmin()
    {
        $admin = new Admin();
        $_email = trim($_POST['email']);
        $_password = md5(trim($_POST['password']));

        $_result = $admin->login($_email, $_password);
        if ($_result) {
            $_SESSION['email'] = $_email;
            $_SESSION['role'] = 'admin';
            echo "login correcto";
            header('Location: index.php?controller=Libro&action=mostrarLibros');
            die();
        } else {
            echo "login incorrecto";
        }
    }

    public function loginUser()
    {
        $user = new Usuario();
        $_email = trim($_POST['email']);
        $_password = md5(trim($_POST['password']));
        $_role = $_POST['usu'];
        $table= '';
        if($_role =='alum'){
            $table='alumnes';
        }elseif($_role=='prof'){
            $table='professor';
        }

        $_result = $user->login($_email, $_password, $table);
        var_dump($_result);
        if ($_result) {
            var_dump($_result);
            if($table=='alum'){
                $_SESSION["email"] = $_result[0]['email'];
                $_SESSION["dni"] =  $_result[0]['dni'];
                $_SESSION["role"] = $_role;
                $_SESSION["nom"] =  $_result[0]['nom'];
                $_SESSION["cognoms"] = $_result[0]['cognoms'];
                echo "login correcto";
                var_dump($_SESSION);

                header('Location: index.php?controller=Login&action=index');
                die();
            }else{
                $_SESSION["email"] =  $_result[0]['email'];
                $_SESSION["dni"] =  $_result[0]['dni'];
                $_SESSION["role"] = $_role;
                $_SESSION["nom"] =  $_result[0]['nom'];
                $_SESSION["cognoms"] = $_result[0]['cognoms'];
                echo "login correcto";
                var_dump($_SESSION);
                header('Location: index.php?controller=Login&action=index');
                die();
            }
        } else {
            echo "login incorrecto";
        }
    }

    public function signupUser()
    {
        $user = new Usuario();
        $_password = md5(trim($_POST['password']));
        $_dni = $_POST['dni'];
        $_nom = $_POST['nom'];
        $_cognom = $_POST['cognom'];
        $_email = $_POST['email'];
        $_edat = $_POST['edat'];

        if (is_uploaded_file($_FILES['foto']['tmp_name'])) {
            $nombreDirectorio = "img/";
            $idUnico = $_dni;
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

        $result = $user->signin($_dni, $_nom, $_cognom, $_edat ,$_foto, $_email, $_password);
        if ($result) {
            echo "Usuario creado correctamente";
            header('Location: index.php?controller=Login&action=mostrarLoginUser');
            die();
        } else {
            echo "Error al crear al usuario";
        }
        
    }

    public function mostrarSignupUser()
    {
        require "views/loginSignupUser/formularioSignup.php";
    }

    public function mostrarLoginUser()
    {
        require "views/loginSignupUser/formularioLogin.php";
    }

    public function destroySesion()
    {
        session_destroy();
        echo "<p>Cerrando sesion...</p>";
        echo "<META HTTP-EQUIV='REFRESH' CONTENT='1;URL=index.php'>";
    }

}
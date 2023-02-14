<?php
require_once("database.php");
class Admin extends Database
{

    public function login($email, $password)
    {
        $consulta = $this->db->prepare("SELECT * FROM admins WHERE email LIKE '$email' and password LIKE '$password'");
        $consulta->execute();
        if ($consulta->fetch(PDO::FETCH_OBJ)) {
            return true;
        } else {
            return false;
        }
    }
}

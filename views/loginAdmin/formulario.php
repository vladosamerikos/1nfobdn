<?php
?>
<img class="logo" src="img/logo.svg" alt="">
<form class='form' action='index.php?controller=Login&action=loginAdmin' method='post'>
    <h1> Inici de sessió admin</h1>
    <p><input type='email' name='email' id='email' placeholder="Correu electronic" require></p>
    <p><input type='password' name='password' id='password' placeholder="Password" require></p>
    <p class='butons_line'><a class='doble_button' href="index.php?controller=Login&action=mostrarLoginUser">No soc admin</a><button class="doble_button" type='submit'>Iniciar sessió</button></p>
</form>
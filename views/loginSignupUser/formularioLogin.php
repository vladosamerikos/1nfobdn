<?php
?>
<img class="logo" src="img/logo.svg" alt="">
<form class="form" action='index.php?controller=Login&action=loginUser' method='post'>
    <h1> Inici de sessió</h1>
    <p><input type='email' name='email' id='email' placeholder="Correu electronic" required></p>
    <p><input type='password' name='password' id='password' placeholder="Password" required></p>
    <p><input checked type="radio" id="alum" name="usu" value="alum">Alumne <input type="radio" id="prof" name="usu" value="prof">Professor</p>
    <p><a class='doble_button' href="index.php?controller=Login&action=mostrarSignupUser">Crear compte</a><button class="doble_button" type='submit'>Iniciar sessió</button></p>
    <a class="custom_link" href="index.php?controller=Login&action=mostrarLoginAdmin">Manteniment</a>
</form>
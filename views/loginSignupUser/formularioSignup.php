<?php
        echo "<form class='mig_form form' action='index.php?controller=Login&action=signupUser' ENCTYPE='multipart/form-data' method='post'>
        <h1> Crear compte</h1>
        <p>Nom: <input placeholder='Nom' type='text' name='nom' id='nom' pattern='[A-Za-z]+' required></p>
        <p>Cognom: <input placeholder='Cognom' type='text' name='cognom' pattern='[A-Za-z]+' id='cognom' required></p>
        <p>Edad: <input placeholder='Edad' type='number' min='0' name='edat' id='edat' required></p>
        <p>DNI: <input placeholder='DNI' type='text' name='dni' id='dni'required pattern='(([X-Z]{1})([-]?)(\d{7})([-]?)([A-Z]{1}))|((\d{8})([-]?)([A-Z]{1}))'  maxlength='9'></p>
        <p>Email: <input placeholder='Correu electronic' type='email' name='email' id='email' required></p>
        <p>Foto: <input type='file' name='foto' id='foto' accept='image/*' required></p>
        <p>Password: <input placeholder='Password' type='password' name='password' id='password'required></p>
        <p><a class='doble_button' href='index.php?controller=Login&action=mostrarLoginUser'>Iniciar sessió</a><button class='doble_button' type='submit'>Crear compte</button></p>   
    </form>";

?>
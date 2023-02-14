<?php
echo "<form class='form big_form' action='index.php?controller=Admin&action=crearProfessors' ENCTYPE='multipart/form-data' method='post'>
    <h1> Crear professor </h1>
    <p>DNI<input type='text' name='dni' id='dni' maxlength='9' pattern='(([X-Z]{1})([-]?)(\d{7})([-]?)([A-Z]{1}))|((\d{8})([-]?)([A-Z]{1}))' required></p>
    <p>Nom<input type='text' name='nom' id='nom' pattern='[A-Za-z]+' required></p>
    <p>Cognoms<input type='text' name='cognoms' id='cognoms' pattern='[A-Za-z]+' required></p>
    <p>Edad: <input type='number' min='0' name='edat' id='edat' required></p>
    <p>Titol academic<input type='text' name='titol' id='titol' pattern='[A-Za-z0-9]+' required></p>
    <p>Foto<input type='file' name='foto' id='foto' accept='image/*' required></p>
    <p>Correu electronic<input type='email' name='correu' id='correu' required></p>
    <p>Contrasenya<input type='password' name='password' id='password' required></p>
    <p><button class='submit_button' type='submit'>Crear</button></p>      
</form>";

?>
<?php
echo "<form class='big_form form' action='index.php?controller=Admin&action=editarProfessor' ENCTYPE='multipart/form-data' method='post'>
    <h1> Modificar professor </h1>
    <p>DNI<input type='text' name='dni' id='dni' value='" . $prof[0]['dni'] . "' readonly></p>
    <p>Nom<input required type='text' name='nom' id='nom' value='" . $prof[0]['nom'] . "'></p>
    <p>Cognoms<input required type='text' name='cognoms' id='cognoms' value='" . $prof[0]['cognoms'] . "'></p>
    <p>Edat<input required type='number' name='edat' id='edat' max='100' min='18' value='" . $prof[0]['edat'] . "'></p>
    <p>Titol academic<input required type='text' name='titol' id='titol' value='" . $prof[0]['titolAcademic'] . "'></p>
    <p>Correu electronic<input required type='email' name='correu' id='correu' value='" . $prof[0]['email'] . "'></p>
    <p>Contrasenya<input required type='password' name='password' id='password'></p>
    <p><button class='submit_button' type='submit'>Modificar</button></p>    
</form>";

?>
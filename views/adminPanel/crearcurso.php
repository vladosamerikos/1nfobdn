<?php
echo "<form class='big_form form'  ENCTYPE='multipart/form-data' action='index.php?controller=Admin&action=crearCurso' method='post'>
    <h1> Crear curs </h1>
    <p>Foto<input required type='file' name='foto' id='foto' accept='image/*'></p>
    <p>Codi<input required type='number' min='0' name='codi' id='codi'></p>
    <p>Nom<input required type='text' pattern='[A-Za-z0-9]+' name='nom' id='nom'></p>
    <p>Descripció<input required type='text' name='descrip' id='descrip'></p>
    <p>Hores que durará<input required type='number' min='0' name='hdurara' id='hdurara'></p>
    <p>Data d'inici<input required type='date' onclick='validarFechaIncial()' min='" . $fechaActual . "' name='dinici' id='dinici'></p>
    <p>Data de final<input required type='date' onclick='validarFechaFinal()' name='dfinal' id='dfinal'></p>
    <p>Professor que imparteix<select required name='dniprof' id='dniprof'>";
    foreach ($professors as $professor){
    ?>
    <option value="<?php echo $professor['dni'] ?>"><?php echo $professor['dni'] . " - " . $professor['nom'] . " " . $professor['cognoms'] ?></option>
    <?php
    }
    echo "</select></p>";
    echo "<p><button class='submit_button' type='submit'>Crear</button></p>";
echo "</form>";

?>
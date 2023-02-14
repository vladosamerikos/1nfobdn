<?php
    echo "<form class='big_form form' action='index.php?controller=Admin&action=editarCurso' method='post'>
        <h1> Modificar curs </h1>
        <p>Codi<input type='text' name='codi' id='codi' value='" . $curs[0]['codi'] . "' readonly></p>
        <p>Nom<input type='text' name='nom' id='nom' value='" . $curs[0]['nom'] . "'></p>
        <p>Descripció<input type='text' name='descrip' id='descrip' value='" . $curs[0]['descripcio'] . "'></p>
        <p>Hores que durará<input type='number' name='hdurara' id='hdurara' value='" . $curs[0]['horresDurara'] . "'></p>
        <p>Data d'inici<input type='date' name='dinici' onclick='validarFechaIncial()' id='dinici' value='" . $curs[0]['dataInici'] . "'></p>
        <p>Data de final<input type='date' name='dfinal' onclick='validarFechaFinal()' id='dfinal' value='" . $curs[0]['dataFinal'] . "'></p>
        <p>Professor que imparteix<select name='dniprof' id='dniprof'>";
        foreach ($professors as $professor){
            if ($professor['dni'] == $curs[0]['dniProf']) {
            ?>
                <option selected value="<?php echo $professor['dni'] ?>"><?php echo $professor['dni'] . " - " . $professor['nom'] . " " . $professor['cognoms'] ?></option>
            <?php
            } else {
            ?>
                <option value="<?php echo $professor['dni'] ?>"><?php echo $professor['dni'] . " - " . $professor['nom'] . " " . $professor['cognoms'] ?></option>
            <?php
            }
        }
        echo "</select></p>
        <p><button class='submit_button' type='submit'>Modificar</button></p>
    </form>";

?>
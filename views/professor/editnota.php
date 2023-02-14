<?php 
echo "<form class='form'  action='index.php?controller=User&action=editNotaAlumn' method='post'>
                    <h1>Modificar nota alumne </h1>
                    <p><img class='profile_foto' src='" . $alumne[0]['foto'] . "'></p>
                    <p>" . $alumne[0]['nomAlum'] . " " . $alumne[0]['cognoms'] . "</p>
                    <input readonly class='ocult' type='text' name='dni' id='dni' value='" . $alumne[0]['dni'] . "'>
                    <input readonly class='ocult' type='text' name='codi' id='codi' value='" . $alumne[0]['codi'] . "'>
                    <p>Curs: <input readonly type='text' name='curs' id='curs' value='" . $alumne[0]['nomCurs'] . "'></p>
                    <p>Nota: <input min='0' max='10' type='number' name='nota' id='nota' value='" . $alumne[0]['nota'] . "'></p>
                    <p><button class='submit_button' type='submit'>Modificar</button></p>     
                    </form>";
?>
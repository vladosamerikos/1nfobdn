<?php
echo "<form class='form' action='index.php?controller=Admin&action=editarFotoCurso' ENCTYPE='multipart/form-data' method='post'>
                    <h1> Modificar foto curs </h1>
                    <p><img with='150px' height='150px' src='".$curs[0]['foto']."' alt='No té foto'></p>
                    <input readonly class='ocult' type='text' name='codi' id='codi' value='".$curs[0]['codi']."'>
                    <input readonly class='ocult' type='text' name='oldfoto' id='oldfoto' value='".$curs[0]['foto']."'>
                    <p><input required type='file' name='foto' id='foto' accept='image/*'></p>
                    <p><button class='submit_button' type='submit' >Modificar</button></p>  
                </form>";

?>
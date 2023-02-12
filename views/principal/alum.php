<?php 
echo "<h1 class='pageTitles'>Curosos recents</h1>";
        echo "<div class='cursos_panel'>";
        foreach($cursos as $curs){
            echo "<div class='curs'>
                    <div class='leftcolumn'>
                        <img class='cursLogo' src='" . $curs['foto'] . "'>
                    </div>
                    <div class='rightcolumn'>
                        <h4 class='cursTitle'>" . $curs['nom'] . "</h4>
                        <p class='cursDescription'>" . $curs['descripcio'] . "</p>
                        <div class='cursbottomline'><img class='timeIcon' src='./img/time.svg'><p>" . $curs['horres_durara'] . "h</p><a class='altaButton' href='matricular.php?codi=" . $curs['codi'] . "'>Inscriure</a></div>
                    </div>
                </div>";
        }
        echo "</div>";
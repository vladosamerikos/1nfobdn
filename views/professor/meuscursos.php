<?php
foreach($cursos as $curso){
    echo "<div class='cursDisponible'>
    <div class='leftContent'>
        <img src='" . $curs['foto'] . "'>
    </div>
    <div class='rightContent'>
        <div class=' cursDispTitle'>" . $curs['nom'] . "</div>
        <div class='cursDispRow cursDispDescrip'>" . $curs['descripcio'] . "</div>
        <div class='cursDispRow'><img class='cursIcon' src='img/alumne.svg'> " . $numalumnes . "</div>
        <div class='cursDispRow'><div class='cursDispData'><img class='cursIcon dateIcon' src='img/data.svg'>" . $curs['dataInici'] . "&nbsp<img class='cursIcon dateIcon' src='img/enddate.svg'>" . $curs['dataFinal'] . "</div><div class='cursDispTime'> <img class='cursIcon' src='./img/time.svg'>" . $curs['horresDurara'] . "</div></div>
        <div class='cursDispRow buttonContainer'><a class='matricularButon' href='llistatalumnescurs_prof.php?codi=" . $curs['codi'] . "&nomcurs=" . $curs['nom'] . "'>Llistar alumnes</a></div>
    </div>
    </div>";
}

?>
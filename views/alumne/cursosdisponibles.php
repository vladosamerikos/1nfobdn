<?php
    echo "<h1 class='pageTitles'>Cursos disponibles</h1>";

    echo "<div class='search_bar'>
        <img class='search_img' src='img/search.svg' alt='lupa de busqueda'>
        <form class='search_form' action='index.php?controller=User&action=buscarCursosDisponiblesAlum' method='post'>
            <input type='text' name='search' id='search' placeholder='Introdueix el nom del curs.'>
            <button type='submit'>Buscar</button>
        </form>
    </div>";

foreach ($cursos as $curs){
    echo "<div class='cursDisponible'>
        <div class='leftContent'>
            <img src='" . $curs['fotoCurs'] . "'>
        </div>
        <div class='rightContent'>
            <div class=' cursDispTitle'>" . $curs['nomCurs'] . "</div>
            <div class='cursDispRow cursDispDescrip'>" . $curs['descripcio'] . "</div>
            <div class='cursDispRow'><img class='cursIcon' src='img/teacher.svg'> &nbsp " . $curs['nomProf'] . " " . $curs['cognoms'] . "</div>
            <div class='cursDispRow'><div class='cursDispData'><img class='cursIcon' src='img/data.svg'> &nbsp " . $curs['dataInici'] . "</div><div class='cursDispTime'> <img class='cursIcon' src='./img/time.svg'>" . $curs['horresDurara'] . "</div></div>
            <div class='cursDispRow buttonContainer'><a class='matricularButon' href='index.php?controller=User&action=matricularCursAlum&codi=" . $curs['codi'] . "'>Matricular</a></div>
        </div>
    </div>";
}
?>
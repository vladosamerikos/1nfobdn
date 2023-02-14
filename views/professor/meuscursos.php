<?php
echo "<h1 class='pageTitles'>Meus cursos</h1>";
echo "<div class='search_bar'>
            <img class='search_img' src='img/search.svg' alt='lupa de busqueda'>
            <form class='search_form' action='index.php?controller=User&action=buscarCursosProf' method='post'>
                <input type='text' name='search' id='search' placeholder='Introdueix el nom del curs.'>
                <button type='submit'>Buscar</button>
            </form>
        </div>";
foreach($cursos as $curs){
    echo "<div class='cursDisponible'>
    <div class='leftContent'>
        <img src='" . $curs['foto'] . "'>
    </div>
    <div class='rightContent'>
        <div class=' cursDispTitle'>" . $curs['nom'] . "</div>
        <div class='cursDispRow cursDispDescrip'>" . $curs['descripcio'] . "</div>
        <div class='cursDispRow'><img class='cursIcon' src='img/alumne.svg'> </div>
        <div class='cursDispRow'><div class='cursDispData'><img class='cursIcon dateIcon' src='img/data.svg'>" . $curs['dataInici'] . "&nbsp<img class='cursIcon dateIcon' src='img/enddate.svg'>" . $curs['dataFinal'] . "</div><div class='cursDispTime'> <img class='cursIcon' src='./img/time.svg'>" . $curs['horresDurara'] . "</div></div>
        <div class='cursDispRow buttonContainer'><a class='matricularButon' href='index.php?controller=User&action=mostrarAlumnosCurso&codi=" . $curs['codi'] . "&nomcurs=" . $curs['nom'] . "'>Llistar alumnes</a></div>
    </div>
</div>";
}

?>
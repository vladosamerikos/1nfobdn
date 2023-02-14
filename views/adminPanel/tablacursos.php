<?php
    echo "<a class='createnew_link' href='index.php?controller=Admin&action=mostrarCrearCurso'>Donar d'alta curs nou</a>";
    echo "<div class='search_bar'>
            <img class='search_img' src='img/search.svg' alt='lupa de busqueda'>
            <form class='search_form' action='index.php?controller=Admin&action=buscarAdministrarCursos' method='post'>
                <input type='text' name='search' id='search' placeholder='Introdueix el nom del curs.'>
                <button type='submit'>Buscar</button>
            </form>
        </div>";
    echo "<table>
        <tr>
            <th>Codi</th>
            <th>Foto</th>
            <th>Nom</th>
            <th>Descripció</th>
            <th>Hores durara</th>
            <th>Data inici</th>
            <th>Data final</th>
            <th>DNI professor</th>
            <th>Actiu</th>
            <th></th>
            <th></th>
            <th></th>
            <th></th>
        </tr>";
    foreach($cursos as $curs){
        echo "<tr>
            <td>" . $curs['codi'] . "</td>
            <td><img class='profile_foto' src='" . $curs['foto'] . "'></td>
            <td>" . $curs['nom'] . "</td>
            <td>" . $curs['descripcio'] . "</td>
            <td>" . $curs['horresDurara'] . "</td>
            <td>" . $curs['dataInici'] . "</td>
            <td>" . $curs['dataFinal'] . "</td>
            <td>" . $curs['dniProf'] . "</td>
            <td>" . $curs['actiu'] . "</td>
            <td><a href='index.php?controller=Admin&action=mostrarEditarCurso&codi=" . $curs['codi'] . "'><img class='link_img' src='img/edit.svg' alt='editar'></a></td>
            <td><a href='index.php?controller=Admin&action=eliminarCurso&codi=" . $curs['codi'] . "'><img class='link_img' src='img/delete.svg' alt='eliminar'></a></td>";
            if ($curs['actiu'] != "si") {
                echo "<td><a href='index.php?controller=Admin&action=activarCurso&codi=" . $curs['codi'] . "&opc=act'><img class='link_img' src='img/act.svg' alt='activar'></a></td>";
            } else {
                echo "<td><a href='index.php?controller=Admin&action=desactivarCurso&codi=" . $curs['codi'] . "&opc=desact'><img class='link_img' src='img/desact.svg' alt='desactivar'></a></td>";
            }
            echo "<td><a href='index.php?controller=Admin&action=mostrarEditarFotoCurso&codi=" . $curs['codi'] . "&foto=" . $curs['foto'] . "'><img class='link_img' src='img/editphoto.svg' alt='editar foto'></a></td>";
        echo "</tr>";
    }

    
    echo "</table>";

?>
<?php
echo "<a class='createnew_link' href='index.php?controller=Admin&action=mostrarCrearProfessors'>Donar d'alta professor nou</a>";
echo "<div class='search_bar'>
<img class='search_img' src='img/search.svg' alt='lupa de busqueda'>
<form class='search_form' action='index.php?controller=Admin&action=buscarAdministrarProfessors' method='post'>
    <input type='text' name='search' id='search' placeholder='Introdueix el nom del professor.'>
    <button type='submit'>Buscar</button>
</form>
</div>";
echo "<table>
        <tr>
            <th>DNI</th>
            <th>Nom</th>
            <th>Cognoms</th>
            <th>Edat</th>
            <th>Titol acadèmic</th>
            <th>Foto</th>
            <th>Correu electronic</th>
            <th>Actiu</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>";
   foreach($professors as $prof){
        echo "<tr>
                <td>" . $prof['dni'] . "</td>
                <td>" . $prof['nom'] . "</td>
                <td>" . $prof['cognoms'] . "</td>
                <td>" . $prof['edat'] . "</td>
                <td>" . $prof['titolAcademic'] . "</td>
                <td><img class='profile_foto' src='" . $prof['foto'] . "'alt='foto'></td>
                <td>" . $prof['email'] . "</td>
                <td>" . $prof['actiu'] . "</td>
                <td><a href='index.php?controller=Admin&action=mostrarEditarProfessor&dni=" . $prof['dni'] . "'><img class='link_img' src='img/edit.svg' alt='editar'></a></td>
                <td><a href='index.php?controller=Admin&action=eliminarProfessor&dni=" . $prof['dni'] . "&foto=" . $prof['foto'] . "'><img class='link_img' src='img/delete.svg' alt='eliminar'></a></td>";
        if ($prof['actiu'] != "si") {
            echo "<td><a href='index.php?controller=Admin&action=activarProfessor&dni=" . $prof['dni'] . "&opc=act'><img class='link_img' src='img/act.svg' alt='activar'></a></td>";
        } else {
            echo "<td><a href='index.php?controller=Admin&action=desactivarProfessor&dni=" . $prof['dni'] . "&opc=desact'><img class='link_img' src='img/desact.svg' alt='desactivar'></a></td>";
        }
        echo "</tr>";
    }
echo "</table>";

?>
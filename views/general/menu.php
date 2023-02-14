<?php

    if (isset($_SESSION['email'])) {
        if (isset($_SESSION['email']) && $_SESSION['role']=='alum')
        {
        ?>
            <div class="menu_bar">
                <a href="index.php?controller=User&action=mostrarPrincipalAlum"><img class="logo_menu" src="img/transparent_logo.svg" alt=""></a>
                <!-- <div class='menuWelcomeMsg'>
                    Estàs loguejat com alumne <?php echo  $_SESSION['nom'] . " " . $_SESSION['cognoms'] ?>
                </div> -->
                <ul class="menu_list">
                    <li><a href="index.php?controller=User&action=mostrarCursosDisponiblesAlum">Cursos disponibles</a></li>
                    <li><a href="index.php?controller=User&action=mostrarCursosAlum">Meus cursos</a></li>
                    <li><a href="index.php?controller=User&action=mostrarNotasAlum">Notes</a></li>
                    <li><a href="index.php?controller=User&action=mostrarMiPerfil"><img class='menuicon' src="./img/profile.svg" alt="Perfil"></a></li>
                    <li><a href="index.php?controller=Login&action=destroySesion"><img class='menuicon' src="./img/sessionclose.svg" alt="Tancar sessió"></a></li>
                </ul>
            </div>
        <?php
        }
        if (isset($_SESSION['email']) && $_SESSION['role']=='prof')
        {
        ?>
            <div class="menu_bar">
                <a href="index.php?controller=User&action=mostrarPrincipalProf"><img class="logo_menu" src="img/transparent_logo.svg" alt=""></a>
                <!-- <div class='menuWelcomeMsg'>
                    Estàs loguejat com a professor <?php echo  $_SESSION['nom'] . " " . $_SESSION['cognoms'] ?>
                </div> -->
                <ul class="menu_list">
                    <li><a href="index.php?controller=User&action=mostrarCursosProf">Cursos</a></li>
                    <li><a href="index.php?controller=User&action=mostrarMiPerfil"><img class='menuicon' src="./img/profile.svg" alt="Perfil"></a></li>
                    <li><a href="index.php?controller=Login&action=destroySesion"><img class='menuicon' src="./img/sessionclose.svg" alt="Tancar sessió"></a></li>
                </ul>
            </div>
        <?php
        }
        if (isset($_SESSION['email']) && $_SESSION['role']=='admin')
        {
        ?>
            <div class="menu_bar">
                <a href="index.php?controller=Admin&action=mostrarPrincipalAdmin"><img class="logo_menu" src="img/transparent_logo.svg" alt=""></a>
                <!-- <div class='menuWelcomeMsg'>
                    Estàs loguejat com a administrador <?php echo  $_SESSION['email'] ?>
                </div> -->
                <ul class="menu_list">
                    <li><a href="index.php?controller=Admin&action=mostrarAdministrarCursos">Cursos</a></li>
                    <li><a href="index.php?controller=Admin&action=">Professors</a></li>
                    <li><a href="index.php?controller=Login&action=destroySesion"><img class='menuicon' src="./img/sessionclose.svg" alt="Tancar sessió"></a></li>
                </ul>
            </div>
        <?php
        }
}
?>
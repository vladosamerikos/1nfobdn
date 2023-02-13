<?php

    if (isset($_SESSION['email'])) {
        if (isset($_SESSION['email']) && $_SESSION['role']=='alum')
        {
        ?>
            <div class="menu_bar">
                <a href="main_alu.php"><img class="logo_menu" src="img/transparent_logo.svg" alt=""></a>
                <div class='menuWelcomeMsg'>
                    Estàs loguejat com alumne <?php echo  $_SESSION['nom'] . " " . $_SESSION['cognoms'] ?>
                </div>
                <ul class="menu_list">
                    <li><a href="./llistatcursos_alu.php">Cursos disponibles</a></li>
                    <li><a href="./micursos_alu.php">Meus cursos</a></li>
                    <li><a href="./minotes_alu.php">Notes</a></li>
                    <li><a href="./meu_perfil.php"><img class='menuicon' src="./img/profile.svg" alt="Perfil"></a></li>
                    <li><a href="index.php?controller=Login&action=destroySesion"><img class='menuicon' src="./img/sessionclose.svg" alt="Tancar sessió"></a></li>
                </ul>
            </div>
        <?php
        }
        if (isset($_SESSION['email']) && $_SESSION['role']=='prof')
        {
        ?>
            <div class="menu_bar">
                <a href="main_prof.php"><img class="logo_menu" src="img/transparent_logo.svg" alt=""></a>
                <div class='menuWelcomeMsg'>
                    Estàs loguejat com a professor <?php echo  $_SESSION['nom'] . " " . $_SESSION['cognoms'] ?>
                </div>
                <ul class="menu_list">
                    <li><a href="./cursos_prof.php">Cursos Actius</a></li>
                    <li><a href="./alumnes_prof.php">Alumnes</a></li>
                    <li><a href="./notes_prof.php">Notes</a></li>
                    <li><a href="./meu_perfil.php"><img class='menuicon' src="./img/profile.svg" alt="Perfil"></a></li>
                    <li><a href="index.php?controller=Login&action=destroySesion"><img class='menuicon' src="./img/sessionclose.svg" alt="Tancar sessió"></a></li>
                </ul>
            </div>
        <?php
        }
        if (isset($_SESSION['email']) && $_SESSION['role']=='admin')
        {
        ?>
            <div class="menu_bar">
                <a href="main_admin.php"><img class="logo_menu" src="img/transparent_logo.svg" alt=""></a>
                <div class='menuWelcomeMsg'>
                    Estàs loguejat com a administrador <?php echo  $_SESSION['email'] ?>
                </div>
                <ul class="menu_list">
                    <li><a href="./cursos_admin.php">Cursos</a></li>
                    <li><a href="./profs_admin.php">Professors</a></li>
                    <li><a href="index.php?controller=Login&action=destroySesion"><img class='menuicon' src="./img/sessionclose.svg" alt="Tancar sessió"></a></li>
                </ul>
            </div>
        <?php
        }
}
?>
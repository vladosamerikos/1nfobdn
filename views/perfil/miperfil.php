<?php
echo "<h1 class='pageTitles'>Meu Perfil</h1>
        <div class='profileContent'>
            <div class='profilePhoto'>
                <img class='roundProfilePhoto' src='".$perfil[0]['foto']."'>
                <p class='profileName'>" . $perfil[0]['nom'] . " " . $perfil[0]['cognoms'] . "</p>
            </div>
            <div class='profileInfo'>
                <div class='profileRow'>
                    <div class='rowTitle'>Nom Complet</div><div class='rowContent'>" . $perfil[0]['nom'] . " " . $perfil[0]['cognoms'] . "</div>
                </div>
                <hr>
                <div class='profileRow'>
                    <div class='rowTitle'>Correu Electronic</div><div class='rowContent'>" . $perfil[0]['email'] . "</div>
                </div>
                <hr>
                <div class='profileRow'>
                    <div class='rowTitle'>DNI</div><div class='rowContent'>" . $perfil[0]['dni'] . "</div>
                </div>
                <hr>
                <div class='profileRow'>
                    <div class='rowTitle'>Edat</div><div class='rowContent'>" . $perfil[0]['edat'] . "</div>
                </div>
            <div>
</div>";

?>
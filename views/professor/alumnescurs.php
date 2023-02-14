<?php
    echo "<h1 class='pageTitles'>Alumnes Curs " . $nomcurs . "</h1><br><br>";
foreach ($alumnes as $alumne){
    echo "<div class='cursDisponible'>
                    <div class='leftContent'>
                        <img src='" . $alumne['foto'] . "'>
                    </div>
                    <div class='rightContent'>
                        <div class='cursDispTitle'>" . $alumne['nom'] . " " . $alumne['cognoms'] . "</div>
                        <div class='cursDispRow'><img class='cursIcon' src='img/age.png'> &nbsp" . $alumne['edat'] . "  </div>
                        <div class='cursDispRow'><img class='cursIcon' src='img/email.svg'> &nbsp" . $alumne['email'] . "  </div>
                        <div class='cursDispRow'><img class='cursIcon' src='img/dni.png'> &nbsp" . $alumne['dni'] . "  </div>
                        <div class='cursDispRow'><img class='cursIcon' src='img/nota.svg'> &nbsp".$alumne['nota']."&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href='index.php?controller=User&action=mostrarEditNotaAlumn&dni=" . $alumne['dni'] . "&codi=" . $alumne['codiCurs'] . "'><img class='cursIcon' src='img/editnota.svg'></a></div>
                    </div>
                </div>";
}
?>
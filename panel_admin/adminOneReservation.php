<?php

    ob_start();
?>

<div class="row">
    <div class="col">
        <p class="fs-3">Email : <?=$reservation->getUserEmail();?></p>
        <p class="fs-3">Téléphone : <?=$reservation->getUserPhone();?></p>
        <p class="fs-3">Heure : <?=$reservation->getReservationTime();?></p>
        <p class="fs-3">Nombre de couverts : <?=$reservation->getNumberGuests();?></p>
        <p class="fs-3">Allergies : <?=$reservation->getAllergiesList();?></p>
        <p class="fs-3">Statut : <?=$reservation->getStatut();?></p>
    </div>
</div>


<?php
$titre = $reservation->getUserName();
$content = ob_get_clean();
require_once 'adminTemplate.php';

?>
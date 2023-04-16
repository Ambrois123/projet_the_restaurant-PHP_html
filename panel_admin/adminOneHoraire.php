<?php

    ob_start();
?>
<div class="row">
    <div class="col">
        <p class="fs-3">Horaire d'ouverture: <?= $hour->getOpeningTime() ?></p>
        <p class="fs-3">Horaire de fermeture : <?= $hour->getClosingTime() ?></p>
        <p class="fs-3">Capacité : <?= $hour->getMaxCapacity() ?></p>
    </div>
</div>

<?php
$titre = $hour->getDayOfWeek();
$content = ob_get_clean();
require_once 'adminTemplate.php';

?>
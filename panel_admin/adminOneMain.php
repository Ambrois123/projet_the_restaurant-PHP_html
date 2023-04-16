<?php

    ob_start();
?>

<div class="row">
    <div class="col">
        <p class="fs-3">Composition: <?= $main->getPlatDescription() ?></p>
        <p class="fs-3">Prix : <?= $main->getPlatPrice() ?> €</p>
        <p class="fs-3">Id : <?= $main->getPlatId() ?></p>
    </div>
</div>

<?php
$titre = $main->getPlatName();
$content = ob_get_clean();
require_once 'adminTemplate.php';

?>
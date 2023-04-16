<?php

    ob_start();
?>

<div class="row">
    <div class="col">
        <p class="fs-3">Composition: <?= $entree->getEntreeDescription() ?></p>
        <p class="fs-3">Prix : <?= $entree->getEntreePrice() ?> €</p>
        <p class="fs-3">Id : <?= $entree->getEntreeId() ?></p>
    </div>
</div>

<?php
$titre = $entree->getEntreeName();
$content = ob_get_clean();
require_once 'adminTemplate.php';

?>
<?php

    ob_start();
?>

<div class="row">
    <div class="col">
        <p class="fs-3">Composition: <?= $boisson->getBoissonDescription() ?></p>
        <p class="fs-3">Prix : <?= $boisson->getBoissonPrice() ?> €</p>
        <p class="fs-3">Id : <?= $boisson->getBoissonId() ?></p>
    </div>
</div>

<?php
$titre = $boisson->getBoissonName();
$content = ob_get_clean();
require_once 'adminTemplate.php';

?>
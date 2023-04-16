<?php

    ob_start();
?>

<div class="row">
    <div class="col">
        <p class="fs-3">Composition: <?= $dessert->getDessertDescription() ?></p>
        <p class="fs-3">Prix : <?= $dessert->getDessertPrice() ?> €</p>
        <p class="fs-3">Id : <?= $dessert->getDessertId() ?></p>
    </div>
</div>

<?php
$titre = $dessert->getDessertName();
$content = ob_get_clean();
require_once 'adminTemplate.php';

?>
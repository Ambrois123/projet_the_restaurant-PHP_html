<?php

    ob_start();
?>

<div class="row">
    <div class="col">
        <img src="<?= URL ?>public/images/<?= $meal->getMealsImage() ?>" alt="" >
    </div>
    <div class="col">
        <p class="fs-3">Description : <?= $meal->getMealsDescription() ?></p>
        <p class="fs-3">Prix : <?= $meal->getMealsPrice() ?> €</p>
        <p class="fs-3">Id : <?= $meal->getMealsId() ?></p>
    </div>
</div>

<?php
$titre = $meal->getMealsTitle();
$content = ob_get_clean();
require_once 'adminTemplate.php';

?>
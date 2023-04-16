<?php

    ob_start();
?>

<div class="row">
    <div class="col">
        <p class="fs-3">Choix entrée: <?= $menu->getChoixEntree() ?></p>
        <p class="fs-3">Choix plat1 : <?= $menu->getChoixPlat1() ?> €</p>
        <p class="fs-3">Choix plat2 : <?= $menu->getChoixPlat2() ?> €</p>
        <p class="fs-3">Prix : <?= $menu->getMenuPrice() ?> €</p>
        <p class="fs-3">Id : <?= $menu->getMenuId() ?></p>
    </div>
</div>

<?php
$titre = $menu->getMenuName();
$content = ob_get_clean();
require_once 'adminTemplate.php';

?>
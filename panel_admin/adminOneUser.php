<?php

    ob_start();
?>

<div class="row">
    <div class="col">
        <p class="fs-3">Email : <?= $user->getUserEmail(); ?></p>
        <p class="fs-3">Role : <?= $user->getUserRole(); ?></p>
        <p class="fs-3">Téléphone : <?= $user->getUserPhone();?></p>
        <p class="fs-3">Id du client : <?= $user->getUserId(); ?></p>
    </div>
</div>

<?php
$titre = $user->getUserName();
$content = ob_get_clean();
require_once 'adminTemplate.php';

?>
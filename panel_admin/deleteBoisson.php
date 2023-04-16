<?php 

require_once '../model/Boisson.php';
require_once '../model/BoissonModel.php';
$boissonModel = new BoissonModel();



$boissons = $boissonModel->getBoissons();

?>

<p><?= $boissons[5]->getBoissonId() ?></p>

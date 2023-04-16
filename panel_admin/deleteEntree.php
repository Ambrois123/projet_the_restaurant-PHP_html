<?php 

require_once '../model/Entree.php';
require_once '../model/EntreeModel.php';
$entreeModel = new EntreeModel();


$entrees = $entreeModel->getEntrees();

?>

<p><?= $entrees[5]->getEntreeId() ?></p>

<?php 

require_once '../model/Main.php';
require_once '../model/MainModel.php';
$mainModel = new MainModel();



$mains = $mainModel->getMains();

?>

<p><?= $mains[5]->getPlatId() ?></p>

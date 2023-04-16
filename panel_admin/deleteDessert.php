<?php 

require_once '../model/Dessert.php';
require_once '../model/DessertModel.php';
$dessertModel = new DessertModel();



$desserts = $dessertModel->getDesserts();

?>

<p><?= $desserts[5]->getDessertId() ?></p>

<?php 

require_once '../model/Plat.php';
require_once '../model/PlatModel.php';
$platModel = new PlatModel();

$meals = $platModel->getMeals();

?>

<p><?= $meals[5]->getMealsId() ?></p>

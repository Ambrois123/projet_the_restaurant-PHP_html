<?php

ob_start();
?>

<main class="container">
    <form action="<?=URL?>/admin/plat/validate_update" method="post" enctype="multipart/form-data">
    <div class="row g-3">
  <div class="col">
    <label for="title">Nom</label>
    <input type="text" class="form-control" name="title" value="<?= $meal->getMealsTitle(); ?>" >
  </div>
  <div class="col">
  <label for="description">Description</label>
    <input type="text" class="form-control" name="description" value="<?= $meal->getMealsDescription(); ?>"  >
  </div>
  <div class="col">
  <label for="price">Prix</label>
    <input type="number" min="1" class="form-control" name="price" value="<?= $meal->getMealsPrice(); ?>"  >
  </div>
</div>
<div class="row g-3">
    <h3>Image actuelle :</h3>
    <img src="<?=URL?>public/images/<?= $meal->getMealsImage(); ?>" alt="" style="width: 140px;" >
  <label for="image">Modifier l'image </label>
    <input type="file" min="1" class="form-control" name="image" >
  </div>
  <input type="hidden" name="ident" value="<?= $meal->getMealsId(); ?>">
<div class="mt-3" >
    <button type="submit" class="btn btn-primary">Valider</button>
  </div>
    </form>
</main>

<?php
$titre = "Modification du plat : ".$meal->getMealsId();
$content = ob_get_clean();
require_once 'adminTemplate.php';

?>
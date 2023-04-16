<?php

ob_start();
?>

<main class="container">
    <form action="<?=URL?>/admin/dessert/validate_update" method="post" >
    <div class="row g-3">
  <div class="col">
    <label for="title">Nom</label>
    <input type="text" class="form-control" name="title" value="<?= $dessert->getDessertName(); ?>" >
  </div>
  <div class="col">
  <label for="description">Composition</label>
    <input type="text" class="form-control" name="description" value="<?= $dessert->getDessertDescription(); ?>"  >
  </div>
  <div class="col">
  <label for="price">Prix</label>
    <input type="number" min="1" class="form-control" name="price" value="<?= $dessert->getDessertPrice(); ?>" step="any" >
  </div>
</div>
  <input type="hidden" name="ident" value="<?= $dessert->getDessertId(); ?>">
<div class="mt-3" >
    <button type="submit" class="btn btn-primary">Valider</button>
  </div>
    </form>
</main>

<?php
$titre = "Modification d'un dessert' : ".$dessert->getDessertId();
$content = ob_get_clean();
require_once 'adminTemplate.php';

?>
<?php

ob_start();
?>

<main class="container">
    <form action="<?=URL?>/admin/entree/validate_update" method="post" >
    <div class="row g-3">
  <div class="col">
    <label for="title">Nom</label>
    <input type="text" class="form-control" name="title" value="<?= $entree->getEntreeName(); ?>" >
  </div>
  <div class="col">
  <label for="description">Composition</label>
    <input type="text" class="form-control" name="description" value="<?= $entree->getEntreeDescription(); ?>"  >
  </div>
  <div class="col">
  <label for="price">Prix</label>
    <input type="number" min="1" class="form-control" name="price" value="<?= $entree->getEntreePrice(); ?>" step="any" >
  </div>
</div>
  <input type="hidden" name="ident" value="<?= $entree->getEntreeId(); ?>">
<div class="mt-3" >
    <button type="submit" class="btn btn-primary">Valider</button>
  </div>
    </form>
</main>

<?php
$titre = "Modification d'une entrée' : ".$entree->getEntreeId();
$content = ob_get_clean();
require_once 'adminTemplate.php';

?>
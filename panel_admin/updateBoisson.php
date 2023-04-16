<?php

ob_start();
?>

<main class="container">
    <form action="<?=URL?>/admin/boisson/validate_update" method="post" >
    <div class="row g-3">
  <div class="col">
    <label for="title">Nom</label>
    <input type="text" class="form-control" name="title" value="<?= $boisson->getBoissonName(); ?>" >
  </div>
  <div class="col">
  <label for="description">Composition</label>
    <input type="text" class="form-control" name="description" value="<?= $boisson->getBoissonDescription(); ?>"  >
  </div>
  <div class="col">
  <label for="price">Prix</label>
    <input type="number" min="1" class="form-control" name="price" value="<?= $boisson->getBoissonPrice(); ?>" step="any" >
  </div>
</div>
  <input type="hidden" name="ident" value="<?= $boisson->getBoissonId(); ?>">
<div class="mt-3" >
    <button type="submit" class="btn btn-primary">Valider</button>
  </div>
    </form>
</main>

<?php
$titre = "Modification d'une boisson : ".$boisson->getBoissonId();
$content = ob_get_clean();
require_once 'adminTemplate.php';

?>
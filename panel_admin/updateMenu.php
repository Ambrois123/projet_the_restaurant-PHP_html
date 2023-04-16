<?php

ob_start();
?>

<main class="container">
    <form action="<?=URL?>/admin/menu/validate_update" method="post" >
    <div class="row g-3">
  <div class="col">
    <label for="title">Nom</label>
    <input type="text" class="form-control" name="title" value="<?= $menu->getMenuName(); ?>" >
  </div>
  <div class="col">
    <label for="entree">Choix entrée</label>
    <input type="text" class="form-control" name="entree" value="<?= $menu->getChoixEntree(); ?>"  >
  </div>
  <div class="col">
    <label for="plat1">Choix plat1</label>
    <input type="text" class="form-control" name="plat1" value="<?= $menu->getChoixPlat1(); ?>"  >
  </div>
  <div class="col">
    <label for="plat2">Choix plat2</label>
    <input type="text" class="form-control" name="plat2" value="<?= $menu->getChoixPlat2(); ?>"  >
  </div>
  <div class="col">
  <label for="price">Prix</label>
    <input type="number" min="1" class="form-control" name="price" value="<?= $menu->getMenuPrice(); ?>" step="any" >
  </div>
</div>
  <input type="hidden" name="ident" value="<?= $menu->getMenuId(); ?>">
<div class="mt-3" >
    <button type="submit" class="btn btn-primary">Valider</button>
  </div>
    </form>
</main>

<?php
$titre = "Modification d'un menu' : ".$menu->getMenuId();
$content = ob_get_clean();
require_once 'adminTemplate.php';

?>
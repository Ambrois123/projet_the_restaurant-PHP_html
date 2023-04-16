<?php



ob_start();
?>
<main class="container">
    <form action="<?=URL?>/admin/menu/validate" method="post">
    <div class="row g-3">
  <div class="col">
    <label for="title">Nom</label>
    <input type="text" class="form-control" name="title" >
  </div>
  <div class="col">
    <label for="entree">Choix entrée</label>
    <input type="text" class="form-control" name="entree" >
  </div>
  <div class="col">
    <label for="plat1">Choix plat1</label>
    <input type="text" class="form-control" name="plat1" >
  </div>
  <div class="col">
    <label for="plat2">Choix plat2</label>
    <input type="text" class="form-control" name="plat2" >
  </div>
  <div class="col">
  <label for="price">Prix</label>
    <input type="number" min="1" class="form-control" name="price" step="any" >
  </div>
</div>
<div class="mt-3" >
    <button type="submit" class="btn btn-primary">Valider</button>
  </div>
    </form>
</main>


<?php
$titre = "<h1>Ajout d'un menu</h1>";
$content = ob_get_clean();
require_once 'adminTemplate.php';

?>
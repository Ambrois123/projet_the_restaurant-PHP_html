<?php

ob_start();
?>

<main class="container">
    <form action="<?= URL ?>/admin/hours/validate" method="POST">
    <div class="row g-3">
  <div class="col">
    <label for="day">Jour de la semaine</label>
    <input type="text" class="form-control" name="day" >
  </div>
  <div class="col">
  <label for="opening">Heure d'ouverture</label>
    <input type="time" class="form-control" name="opening" >
  </div>
  <div class="col">
  <label for="closing">Heure de fermeture</label>
    <input type="time" min="1" class="form-control" name="closing" >
  </div>
  <div class="col">
  <label for="capacity">Capacité</label>
    <input type="number" min="1" class="form-control" name="capacity" >
  </div>
</div>
<div class="mt-3" >
    <button type="submit" class="btn btn-primary">Valider</button>
  </div>
    </form>
</main>



<?php
$titre = "<h1>Ajout plage horaire</h1>";
$content = ob_get_clean();
require_once 'adminTemplate.php';

?>
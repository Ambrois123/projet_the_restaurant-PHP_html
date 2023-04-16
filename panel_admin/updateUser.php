<?php

ob_start();
?>

<main class="container">
    <form action="<?=URL?>/admin/client/validate_update" method="post" >
    <div class="row g-3">
  <div class="col">
    <label for="name">Nom</label>
    <input type="text" class="form-control" name="name" value="<?=$user->getUserName();?>" >
  </div>
  <div class="col">
    <label for="email">Email</label>
    <input type="email" class="form-control" name="email" value="<?=$user->getUserEmail();?>" >
  </div>
  <div class="col">
  <label for="phone">Téléphone</label>
    <input type="phone" class="form-control" name="phone" value="<?=$user->getUserPhone();?>"  >
  </div>
</div>
  <input type="hidden" name="ident" value="<?= $user->getUserId(); ?>">
<div class="mt-3" >
    <button type="submit" class="btn btn-primary">Valider</button>
  </div>
    </form>
</main>

<?php
$titre = "Modification d'un client' : ".$user->getUserId();
$content = ob_get_clean();
require_once 'adminTemplate.php';

?>
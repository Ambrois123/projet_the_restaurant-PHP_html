<?php

ob_start();

if(!empty($_SESSION['alert'])) :
?>
<div class="alert alert-<?= $_SESSION['alert']['type'] ?>" role="alert">

  <?= $_SESSION['alert']['message'] ?>

</div>
<?php 
unset($_SESSION['alert']);
endif; ?>

<main>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom du plat</th>
      <th scope="col">Description</th>
      <th scope="col">Prix</th>
      <th colspan="2">Action</th>      
    </tr>
  </thead>
  <tbody>
    <?php
    for($i=0; $i < count($boissons);$i++) : 
    ?>
    <tr>
      <th scope="row"><?= $boissons[$i]->getBoissonId() ?></th>
      <td><a href="<?= URL ?>admin/boisson/one/<?= $boissons[$i]->getBoissonId() ?>"><?= $boissons[$i]->getBoissonName(); ?></a></td>
      <td><?= $boissons[$i]->getBoissonDescription() ?></td>
      <td><?= $boissons[$i]->getBoissonPrice() ?></td>
      <td>
        <a href="<?= URL ?>admin/boisson/update/<?=$boissons[$i]->getBoissonId();?>" class="btn btn-warning">Modifier</a>
      </td>
      <td>
        <form action="<?= URL ?>admin/boisson/delete/<?=$boissons[$i]->getBoissonId();?>" method="POST" onsubmit="return confirm ('Voulez-vous vraiment supprimer le plat ?')" >
          <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
      </td>
    </tr>
    <?php endfor; ?>
  </tbody>
</table>
<a href="<?=URL?>admin/boisson/add" class="btn btn-primary d-block" >Ajouter</a>
</main>

<?php
$titre = "<h1>Gestion des boissons</h1>";
$content = ob_get_clean();
require_once 'adminTemplate.php';

?>
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
    for($i=0; $i < count($mains);$i++) : 
    ?>
    <tr>
      <th scope="row"><?= $mains[$i]->getPlatId() ?></th>
      <td><a href="<?= URL ?>admin/plat_principal/one/<?= $mains[$i]->getPlatId() ?>"><?= $mains[$i]->getPlatName(); ?></a></td>
      <td><?= $mains[$i]->getPlatDescription() ?></td>
      <td><?= $mains[$i]->getPlatPrice() ?></td>
      <td>
        <a href="<?= URL ?>admin/plat_principal/update/<?=$mains[$i]->getPlatId();?>" class="btn btn-warning">Modifier</a>
      </td>
      <td>
        <form action="<?= URL ?>admin/plat_principal/delete/<?=$mains[$i]->getPlatId();?>" method="POST" onsubmit="return confirm ('Voulez-vous vraiment supprimer le plat ?')" >
          <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
      </td>
    </tr>
    <?php endfor; ?>
  </tbody>
</table>
<a href="<?=URL?>admin/plat_principal/add" class="btn btn-primary d-block" >Ajouter</a>
</main>

<?php
$titre = "<h1>Gestion des plats</h1>";
$content = ob_get_clean();
require_once 'adminTemplate.php';

?>
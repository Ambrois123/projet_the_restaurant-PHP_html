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
      <th scope="col">Image</th>
      <th colspan="2">Action</th>      
    </tr>
  </thead>
  <tbody>
    <?php
    for($i=0; $i < count($meals);$i++) : 
    ?>
    <tr>
      <th scope="row"><?= $meals[$i]->getMealsId() ?></th>
      <td><a href="<?= URL ?>admin/plat/one/<?= $meals[$i]->getMealsId() ?>"><?= $meals[$i]->getMealsTitle(); ?></a></td>
      <td><?= $meals[$i]->getMealsDescription() ?></td>
      <td><?= $meals[$i]->getMealsPrice() ?></td>
      <td>
        <img src="../public/images/<?= $meals[$i]->getMealsImage() ?>" alt="" width="60px">
      </td>
      <td>
        <a href="<?= URL ?>admin/plat/update/<?=$meals[$i]->getMealsId();?>" class="btn btn-warning">Modifier</a>
      </td>
      <td>
        <form action="<?= URL ?>admin/plat/delete/<?=$meals[$i]->getMealsId();?>" method="POST" onsubmit="return confirm ('Voulez-vous vraiment supprimer le plat ?')" >
          <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
      </td>
    </tr>
    <?php endfor; ?>
  </tbody>
</table>
<a href="<?=URL?>admin/plat/add" class="btn btn-primary d-block" >Ajouter</a>
</main>

<?php
$titre = "<h1>Gestion des plats du chef</h1>";
$content = ob_get_clean();
require_once 'adminTemplate.php';

?>
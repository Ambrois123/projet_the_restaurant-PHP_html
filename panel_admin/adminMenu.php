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
      <th scope="col">Nom</th>
      <th scope="col">Choix entrée</th>
      <th scope="col">Choix plat1</th>
      <th scope="col">Choix plat2</th>
      <th scope="col">Prix</th>
      <th colspan="2">Action</th>      
    </tr>
  </thead>
  <tbody>
    <?php
    for($i=0; $i < count($menus);$i++) : 
    ?>
    <tr>
      <th scope="row"><?= $menus[$i]->getMenuId() ?></th>
      <td><a href="<?= URL ?>admin/menu/one/<?= $menus[$i]->getMenuId() ?>"><?= $menus[$i]->getMenuName(); ?></a></td>
      <td><?= $menus[$i]->getChoixEntree() ?></td>
      <td><?= $menus[$i]->getChoixPlat1() ?></td>
      <td><?= $menus[$i]->getChoixPlat2() ?></td>
      <td><?= $menus[$i]->getMenuPrice() ?></td>
      <td>
        <a href="<?= URL ?>admin/menu/update/<?=$menus[$i]->getMenuId();?>" class="btn btn-warning">Modifier</a>
      </td>
      <td>
        <form action="<?= URL ?>admin/menu/delete/<?=$menus[$i]->getMenuId();?>" method="POST" onsubmit="return confirm ('Voulez-vous vraiment supprimer le plat ?')" >
          <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
      </td>
    </tr>
    <?php endfor; ?>
  </tbody>
</table>
<a href="<?=URL?>admin/menu/add" class="btn btn-primary d-block" >Ajouter</a>
</main>

<?php
$titre = "<h1>Gestion des menus</h1>";
$content = ob_get_clean();
require_once 'adminTemplate.php';

?>
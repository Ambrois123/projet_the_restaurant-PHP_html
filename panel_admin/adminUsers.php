<?php

ob_start();

if(!empty($_SESSION['alert'])) :
?>
<div class="alert alert-<?= $_SESSION['alert']['type'] ?>" >

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
      <th scope="col">Email</th>
      <th scope="col">Téléphone</th>
      <th scope="col">Role</th>
      <th colspan="2">Action</th>      
    </tr>
  </thead>
  <tbody>
    <?php
    for($i=0; $i < count($users);$i++) :
    ?>
    <tr>
      <th scope="row"><?= $users[$i]->getUserId();?></th>
      <td>
        <a href="<?= URL ?>admin/client/one/<?=$users[$i]->getUserId();?>"><?= $users[$i]->getUserName(); ?></a>
      </td>
      <td><?=$users[$i]->getUserEmail();?></td>
      <td><?=$users[$i]->getUserPhone();?></td>
      <td><?=$users[$i]->getUserRole();?></td>
      <td>
        <a href="<?= URL ?>admin/client/update/<?=$users[$i]->getUserId();?>" class="btn btn-warning">Modifier</a>
      </td>
      <td>
        <form action="<?= URL ?>admin/client/delete/<?=$users[$i]->getUserId();?>" method="POST" onsubmit="return confirm ('Voulez-vous vraiment supprimer le client ?')" >
          <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
      </td>
    </tr>
    <?php endfor; ?>
  </tbody>
</table>
</main>

<?php
$titre = "<h1>Gestion des clients</h1>";
$content = ob_get_clean();
require_once 'adminTemplate.php';

?>
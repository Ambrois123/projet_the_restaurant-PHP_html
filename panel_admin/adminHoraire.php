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
      <th scope="col">Jour de la semaine</th>
      <th scope="col">Heure d'ouverture</th>
      <th scope="col">Heure de fermeture</th>
      <th scope="col">Capacité</th>
      <th colspan="2">Action</th>      
    </tr>
  </thead>
  <tbody>
    <?php
        for($i=0; $i < count($hours);$i++) : 
    ?>
    <tr>
      <th scope="row"><?= $hours[$i]->getOpeningHoursId()?></th>
      <td>
        <a href="<?= URL ?>admin/hours/one/<?= $hours[$i]->getOpeningHoursId() ?>"><?= $hours[$i]->getDayOfWeek()?></a>
      </td>
      <td>
        <?= $hours[$i]->getOpeningTime()?>
      </td>
      <td>
        <?= $hours[$i]->getClosingTime()?>
      </td>
      <td>
        <?= $hours[$i]->getMaxCapacity()?>
      </td>
      <td>
        <a href="<?= URL ?>admin/hours/update/<?=$hours[$i]->getOpeningHoursId();?>" class="btn btn-warning">Modifier</a>
      </td>
      <td>
        <form action="<?= URL ?>admin/hours/delete/<?=$hours[$i]->getOpeningHoursId();?>" method="POST" onsubmit="return confirm ('Voulez-vous vraiment supprimer le plat ?')" >
          <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
      </td>
    </tr>
    <?php endfor; ?>
  </tbody>
</table>
<a href="<?=URL?>admin/hours/add" class="btn btn-primary d-block" >Ajouter</a>
</main>

<?php
$titre = "<h1>Gestion des horaires</h1>";
$content = ob_get_clean();
require_once 'adminTemplate.php';

?>
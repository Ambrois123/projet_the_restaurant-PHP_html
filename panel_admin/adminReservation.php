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

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nom</th>
      <th scope="col">Email</th>
      <th scope="col">Téléphone</th>
      <th scope="col">Heure</th>
      <th scope="col">Nombre de couverts</th>
      <th scope="col">Allergies</th>
      <th scope="col">Statut</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
  <?php
    for($i=0; $i < count($reservations);$i++) :
    ?>
    <tr>
      <th scope="row"><?=$reservations[$i]->getReservationId()?></th>
      <td>
        <a href="<?=URL?>admin/reservation/one/<?=$reservations[$i]->getReservationId()?>"><?=$reservations[$i]->getUserName();?></a>
      </td>
      <td><?=$reservations[$i]->getUserEmail()?></td>
      <td><?=$reservations[$i]->getUserPhone()?></td>
      <td>
        <?=$reservations[$i]->getReservationTime()?>

      </td>
      <td><?=$reservations[$i]->getNumberGuests()?></td>
      <td><?=$reservations[$i]->getAllergiesList()?></td>
      <td><?=$reservations[$i]->getStatut()?></td>
      <td>
        <a href="<?= URL ?>admin/reservation/update/<?=$reservations[$i]->getReservationId();?>" class="btn btn-warning">Modifier</a>
      </td>
      <td>
        <form action="<?= URL ?>admin/reservation/delete/<?=$reservations[$i]->getReservationId();?>" method="POST" onsubmit="return confirm ('Voulez-vous vraiment supprimer le client ?')" >
          <button type="submit" class="btn btn-danger">Supprimer</button>
        </form>
      </td>
    </tr>
    <?php endfor; ?>
  </tbody>
</table>
<?php
$titre = "<h1>Gestion des réservations</h1>";
$content = ob_get_clean();
require_once 'adminTemplate.php';

?>
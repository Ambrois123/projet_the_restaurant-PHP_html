<?php

ob_start();
?>

<main class="container">
    <form action="<?=URL?>/admin/reservation/validate_update" method="post">
        <div class="row g-3">
            <div class="col">
                <label for="name">Nom</label>
                <input type="text" class="form-control" name="name" value="<?=$reservation->getUserName();?>" >
            </div>
            <div class="col">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" value="<?=$reservation->getUserEmail();?>" >
            </div>
            <div class="col">
                <label for="phone">Téléphone</label>
                <input type="phone" class="form-control" name="phone" value="<?=$reservation->getUserPhone();?>"  >
            </div>
        </div>
        <div class="row g-3">
            <div class="col">
                <label for="couvert">Couvert</label>
                <input type="number" class="form-control" name="couvert" value="<?=$reservation->getNumberGuests();?>" >
            </div>
            <div class="col-8">
                <label for="date">Date</label>
                <input type="datetime-local" class="form-control" name="date" value="<?=$reservation->getReservationTime();?>" >
            </div>
        </div>
        <div class="row g-3">
            <div class="col-10">
                <label for="allergies">Allergies</label>
                <textarea name="allergies" id="allergies" placeholder="Des allergies ?"><?=$reservation->getAllergiesList();?></textarea>
            </div>
        </div>
        <input type="hidden" name="ident" value="<?= $reservation->getReservationId(); ?>">
        <div class="mt-3" >
            <button type="submit" class="btn btn-primary">Valider</button>
        </div>
    </form>

</main>

<?php 

$titre = "Modification d'une reservation : ".$reservation->getReservationId();
$content = ob_get_clean();
require_once 'adminTemplate.php';

?>
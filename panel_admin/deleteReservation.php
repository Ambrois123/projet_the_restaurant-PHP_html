<?php 

require_once '../model/Reservation.php';
require_once '../model/ReservationModel.php';
$reservationModel = new ReservationModel();

$reservations = $reservationModel->getReservations();

?>

<p><?= $reservations[5]->getReservationId() ?></p>
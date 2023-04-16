<?php 

require_once "model/reservationModel.php";

class ReservationController
{
    private $reservationModel;

    public function __construct()
    {
        $this->reservationModel = new ReservationModel();
        $this->reservationModel->readReservation();
    }

    public function displayReservation()
    {
        $reservations = $this->reservationModel->getReservations();
        require "panel_admin/adminReservation.php";
    }

    public function displayOneReservation($id)
    {
        $reservation = $this->reservationModel->getReservationById($id);
        require "panel_admin/adminOneReservation.php";
    }

    public function deleteReservation($id)
    {
        $this->reservationModel->deleteReservationBdd($id);

        $_SESSION['alert'] = [
            "type" => "danger",
            "message" => "La reservation a été bien supprimé"
        ];

        header("Location: ".URL."admin/reservation");
    }

    public function updateReservation($id)
    {
        $reservation = $this->reservationModel->getReservationById($id);
        require "panel_admin/updateReservation.php";
    }

    public function updateReservationValidation()
    {
        $this->reservationModel->updateReservationBdd($_POST['ident'], $_POST['date'], $_POST['couvert'], $_POST['allergies'], $_POST['statut']);

        $_SESSION['alert'] = [
            "type" => "success",
            "message" => "La reservation a été bien modifié"
        ];

        header("Location: ".URL."admin/reservation");
    }

    

    
}




?>
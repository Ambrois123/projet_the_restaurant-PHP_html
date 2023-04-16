<?php 

require_once "config/Connect.php";
require_once "Reservation_form.php";
require_once "model/UsersModel.php";

class ReservationFormModel extends Connexion 
{
    // private $reservationForms;
    // public $usersModel;

    // public function addReservation($reservationForm){$this->reservationForms[] = $reservationForm;}
    // public function getReservations(){return $this->reservationForms;}

    // public function readReservation()
    // {
    //     $stmt = $req = $this->getBdd()->prepare(
    //         "SELECT * FROM reservation ");
    //     $stmt->execute();
    //     $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     $stmt->closeCursor();

    //     foreach($reservations as $reservation)
    //     {
    //         $reservationForm = new ReservationForm($reservation['reservation_id'], $reservation['reservation_time'], $reservation['numberGuests'], $reservation['allergies_list'], $reservation['statut']);
    //         $this->addReservation($reservation);
    //     }
    // }


    // public function InsertReservation($date, $couvert, $allergies, $statut,$user_Id)
    // {
    //     $user_Id = $this->usersModel->getUserById($user_Id);
    //     $req= "INSERT INTO reservation (reservation_time, numberGuests, allergies_list, statut, user_Id) 
    //     VALUES (:date, :couvert, :allergies, :statut)";
    //     $stmt = $this->getBdd()->prepare($req);
    //     $stmt->bindValue(':date', $date, PDO::PARAM_STR);
    //     $stmt->bindValue(':couvert', $couvert, PDO::PARAM_INT);
    //     $stmt->bindValue(':allergies', $allergies, PDO::PARAM_STR);
    //     $stmt->bindValue(':statut', $statut, PDO::PARAM_STR);
    //     $stmt->bindValue(':userId', $user_Id, PDO::PARAM_INT);
    //     $result = $stmt->execute();
    //     $stmt->closeCursor();

    //     if($result > 0){
    //         $reservationForm = new ReservationForm($this->getBdd()->lastInsertId(), $date, $couvert, $allergies, $statut);
    //         $this->addReservation($reservationForm);
    //     }

    // }
    
}



?>
<?php 

require_once "config/Connect.php";
require_once "Reservations.php";

class ReservationModel extends Connexion 
{
    private $reservations;//tableau de entrees

    public function addReservation($reservation){$this->reservations[] = $reservation;}
    public function getReservations(){return $this->reservations;}

    public function readReservation()
    {
        $stmt = $req = $this->getBdd()->prepare(
            "SELECT * FROM reservation 
            INNER JOIN users WHERE userId = user_id ");
        $stmt->execute();
        $reservations = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        foreach($reservations as $reservation)
        {
            $reservation = new Reservations($reservation['reservation_id'], $reservation['reservation_time'], $reservation['numberGuests'], $reservation['allergies_list'], $reservation['statut'], $reservation['user_name'], $reservation['user_email'], $reservation['user_phone']);
            $this->addReservation($reservation);
        }
    }

    public function getReservationById($id)
    {
        //parcourir le tableau de reservations

        for($i=0; $i < count($this->reservations); $i++)
        {
            if($this->reservations[$i]->getReservationId() == $id)
            {
                return $this->reservations[$i];
                
            }
        }

        throw new Exception("La page n'existe pas.");
    }

    public function deleteReservationBdd($id)
    {
        $req = "DELETE FROM reservation WHERE reservation_id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            $reservation = $this->getReservationById($id);
            unset($reservation);
        }
    }

    public function updateReservationBdd($id, $date, $couvert, $allergies, $statut)
    {
        $req = "UPDATE reservation 
        SET reservation_time = :date, numberGuests = :couvert, allergies_list = :allergies, statut = :statut 
        WHERE reservation_id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':date', $date, PDO::PARAM_STR);
        $stmt->bindValue(':couvert', $couvert, PDO::PARAM_INT);
        $stmt->bindValue(':allergies', $allergies, PDO::PARAM_STR);
        $stmt->bindValue(':statut', $statut, PDO::PARAM_STR);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            $reservation = $this->getReservationById($id);
            $reservation->setReservationTime($date);
            $reservation->setNumberGuests($couvert);
            $reservation->setAllergiesList($allergies);
            $reservation->setStatut($statut);
        }
    }

    public function InsertReservation($date, $couvert, $allergies, $statut, $username, $email, $phone)
    {
        $req= "INSERT INTO reservation (reservation_time, numberGuests, allergies_list, statut) 
        VALUES (:date, :couvert, :allergies, :statut)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':date', $date, PDO::PARAM_STR);
        $stmt->bindValue(':couvert', $couvert, PDO::PARAM_INT);
        $stmt->bindValue(':allergies', $allergies, PDO::PARAM_STR);
        $stmt->bindValue(':statut', $statut, PDO::PARAM_STR);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            $reservation = new Reservations($this->getBdd()->lastInsertId(), $date, $couvert, $allergies, $statut, $username, $email, $phone);
            $this->addReservation($reservation);
        }
    }
    
}



?>
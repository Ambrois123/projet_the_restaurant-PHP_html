<?php 

require_once "config/Connect.php";
require_once "Reservations.php";

class ClientReservationModel extends Connexion 
{
    public function insertClientReservation()
   {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $couvert = $_POST['couvert'];
    $reservationTime = $_POST['date'];
    $allergies_list = $_POST['allergies'];
    $statut = $_POST['statut'];
    

    $req = "INSERT INTO users (user_name, user_email, user_phone) 
    VALUES (:username, :email, :phone)";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':phone', $phone);
    $stmt->execute();
    $stmt->closeCursor();
    
    $req = "SELECT user_id FROM users WHERE user_email = :email";
    $stmtUserId = $this->getBdd()->prepare($req);
    $stmtUserId->bindParam(':email', $email);
    $stmtUserId->execute();
    $idUser = $stmtUserId->fetch(PDO::FETCH_ASSOC)['user_id'];


    $req = "INSERT INTO reservation (reservation_time, numberGuests, allergies_list, statut, userId)
    VALUES (:reservation_time, :numberGuests, :allergies_list, :statut, :idUser)";
    $stmt = $this->getBdd()->prepare($req);
    $stmt->bindParam(':reservation_time', $reservationTime);
    $stmt->bindParam(':numberGuests', $couvert);
    $stmt->bindParam(':allergies_list', $allergies_list);
    $stmt->bindParam(':statut', $statut);
    $stmt->bindParam(':idUser', $idUser);
    $stmt->execute();
    $stmt->closeCursor();
    


   }
    
}



?>
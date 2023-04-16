<?php 

require_once 'config/Connect.php';
require_once 'model/Users.php';
require_once 'model/Reservation_form.php';

class VisiteurModel extends Connexion
{
    private $visiteurReservations;

    public function addVisiteurReservation($visiteurReservation){$this->visiteurReservations[] = $visiteurReservation;}
    
    public function validationReservationForm($username, $email, $phone, $couvert, $reservationTime, $allergies_list, $statut)
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

            //Nettoyage des données
            $username = htmlspecialchars($username);
            $email = htmlspecialchars($email);
            $phone = htmlspecialchars($phone);

            //Binding des paramètres
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_INT);
            $stmt->execute();
            $stmt->closeCursor();
        
        $req = "SELECT user_id FROM users WHERE user_email = :email";
        $stmtUserId = $this->getBdd()->prepare($req);
        $stmtUserId->bindParam(':email', $email, PDO::PARAM_STR);
        $stmtUserId->execute();
        $idUser = $stmtUserId->fetch(PDO::FETCH_ASSOC)['user_id'];


        $req = "INSERT INTO reservation (reservation_time, numberGuests, allergies_list, statut, userId)
        VALUES (:reservation_time, :numberGuests, :allergies_list, :statut, :idUser)";
        $stmt = $this->getBdd()->prepare($req);

        //Nettoyage des données
            $couvert = htmlspecialchars($couvert);
            $reservationTime = htmlspecialchars($reservationTime);
            $allergies_list = htmlspecialchars($allergies_list);
            $statut = htmlspecialchars($statut);

        //Binding des paramètres
        $stmt->bindParam(':reservation_time', $reservationTime, PDO::PARAM_STR);
        $stmt->bindParam(':numberGuests', $couvert, PDO::PARAM_INT);
        $stmt->bindParam(':allergies_list', $allergies_list, PDO::PARAM_STR);
        $stmt->bindParam(':statut', $statut, PDO::PARAM_STR);
        $stmt->bindParam(':idUser', $idUser, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();


    }
        

}

?>
<?php 


require_once 'model/VisiteurModel.php';


class VisiteurReservationController 
{
   
        private $visiteurReservationModel;

        public function __construct()
        {
            $this->visiteurReservationModel = new VisiteurModel();
            
        }

        public function InsertVisiteurReservation()
        {
            if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['phone']) || 
            empty($_POST['couvert']) || empty($_POST['date']) || empty($_POST['allergies'])) {
                $_SESSION['error'] = [
                    "msg_input" => "Veuillez remplir tous les champs",
                ];
                header("Location:".URL."client");

            }else{
                $this->visiteurReservationModel->validationReservationForm($_POST['username'], $_POST['email'], $_POST['phone'], $_POST['couvert'], $_POST['date'], $_POST['allergies'], $_POST['statut']);
            $_SESSION['resa'] = [
                "name" => $_POST['username'],
                "email" => $_POST['email'],
                "phone" => $_POST['phone'],
                "couvert" => $_POST['couvert'],
                "date" => $_POST['date'],
                "allergies" => $_POST['allergies'],
                "statut" => $_POST['statut']
            ];
            header("Location: ".URL."resa_validate");
            }
            
            
        }

}

?>
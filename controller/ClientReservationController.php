<?php 

require_once 'model/ClientReservationModel.php';

class ClientReservationController
{
    private $clientReservationModel;

    public function __construct()
    {
        $this->clientReservationModel = new ClientReservationModel();
        
    }

    public function InsertClientReservation()
    {
        if(empty($_POST['username']) || empty($_POST['email']) || empty($_POST['phone']) || empty($_POST['couvert']) || empty($_POST['date']) || empty($_POST['allergies'])){
            $_SESSION['error'] = [
                "msg_input" => "Veuillez remplir tous les champs",
            ];
            header("Location: ".URL."resa_client");

        }else{
            $this->clientReservationModel->insertClientReservation($_POST['username'], $_POST['email'], $_POST['phone'], $_POST['couvert'], $_POST['date'], $_POST['allergies'], $_POST['statut']);

                // enregistrement d'une information de session avant la redirection de la page
            $_SESSION['alert'] = [
                "name" => $_POST['username'],
                "email" => $_POST['email'],
                "phone" => $_POST['phone'],
                "couvert" => $_POST['couvert'],
                "date" => $_POST['date'],
                "allergies" => $_POST['allergies']
            ];

            //redirection vers la page clientValidate avec un message de confirmation

            header("Location: ".URL."validate_reservation_client");
        }
        
    }
}
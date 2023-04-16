<?php 

require_once 'model/HoraireModel.php';

class HoraireController
{
    private $horaireModel;

    public function __construct()
    {
        $this->horaireModel = new HoraireModel();
        $this->horaireModel->readHours();

    }
    public function displayOpeningHours()
    {
        $hours = $this->horaireModel->getHours();
        require "panel_admin/adminHoraire.php";
    }

    public function displayOneHour($id)
    {
        $hour = $this->horaireModel->getOpeningsHoursId($id);
        require "panel_admin/adminOneHoraire.php";
    }

    public function addHour()
    {
        require "panel_admin/addHoraire.php";
    }

    public function insertHoursValidation()
    {
        $this->horaireModel->insertHours($_POST['day'], $_POST['opening'], $_POST['closing'], $_POST['capacity']);
        header("Location: " . URL . "admin/hours");

        //enregistrement d'une information de session avant la redirection de la page
        $_SESSION['alert'] = [
            "type" => "success",
            "message" => "Horaire a été bien ajouté"
        ];

        header("Location: ".URL."admin/hours");
    }

    public function deleteHour($id)
    {
        $this->horaireModel->deleteHoursBdd($id);

         //enregistrement d'une information de session avant la redirection de la page
         $_SESSION['alert'] = [
            "type" => "danger",
            "message" => "L'horaire a été bien supprimé"
        ];


        header("Location: ".URL."admin/hours");
    }

    public function updateHour($id)
    {
        $hour = $this->horaireModel->getOpeningsHoursId($id);
        require "panel_admin/updateHoraire.php";
    }

    public function updateHoursValidation()
    {
        //mise à jour de la base de données
        $this->horaireModel->updateHoursBdd($_POST['ident'],$_POST['day'], $_POST['opening'], $_POST['closing'], $_POST['capacity'], $_POST['ident']);

        //enregistrement d'une information de session avant la redirection de la page
        $_SESSION['alert'] = [
            "type" => "success",
            "message" => "La modification a été bien réalisée"
        ];

         
         header("Location: ".URL."admin/hours");
    }
}

?>
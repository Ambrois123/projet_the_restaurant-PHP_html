<?php 

require_once 'model/BoissonModel.php';

class BoissonController
{
    private $boissonModel;

    public function __construct()
    {
        $this->boissonModel = new BoissonModel();
        $this->boissonModel->readBoissons();
    }

    public function displayBoissons()
    {
        $boissons = $this->boissonModel->getBoissons(); 
        require "panel_admin/adminBoisson.php";
    }


    public function displayOneBoisson($id)
    {
        $boisson = $this->boissonModel->getBoissonById($id);
        require "panel_admin/adminOneBoisson.php";
    }

    public function addBoisson()
    {
        require "panel_admin/addBoisson.php";
    }

    public function insertBoissonsValidation()
    {
        
        $this->boissonModel->InsertBoissons($_POST['title'], $_POST['description'], $_POST['price']);

        //enregistrement d'une information de session avant la redirection de la page
        $_SESSION['alert'] = [
            "type" => "success",
            "message" => "La boisson a été bien ajoutée"
        ];

        header("Location: ".URL."admin/boisson");

    }

    public function deleteBoisson($id)
    {
        //suppression en Bdd
        $this->boissonModel->deleteBoissonBdd($id);

        //enregistrement d'une information de session avant la redirection de la page
        $_SESSION['alert'] = [
            "type" => "danger",
            "message" => "La boisson a été bien supprimée"
        ];


        header("Location: ".URL."admin/boisson");
    }

    public function updateBoisson($id)
    {
        $boisson = $this->boissonModel->getBoissonById($id);
        require "panel_admin/updateBoisson.php";
        
    }

    public function updateBoissonsValidation()
    {

         //Mise à jour de la Bdd
         $this->boissonModel->updateBoissonBdd($_POST['ident'], $_POST['title'], $_POST['description'], $_POST['price']);
         
         //enregistrement d'une information de session avant la redirection de la page
        $_SESSION['alert'] = [
            "type" => "success",
            "message" => "La modification a été bien réalisée"
        ];

         
         header("Location: ".URL."admin/boisson");
    }

}
?>
<?php 

require_once 'model/EntreeModel.php';
require_once 'model/MainModel.php';
require_once 'model/DessertModel.php';
require_once 'model/BoissonModel.php';

class EntreeController
{
    private $entreeModel;
    private $mainModel;
    private $dessertModel;
    private $boissonModel;

    public function __construct()
    {
        $this->entreeModel = new EntreeModel();
        $this->entreeModel->readEntrees();
        $this->mainModel = new MainModel();
        $this->mainModel->readMains();
        $this->dessertModel = new DessertModel();
        $this->dessertModel->readDesserts();
        $this->boissonModel = new BoissonModel();
        $this->boissonModel->readBoissons();
    }

    public function displayEntrees()
    {
        $entrees = $this->entreeModel->getEntrees(); 
        require "panel_admin/adminEntree.php";
    }


    public function displayOneEntree($id)
    {
        $entree = $this->entreeModel->getEntreeById($id);
        require "panel_admin/adminOneEntree.php";
    }

    public function addEntree()
    {
        require "panel_admin/addEntree.php";
    }

    public function insertEntreesValidation()
    {
        
        $this->entreeModel->InsertEntrees($_POST['title'], $_POST['description'], $_POST['price']);

        //enregistrement d'une information de session avant la redirection de la page
        $_SESSION['alert'] = [
            "type" => "success",
            "message" => "L'entrée' a été bien ajoutée"
        ];

        header("Location: ".URL."admin/entree");

    }

    public function deleteEntree($id)
    {
        //suppression en Bdd
        $this->entreeModel->deleteEntreeBdd($id);

        //enregistrement d'une information de session avant la redirection de la page
        $_SESSION['alert'] = [
            "type" => "danger",
            "message" => "L'entree' a été bien supprimé"
        ];


        header("Location: ".URL."admin/entree");
    }

    public function updateEntree($id)
    {
        $entree = $this->entreeModel->getEntreeById($id);
        require "panel_admin/updateEntree.php";
        
    }

    public function updateEntreesValidation()
    {

         //Mise à jour de la Bdd
         $this->entreeModel->updateEntreeBdd($_POST['ident'], $_POST['title'], $_POST['description'], $_POST['price']);
         
         //enregistrement d'une information de session avant la redirection de la page
        $_SESSION['alert'] = [
            "type" => "success",
            "message" => "La modification a été bien réalisée"
        ];

         
         header("Location: ".URL."admin/entree");
    }

    //function to display the page carte
    public function getPageCarte()
    {
        //entrées récupérées dans la Bdd pour affichage page carte
        $entrees = $this->entreeModel->getEntrees();
        //plats principaux récupérés dans la Bdd pour affichage page carte
        $mains = $this->mainModel->getMains();
        //desserts récupérés dans la Bdd pour affichage page carte
        $desserts = $this->dessertModel->getDesserts();
        //boissons récupérées dans la Bdd pour affichage page carte
        $boissons = $this->boissonModel->getBoissons();
        
        require "views/carte.php";
    }

}
?>
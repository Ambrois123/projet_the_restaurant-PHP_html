<?php 

require_once 'model/DessertModel.php';

class DessertController
{
    private $dessertModel;

    public function __construct()
    {
        $this->dessertModel = new DessertModel();
        $this->dessertModel->readDesserts();
    }

    public function displayDesserts()
    {
        $desserts = $this->dessertModel->getDesserts(); 
        require "panel_admin/adminDessert.php";
    }


    public function displayOneDessert($id)
    {
        $dessert = $this->dessertModel->getDessertById($id);
        require "panel_admin/adminOneDessert.php";
    }

    public function addDessert()
    {
        require "panel_admin/addDessert.php";
    }

    public function insertDessertsValidation()
    {
        
        $this->dessertModel->InsertDesserts($_POST['title'], $_POST['description'], $_POST['price']);

        //enregistrement d'une information de session avant la redirection de la page
        $_SESSION['alert'] = [
            "type" => "success",
            "message" => "Le dessert a été bien ajouté"
        ];

        header("Location: ".URL."admin/dessert");

    }

    public function deleteDessert($id)
    {
        //suppression en Bdd
        $this->dessertModel->deleteDessertBdd($id);

        //enregistrement d'une information de session avant la redirection de la page
        $_SESSION['alert'] = [
            "type" => "danger",
            "message" => "Le dessert a été bien supprimé"
        ];


        header("Location: ".URL."admin/dessert");
    }

    public function updateDessert($id)
    {
        $dessert = $this->dessertModel->getDessertById($id);
        require "panel_admin/updateDessert.php";
        
    }

    public function updateDessertsValidation()
    {

         //Mise à jour de la Bdd
         $this->dessertModel->updateDessertBdd($_POST['ident'], $_POST['title'], $_POST['description'], $_POST['price']);
         
         //enregistrement d'une information de session avant la redirection de la page
        $_SESSION['alert'] = [
            "type" => "success",
            "message" => "La modification a été bien réalisée"
        ];

         
         header("Location: ".URL."admin/dessert");
    }

}
?>
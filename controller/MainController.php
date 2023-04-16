<?php 

require_once 'model/MainModel.php';

class MainController
{
    private $mainModel;

    public function __construct()
    {
        $this->mainModel = new MainModel();
        $this->mainModel->readMains();
    }

    public function displayMains()
    {
        $mains = $this->mainModel->getMains(); 
        require "panel_admin/adminMain.php";
    }


    public function displayOneMAin($id)
    {
        $main = $this->mainModel->getMainById($id);
        require "panel_admin/adminOneMain.php";
    }

    public function addMain()
    {
        require "panel_admin/addMain.php";
    }

    public function insertMainsValidation()
    {
        
        $this->mainModel->InsertMains($_POST['title'], $_POST['description'], $_POST['price']);

        //enregistrement d'une information de session avant la redirection de la page
        $_SESSION['alert'] = [
            "type" => "success",
            "message" => "Le plat a été bien ajoutée"
        ];

        header("Location: ".URL."admin/plat_principal");

    }

    public function deleteMain($id)
    {
        //suppression en Bdd
        $this->mainModel->deleteMainBdd($id);

        //enregistrement d'une information de session avant la redirection de la page
        $_SESSION['alert'] = [
            "type" => "danger",
            "message" => "Le plat a été bien supprimé"
        ];


        header("Location: ".URL."admin/plat_principal");
    }

    public function updateMain($id)
    {
        $main = $this->mainModel->getMainById($id);
        require "panel_admin/updateMain.php";
        
    }

    public function updateMainsValidation()
    {

         //Mise à jour de la Bdd
         $this->mainModel->updateMainBdd($_POST['ident'], $_POST['title'], $_POST['description'], $_POST['price']);
         
         //enregistrement d'une information de session avant la redirection de la page
        $_SESSION['alert'] = [
            "type" => "success",
            "message" => "La modification a été bien réalisée"
        ];

         
         header("Location: ".URL."admin/plat_principal");
    }

}
?>
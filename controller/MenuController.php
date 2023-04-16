<?php 

require_once "model/MenuModel.php";

class MenuController
{
    private $menuModel;

    public function __construct()
    {
        $this->menuModel = new MenuModel();
        $this->menuModel->readMenus();
    }

    public function displayMenus()
    {
        $menus = $this->menuModel->getMenus();
        require "panel_admin/adminMenu.php";
    }

    public function displayOneMenu($id)
    {
        $menu = $this->menuModel->getMenuById($id);
        require "panel_admin/adminOneMenu.php";
    }

   public function addMenu()
   {
    require "panel_admin/addMenu.php";
   }

   public function insertMenuValidation()
   {
    $this->menuModel->InsertMenus($_POST['title'], $_POST['entree'], $_POST['plat1'], $_POST['plat2'], $_POST['price']);

    //enregistrement d'une information de session avant la redirection de la page
    $_SESSION['alert'] = [
        "type" => "success",
        "message" => "Le menu a été bien ajouté"
    ];

    header("Location: ".URL."admin/menu");
   }

   public function deleteMenu($id)
   {
    //suppression en Bdd
    $this->menuModel->deleteMenuBdd($id);

    //enregistrement d'une information de session avant la redirection de la page
    $_SESSION['alert'] = [
        "type" => "danger",
        "message" => "Le menu a été bien supprimé"
    ];

    header("Location: ".URL."admin/menu");
   }

   public function updateMenu($id)
   {
    $menu = $this->menuModel->getMenuById($id);
    require "panel_admin/updateMenu.php";
   }

   public function updateMenuValidation()
   {
    //mise à jour en Bdd
    $this->menuModel->updateMenuBdd($_POST['ident'], $_POST['title'], $_POST['entree'], $_POST['plat1'], $_POST['plat2'], $_POST['price']);

    //enregistrement d'une information de session avant la redirection de la page
    $_SESSION['alert'] = [
        "type" => "success",
        "message" => "Le menu a été bien modifié"
    ];

    header("Location: ".URL."admin/menu");
   }

   public function getPageMenu()
   {
    $menus = $this->menuModel->getMenus();
    require "views/menu.php";
   }

}



?>
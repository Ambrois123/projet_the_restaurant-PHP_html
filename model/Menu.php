<?php 

class Menu 
{
    private $menu_id;
    private $menu_name;
    private $choix_entree;
    private $choix_plat1;
    private $choix_plat2;
    private $menu_price;

    public function __construct($menu_id, $menu_name, $choix_entree, $choix_plat1, $choix_plat2, $menu_price)
    {
        $this->menu_id = $menu_id;
        $this->menu_name = $menu_name;
        $this->choix_entree = $choix_entree;
        $this->choix_plat1 = $choix_plat1;
        $this->choix_plat2 = $choix_plat2;
        $this->menu_price = $menu_price;
    }

    public function getMenuId(){return $this->menu_id;}
    public function setMenuId($menu_id){$this->menu_id = $menu_id;}

    public function getMenuName(){return $this->menu_name;}
    public function setMenuName($menu_name){$this->menu_name = $menu_name;}

    public function getChoixEntree(){return $this->choix_entree;}
    public function setChoixEntree($choix_entree){$this->choix_entree = $choix_entree;}

    public function getChoixPlat1(){return $this->choix_plat1;}
    public function setChoixPlat1($choix_plat1){$this->choix_plat1 = $choix_plat1;}

    public function getChoixPlat2(){return $this->choix_plat2;}
    public function setChoixPlat2($choix_plat2){$this->choix_plat2 = $choix_plat2;}

    public function getMenuPrice(){return $this->menu_price;}
    public function setMenuPrice($menu_price){$this->menu_price = $menu_price;}
}




?>
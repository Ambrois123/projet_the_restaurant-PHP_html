<?php 

require_once 'config/Connect.php';
require_once 'Menu.php';

class MenuModel extends Connexion
{
    private $menus;//tableau de entrees

    public function addMenu($menu){$this->menus[] = $menu;}

    public function getMenus(){return $this->menus;}

    public function readMenus()
    {
        $stmt = $req = $this->getBdd()->prepare("SELECT * FROM menu");
        $stmt->execute();
        $menus = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        foreach($menus as $plat)
        {
            $menu = new Menu($plat['menu_id'], $plat['menu_name'], $plat['choix_entree'], $plat['choix_plat1'], $plat['choix_plat2'], $plat['menu_price']);
            $this->addMenu($menu);
        }
    }

    public function getMenuById($id)
    {
        //parcourir le tableau de meals

        for($i=0; $i < count($this->menus); $i++)
        {
            if($this->menus[$i]->getMenuId() == $id)
            {
                return $this->menus[$i];
                
            }
        }

        throw new Exception("La page n'existe pas.");
    }

    public function InsertMenus($title, $entree, $plat1, $plat2, $price)
    {
        $req= "INSERT INTO menu (menu_name, choix_entree, choix_plat1, choix_plat2, menu_price) 
        VALUES (:title, :entree, :plat1, :plat2, :price)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':entree', $entree, PDO::PARAM_STR);
        $stmt->bindValue(':plat1', $plat1, PDO::PARAM_STR);
        $stmt->bindValue(':plat2', $plat2, PDO::PARAM_STR);
        $stmt->bindValue(':price', $price, PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            $menu = new Menu($this->getBdd()->lastInsertId(), $title, $entree, $plat1, $plat2, $price);
            $this->addMenu($menu);
        }
    }

    public function deleteMenuBdd($id)
    {
        $req = "DELETE FROM menu WHERE menu_id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            //supprimer le menu du tableau
            $menu = $this->getMenuById($id);
            unset($menu);
        }
    }

    public function updateMenuBdd($id, $title, $entree, $plat1, $plat2, $price)
    {
        $req = "UPDATE menu 
        SET menu_name = :title, choix_entree = :entree, 
        choix_plat1 = :plat1, choix_plat2 = :plat2, 
        menu_price = :price 
        WHERE menu_id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':entree', $entree, PDO::PARAM_STR);
        $stmt->bindValue(':plat1', $plat1, PDO::PARAM_STR);
        $stmt->bindValue(':plat2', $plat2, PDO::PARAM_STR);
        $stmt->bindValue(':price', $price, PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            $menu = $this->getMenuById($id);
            $menu->setMenuName($title);
            $menu->setChoixEntree($entree);
            $menu->setChoixPlat1($plat1);
            $menu->setChoixPlat2($plat2);
            $menu->setMenuPrice($price);
        }
    }
}


?>
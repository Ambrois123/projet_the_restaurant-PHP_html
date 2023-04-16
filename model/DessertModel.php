<?php 

require_once 'config/Connect.php';
require_once 'Dessert.php';

class DessertModel extends Connexion
{
    
    private $desserts;//tableau de entrees

    public function addDessert($dessert)
    {
        $this->desserts[] = $dessert;
    }
     
    public function getDesserts()
    {
        return $this->desserts;
    }

    public function readDesserts()
    {
        $stmt = $req= $this->getBdd()->prepare("SELECT * FROM carte_dessert");
        $stmt->execute();
        $plats = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        foreach($plats as $plat)
        {
            $dessert = new Dessert($plat['dessert_id'], $plat['dessert_name'], $plat['dessert_description'], $plat['dessert_price']);
            $this->addDessert($dessert);
        }
    }

    public function getDessertById($id)
    {
        //parcourir le tableau de meals

        for($i=0; $i < count($this->desserts); $i++)
        {
            if($this->desserts[$i]->getDessertId() == $id)
            {
                return $this->desserts[$i];
                
            }
        }

        throw new Exception("La page n'existe pas.");
    }

    public function InsertDesserts($title, $description, $price)
    {
        $req= "INSERT INTO carte_dessert (dessert_name, dessert_description, dessert_price) 
        VALUES (:title, :description, :price)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        $stmt->bindValue(':price', $price, PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            $dessert = new Dessert($this->getBdd()->lastInsertId(), $title, $description, $price);
            $this->addDessert($dessert);
        }
    }

    public function deleteDessertBdd($id)
    {
        $req ="DELETE FROM carte_dessert WHERE dessert_id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            //supprimer le plat du tableau
            $dessert= $this->getDessertById($id);
            unset($dessert);
        }
    }

    public function updateDessertBdd($id, $title, $description, $price)
    {
        $req ="UPDATE carte_dessert
        SET dessert_name = :title, dessert_description = :description, dessert_price = :price
        WHERE dessert_id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        $stmt->bindValue(':price', $price, PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            //mis a jour de la BDD
            $dessert= $this->getDessertById($id);
            $dessert->setDessertName($title);
            $dessert->setDessertDescription($description);
            $dessert->setDessertPrice($price);
        }
    }
}

?>
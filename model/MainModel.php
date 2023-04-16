<?php 

require_once 'config/Connect.php';
require_once 'Main.php';

class MainModel extends Connexion
{
    
    private $mains;//tableau de entrees

    public function addMain($main)
    {
        $this->mains[] = $main;
    }
     
    public function getMains()
    {
        return $this->mains;
    }

    public function readMains()
    {
        $stmt = $req= $this->getBdd()->prepare("SELECT * FROM carte_plat");
        $stmt->execute();
        $plats = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        foreach($plats as $plat)
        {
            $main = new Main($plat['plat_id'], $plat['plat_name'], $plat['plat_description'], $plat['plat_price']);
            $this->addMain($main);
        }
    }

    public function getMainById($id)
    {
        //parcourir le tableau de meals

        for($i=0; $i < count($this->mains); $i++)
        {
            if($this->mains[$i]->getPlatId() == $id)
            {
                return $this->mains[$i];
                
            }
        }

        throw new Exception("La page n'existe pas.");
    }

    public function InsertMains($title, $description, $price)
    {
        $req= "INSERT INTO carte_plat (plat_name, plat_description, plat_price) 
        VALUES (:title, :description, :price)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        $stmt->bindValue(':price', $price, PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            $main = new Main($this->getBdd()->lastInsertId(), $title, $description, $price);
            $this->addMain($main);
        }
    }

    public function deleteMainBdd($id)
    {
        $req ="DELETE FROM carte_plat WHERE plat_id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            //supprimer le plat du tableau
            $main = $this->getMainById($id);
            unset($main);
        }
    }

    public function updateMainBdd($id, $title, $description, $price)
    {
        $req ="UPDATE carte_plat
        SET plat_name = :title, plat_description = :description, plat_price = :price
        WHERE plat_id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        $stmt->bindValue(':price', $price, PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            //mis a jour de la BDD
            $entree = $this->getMainById($id);
            $entree->setPlatName($title);
            $entree->setPlatDescription($description);
            $entree->setPlatPrice($price);
        }
    }
}

?>
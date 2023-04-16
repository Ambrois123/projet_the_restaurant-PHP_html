<?php 

require_once 'config/Connect.php';
require_once 'Entree.php';

class EntreeModel extends Connexion
{
    
    private $entrees;//tableau de entrees

    public function addEntree($entree)
    {
        $this->entrees[] = $entree;
    }
     
    public function getEntrees()
    {
        return $this->entrees;
    }

    public function readEntrees()
    {
        $stmt = $req= $this->getBdd()->prepare("SELECT * FROM carte_entree");
        $stmt->execute();
        $plats = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        foreach($plats as $plat)
        {
            $entree = new Entree($plat['entree_id'], $plat['entree_name'], $plat['entree_description'], $plat['entree_price']);
            $this->addEntree($entree);
        }
    }

    public function getEntreeById($id)
    {
        //parcourir le tableau de meals

        for($i=0; $i < count($this->entrees); $i++)
        {
            if($this->entrees[$i]->getEntreeId() == $id)
            {
                return $this->entrees[$i];
                
            }
        }

        throw new Exception("La page n'existe pas.");
    }

    public function InsertEntrees($title, $description, $price)
    {
        $req= "INSERT INTO carte_entree (entree_name, entree_description, entree_price) 
        VALUES (:title, :description, :price)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        $stmt->bindValue(':price', $price, PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            $entree = new Entree($this->getBdd()->lastInsertId(), $title, $description, $price);
            $this->addEntree($entree);
        }
    }

    public function deleteEntreeBdd($id)
    {
        $req ="DELETE FROM carte_entree WHERE entree_id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            //supprimer le plat du tableau
            $entree = $this->getEntreeById($id);
            unset($entree);
        }
    }

    public function updateEntreeBdd($id, $title, $description, $price)
    {
        $req ="UPDATE carte_entree
        SET entree_name = :title, entree_description = :description, entree_price = :price
        WHERE entree_id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        $stmt->bindValue(':price', $price, PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            //mis a jour de la BDD
            $entree = $this->getEntreeById($id);
            $entree->setEntreeName($title);
            $entree->setEntreeDescription($description);
            $entree->setEntreePrice($price);
        }
    }
}

?>
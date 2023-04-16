<?php 

require_once 'config/Connect.php';
require_once 'Boisson.php';

class BoissonModel extends Connexion
{
    
    private $boissons;//tableau de entrees

    public function addBoisson($boisson)
    {
        $this->boissons[] = $boisson;
    }
     
    public function getBoissons()
    {
        return $this->boissons;
    }

    public function readBoissons()
    {
        $stmt = $req= $this->getBdd()->prepare("SELECT * FROM carte_boisson");
        $stmt->execute();
        $drinks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        foreach($drinks as $drink)
        {
            $boisson = new Boisson($drink['boisson_id'], $drink['boisson_name'], $drink['boisson_description'], $drink['boisson_price']);
            $this->addBoisson($boisson);
        }
    }

    public function getBoissonById($id)
    {
        //parcourir le tableau de meals

        for($i=0; $i < count($this->boissons); $i++)
        {
            if($this->boissons[$i]->getBoissonId() == $id)
            {
                return $this->boissons[$i];
                
            }
        }

        throw new Exception("La page n'existe pas.");
    }

    public function InsertBoissons($title, $description, $price)
    {
        $req= "INSERT INTO carte_boisson (boisson_name, boisson_description, boisson_price) 
        VALUES (:title, :description, :price)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        $stmt->bindValue(':price', $price, PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            $boisson = new Boisson($this->getBdd()->lastInsertId(), $title, $description, $price);
            $this->addBoisson($boisson);
        }
    }

    public function deleteBoissonBdd($id)
    {
        $req ="DELETE FROM carte_boisson WHERE boisson_id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            //supprimer le plat du tableau
            $boisson = $this->getBoissonById($id);
            unset($boisson);
        }
    }

    public function updateBoissonBdd($id, $title, $description, $price)
    {
        $req ="UPDATE carte_boisson
        SET boisson_name = :title, boisson_description = :description, boisson_price = :price
        WHERE boisson_id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        $stmt->bindValue(':price', $price, PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            //mis a jour de la BDD
            $boisson = $this->getBoissonById($id);
            $boisson->setBoissonName($title);
            $boisson->setBoissonDescription($description);
            $boisson->setBoissonPrice($price);
        }
    }
}

?>
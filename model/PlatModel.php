<?php 

require_once 'config/Connect.php';
require_once 'Plat.php';

class PlatModel extends Connexion
{
    
    private $meals;//tableau de meals

    public function addMeals($meal)
    {
        $this->meals[] = $meal;
    }
     
    public function getMeals()
    {
        return $this->meals;
    }

    public function readMeals()
    {
        $stmt = $req= $this->getBdd()->prepare("SELECT * FROM meals");
        $stmt->execute();
        $plats = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        foreach($plats as $plat)
        {
            $meal = new Plat($plat['meals_id'], $plat['meals_title'], $plat['meals_description'], $plat['meals_price'], $plat['meals_image']);
            $this->addMeals($meal);
        }
    }

    public function getMealById($id)
    {
        //parcourir le tableau de meals

        for($i=0; $i < count($this->meals); $i++)
        {
            if($this->meals[$i]->getMealsId() == $id)
            {
                return $this->meals[$i];
                
            }
        }

        throw new Exception("La page n'existe pas.");
    }

    public function InsertMeals($title, $description, $price, $image)
    {
        $req= "INSERT INTO meals (meals_title, meals_description, meals_price, meals_image) 
        VALUES (:title, :description, :price, :image)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        $stmt->bindValue(':price', $price, PDO::PARAM_INT);
        $stmt->bindValue(':image', $image, PDO::PARAM_STR);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            $meal = new Plat($this->getBdd()->lastInsertId(), $title, $description, $price, $image);
            $this->addMeals($meal);
        }
    }

    public function deleteMealBdd($id)
    {
        $req ="DELETE FROM meals WHERE meals_id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            //supprimer le plat du tableau
            $meal = $this->getMealById($id);
            unset($meal);
        }
    }

    public function updateMealBdd($id, $title, $description, $price, $image)
    {
        $req ="UPDATE meals 
        SET meals_title = :title, meals_description = :description, 
        meals_price = :price, meals_image = :image 
        WHERE meals_id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':title', $title, PDO::PARAM_STR);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        $stmt->bindValue(':price', $price, PDO::PARAM_INT);
        $stmt->bindValue(':image', $image, PDO::PARAM_STR);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            //mis a jour de la BDD
            $meal = $this->getMealById($id);
            $meal->setMealsTitle($title);
            $meal->setMealsDescription($description);
            $meal->setMealsPrice($price);
            $meal->setMealsImage($image);
        }
    }
}

?>
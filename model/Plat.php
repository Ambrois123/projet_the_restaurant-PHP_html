<?php 

class Plat 
{
    private $meals_id;
    private $meals_title;
    private $meals_description;
    private $meals_price;
    private $meals_image;


    public function __construct($meals_id, $meals_title, $meals_description, $meals_price, $meals_image)
    {
        $this->meals_id = $meals_id; //partie à G de = refere à l'attribut et partie à D de = refere au parametre de la fonction
        $this->meals_title = $meals_title;
        $this->meals_description = $meals_description;
        $this->meals_price = $meals_price;
        $this->meals_image = $meals_image;
    }

    public function getMealsId(){ return $this->meals_id;}
    public function setMealsId($meals_id){ $this->meals_id = $meals_id;}

    public function getMealsTitle(){ return $this->meals_title;}
    public function setMealsTitle($meals_title){ $this->meals_title = $meals_title;}

    public function getMealsDescription(){ return $this->meals_description;}
    public function setMealsDescription($meals_description){ $this->meals_description = $meals_description;}

    public function getMealsPrice(){ return $this->meals_price;}
    public function setMealsPrice($meals_price){ $this->meals_price = $meals_price;}

    public function getMealsImage(){ return $this->meals_image;}
    public function setMealsImage($meals_image){ $this->meals_image = $meals_image;}

}

?>
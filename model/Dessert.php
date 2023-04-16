<?php 

class Dessert 
{
    private $dessert_id;
    private $dessert_name;
    private $dessert_description;
    private $dessert_price;

    public function __construct($dessert_id, $dessert_name, $dessert_description, $dessert_price)
    {
        $this->dessert_id = $dessert_id;
        $this->dessert_name = $dessert_name;
        $this->dessert_description = $dessert_description;
        $this->dessert_price = $dessert_price;
    }

    public function getDessertId(){return $this->dessert_id;}
    public function setDessertId($dessert_id){$this->dessert_id = $dessert_id;}

    public function getDessertName(){return $this->dessert_name;}
    public function setDessertName($dessert_name){$this->dessert_name = $dessert_name;}

    public function getDessertDescription(){return $this->dessert_description;}
    public function setDessertDescription($dessert_description){$this->dessert_description = $dessert_description;}

    public function getDessertPrice(){return $this->dessert_price;}
    public function setDessertPrice($dessert_price){$this->dessert_price = $dessert_price;}
    
}


?>
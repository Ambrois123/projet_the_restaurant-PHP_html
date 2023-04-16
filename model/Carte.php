<?php 

class Carte 
{
    private $carte_id;
    private $carte_title;
    private $carte_description;
    private $carte_price;
   
    
    public function __construct($carte_id, $carte_title, $carte_description, $carte_price)
    {
        $this->carte_id = $carte_id; //partie à G de = refere à l'attribut et partie à D de = refere au parametre de la fonction
        $this->carte_title = $carte_title;
        $this->carte_description = $carte_description;
        $this->carte_price = $carte_price;
       
    }
    
    public function getCarteId(){ return $this->carte_id;}
    public function setCarteId($carte_id){ $this->carte_id = $carte_id;}

    public function getCarteTitle(){ return $this->carte_title;}
    public function setCarteTitle($carte_title){ $this->carte_title = $carte_title;}

    public function getCarteDescription(){ return $this->carte_description;}
    public function setCarteDescription($carte_description){ $this->carte_description = $carte_description;}

    public function getCartePrice(){ return $this->carte_price;}
    public function setCartePrice($carte_price){ $this->carte_price = $carte_price;}

}

?>
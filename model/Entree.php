<?php 

class Entree
{
    private $entree_id;
    private $entree_name;
    private $entree_description;
    private $entree_price;


    public function __construct($entree_id, $entree_name, $entree_description, $entree_price)
    {
        $this->entree_id = $entree_id; //partie à G de = refere à l'attribut et partie à D de = refere au parametre de la fonction
        $this->entree_name = $entree_name;
        $this->entree_description = $entree_description;
        $this->entree_price = $entree_price;
    }
    

    public function getEntreeId(){return $this->entree_id;}
    public function setEntreeId($entree_id){$this->entree_id = $entree_id;}

    public function getEntreeName(){return $this->entree_name;}
    public function setEntreeName($entree_name){$this->entree_name = $entree_name;}

    public function getEntreeDescription(){return $this->entree_description;}
    public function setEntreeDescription($entree_description){$this->entree_description = $entree_description;}

    public function getEntreePrice(){return $this->entree_price;}
    public function setEntreePrice($entree_price){$this->entree_price = $entree_price;}
    

}

?>
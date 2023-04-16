<?php 

class Boisson {

    //boisson attributs
    private $boisson_id;
    private $boisson_name;
    private $boisson_description;
    private $boisson_price;

    public function __construct($boisson_id, $boisson_name, $boisson_description, $boisson_price)
    {
        $this->boisson_id = $boisson_id;
        $this->boisson_name = $boisson_name;
        $this->boisson_description = $boisson_description;
        $this->boisson_price = $boisson_price;
    }
    
    public function getBoissonId(){return $this->boisson_id;}
    public function setBoissonId($boisson_id){$this->boisson_id = $boisson_id;}

    public function getBoissonName(){return $this->boisson_name;}
    public function setBoissonName($boisson_name){$this->boisson_name = $boisson_name;}

    public function getBoissonDescription(){return $this->boisson_description;}
    public function setBoissonDescription($boisson_description){$this->boisson_description = $boisson_description;}

    public function getBoissonPrice(){return $this->boisson_price;}
    public function setBoissonPrice($boisson_price){$this->boisson_price = $boisson_price;}

}

?>
<?php 

class Main 
{
    private $plat_id;
    private $plat_name;
    private $plat_description;
    private $plat_price;

    public function __construct($plat_id, $plat_name, $plat_description, $plat_price)
    {
        $this->plat_id = $plat_id;
        $this->plat_name = $plat_name;
        $this->plat_description = $plat_description;
        $this->plat_price = $plat_price;
    }

    public function getPlatId(){return $this->plat_id;}
    public function setPlatId($plat_id){$this->plat_id = $plat_id;}

    public function getPlatName(){return $this->plat_name;}
    public function setPlatName($plat_name){$this->plat_name = $plat_name;}

    public function getPlatDescription(){return $this->plat_description;}
    public function setPlatDescription($plat_description){$this->plat_description = $plat_description;}

    public function getPlatPrice(){return $this->plat_price;}
    public function setPlatPrice($plat_price){$this->plat_price = $plat_price;}
}

?>
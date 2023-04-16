<?php 

class Horaire 
{
    private $openingHours_id;
    private $day_of_week;
    private $opening_time;
    private $closing_time;
    private $maxCapacity;

    public function __construct($openingHours_id, $day_of_week, $opening_time, $closing_time, $maxCapacity)
    {
        $this->openingHours_id = $openingHours_id; //partie à G de = refere à l'attribut et partie à D de = refere au parametre de la fonction
        $this->day_of_week = $day_of_week;
        $this->opening_time = $opening_time;
        $this->closing_time = $closing_time;
        $this->maxCapacity = $maxCapacity;
    }

    public function getOpeningHoursId(){ return $this->openingHours_id;}
    public function setOpeningHoursId($openingHours_id){ $this->openingHours_id = $openingHours_id;}

    public function getDayOfWeek(){ return $this->day_of_week;}
    public function setDayOfWeek($day_of_week){ $this->day_of_week = $day_of_week;}

    public function getOpeningTime(){ return $this->opening_time;}
    public function setOpeningTime($opening_time){ $this->opening_time = $opening_time;}

    public function getClosingTime(){ return $this->closing_time;}
    public function setClosingTime($closing_time){ $this->closing_time = $closing_time;}

    public function getMaxCapacity(){ return $this->maxCapacity;}
    public function setMaxCapacity($maxCapacity){ $this->maxCapacity = $maxCapacity;}

   
}

?>
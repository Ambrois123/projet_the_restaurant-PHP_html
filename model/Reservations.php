<?php 

class Reservations
{
    private $reservation_id;
    private $reservation_time;
    private $numberGuests;
    private $allergies_list;
    private $statut;
    private $user_name;
    private $user_email;
    private $user_phone;

    public function __construct($reservation_id, $reservation_time, $numberGuests, $allergies_list, $statut, $user_name, $user_email, $user_phone)
    {
        $this->reservation_id = $reservation_id;
        $this->reservation_time = $reservation_time;
        $this->numberGuests = $numberGuests;
        $this->allergies_list = $allergies_list;
        $this->statut = $statut;
        $this->user_name = $user_name;
        $this->user_email = $user_email;
        $this->user_phone = $user_phone;
        
    }

    public function getReservationId(){return $this->reservation_id;}
    public function setReservationId($reservation_id){$this->reservation_id = $reservation_id;}

    public function getReservationTime(){return $this->reservation_time;}
    public function setReservationTime($reservation_time){$this->reservation_time = $reservation_time;}

    public function getNumberGuests(){return $this->numberGuests;}
    public function setNumberGuests($numberGuests){$this->numberGuests = $numberGuests;}

    public function getAllergiesList(){return $this->allergies_list;}
    public function setAllergiesList($allergies_list){$this->allergies_list = $allergies_list;}

    public function getStatut(){return $this->statut;}
    public function setStatut($statut){$this->statut = $statut;}

    public function getUserName(){return $this->user_name;}
    public function setUserName($user_name){$this->user_name = $user_name;}

    public function getUserEmail(){return $this->user_email;}
    public function setUserEmail($user_email){$this->user_email = $user_email;}

    public function getUserPhone(){return $this->user_phone;}
    public function setUserPhone($user_phone){$this->user_phone = $user_phone;}

}


?>
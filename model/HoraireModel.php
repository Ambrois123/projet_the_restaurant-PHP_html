<?php 

require_once 'config/Connect.php';
require_once 'Horaire.php';

class HoraireModel extends Connexion
{
    private $hours;

    public function addHours($hour)
    {
        $this->hours[] = $hour;
    }

    public function getHours()
    {
        return $this->hours;
    }

    public function readHours()
    {
        $req = "SELECT * FROM opening_hours";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->execute();
        $hours = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        foreach($hours as $hour)
        {
            $hour = new Horaire($hour['openingHours_id'], $hour['day_of_week'], $hour['opening_time'], $hour['closing_time'], $hour['maxCapacity']);
            $this->addHours($hour);
        }
    }

    public function getOpeningsHoursId($id)
    {
        for($i=0; $i < count($this->hours); $i++)
        {
            if($this->hours[$i]->getOpeningHoursId() == $id)
            {
                return $this->hours[$i];
            }
        }

        throw new Exception("La page n'existe pas.");
    }

    public function insertHours($day, $opening, $closing, $capacity)
    {
        $req = "INSERT INTO opening_hours (day_of_week, opening_time, closing_time, maxCapacity) 
        VALUES (:day, :opening, :closing, :capacity)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':day', $day, PDO::PARAM_STR);
        $stmt->bindValue(':opening', $opening, PDO::PARAM_STR);
        $stmt->bindValue(':closing', $closing, PDO::PARAM_STR);
        $stmt->bindValue(':capacity', $capacity, PDO::PARAM_INT);
        $result = $stmt->execute();

        if($result > 0){
            $hour = new Horaire($this->getBdd()->lastInsertId(), $day, $opening, $closing, $capacity);
            $this->addHours($hour);
        }
    }

    public function deleteHoursBdd($id)
    {
        $req = "DELETE FROM opening_hours WHERE openingHours_id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $stmt->execute();

        if($result > 0){
            //supprimer l'objet du tableau
            $hour = $this->getOpeningsHoursId($id);
            unset($hour);
        }
    }

    public function updateHoursBdd($id, $day, $opening, $closing, $capacity)
    {
        $req = "UPDATE opening_hours 
        SET day_of_week = :day, opening_time = :opening, 
        closing_time = :closing, maxCapacity = :capacity 
        WHERE openingHours_id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':day', $day, PDO::PARAM_STR);
        $stmt->bindValue(':opening', $opening, PDO::PARAM_STR);
        $stmt->bindValue(':closing', $closing, PDO::PARAM_STR);
        $stmt->bindValue(':capacity', $capacity, PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            $hour = $this->getOpeningsHoursId($id);
            $hour->setDayOfWeek($day);
            $hour->setOpeningTime($opening);
            $hour->setClosingTime($closing);
            $hour->setMaxCapacity($capacity);
        }
    }
    
}

?>
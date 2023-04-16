<?php  

class Users 
{
    //les attributs de la classe
    private $user_id;
    private $user_name;
    private $user_email;
    private $role;
    private $user_phone;
    private $user_password;

    public function __construct($user_id, $username, $email, $role, $phone, $password)
    {
        $this->user_id = $user_id; //partie à G de = refere à l'attribut et partie à D de = refere au parametre de la fonction
        $this->user_name = $username;
        $this->user_email = $email;
        $this->role = $role;
        $this->user_phone = $phone;
        $this->user_password = $password;
    }

    public function getUserId(){ return $this->user_id;}
    public function setUserId($user_id){ $this->user_id = $user_id;}
    
    public function getUserName(){ return $this->user_name;}
    public function setUserName($user_name){ $this->user_name = $user_name;}

    public function getUserEmail(){ return $this->user_email;}
    public function setUserEmail($user_email){ $this->user_email = $user_email;}

    public function getUserRole(){ return $this->role;}
    public function setUserRole($role){ $this->role = $role;}

    public function getUserPhone(){ return $this->user_phone;}
    public function setUserPhone($user_phone){ $this->user_phone = $user_phone;}

    public function getUserPassword(){ return $this->user_password;}
    public function setUserPassword($user_password){ $this->user_password = $user_password;} 

}

?>
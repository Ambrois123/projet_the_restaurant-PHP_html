<?php 

require_once 'config/Connect.php';



class AdminModel extends Connexion
{
    private $users;

    public function addUsers($user){$this->users[] = $user;}

    public function getUsers(){return $this->users;}

    public function adminConnexionBDD($email,$role)
    {
        $req = "SELECT * FROM users where user_email = :email AND role = :role";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':role', $role, PDO::PARAM_STR);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        return $user;
    }
}


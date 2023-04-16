<?php 

require_once 'config/Connect.php';
require_once 'Users.php';

class UsersModel extends Connexion
{
    private $users;

    public function addUsers($user){$this->users[] = $user;}

    public function getUsers(){return $this->users;}

    public function InsertUsers($username, $email, $role, $password, $phone)
    {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);

            $req = "INSERT INTO users (user_name, user_email, role, user_password, user_phone) 
            VALUES (:username, :email, :role, :password, :phone)";
            $stmt = $this->getBdd()->prepare($req);

            //Nettoyage des données
            $username = htmlspecialchars(strip_tags($username));
            $email = htmlspecialchars(strip_tags($email));
            $phone = htmlspecialchars(strip_tags($phone));
            $password = htmlspecialchars(strip_tags($password));
            $role = htmlspecialchars(strip_tags($role));

            //Bind des paramètres
            $stmt->bindParam(':username', $username, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_INT);
            $stmt->bindParam(':password', $hashed_password, PDO::PARAM_STR);
            $stmt->bindParam(':role', $role, PDO::PARAM_STR);
            $result = $stmt->execute();
            $stmt->closeCursor();

            if($result > 0){
                $idUser = $this->getBdd()->lastInsertId();
                $user = new Users($idUser, $username, $email, $role, $phone, $password);
                $this->addUsers($user);
            }

    }

    public function readUsers()
    {
        $stmt = $req = $this->getBdd()->prepare("SELECT * FROM users");
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();

        foreach($users as $user)
        {
            $user = new Users($user['user_id'], $user['user_name'], $user['user_email'], $user['role'], $user['user_phone'], $user['user_password']);
            $this->addUsers($user);
        }
    }

    public function getUserById($id)
    {
        //parcourir le tableau de meals

        for($i=0; $i < count($this->users); $i++)
        {
            if($this->users[$i]->getUserId() == $id)
            {
                $userId = $this->users[$i];
                return $userId;
                
            }
        }

        throw new Exception("La page n'existe pas.");
    }

    public function deleteUserBdd($id)
    {
        $req = "DELETE FROM users WHERE user_id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            $user = $this->getUserById($id);
            unset($user);
        }
    }

    public function updateUserBdd($id, $name, $email, $phone)
    {
        $req = "UPDATE users 
        SET user_name = :name, user_email = :email, user_phone = :phone  
        WHERE 
        user_id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->bindValue(':name', $name, PDO::PARAM_STR);
        $stmt->bindValue(':email', $email, PDO::PARAM_STR);
        $stmt->bindValue(':phone', $phone, PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();

        if($result > 0){
            $user = $this->getUserById($id);
            $user->setUserName($name);
            $user->setUserEmail($email);
            $user->setUserPhone($phone);
        }
    }

   

}



?>
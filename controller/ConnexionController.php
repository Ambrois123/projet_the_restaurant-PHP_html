<?php 

require_once 'model/ConnexionModel.php';
require_once 'model/UsersModel.php';
require_once 'config/Security.php';

class ConnexionController
{
    private $connexionModel;
    private $usersModel;

    public function __construct()
    {
        $this->connexionModel = new ConnexionModel();
        $this->usersModel = new UsersModel();
        $this->usersModel->readUsers();
    }

    public function getConnexion()
    {
        $email = Security::securiteHTML($_POST['email']);
        $pwd = Security::securiteHTML($_POST['password']);
        $role = Security::securiteHTML($_POST['role']);

        
        $UserLogin = $this->connexionModel->connexionSystem($email,$role);
        $userPwdVerify = password_verify($pwd,$UserLogin['user_password']);
        
        if(!empty($_POST['email']) && !empty($_POST['password'])){

            if($userPwdVerify == $pwd && $role == "client"){

             $_SESSION['alert'] = [
                 "name" => $UserLogin['user_name'],
                 "email" => $UserLogin['user_email'],
                 "phone" => $UserLogin['user_phone']
             ];

                header('Location: '.URL.'resa_client');

               }else{
                
                    $_SESSION['error']=[
                        "msg_login" => "Les informations saisies sont incorrectes",
                    ];
        
                    header('Location: '.URL.'connexion');
                }
        }
        else{
            $_SESSION['conn']=[
                "msg" => "Veuillez remplir tous les champs",
            ];
            header('Location: '.URL.'connexion');
        }
       


    }

    
}
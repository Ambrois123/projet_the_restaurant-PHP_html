<?php 

require_once 'config/Security.php';
require_once 'model/AdminModel.php';
require_once 'model/UsersModel.php';

class AdminController
{
    //attribut

    private $adminModel;
    private $usersModel;

    public function __construct()
    {
        $this->adminModel = new AdminModel();
        $this->usersModel = new UsersModel();
        $this->usersModel->readUsers();
    }

    public function getPageLogin()
    {
        require "panel_admin/PageLogin.php";
    }

    public function getAdminAccueil()
    {
        require "panel_admin/adminAccueil.php";
    }

    public function connexionAdmin()
    {

        // protéger les données saisies par l'utilisateur
        $email = Security::securiteHTML($_POST['email']);
        $pwd = Security::securiteHTML($_POST['pwd']);
        $role = Security::securiteHTML($_POST['role']);

        // verifier si les données sont correctes
        $adminLogin = $this->adminModel->adminConnexionBDD($email,$role);
        $adminPwdVerify = password_verify($pwd,$adminLogin['user_password']);


        if(!empty($_POST['email']) || !empty($_POST['pwd']))
        {
        if($adminPwdVerify == $pwd && $role == "admin") {
            $_SESSION['admin'] = "admin";

            $_SESSION['alert']=[

                "msg" => "Bienvenue" .$adminLogin['user_name'],

            ];

            // echo "Vous êtes connecté en tant qu'administrateur";

            header('Location: '.URL.'admin/admin_accueil');

        }else{


            $_SESSION['error']=[
                "msg_login" => "Les informations saisies sont incorrectes",
            ];

            echo $_SESSION['error']['msg_login'];

            // header('Location: '.URL.'admin/login');
        }
                // header('Location: '.URL.'admin/accueil');
            
        }else{
            
            $_SESSION['alert']=[
                "message" => "Veuillez remplir tous les champs",
            ];

            echo $_SESSION['alert']['message'];

            header('Location: '.URL.'admin/login');
        }
        
    }

    public function deconnexion()
    {
        //détruit la session
        session_destroy();
        header("Location: ".URL."admin/login");
    }
}
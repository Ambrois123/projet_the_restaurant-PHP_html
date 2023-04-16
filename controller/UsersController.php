<?php 

require_once 'model/UsersModel.php';

class UsersController
{
    private $usersModel;

    public function __construct()
    {
        $this->usersModel = new UsersModel();
        $this->usersModel->readUsers();
        
    }

    public function insertUsersValidation()
    {
        //controle et insertion des données de la page client
    if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['role']) || empty($_POST['password']) || empty($_POST['phone'])) {
        $_SESSION['error'] = [
            "msg_input" => "Veuillez remplir tous les champs",
        ];
        header("Location:".URL."client");
        
    }else{
            $this->usersModel->InsertUsers($_POST['username'], $_POST['email'], $_POST['role'], $_POST['password'], $_POST['phone']);

            // enregistrement d'une information de session avant la redirection de la page
        $_SESSION['alert'] = [
            "name" => $_POST['username'],
            "email" => $_POST['email'],
            "phone" => $_POST['phone']
        ];

        //redirection vers la page clientValidate avec un message de confirmation

        header("Location: ".URL."validate");
    }
       
    }

    public function displayUsers()
    {
        $users = $this->usersModel->getUsers();
        require "panel_admin/adminUsers.php";
    }

    public function displayOneUser($id)
    {
        $user = $this->usersModel->getUserById($id);
        require "panel_admin/adminOneUser.php";
    }

    public function addUser()
    {
        require "client.php";
    }

    public function deleteUser($id)
    {
        //suppression en Bdd
        $this->usersModel->deleteUserBdd($id);

        //enregistrement d'une information de session avant la redirection de la page
        $_SESSION['alert'] = [
            "type" => "danger",
            "message" => "Le client a été bien supprimé"
        ];

        header("Location: ".URL."admin/client");
    }

    public function updateUser($id)
    {
        $user = $this->usersModel->getUserById($id);
        require "panel_admin/updateUser.php";
    }

    public function updateUserValidation()
    {
        $this->usersModel->updateUserBdd($_POST['ident'], $_POST['name'], $_POST['email'], $_POST['phone']);

        //enregistrement d'une information de session avant la redirection de la page
        $_SESSION['alert'] = [
            "type" => "success",
            "message" => "Le client a été bien modifié"
        ];

        header("Location: ".URL."admin/client");
    }

    public function getPageConnexion()
    {
        require "views/connexion.php";
    }

    //connexion client ou admin: la page connexion de la partie front.
    public function getTest()
    {
        
    //vérification des champs
    // if (empty($_POST['email']) || empty($_POST['password']) || empty($_POST['role'])) {
    //     $_SESSION['error'] = [
    //         "msg_input" => "Veuillez remplir tous les champs",
    //     ];
    //     $isValid = false;
    //     header("Location:".URL."connexion");
    // }

    // if (!empty($_POST['email']) || !empty($_POST['password']) || !empty($_POST['role'])) {
    //     $email = $_POST['email'];
    //     $password = $_POST['password'];
    //     $role = $_POST['role'];
    // }

    // //Vérification de l'email
    // if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    //     $_SESSION['error_email'] = [
    //         "msg_email" => "Veuillez entrer une adresse email valide",
    //     ];
    //     $isValid = false;
    //     header("Location:".URL."connexion");
    // }

    //Vérification du mot de passe

    // regex signifie: Le mot de passe doit comporter au moins 4 caractères, pas plus de 8 caractères,
    //et doit inclure au moins une lettre majuscule, une lettre minuscule et un chiffre.

    /*
    Revoir le controle du mot de passe
    */

    // if (!preg_match("^(?=.*\d).{4,8}$", $_POST['password'])) {
    //         $_SESSION['error_pwd'] = [
    //             "msg_password" => "Veuillez entrer un mot de passe valide",
    //         ];
    //         $isValid = false;
    //         header("Location:".URL."connexion");
    // }


        //Si conditions sont réunies, on vérifie si l'utilisateur existe dans la BDD

        // if ($this->usersModel->isConnexionValid($password, $email, $role)) 
        //             $_SESSION['connected'] = [
        //                 "email" => $email,
        //                 "role" => $role,
        //                 "msg" => "Vous êtes connecté en tant que" .$role,
        //             ];
        //             header("Location:".URL."admin/login");

            //si l'utilisateur existe, on vérifie son rôle
            // if ($role === "admin") {
            //     echo "admin";
            //     //si l'utilisateur est un admin, on le redirige vers la page admin
            //     header("Location:".URL."admin");
            // } else if($role === "client/validate_reservation_client") {
            //     echo "client";
            //     //si l'utilisateur est un client, on le redirige vers la page client
            //     header("Location:".URL."client");
            // }else{
            //     echo "erreur";
            //     //si l'utilisateur n'est ni un admin ni un client, on le redirige vers la page connexion
            //     // header("Location:".URL."connexion");
            // }
        
    }


}
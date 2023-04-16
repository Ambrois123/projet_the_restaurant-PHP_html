<?php 
session_start();

define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

//chargement des classes
require_once "controller/AdminController.php";
require_once "controller/PlatController.php";
require_once "controller/HoraireController.php";
require_once "controller/EntreeController.php";
require_once "controller/MainController.php";
require_once "controller/DessertController.php";
require_once "controller/BoissonController.php";
require_once "controller/MenuController.php";
require_once "controller/UsersController.php";
require_once "controller/ReservationController.php";
require_once "controller/VisiteurReservationController.php";
require_once "controller/ClientReservationController.php";
require_once "controller/ConnexionController.php";




//instantiation des controllers
$connexionController = new ConnexionController();
$clientReservationController = new ClientReservationController();
$visiteurReservationController = new VisiteurReservationController();
$reservationController = new ReservationController();
$usersController = new UsersController();
$menuController = new MenuController();
$boissonController = new BoissonController();
$dessertController = new DessertController();
$mainController = new MainController();
$entreeController = new EntreeController();
$horaireController = new HoraireController();
$adminController = new AdminController();
$platController = new PlatController();

try{

    if (empty($_GET['page'])) {

        $platController->getPageAccueil(); 
    
    }else {

        $url = explode("/",filter_var($_GET['page'], FILTER_SANITIZE_URL));

        switch($url[0]){
            //La route vers la partie front de l'application
            case 'accueil': $platController->getPageAccueil(); 
                break;
                //entrées, plats, desserts, boissons passent par entreeController
            case 'carte': $entreeController->getPageCarte();
                break;
            case 'menu': $menuController->getPageMenu();
                break;
            case 'client': 
                //Traitement du formulaire de l'inscription du client et redirection
                if (empty($url[1])){
                    require 'views/client.php';
                }else if($url[1] === "validate"){
                    $usersController->insertUsersValidation();
                }else if($url[1] === "validate_reservation_client"){
                    $clientReservationController->InsertClientReservation();
                }
                break;
            case 'validate': require 'views/clientValidate.php';
                break;
            case 'validate_reservation_client': require 'views/confirmationClientResa.php';
                break;
            case 'resa_client': require 'views/clientValidateResa.php';
                break;
            case 'page_client_connect': require 'views/pageClientConnect.php';
                break;
            case 'client_connect': 
                // require 'views/pageClientConnect.php';
                // require 'views/clientValidateResa.php';
                // $connexionController->getConnexion();
                break;


                //Traitement du formulaire de la réservation du visiteur et redirection
            case 'reservation': 
                if(empty($url[1])){
                    require 'views/reservation.php';
                }else if($url[1] === "resa_validate"){
                    $visiteurReservationController->InsertVisiteurReservation();
                }else if($url[1] === "validate_reservation_client"){
                    echo "réservation du client";
                }
                break;
            case 'resa_validate': require 'views/visiteurReservation.php';
                break;
                //Traitement de la connexion du client et de la réservation
            case 'connexion':
                if(empty($url[1])){
                    // require 'views/connexion.php';
                    $usersController->getPageConnexion();
                }else if($url[1] === "connect"){
                    $connexionController->getConnexion();
                } 
                
                break;
            

    //La route vers l'interface d'administration
            case 'admin': 
                if(empty($url[1])) throw new Exception("Les informations ne sont pas correctes");
                switch ($url[1]) {
                    case 'login': 
                        $adminController->getPageLogin();
                        break;
                    case 'connexion': 
                        // echo "la page de connexion";
                        $adminController->connexionAdmin();
                        break;
                    case 'admin_accueil': 
                        $adminController->getAdminAccueil();
                        break;
                    case 'deconnexion': $adminController->deconnexion();
                        break;
                    case 'plat':
                        if (empty($url[2])) {
                            $platController->displayMeals();
                        } else if($url[2] === "one"){
                            $platController->displayOneMeal($url[3]);
                        } else if($url[2] === "add"){
                            $platController->addMeal();
                        } else if($url[2] === "delete"){
                            $platController->deleteMeal($url[3]);
                        }else if($url[2] === "update"){
                            $platController->updateMeal($url[3]);
                        }else if($url[2] === "validate"){
                            $platController->insertMealsValidation();
                        }else if($url[2] === "validate_update"){
                            $platController->updateMealsValidation();
                        }
                        break;
                    case 'hours':
                        if (empty($url[2])) {
                            $horaireController->displayOpeningHours();
                        }else if($url[2] === "one"){
                            $horaireController->displayOneHour($url[3]);
                        }else if($url[2] === "add"){
                            $horaireController->addHour();
                        }else if($url[2] === "validate"){
                            $horaireController->insertHoursValidation();
                        }else if($url[2] === "delete"){
                            $horaireController->deleteHour($url[3]);
                        }else if($url[2] === "update"){
                            $horaireController->updateHour($url[3]);
                        }else if($url[2] === "validate_update"){
                            $horaireController->updateHoursValidation();
                        }
                        break;
                    case 'entree':
                        if (empty($url[2])){
                            $entreeController->displayEntrees();
                        }else if($url[2] === "one"){
                            $entreeController->displayOneEntree($url[3]);
                        }else if($url[2] === "add"){
                            $entreeController->addEntree();
                        }else if($url[2] === "delete"){
                            $entreeController->deleteEntree($url[3]);
                        }else if($url[2] === "update"){
                            $entreeController->updateEntree($url[3]);
                        }else if($url[2] === "validate"){
                            $entreeController->insertEntreesValidation();
                        }else if($url[2] === "validate_update"){
                            $entreeController->updateEntreesValidation();
                        }
                        break;
                    case 'plat_principal':
                        if (empty($url[2])){
                            $mainController->displayMains();
                        }else if($url[2] === "one"){
                            $mainController->displayOneMain($url[3]);
                        }else if($url[2] === "add"){
                            $mainController->addMain();
                        }else if($url[2] === "delete"){
                            $mainController->deleteMain($url[3]);
                        }else if($url[2] === "update"){
                            $mainController->updateMain($url[3]);
                        }else if($url[2] === "validate"){
                            $mainController->insertMainsValidation();
                        }else if($url[2] === "validate_update"){
                            $mainController->updateMainsValidation();
                        }
                        break;
                    case 'dessert':
                        if (empty($url[2])){
                            $dessertController->displayDesserts();
                        }else if($url[2] === "one"){
                            $dessertController->displayOneDessert($url[3]);
                        }else if($url[2] === "add"){
                            $dessertController->addDessert();
                        }else if($url[2] === "delete"){
                            $dessertController->deleteDessert($url[3]);
                        }else if($url[2] === "update"){
                            $dessertController->updateDessert($url[3]);
                        }else if($url[2] === "validate"){
                            $dessertController->insertDessertsValidation();
                        }else if($url[2] === "validate_update"){
                            $dessertController->updateDessertsValidation();
                        }
                        break;
                    case 'boisson':
                        if (empty($url[2])){
                            $boissonController->displayBoissons();
                        }else if($url[2] === "one"){
                            $boissonController->displayOneBoisson($url[3]);
                        }else if($url[2] === "add"){
                            $boissonController->addBoisson();
                        }else if($url[2] === "delete"){
                            $boissonController->deleteBoisson($url[3]);
                        }else if($url[2] === "update"){
                            $boissonController->updateBoisson($url[3]);
                        }else if($url[2] === "validate"){
                            $boissonController->insertBoissonsValidation();
                        }else if($url[2] === "validate_update"){
                            $boissonController->updateBoissonsValidation();
                        }
                        break;
                    case 'menu':
                        if (empty($url[2])){
                            $menuController->displayMenus();
                        }else if($url[2] === "one"){
                            $menuController->displayOneMenu($url[3]);
                        }else if($url[2] === "add"){
                            $menuController->addMenu();
                        }else if($url[2] === "validate"){
                            $menuController->insertMenuValidation();
                        }else if($url[2] === "delete"){
                            $menuController->deleteMenu($url[3]);
                        }else if($url[2] === "update"){
                            $menuController->updateMenu($url[3]);
                        }else if($url[2] === "validate_update"){
                            $menuController->updateMenuValidation();
                        }
                        break;
                    case 'client':
                        if (empty($url[2])){
                            $usersController->displayUsers();
                        }else if($url[2] === "one"){
                            $usersController->displayOneUser($url[3]);
                        }else if($url[2] === "delete"){
                            $usersController->deleteUser($url[3]);
                        }else if($url[2] === "update"){
                            $usersController->updateUser($url[3]);
                        }else if($url[2] === "validate_update"){
                            $usersController->updateUserValidation();
                        }
                        break;
                    case 'reservation':
                        if (empty($url[2])){
                            $reservationController->displayReservation();
                        }else if($url[2] === "one"){
                            $reservationController->displayOneReservation($url[3]);
                        }else if($url[2] === "delete"){
                            $reservationController->deleteReservation($url[3]);
                        }else if($url[2] === "update"){
                            $reservationController->updateReservation($url[3]);
                        }else if($url[2] === "validate_update"){
                            $reservationController->updateReservationValidation();
                        }
                        break; 
                    case 'test' :
                        $connexionModel->readUserForConnexion();
                        break;    
                    default : throw new Exception("La page n'existe pas.");
                    
                }
                break;
            default : throw new Exception("La page n'existe pas.");
        }
    }

}catch(Exception $err){
    $msg = $err->getMessage();
    //Création page d'erreur pour afficher les messages d'erreur
    require "panel_admin/errorPage.php";
}

?>
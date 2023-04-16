<?php 

require_once 'model/PlatModel.php';
//Pour afficher heure sur la page d'accueil
require_once 'model/HoraireModel.php';

class PlatController
{
    private $platModel;
    private $horaireModel;

    public function __construct()
    {
        $this->platModel = new PlatModel();
        $this->platModel->readMeals();
        $this->horaireModel = new HoraireModel();
        $this->horaireModel->readHours();
    }

    public function displayMeals()
    {
        $meals = $this->platModel->getMeals(); 
        require "panel_admin/adminPlat.php";
    }

    //fonction pour afficher les plats et horaires sur la page d'accueil
    public function getPageAccueil()
    { 
        $meals = $this->platModel->getMeals(); 
        $hours = $this->horaireModel->getHours();
        require "views/accueil.php";
    }

    public function displayOneMeal($id)
    {
        $meal = $this->platModel->getMealById($id);
        // echo $meal->getMealsTitle();
        require "panel_admin/adminOnePlat.php";
    }

    public function addMeal()
    {
        require "panel_admin/addPlat.php";
    }

    public function insertMealsValidation()
    {
        $file = $_FILES['image'];
        $repertoire =  "public/images/";
        $imageAdded = $this->addImage($file, $repertoire);
        $this->platModel->InsertMeals($_POST['title'], $_POST['description'], $_POST['price'], $imageAdded);

        //enregistrement d'une information de session avant la redirection de la page
        $_SESSION['alert'] = [
            "type" => "success",
            "message" => "Le plat a été bien ajouté"
        ];

        header("Location: ".URL."admin/plat");

    }

    public function deleteMeal($id)
    {
        //récupération de l'image à supprimer
        $mealImage = $this->platModel->getMealById($id)->getMealsImage();
        //supprimer image
        unlink("public/images/".$mealImage);
        //suppression en Bdd
        $this->platModel->deleteMealBdd($id);

        //enregistrement d'une information de session avant la redirection de la page
        $_SESSION['alert'] = [
            "type" => "danger",
            "message" => "Le plat a été bien supprimé"
        ];


        header("Location: ".URL."admin/plat");
    }

    public function updateMeal($id)
    {
        $meal = $this->platModel->getMealById($id);
        require "panel_admin/updatePlat.php";
        
    }

    public function updateMealsValidation()
    {
        //Récupération de l'image actuelle
        $currentImage = $this->platModel->getMealById($_POST['ident'])->getMealsImage();

        //Vérification si une nouvelle image est demandée
        $file = $_FILES['image'];

        if($file['size'] > 0){
            //Suppression de l'ancienne image
            unlink("public/images/".$currentImage);
            //Ajout de la nouvelle image
            $repertoire =  "public/images/";
            $imageToAdd = $this->addImage($file, $repertoire);
        }else{
            $imageToAdd = $currentImage;
        }

         //Mise à jour de la Bdd
         $this->platModel->updateMealBdd($_POST['ident'], $_POST['title'], $_POST['description'], $_POST['price'], $imageToAdd);
         
         //enregistrement d'une information de session avant la redirection de la page
        $_SESSION['alert'] = [
            "type" => "success",
            "message" => "La modification a été bien réalisée"
        ];

         
         header("Location: ".URL."admin/plat");
    }

    private function addImage($file, $dir){
        if(!isset($file['name']) || empty($file['name']))
            throw new Exception("Vous devez indiquer une image");
    
        if(!file_exists($dir)) mkdir($dir,0777);
    
        $extension = strtolower(pathinfo($file['name'],PATHINFO_EXTENSION));
        $random = rand(0,99999);
        $target_file = $dir.$random."_".$file['name'];
        
        if(!getimagesize($file["tmp_name"]))
            throw new Exception("Le fichier n'est pas une image");
        if($extension !== "jpg" && $extension !== "jpeg" && $extension !== "png" && $extension !== "gif")
            throw new Exception("L'extension du fichier n'est pas reconnu");
        if(file_exists($target_file))
            throw new Exception("Le fichier existe déjà");
        if($file['size'] > 500000)
            throw new Exception("Le fichier est trop gros");
        if(!move_uploaded_file($file['tmp_name'], $target_file))
            throw new Exception("l'ajout de l'image n'a pas fonctionné");
        else return ($random."_".$file['name']);
    }

    

        

        

}
?>
<?php

ob_start();

/*
Page de confirmation de la réservation des clients
 */

?>
    
 

<main class="main_container_reservation">
        <div class="container_reservation">
            <div class="container_reservation_title">
                <h1>Bonjour <?= $_SESSION['alert']['name']?> , </h1>
                <p>Votre table est bien réservée. Voici les informations que vous avez fournies:</p>
                <p>Nom et prénom: <?= $_SESSION['alert']['name']?></p>
                <p>Email: <?= $_SESSION['alert']['email']?></p>
                <p>Téléphone: <?= $_SESSION['alert']['phone']?></p>
                <p>Couverts: <?= $_SESSION['alert']['couvert']?></p>
                <p>Date: <?= $_SESSION['alert']['date']?></p>
                <p>Allergies: <?= $_SESSION['alert']['allergies']?></p>

                <p>Vous pouvez vous déconnecter <a href="<?= URL ?>accueil">Déconnexion</a> </p>
            </div>
            
        </div>
</main>

<?php 

unset($_SESSION['alert']);


?>

<?php
$content= ob_get_clean();

require_once("template.php");
?>
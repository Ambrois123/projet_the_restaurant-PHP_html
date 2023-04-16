<?php

ob_start();

/*
Cette page est la confirmation de la création du compte client
Elle donne la possibilité à l'utilisateur de réserver une table
ou de retourner à la page d'accueil
si réservation table, une redirection vers la page clientValidateResa.php
 */

?>
    
 

<main class="main_container_reservation">
        <div class="container_reservation">
            <div class="container_reservation_title">
                <h1>Bonjour <?= $_SESSION['alert']['name']?> , </h1>
                <p>Votre compte a été bien crée. Voici les informations que vous avez forunies:</p>
                <p>Nom et prénom: <?= $_SESSION['alert']['name']?></p>
                <p>Email: <?= $_SESSION['alert']['email']?></p>
                <p>Téléphone: <?= $_SESSION['alert']['phone']?></p>

                <p>Vous pouvez réserver votre table en cliquant sur le bouton suivant : <a href="<?=URL?>resa_client">Réservez votre table</a> </p>
                <p>ou retourner à <a href="<?= URL ?>accueil">la page d'accueil</a> </p>
            </div>
            
        </div>
</main>

<?php 




?>

<?php
$content= ob_get_clean();

require_once("template.php");
?>
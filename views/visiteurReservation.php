<?php

ob_start();

?>
    
 

<main class="main_container_reservation">
        <div class="container_reservation">
            <div class="container_reservation_title">
                <h1>Bonjour <?= $_SESSION['resa']['name']?> , </h1>
                <p>Votre réservation est validée. Voici le résumé de votre réservation:</p>
                <p>Nom et prénom: <?= $_SESSION['resa']['name']?></p>
                <p>Email: <?= $_SESSION['resa']['email']?></p>
                <p>Téléphone: <?= $_SESSION['resa']['phone']?></p>
                <p>Nombre de couverts: <?= $_SESSION['resa']['couvert']?></p>
                <p>Date et heure: <?= $_SESSION['resa']['date']?></p>
                <p>Allergies: <?= $_SESSION['resa']['allergies']?></p>

                <p>Nous vous remercions pour votre réservation. Vous pouvez déconnecter: <a href="<?= URL ?>accueil">Déconnexion</a> </p>
            </div>
            
        </div>
</main>

<?php 




?>

<?php
$content= ob_get_clean();

require_once("template.php");
?>
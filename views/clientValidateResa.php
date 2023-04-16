<?php
ob_start();

/**
 * Le client peut réserver une table avec ses informations générales préremplies.
 * LA page qui s'ouvre quand le client se connecte à son compte
 */
?>
    

<main class="main_container_reservation">
        <div class="container_reservation">
            <div class="container_reservation_title">
                <h1>Bonjour <?= $_SESSION['alert']['name']?> , 
                veuillez complétez le formulaire pour réserver votre table. </h1>
            </div>
            <?php 

                if(!empty($_SESSION['error'])):
                    ?>
                    <div class="error_container">
                        <p class="error"><?=$_SESSION['error']['msg_input'];?></p>
                    </div>
                    
                    <?php 
                    unset($_SESSION['error']);
                    
                    endif; ?>
            <div class="container_reservation_form">
            <form action="<?= URL ?>client/validate_reservation_client" method="post">
                <input type="text" id="name" name="username" placeholder="Nom et prénom" value="<?= $_SESSION['alert']['name']?>">

                <input type="email" id="email" name="email" placeholder="Email" value="<?= $_SESSION['alert']['email']?>">
                <input type="tel" id="phone" name="phone" placeholder="Téléphone" value="<?= $_SESSION['alert']['phone']?>">
         
                <label for="couvert"></label>
                <input type="number" min="0" id="couvert" name="couvert" placeholder="Nombre de couverts" value="">
                
                <input type="datetime-local" id="date" name="date" value="">

                <input type="hidden" name="statut" >
                
                <textarea name="allergies" id="allergies" cols="3" rows="3" placeholder="Des allergies ?" value=""></textarea>
                
                <div class="reservation_btn">
                    <input type="submit" name="reservation_btn" value="Réserver">
                </div>
            </form>
            </div>

            
        </div>
</main>

<?php
$content= ob_get_clean();

require_once("template.php");
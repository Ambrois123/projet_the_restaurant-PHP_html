<?php

ob_start();
?>

<main class="container_reservation">
            <div class="container_reservation_title">
                <h1>Réservez votre table</h1>
                <p>Le restaurant vous accueille dans un 
                    cadre exceptionnel pour des moments inoubliables.</p>
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
            <form action="<?= URL ?>reservation/resa_validate" method="post">

                <label for="username"></label>
                <input type="text" id="username" name="username" placeholder="Votre nom et prénom" >
                
                
                <label for="email"></label>
                <input type="email" id="email" name="email" placeholder="Votre adresse mail" >


                <label for="phone"></label>
                <input type="tel" id="phone" name="phone" placeholder="Votre numéro de téléphone">

                 
                <label for="couvert"></label>
                <input type="number" min="0" id="couvert" name="couvert" placeholder="Nombre de couverts" >
                
                
                <input type="datetime-local" id="date" name="date" placeholder="Date et heure">

                
                <textarea name="allergies" id="allergies" cols="4" rows="4" placeholder="Des allergies ?"  ></textarea>

                <select name="role" id="role" style="display:none;">
                    <option value="visiteur">visiteur</option>
                </select>

                <div class="reservation_btn">
                    <input type="submit" name="reservation_btn" value="Réserver">
                </div>
            </form>
            </div>
</main>


<?php
$content= ob_get_clean();

require_once("template.php");
<?php
ob_start();

?>




        <section class="container_client">
            <div class="container_client_title">
                <h1>Devenez client</h1>
                <p>Nous serons à vos côtés pour l'organisation 
                    de vos événements privés. Vous serez aussi 
                    informés des nouveautés de votre restaurant.
                </p>
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

            <div class="container_client_form">
                <form action="<?= URL ?>client/validate" method="post">   
                    <label for="username"></label>
                    <input type="text" id="username" name="username" placeholder="Votre nom et prénom" value="" >
                    <p class="error"><?php echo isset($err_username) ? $err_username: "";?></p>
                    
                    <label for="email"></label>
                    <input type="email" id="email" name="email" placeholder="Votre adresse mail" value="" >
                    

                    <label for="phone"></label>
                    <input type="tel" id="phone" name="phone" placeholder="Votre numéro de téléphone" value="" >
                    <p class="error"><?php echo isset($err_phone) ? $err_phone: ""?></p>
                    <p class="error"><?php echo isset($err_phone_format) ? $err_phone_format: "";?></p>

                    <label for="password"></label>
                    <p class="password">Le mot de passe doit être composé de 4 à 8 chiffres et comprendre au moins un chiffre.</p>
                    <input type="password" id="password" name="password" placeholder="Choisir votre mot de passe" value="" >
                    <p class="error"><?php echo isset($err_password) ? $err_password: ""?></p>
                    <p class="error"><?php echo isset($err_password_format) ? $err_password_format: "";?></p>
                    

                    <select name="role" id="role" style="display:none;">
                        <option value="client">client</option>
                    </select>
                    
                    
                    
                    <div class="client_btn">
                        <input type="submit" name="submit" value="Valider">
                    </div>
                </form>
            </div>
        </section>
</main>

<?php
$content= ob_get_clean();

require_once("template.php");
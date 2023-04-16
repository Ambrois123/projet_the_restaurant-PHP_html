<?php 
ob_start();

?>

<main class="main_container_connexion">
        <section class="container_connexion">
            <div class="container_connexion_title">
                <h1>Page de connexion</h1>
                <p>Chers-es clients -tes connectez-vous à votre compte et laissez-vous guider.</p>
            </div>
            <?php 

                if(!empty($_SESSION['error'])):
            ?>
                    <div class="error_container">
                        <p class="error"><?=$_SESSION['error']['msg_login'];?></p>
                    </div>
                <?php 
                    unset($_SESSION['error']); 
                endif; ?>

                
                    
            <div class="container_connexion_form">
                <form action="<?= URL ?>connexion/connect" method="post">
                
                    <label for="email"></label>
                <?php 
                    if(!empty($_SESSION['error_email'])):
                ?>
                        <div class="error_container">
                            <p class="error"><?=isset($_SESSION['error_email']) ? $_SESSION['error_email']['msg_email'] : "";?></p>
                        </div>
                <?php 
                        unset($_SESSION['error_email']); 
                endif;?>
                    <input type="email" id="email" name="email" placeholder="Votre login" >

                    <label for="password"></label>
                <?php 
                    if(!empty($_SESSION['error_pwd'])):
                ?>
                    <div class="error_container">
                        <p class="error"><?=isset($_SESSION['error_pwd']) ? $_SESSION['error_pwd']['msg_password'] : "";?></p>
                    </div>
                <?php 
                    unset($_SESSION['error_pwd']); 
                endif;?>
                    <input type="password" id="password" name="password" placeholder="Votre mot de passe" >

                    <div class="select-form">
                        <select name="role" id="role" style="display: none;" >
                            <option value="client">Client</option>
                        </select>
                    </div>
                    
                    <div class="connexion_btn">
                        <input type="submit" value="Valider">
                    </div>
                </form>
            </div>
        </section>
    </main>


<?php
$content = ob_get_clean();
require_once("template.php");

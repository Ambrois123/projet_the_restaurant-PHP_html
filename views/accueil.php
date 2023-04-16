<?php

ob_start();
unset($_SESSION['alert']);
echo password_hash("8520", PASSWORD_DEFAULT);
?>
 
<main class="accueil_container">
    <section class="accueil_container_title">
        <h1>Bienvenue au restaurant</h1>
        <p>Nous mettons tout en oeuvre pour vous 
        faire vivre la plus belle aventure culinaire.
        </p>
    </section>

    <section class="accueil_container_boxes">
        <div class="accueil_container_boxes_title">
            <h3>Venez goûtez les incontournables du chef le plus étoilés de France.</h3>
        </div>
        <div class="boxes">
        <?php
        for($i=0; $i < count($meals);$i++) : 
        ?>
            <div class="box box_1">
                <img src="public/images/<?= $meals[$i]->getMealsImage() ?>" alt="">
                <div class="overlay">
                    <div class="overlay_title">
                        <span><?= $meals[$i]->getMealsTitle(); ?></span><br>
                        
                    </div>
                </div>
            </div>
        <?php endfor; ?>
        </div>
        <div class="reserve_btn">
            <button class="nav_btn_reservation">
                <a href="<?=URL?>reservation">Réservez</a>
            </button>
        </div>
    </section>

    <section class="opening_hours-map">
        <article class="opening_hours">
            <div class="opening_hours_title">
                <h3>Horaires d'ouverture</h3>
            </div>
            <div class="opening_hours_content">
            <?php
            for($i=0; $i < count($hours);$i++) : 
            ?>
                <div class="opening_hours_content_hours">
                    <p class="hours"><?=$hours[$i]->getDayOfWeek(); ?> : <?=$hours[$i]->getOpeningTime(); ?> - <?=$hours[$i]->getClosingTime(); ?></p>
                </div>
            <?php endfor; ?>
            </div>
        </article>
        <article class="opening_hours">
            <div class="opening_hours_title">
                <h3>Plan d'accès</h3>
            </div>
            <div class="restaurant_map">
                <iframe 
                src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d11557.396497637726!2d1.4724846!3d43.5992719!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sfr!2sfr!4v1678956372985!5m2!1sfr!2sfr" 
                width="300" 
                height="250" 
                style="border:0;" 
                referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </article>
    </section>

</main>

<?php
$content= ob_get_clean();

require_once("template.php");
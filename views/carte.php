<?php
ob_start();
?>
<main class="carte_main_container">
    <section class="carte_container">
        <h1>Nos plats</h1>
        <article>
            <div class="carte_box_1">
                <div class="carte_box carte_container_entree">
                    <h4>ENTREES</h4>
                    <?php
                    for($i=0; $i < count($entrees);$i++) : 
                    ?>
                    <div class="plat_row">
                        <p><?=$entrees[$i]->getEntreeName();?></p>
                        <p><?=$entrees[$i]->getEntreeDescription();?></p>
                        <span><?=$entrees[$i]->getEntreePrice();?> €</span>
                    </div>
                    <?php endfor ?>
                </div>
                <div class="carte_box carte_container_plat">
                    <h4>PLATS</h4>
                    <?php
                    for($i=0; $i < count($mains);$i++) : 
                    ?>
                    <div class="plat_row">
                        <p><?=$mains[$i]->getPlatName();?></p>
                        <p><?=$mains[$i]->getPlatDescription();?></p>
                        <span><?=$mains[$i]->getPlatPrice();?> €</span>
                    </div>
                    <?php endfor ?>
                </div>
                </div>
            <div class="carte_box_2">
                <div class="carte_box carte_container_dessert">
                    <h4>DESSERTS</h4>
                    <?php
                    for($i=0; $i < count($desserts);$i++) : 
                    ?>
                    <div class="plat_row">
                        <p><?=$desserts[$i]->getDessertName();?></p>
                        <p><?=$desserts[$i]->getDessertDescription();?></p>
                        <span><?=$desserts[$i]->getDessertPrice();?> €</span>
                    </div>
                    <?php endfor ?>
                </div>
                <div class="carte_box carte_container_boisson">
                    <h4>NOS COCKTAILS</h4>
                    <?php
                    for($i=0; $i < count($boissons);$i++) : 
                    ?>
                    <div class="plat_row">
                        <p><?=$boissons[$i]->getBoissonName();?></p>
                        <p><?=$boissons[$i]->getBoissonDescription();?></p>
                        <span><?=$boissons[$i]->getBoissonPrice();?> €</span>
                    </div>
                    <?php endfor ?>
                </div>
            </div>
        </article>
    </section>
</main>

<?php
$content= ob_get_clean();
require_once("template.php");
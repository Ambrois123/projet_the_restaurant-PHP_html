<?php
ob_start();
?>
<main class="main_container_menus">
    <section class="menus_container">
        <h1>Nos menus ou formules</h1>
        <article class="menus_container_boxes">
        <?php
        for($i=0; $i < count($menus);$i++) : 
        ?>
            <div class="menus_box ">
                <h4><?=$menus[$i]->getMenuName();?></h4>
                <div class="menus_row">
                    <p><?=$menus[$i]->getChoixEntree();?></p>
                    <p><?=$menus[$i]->getChoixPlat1();?></p>
                    <p>ou</p>
                    <p><?=$menus[$i]->getChoixPlat2();?></p>
                    <span><?=$menus[$i]->getMenuPrice();?> €</span>
                </div>
            </div>
        <?php endfor ?>

        </article>
    </section>
</main>
<?php
$content= ob_get_clean();

require_once("template.php");
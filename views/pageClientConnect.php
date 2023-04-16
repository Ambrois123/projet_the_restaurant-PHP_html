<?php 
ob_start();

?>
<h1>Page client connecté</h1>
<?php 
if(!empty($_SESSION['alert'])):
?>

<main>
    <input type="text" value="<?= $_SESSION['alert']['name']?>">
    <input type="text" value="">
    <input type="text" value="">
</main>
    
<?php

endif; ?>

<?php
$content = ob_get_clean();
require_once("template.php");

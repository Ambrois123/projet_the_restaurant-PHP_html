<?php



ob_start();
?>

<?= $msg ?>


<?php
$titre = "Page d'erreur ";
$content = ob_get_clean();
require_once 'adminTemplate.php';

?>
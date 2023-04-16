<?php
    ob_start();
?>

<?php
$titre = "<h1>Page d'administration du site</h1>";
$content = ob_get_clean();
require_once 'adminTemplate.php';

?>
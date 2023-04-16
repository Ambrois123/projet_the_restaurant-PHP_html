<?php 

require_once '../model/User.php';
require_once '../model/UserModel.php';
$usersModel = new UsersModel();

$users = $usersModel->getUsers();

?>

<p><?= $users[5]->getUserId() ?></p>
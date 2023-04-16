
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" 
        href="https://cdn.jsdelivr.net/npm/bootswatch@5.2.3/dist/cerulean/bootstrap.min.css">
    <title>Panel d'administration</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">LE RESTAURANT </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarColor01">
      <ul class="navbar-nav me-auto">

      <?php if(!Security::verifAccess()) :?>

        <li class="nav-item">
          <a class="nav-link active" href="<?= URL ?>admin/login">Login</a>
        </li>

      <?php else : ?>
        <li class="nav-item">
          <a class="nav-link active" href="<?= URL ?>admin/admin_accueil">Accueil</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?= URL ?>admin/hours">Horaire</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL ?>admin/plat">Plats de chef</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL ?>admin/entree">Entrée</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL ?>admin/plat_principal">Plats</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL ?>admin/dessert">Desserts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL ?>admin/boisson">Boissons</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL ?>admin/menu">Menus</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL ?>admin/client">Clients</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?= URL ?>admin/reservation">Reservation</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="<?= URL ?>admin/deconnexion">Deconnexion</a>
        </li>
        <?php endif ?>
      </ul>
    </div>
  </div>
</nav>
<main class="container_fluid  ">
    <h1 class="text-center text-uppercase text-dark"><?= $titre ?></h1>
    <?= $content ?>
</main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
    crossorigin="anonymous"></script>
</body>
</html>
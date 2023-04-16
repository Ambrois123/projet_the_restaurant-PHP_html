<?php ob_start(); ?>

<div class="container_fluid d-flex align-items-center justify-content-center flex-column pt-5">

<form action="<?= URL ?>admin/connexion" method="POST" class="p-5 w-50">
  <div class="mb-3">
    <label for="email" class="form-label"></label>
    <input type="email" class="form-control rounded-0 border border-success" id="email" name="email" placeholder="Votre email">
  </div>
  <div class="mb-3">
    <label for="password" class="form-label"></label>
    <input type="password" class="form-control rounded-0 border border-success" id="password" name="pwd" placeholder="Votre mot de passe">
  </div>
  <select name="role" id="role" style="display:none;">
                    <option value="admin">admin</option>
                </select>
    <button type="submit" class="btn btn-success rounded-0 border border-success">Valider</button>
  </div>
</form>
</div>

<?php 
$content = ob_get_clean();
$titre = "Page de login";
require_once "panel_admin/adminTemplate.php";
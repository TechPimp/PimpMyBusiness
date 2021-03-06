<style>
    <?php include 'assets/css/style.css'; ?>
</style>
<div class="singin-wrapper">
<div class="circle"></div>
  <div class="head-wrapper">
    <div class="title">Tech Pimp</div>
    <div class="content-text-inscription">
      <p class="text-inscription">Bonjour, c'est la première fois que vous vous connecter.</p>
      <p class="text-inscription">Veuillez remplir les informations ci-dessous.</p>
    </div>
  </div>
  <form class="form-inscription" action="/auth" method="post">
    <div class="label-wrapper">
      <label class="label-inscription">
        <p class="text-form">Host mySQL</p>
        <input class="input-inscription" type="text" name="dbhost" value="" required>
      </label>
      <label class="label-inscription">
        <p class="text-form">Port de la BDD</p>
        <input class="input-inscription" type="text" name="port" value="" required>
      </label>
      <label class="label-inscription">
        <p class="text-form">Nom de la DB</p>
        <input class="input-inscription" type="text" name="dbname" value="" required>
      </label>
      <label class="label-inscription">
        <p class="text-form">Username de la DB</p>
        <input class="input-inscription" type="text" name="dbuser" value="" required>
      </label>
      <label class="label-inscription">
        <p class="text-form">Mot de passe de la DB</p>
        <input class="input-inscription" type="password" name="dbpass" value="">
      </label>
      <label class="label-inscription">
        <p class="text-form">Choisir un mot de passe d'admin du site</p>
        <input class="input-inscription" type="text" name="mdp" value="" required>
      </label>
    </div>
    <div class="save-container">
      <input class="save-inscription" type="submit" name="" value="Enregistrer">
    </div>
  </form>
</div>

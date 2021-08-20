<?php 

use App\Controllers\userController;
$user = new userController();

if(!empty($_POST)){
  $resp = $user->create(
    $_POST['username'],
    $_POST['email'],
    $_POST['password']
  );

  if($resp){
    echo '<p><mark class="tertiary">Usuario creado correctamente.</mark></p>';
  }else{
    echo '<p><mark class="tertiary">Ocurrió un problema al procesar los datos.</mark></p>';
  }
  header('Refresh: 1');
}
?>

<div class="row">
  <div class="col-sm">
  </div>
  <div class="col-sm-12 col-md-8 col-lg-6" style="height: calc(100vh - 10.25rem); display: flex; align-items: center; flex: 0 1 auto;">
    <form method="POST">
      <fieldset>
        <legend>Sing up form</legend>
        <div class="input-group fluid">
          <label for="username" style="width: 80px;">Username</label>
          <input type="text"  id="username" name="username" minlength="3" maxlength="10"  placeholder="username">
        </div>
        <div class="input-group fluid">
          <label for="pwd" style="width: 80px;">Email</label>
          <input type="email" id="email" name="email"  id="email" maxlength="30" placeholder="email">
        </div>

        <div class="input-group fluid">
          <label for="pwd" style="width: 80px;">Password</label>
          <input type="password" id="password" name="password"  minlength="3" maxlength="10" placeholder="password">
        </div>
        <div class="input-group fluid">
          <input type="submit"  class="primary" value="Create Account">
        </div>
      </fieldset>
    </form>
  </div>
  <div class="col-sm">
  </div>
</div>
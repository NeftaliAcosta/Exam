<?php 

use App\Controllers\sessionnController;

$session = new sessionnController();


if(!empty($_POST)){
  $session->login(
    $_POST['username'],
    $_POST['password']
  );
  $resp = $session->check();

  header('Refresh:0; url=user');
}

?>

<div class="row">
  <div class="col-sm">
  </div>
  <div class="col-sm-12 col-md-8 col-lg-6" style="height: calc(100vh - 10.25rem); display: flex; align-items: center; flex: 0 1 auto;">
    <form method="POST">
      <fieldset>
        <legend>Sing in form</legend>
        <div class="input-group fluid">
          <label for="username" style="width: 80px;">Username</label>
          <input type="text" id="username" name="username" minlength="3" maxlength="10" placeholder="username">
        </div>
        <div class="input-group fluid">
          <label for="pwd" style="width: 80px;">Password</label>
          <input type="password" id="password" name="password" minlength="3" maxlength="10" placeholder="password">
        </div>
        <div class="input-group fluid">
          <input type="submit"  class="primary" value="Sing in">
          <a href="lost-password" class="primary" >Forgot passwor?</a>
        </div>
      </fieldset>
    </form>
  </div>
  <div class="col-sm">
  </div>
</div>
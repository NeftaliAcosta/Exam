<?php 

  use App\Controllers\userController;
  $user = new userController(1);

  if(!empty($_POST)){
    $resp = $user->setUser($_POST['username'])
      ->setEmail($_POST['email'])
      ->setPassword($_POST['password'])
      ->update();

    if($resp){
      echo '<p><mark class="tertiary">Datos actualizados correctamente.</mark></p>';
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
        <legend>User panel</legend>
        <div class="input-group fluid">
          <label for="username" style="width: 80px;">Username</label>
          <input type="text"  id="username" name="username" minlength="3" maxlength="10" value="<?php echo $user->getUser() ?>" placeholder="username">
        </div>
        <div class="input-group fluid">
          <label for="pwd" style="width: 80px;">Email</label>
          <input type="email" id="email" name="email"  maxlength="30" value="<?php echo $user->getEmail() ?>" placeholder="email">
        </div>

        <div class="input-group fluid">
          <label for="pwd" style="width: 80px;">Password</label>
          <input type="text" id="password" name="password" minlength="3" maxlength="10" value="<?php echo $user->getPassword() ?>" placeholder="password">
        </div>
        <div class="input-group fluid">
          <input type="submit"  class="primary" value="Update">
        </div>
      </fieldset>
    </form>
  </div>
  <div class="col-sm">
  </div>
</div>
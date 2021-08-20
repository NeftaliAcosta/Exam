
<?php 
use App\Controllers\resetpasswordController;

$url = $_SERVER['REQUEST_URI'];

$data = explode("email=",$url);
$resp = false;
if(sizeof($data)>1){
	$email = $data[1];

	$reset = new resetpasswordController();
	$resp = $reset->checkEmail($email);


	if(isset($_POST['password1']) && isset($_POST['password2']) ){
		$resp = $reset->update(
			$_POST['password1'],
			$_POST['password2']
		);

		if($resp){
			echo '<p><mark class="tertiary">La contraseña se actualizó correctamente.</mark></p>';
			header('Refresh:1; url=signin');
		}else{
			echo '<p><mark class="tertiary">La contraseña ingresada no es igual.</mark></p>';
		}
	}
}
?>

<?php if($resp): ?>
<div class="row">
	<div class="col-sm">
	</div>
	<div class="col-sm-12 col-md-8 col-lg-6" style="height: calc(100vh - 10.25rem); display: flex; align-items: center; flex: 0 1 auto;">
		<form method="POST">
			<fieldset>
				<legend>Forgot password</legend>
				<div class="input-group fluid">
					<label for="email" style="width: 80px;">Password:</label>
					<input type="text" id="password1" name="password1"  placeholder="Enter password" required="">
				</div>

				<div class="input-group fluid">
					<label for="email" style="width: 80px;">Confirm password:</label>
					<input type="text" id="password2" name="password2"  placeholder="Confirm password" required="">
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

<?php else: ?>
	<?php header('Refresh:0; url=home') ?>
<?php endif; ?>
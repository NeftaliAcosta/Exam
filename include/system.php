<?php 

use App\Controllers\routeController,
App\Controllers\sessionnController;

$route = new routeController();
$session = new sessionnController();

$check = $session->check();
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mini System</title>
  <link href="https://gitcdn.link/cdn/Chalarangelo/mini.css/e849238d198c032c9d3fa84ccadf59ea7f0ad06c/dist/mini-default.min.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="resources/mycss.css">
</head>
<body>
  <header class="sticky">
    <a href="home" role="button">Home</a>
    
    <?php if($check): ?>
      <a href="user" role="button">User</a>
      <a href="signout" role="button">Sign out</a>
    <?php else : ?>
      <a href="signin" role="button">Sign in</a>
      <a href="signup" role="button">Sign up</a>
    <?php endif; ?>


  </header>
  <br />
  <div class="container">
    <?php echo $route->init();  ?>
  </div>
  <footer>
    <p>Exam of Neftalí Marciano Acosta</a>
    </p>
  </footer>
</body>
</html>
<?php 
use App\Controllers\sessionnController;
$session = new sessionnController();
$session->logout();
header('Refresh:0; url=home');
<?php
if (!$_SESSION) {
  session_start();  
}

  unset($_SESSION["mwusuario"]); 
  session_destroy();
  header("Location: ../index.php");
  exit;

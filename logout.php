<?php

session_start();

if (!isset($_SESSION["login"])) {
  echo "<script>
        alert('Harus Login Dahulu!!!');
        document.location.href = 'login.php';
      </script>";
  exit;
}

//kosongkan session user login
$_SESSION =[];

session_unset();
session_destroy();
header("Location: login.php");


?>
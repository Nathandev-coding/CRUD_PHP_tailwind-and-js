<?php
  $severname = "localhost";
  $username = "root";
  $password = "";
  $database = "composant_backend";
  
  //connexion a la base données

  $conn = new mysqli($severname,$username,$password,$database);

  //verifier si la connexio et etablie
  if($conn->connect_error){
    die("connexion echouer" . $conn->connect_error);
  }
?>
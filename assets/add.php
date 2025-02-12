<?php
   include_once 'database.php';

    if($_SERVER["REQUEST_METHOD"] == "POST"){
      $nom = $_POST['nom'];
      $prenom = $_POST['prenom'];
      $email = $_POST['email'];
      $genre = $_POST['genre'];
      $password = $_POST['password'];
    
      $sql = "INSERT INTO `user_tb`(`id_user`, `nom`, `prenom`, `email`, `genre`, `password`) VALUES (NULL,'$nom','$prenom','$email','$genre','$password')";
    
      if($conn->query($sql) === TRUE){
         header('Location: ../index.php?msg= utilisateur ajouté avec succès');
      }else{
         echo "Erreur: " . $sql . "<br>" . $conn->error;
      }
    }
 
?>
<?php
include("./inc/pdo.php");

    if(isset($_POST['email'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
        $nom=$_POST['nom'];
        $prenom=$_POST['prenom'];
        $age=$_POST['age'];
        $sexe=$_POST['sexe'];
        $telephone=$_POST['telephone'];
        $adresse=$_POST['adresse'];
        $profil=$_POST['profil'];
        $tags=$_POST['tags'];
        $rq = " INSERT INTO `user`(`email`, `password`, `nom`, `prenom`, `age`, `sexe`, `telephone`, `adresse`, `profil`, `tags`) 
        VALUES ('$email','$password','$nom','$prenom','$age','$sexe','$telephone','$adresse', '$profil','$tags')";
        $create =  $pdo->prepare($rq);
        $create->execute();
    }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Selection</title>
    <script src="./assets/js/selection.js" defer></script>
</head>
<body>
    <h1>Selectionnez vos titres de match :</h1>
    <div>
        <input type="text" id="search">
    </div>
    <div id="result"></div>
    <div id="titres" style="border:1px red solid;"></div>
</body>
</html>
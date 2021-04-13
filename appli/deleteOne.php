<?php
    session_start();

    if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
        echo "<p>Aucun produit en session...</p>";
    }else{
        $retrait = $_GET['retrait']; //référence du produit à retirer

        $array = $_SESSION['products']; //attribue le tableau à $array

        array_splice($_SESSION['products'], $retrait, 1); //fonction PHP qui retire l'élément situé au rang enregistré dans 
    }
    header("Location:index.php");
?>
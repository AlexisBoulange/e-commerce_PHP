<?php
    session_start();
    if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
        echo "<p>Aucun produit en session...</p>";
    }else{
        unset($_SESSION['products']);
    }
    header("Location:index.php");
?>

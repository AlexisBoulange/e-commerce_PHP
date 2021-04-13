<?php
    session_start();

    $ref = $_GET['ajout']; //référence du produit choisi        

    if(isset($_SESSION['products'])){
        $ref['qtt'] = $_SESSION['products'][$ref]['qtt'] ++;
    }
    header("Location:index.php");
?>
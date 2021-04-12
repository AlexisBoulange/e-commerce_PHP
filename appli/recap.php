<?php
    session_start();
    ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    
    <title>Récapitulatif des produits</title>
</head>
<body>
    <?php
    //On rajoute une condition qui permet de vérifier si la clé "products" du tab $_SESSION n'existe pas avec "!isset()" ou que celle-ci existe mais ne contient aucune donnée avec "empty()"
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            echo "<p>Aucun produit en session...</p>";
        }
        else{
            echo "<table>",
                    "<thead>",
                        "<tr>",
                            "<th>#</th>",
                            "<th>Nom</th>",
                            "<th>Prix</th>",
                            "<th>Quantité</th>",
                            "<th>Total</th>",
                        "</tr>",
                    "</thead>",
                    "<tbody>";
            $totalGeneral = 0;
            foreach($_SESSION['products'] as $index => $product){
                echo "<tr>",
                        "<td>".$index."</td>",
                        "<td>".$product['name']."</td>",
                        // &nbsp; est l'entitée d'espace
                        //number_format permet de modifier l'affichage tel que : $var à modifier, nb de décimales, char séparateur décimal et le char séparateur de milliers
                        "<td>".number_format($product['price'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                        "<td>".$product['qtt']."</td>",
                        "<td>".number_format($product['total'], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "</tr>";
                $totalGeneral+= $product['total'];
            }
            echo "<tr>",
                    "<td colspan=4>Total général : </td>",
                    "<td><strong>". number_format($totalGeneral, 2, ",", "&nbsp;"). "&nbsp;€</strong></td>",
                "</tr>",
                "</tbody>",
                "</table>";
        }
    ?>
</body>
</html>

<?php
$titre = "Récapitulatif";
$contenu = ob_get_clean();
require "template.php";

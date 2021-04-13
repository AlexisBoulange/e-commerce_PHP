
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $titre ?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    
</head>

<body>
    <header>
    <nav class="navbar navbar-expand-md navbar-dark static-top bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">Accueil</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav me-auto mb-2 mb-md-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Index</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="recap.php">Récapitulatif</a>
                </ul>
                <form class="d-flex">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
        
    </nav>
    </header>

    <div class=" container panier">
        <?php
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            echo "<p>Aucun produit en session...</p>";
        }else{
            foreach($_SESSION['products'] as $index => $product){
                echo "<tr>",
                        "<td>".$product['name']." </td>",
                        "<td>" . $product['qtt'] . "<a href='addOne.php?ajout=" . $index . "'> Ajouter </a><a href='minusOne.php?moins=" . $index . "'> Enlever </a> <a href='deleteOne.php?retrait=".$index."'>Supprimer</a> </td>",
                    "</tr><br/>";
            }
        }?>
        <a href="deleteAll.php">Vider le panier</a>
    </div>
    <div class="container contenu">
    <?= $contenu ?>
    
    </div>


    <footer class="footer mt-auto py-3 bg-light">
        <div class="container">
            <span class="text-muted">Footer</span>
        </div>
    </footer>


</body>

</html>

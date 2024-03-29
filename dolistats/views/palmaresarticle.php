<!DOCTYPE html>
<html lang="Fr">

<head>
    <title>Dolistats - Palmarès articles</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../fontawesome-free-5.10.2-web/css/all.css">
    <link rel="stylesheet" href="../css/stylePalmares.css">
    <link rel="stylesheet" href="../css/errorMessage.css">
</head>

<body>
    <div class="container nav">
        <!-- Nav-bar -->
        <div class="row"></div>
        <div class="row col-xs-12">
            <div class="col-xs-5">
                <form action="index.php" method="post">
                    <div class="col-xs-2">
                        <input type="hidden" name="controller" value="Articles">
                        <input type="hidden" name="apiUrl" value="<?php echo $apiUrl;?>">
                        <input type="hidden" name="username" value="<?php echo $username;?>">
                        <input type="hidden" name="apiKey" value="<?php echo $apiKey;?>">
                        <button type="submit" class="boutonNavbar" title="Recherche articles"><img class="logoNav" src="../assets/RechercheArticleMenu.png"
                        alt="logo Recherche Articles"></button>
                    </div>
				</form>
                <form action="index.php" method="post">
                    <div class="col-xs-2">
                        <input type="hidden" name="controller" value="Clients">
                        <input type="hidden" name="apiUrl" value="<?php echo $apiUrl;?>">
                        <input type="hidden" name="username" value="<?php echo $username;?>">
                        <input type="hidden" name="apiKey" value="<?php echo $apiKey;?>">
                        <button type="submit" class="boutonNavbar" title="Recherche clients"><img class="logoNav" src="../assets/RechercheClientMenu.png"
                        alt="logo Recherche clients"></button>
                    </div>
                </form>
                <form action="index.php" method="post">
                    <div class="col-xs-2">
                        <input type="hidden" name="controller" value="PalmaresArticles">
                        <input type="hidden" name="apiUrl" value="<?php echo $apiUrl;?>">
                        <input type="hidden" name="username" value="<?php echo $username;?>">
                        <input type="hidden" name="apiKey" value="<?php echo $apiKey;?>">
                        <button type="submit" class="boutonNavbar" title="Palmares articles"><img class="logoNav" src="../assets/PalmaresArticlesMenu.png" 
                        alt="logo palmares articles"></button>
                    </div>
				</form>
                <form action="index.php" method="post">
                    <div class="col-xs-2">
                        <input type="hidden" name="controller" value="palmaresClient">
                        <input type="hidden" name="apiUrl" value="<?php echo $apiUrl;?>">
                        <input type="hidden" name="username" value="<?php echo $username;?>">
                        <input type="hidden" name="apiKey" value="<?php echo $apiKey;?>">
                        <button type="submit" class="boutonNavbar" title="Palmares clients"><img class="logoNav" src="../assets/PalmaresClientMenu.png" 
                        alt="logo palmares client"></button>
                    </div>
                </form>
                <form action="index.php" method="post">
                    <div class="col-xs-2">
                        <input type="hidden" name="controller" value="chiffreAffaire">
                        <input type="hidden" name="apiUrl" value="<?php echo $apiUrl;?>">
                        <input type="hidden" name="username" value="<?php echo $username;?>">
                        <input type="hidden" name="apiKey" value="<?php echo $apiKey;?>">
                        <button type="submit" class="boutonNavbar" title="Affichage chiffre d'affaire"><img class="logoNav" src="../assets/ComparaisonCAMenu.png" 
                        alt="logo CA"></button>
                    </div>
                </form>
            </div>
            <div class="col-xs-5">
                <!--Espace dans la navbar-->
            </div>
            <div class="col-xs-2">
                <form action="index.php" method="post">
                    <div class="col-xs-7"> <?php echo $username ?>
                        <input hidden name="controller" value="Home">
                        <input hidden name="action" value="deconnexion">
                        <button type="submit" name="deconnexion" value="true" title="Déconnexion">Déconnexion</button>
                    </div>
                    <div class="col-xs-5"><img class="logoNav" src="../assets/Logo.png" alt="logo Doli"></div>
                </form>
            </div>
        </div>
    </div>
    <div class="container ">
        <div class="row">
            <p class="titre">Palmarès Articles</p>
        </div>
    <!-- Recherche par critères -->
    <div class="row">
        <div class="search-box A">
            <form action="index.php" method="post">
                <div class="col-xs-12 part">
                    Entrez le nombre d'articles :
                    <input class="nb" type="search" name="rechercheNb" id="search-input" required value="<?php
                                                                                                            if (isset($_POST['rechercheNb'])) {
                                                                                                                echo $_POST['rechercheNb'];
                                                                                                            } else {
                                                                                                                echo '5';
                                                                                                            }
                                                                                                            ?>">
                    <input type="radio" id="quantite" name="choix" value="qty"checked> <label for="quantite">En quantité</label>
                    <input type="radio" id="ca" name="choix" value="ca"> <label for="ca">En chiffre d'affaires</label>
                </div>
                <div class="col-xs-12 part">
                    De
                    <input type="date" name="dateDe" required value="<?php
                                                                    if (isset($_POST['dateDe'])) {
                                                                        echo $_POST['dateDe'];
                                                                    }
                                                                    ?>">
                    à
                    <input type="date" name="dateA" required value="<?php
                                                                    if (isset($_POST['dateA'])) {
                                                                        echo $_POST['dateA'];
                                                                    }
                                                                    ?>">
                    <input type="hidden" name="controller" value="PalmaresArticles">
                    <input type="hidden" name="action" value="palmares">
                    <input type="hidden" name="apiUrl" value="<?php echo $apiUrl; ?>">
                    <input type="hidden" name="apiKey" value="<?php echo $apiKey; ?>">
                    <input type="hidden" name="username" value="<?php echo $username;?>">
                    <button type="submit" name="valider" class="search-button">Valider</span></button>
                </div>
            </form>
        </div>
    </div>
    <?php 
    if(isset($httpStatus) && $httpStatus != 200) {
        ?>
        
        <h2 class="error-message">Vous n'avez pas les droits nécessaires</h2>

        <?php
    } else {
    if (isset($_POST['valider']) && isset($_POST['choix'])) {
        $Donnees = []; // une hashmap, clef libelle et valeur CA ou quantité du produit
        $Ref = []; // une hashmap, clef ref et valeur CA ou quantité du produit
        $ligneLibelle = "";
        $ligneQuantite = "";
        $LeTitreQ = "Quantité de produits";
        $LeTitreCA = "Euros obtenue";
        date_default_timezone_set('Europe/Paris');
        foreach ($resultat as $ligne) {
            $timestamp = $ligne['date_valid']; // renvoie un timestamp
            $date = date('Y-m-d', $timestamp); // format date bd et input date différents
            // Dans l'intervalle de date
            if ($date >= $_POST['dateDe'] && $date <= $_POST['dateA']) {
                foreach ($ligne['lines'] as $wanted) {
                    if ($_POST['choix'] == 'qty') {
                        // Somme des quantités
                        if (array_key_exists($wanted['libelle'], $Donnees)) {
                            $Donnees[$wanted['libelle']] = $Donnees[$wanted['libelle']] + $wanted['qty'];
                            $Ref[$wanted['ref']] = $Ref[$wanted['ref']] + $wanted['qty'];
                        } else {
                            $Donnees[$wanted['libelle']] = $wanted['qty'];
                            $Ref[$wanted['ref']] = $wanted['qty'];
                        }
                    } else {
                        // Somme CA
                        if (array_key_exists($wanted['libelle'], $Donnees)) {
                            $Donnees[$wanted['libelle']] = $Donnees[$wanted['libelle']] + $wanted['price'] * $wanted['qty'];
                            $Ref[$wanted['ref']] = $Ref[$wanted['ref']] + $wanted['price'] * $wanted['qty'];
                        } else {
                            $Donnees[$wanted['libelle']] = $wanted['price'] * $wanted['qty'];
                            $Ref[$wanted['ref']] = $wanted['price'] * $wanted['qty'];
                        }
                    }
                }
            }
        }
        echo " <p class=\"alert alert-info\"> <b>Merci de renseigner un nombre d'articles inférieur ou égal à ". count($Donnees) ." </b></p>";
        // Top
        while (count($Donnees) != $_POST['rechercheNb']) { 
            if (count($Donnees) == 0) {
                echo " <p class=\"alert alert-danger\"> <b>Affichage impossible, vide pour ce top</b> </p>";
                break;
            }
            // On cherche le min
            $min1 = array_search(min($Donnees), $Donnees);
            $min2 = array_search(min($Ref), $Ref);
            // On supprime le min des données
            unset($Donnees[$min1]);
            unset($Ref[$min2]);
        }
        // Ordre décroissant
        arsort($Donnees);
        arsort($Ref); 
        // Affichage sous forme de liste
        echo "<div class=\"row\">";
        echo "<table class=\"table table-striped\">";
        echo  "<tr>
                <th>Réf.</th>
                <th>Désignation</th>
                <th>";if ($_POST['choix'] == 'qty') {
                    echo "Quantite";
                } else {
                    $CA = true;
                    echo "Chiffre d'Affaires HT";
                }
        echo    "</th>";
        echo    "</tr>";
        $compteKeys = 0;
        foreach ($Donnees as $label => $quantite) {
            if ($ligneLibelle != "") $ligneLibelle .= ",";// Mise en forme graphique
            $ligneLibelle .= '"' . $label . '"';

            if ($ligneQuantite != "") $ligneQuantite .= ",";// Mise en forme graphique
            $ligneQuantite .= '"' . $quantite . '"';

            // Affichage sous forme de liste
            $keyRef = array_keys($Ref);
            echo "<tr>";
            echo "<td>" . $keyRef[$compteKeys] . "</td>"; 
            $compteKeys ++;
            echo "<td>" . $label . "</td>";
            $euro = "";
            if(isset($CA) && $CA) {
                $quantite = sprintf("%.2f",$quantite);
                $euro = "€";
            }
            echo "<td>".$quantite.$euro."</td>";
            echo "</tr>";
        }
        echo "</table>";
        echo "<div row col-xs-6 width=\"400\" height=\"225\" >";
        echo "<canvas id=\"myChart\"></canvas>";
        echo "</div>";
        echo "</div>";
        $ligneLibelle = "[" . $ligneLibelle . "]";  // Ajout des crochets
        $ligneQuantite = "[" . $ligneQuantite . "]";  // Ajout des crochets 
    ?>
        </div>
        <script type="text/javascript" src="../jchart4-2-1-Min.js"></script>
        <script>
            // setup 
            const data = {
                labels: <?php echo $ligneLibelle; ?>,

                datasets: [{
                    label: '<?php if ($_POST['choix'] == 'qty') {
                                echo $LeTitreQ;
                            } else {
                                echo $LeTitreCA;
                            }
                            ?>',
                    data: <?php echo $ligneQuantite; ?>,
                    backgroundColor: 'rgb(56, 108, 132)', 

                    borderWidth: 1
                }]
            };
            console.log(data);

            const config1 = {
                type: 'bar',
                data,
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };
            const myChart = new Chart(document.getElementById('myChart'), config1);

            
        </script>
    <?php }
    }   ?>
    </div>
</body>

</html>

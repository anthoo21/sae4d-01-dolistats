<!DOCTYPE html>
<html lang="Fr">
  <head>
      <title>Dolistats - Recherche articles</title>
      <meta charset="utf-8">
	  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	  <link rel="stylesheet" href="../fontawesome-free-5.10.2-web/css/all.css">
	  <link rel="stylesheet" href="../css/styleFacture.css"> 
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
            <p class="titre">Historique des factures</p>
            <p class="sousTitre">du client <?php echo $nomClient;?> </p>
        </div>
		
		<!--Liste des factures-->
        <?php   
        if(isset($httpStatus) && $httpStatus != 200) {
            ?>
            <div class="error-message">
                Droit
            </div>
        </div>
            <?php
        } else {
            if(isset($resultat)) {
        ?>
        <div class="row">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>N° facture</th>
                        <th>Date</th>
                        <th>Total HT</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                date_default_timezone_set('Europe/Paris');
                foreach($resultat as $ligne) {
                    if($ligne['socid'] == $idClient) {
                        $timestamp = $ligne['date'];
				        $date = date('d/m/Y', $timestamp);
                        echo "<tr class=\"accordion\">";
                            echo "<td>".$ligne['ref']."</td>";
                            echo "<td>".$ligne['id']."</td>";
                            echo "<td>".$date."</td>";
                            echo "<td>".sprintf("%.2f",$ligne['total_ht'])."€</td>";
                            echo "<td><button class=\"accordion-button\"></button></td>";
                        echo "</tr>";
                        echo "<tr class=\"accordion-content\">";
                        echo "<td></td>";
                        echo "<td>
                        <table class=\"table\">
                        <tr>
                            <th>Code article</th>
                            <th>Libellé</th>
                            <th>TVA</th>
                            <th>Prix à l'unité HT</th>
                            <th>Remise</th>
                            <th>Prix après remise HT</th>
                            <th>Quantité</th>
                            <th>Total HT</th>
                        </tr>";
                        foreach($ligne['lines'] as $ligne2) {
                               echo "<tr>
                                        <td>".$ligne2['ref']."</td>
                                        <td>".$ligne2['libelle']."</td>
                                        <td>".sprintf("%.2f",$ligne2['tva_tx'])."%</td>
                                        <td>".sprintf("%.2f",$ligne2['subprice'])."€</td>
                                        <td>".$ligne2['remise_percent']."%</td>
                                        <td>".sprintf("%.2f",$ligne2['subprice'])*(1-((sprintf("%.2f",(float)$ligne2['remise_percent']/100))))."€</td>
                                        <td>".$ligne2['qty']."</td>
                                        <td>".sprintf("%.2f",$ligne2['total_ht'])."€</td>
                                    </tr>";
                            }
                        for($i = 0; $i <= 4; $i++) {
                            if($ligne['totalpaid'] == null) {
                                $paye = 0;
                            } else {
                                $paye = sprintf("%.2f",$ligne['totalpaid']);
                            }
                            $totalHT = sprintf("%.2f",$ligne['multicurrency_total_ht']);
                            $totalTVA = sprintf("%.2f",$ligne['multicurrency_total_tva']);
                            $totalTTC = sprintf("%.2f",$ligne['multicurrency_total_ttc']);
                            $resteAPayer = sprintf("%.2f",$ligne['remaintopay']);
                            echo "<tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            ";
                            if($i == 0) {
                                echo "<td>Total HT</td>
                                <td>".$totalHT."€</td>";
                            }
                            if($i == 1) {
                                echo "<td>Total TVA</td>
                                <td>".$totalTVA."€</td>";
                            }
                            if($i == 2) {
                                echo "<td>Total TTC</td>
                                <td>".$totalTTC."€</td>";
                            }
                            if($i == 3) {
                                echo "<td>Payé</td>
                                <td>".$paye."€</td>";
                            }
                            if($i == 4) {
                                echo "<td>Reste à payer</td>
                                <td>".$resteAPayer."€</td>";
                            }

                            "</tr>";
                        }
                        echo "</table>                
                        </td>";
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td></td>";
                            }
                        echo "</tr>";
                    }
                }
        }
                ?>
                </tbody>
            </table>
        </div>
	</div>
    <script>
        const accordionButtons = document.querySelectorAll('.accordion-button');

        for (let i = 0; i < accordionButtons.length; i++) {
        const accordionButton = accordionButtons[i];
        accordionButton.addEventListener('click', function() {

            const accordionRow = this.parentNode.parentNode;
            const accordionContentRow = accordionRow.nextElementSibling;
            accordionContentRow.classList.toggle('active');
        });
        }

    </script>
  </body>
</html>

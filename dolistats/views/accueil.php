<!DOCTYPE html>
<html lang="Fr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../fontawesome-free-5.10.2-web/css/all.css">
    <link rel="stylesheet" href="../css/styleAccueil.css">
    <title>Dolistats - Accueil</title>
</head>

<?php 
if(isset($resultat)) {
    foreach($resultat as $ligne) {
        $apiKey = $ligne['token'];
        $message = $ligne['message'];
    }
    $delimiter_pos = strpos($message, "-");
    $username = trim(substr($message, 8, $delimiter_pos - 8));
}
?>
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
			<div class="col-md-5 col-sm-3 col-xs-3">
			<!--Espace dans la navbar-->
			</div>
			<div class="col-md-2 col-sm-4 col-xs-4">
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
    <div class="container">
        <div class="row">
            </br></br></br></br></br>
            <p class="titre">Bienvenue sur Dolistats !</p>
            <p class="sousTitre"> Votre application web de statistiques.</p>
            <p>Vous pouvez accéder, depuis la navbar, au différents menus.</br>
            (recherche articles, recherche clients, ...)</p>
        </div>
    </div>
</body>

</html>

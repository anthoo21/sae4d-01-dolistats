<!DOCTYPE html>
<html lang="Fr">
  <head>
      <title>Dolistats - Connexion</title>
      <meta charset="utf-8">
	  <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
	  <link rel="stylesheet" href="../fontawesome-free-5.10.2-web/css/all.css">
	  <link rel="stylesheet" href="../css/style.css"> 
  </head>
  
  <body class="body">
		<!--Image accueil-->
		<div class="row">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<div class="logoDoli">
                    <img class="logo" src="../assets/Logo.png" alt="Logo Doli">
				</div>
			</div>	
		</div>
		<!--Authentification-->
		<div class="row container menu">
			<div class="col-md-12 col-sm-12 col-xs-12">
				<form action="index.php" method="post">
					<p class="titre">Dolistats</p>
					<?php 
						if(isset($codeHttp)) { ?>
							<div class="row">
								<h3 class="enRouge center">Identifiant ou mot de passe incorrect !</h3>
							</div>
						<?php
						}?>
					<div class="row">
						<!--Identifiant-->
						<div class="col-xs-2"></div>
						<div class="col-xs-3 <?php if(isset($login) && $login == "") { echo "enRouge";}?> ">
							<h4>Identifiant : </h4>				
						</div>
						<div class="col-xs-5">
							<input type="text" name="login" class="form-control saisie fond">
						</div>
						<div class="col-xs-2"></div>
					</div>
					<div class="row">
						<!--Mot de passe-->
						<div class="col-xs-2"></div>
						<div class="col-xs-3 <?php if(isset($password) && $password == "") { echo "enRouge";}?>">
							<h4>Mot de passe : </h4>
						</div>
						<div class="col-xs-5">
							<input type="password" name="password" class="form-control saisie fond">
						</div>
						<div class="col-xs-2"></div>
					</div>
					<div class="row btnConnect">
						<input type="hidden" name="controller" value="Home">
						<input type="hidden" name="action" value="connexion">
                        <input type="hidden" name="apiUrl" value="<?php echo $apiUrl ?>">
						<input type="submit" name="connexion" value="Se connecter" class="buttonConnect">
						</form>
					<?php
					?>
				<form action="index.php" method="post">
					<input type="hidden" name="controller" value="Home">
					<input type="hidden" name="action" value="retourUrl">
					<input type="submit" name="connexion" value="Retourner au choix de l'URL" class="buttonConnect">
				</form>
				</div>

			</div>	
		</div>
  </body>
</html>

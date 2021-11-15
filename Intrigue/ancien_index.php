<?php
/* Connexion BD */
include("connexion.php");

/* inclusion de fonctions */
//include("fonction/utile.php");

$req1 = "SELECT * FROM spectacle ORDER BY RAND() LIMIT 3 ";
$retour_req1 = $PDO->query($req1);
$data1 = $retour_req1->fetchAll(PDO::FETCH_OBJ);



?>


<!DOCTYPE html>
<html>
 <head>
	<meta charset="utf-8" />
  	<link href="css/style.css" rel="stylesheet" type="text/css" />
	<title>Intrigue</title>

</head>
<body>
<!-- DEBUT de la page -->
<?=include("header.php");?>


<!-- Millieu de page <em> -->
	<section>
				

				<header>Bienvenue</header>
				<p>Théâtre-Opéra <strong>Intrigue</strong> à le plaisir de réouvrir ses portes</p>
				<p>Parcourez nos affiches du moment et plonger dans le coeur de l'action à travers nos différents artiste</p>
				<p>Bonne naviguation !</p>
	</section>

	<section>
		<h2>Au hasard...</h2>
		
		<table>
			<?php foreach ($data1 as $k => $unSpectacle) : ?>
            <tr>
                <th><?=$unSpectacle->titre;?></th>
                <th><img src = "<?=$unSpectacle->img_spectacle;?>" width="25%" ></th>
                <th><?=tronquer_texte(($unSpectacle->description));?></th>        
                <th><?=$unSpectacle->prix_sceance;?></th>
				<th><a id="a_spectacle" href="vue_spectacle.php?spectacle=<?=$unSpectacle->id_spectacle;?>"> Voir les détails</a></th>
            </tr>
        <?php endforeach;?>
		</table>
	</section>
	<?=include("footer.php");?>
</body>
</html>
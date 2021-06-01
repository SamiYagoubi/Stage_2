<html>
	
	<head>
        <meta charset="UTF-8" >
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
       
	</head>

	<body>
			<center>
<?php

		echo "<h2> Liste des anciens éléves </h2>";
		$serveur ="localhost";
		$bdd ="ecoleg";
		$user ="root";
		$mdp="";
		//connexion au serveur
		$connexion = mysqli_connect($serveur, $user, $mdp);
		mysqli_select_db($connexion, $bdd);
		$requete = "select Nom, Prenom, Mail, Specialisation from ancienetud order by nom asc; ";
		$resultats = mysqli_query($connexion,$requete);
		echo "<table border =1 >";
		echo "<tr><td>Nom</td><td>Prenom</td><td>Mail</td><td>Specialisation</td></tr>";
		while ($ligne = mysqli_fetch_assoc($resultats ))
		{
		echo "<tr><td>".$ligne["Nom"]."</td>
						<td>".$ligne["Prenom"]."</td>
						<td>".$ligne["Mail"]."</td>
						<td>".$ligne["Specialisation"]."</td></tr>" ;
						
		}
		echo "</table>";
		mysqli_close($connexion);
?>
</center>
	</body>
</html>	
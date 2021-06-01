<?php
function connexion ()
{
	$con = mysqli_connect("localhost", "root", "", "ecoleg");
	if ($con == null)
	{
		echo "<br/> Erreur de connexion au serveur </br>";
	}
	return $con;
}
function deconnexion ($con)
{
	mysqli_close($con);
}
/*********************************************************************/
function insertEtudiant ($tab)
{
	$con = connexion ();
	if($con != null)
		{
			$requete ="insert into etudiant values (null, '".$tab['nom'] ."','".$tab['prenom'] ."','".$tab['mail'] ."','".$tab['mdp'] ."');";
			mysqli_query($con, $requete);
			deconnexion($con);
		}
}
	
function selectALLetudiant ()
{
	$con = connexion ();
	if( $con != null)
	{
		$requete ="select * from etudiant;";
		$resultats = mysqli_query($con, $requete);
		deconnexion ($con);
		return $resultats;
	}
}
	
function deleteEtudiant ($idEtudiant)
{
	$con = connexion ();
	if ($con != null)
	{
		$requete ="delete from etudiant where idEtudiant =".$idEtudiant.";";
	}
}

?>
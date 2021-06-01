<?php

if(isset($_POST['username']) && isset($_POST['password']))
{
// on la démarre :)

    $db_username = 'root';
    $db_password = '';
    $db_name     = 'ecoleg';
    $db_host     = 'localhost';
    $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
           or die('could not connect to database');

    $username = mysqli_real_escape_string($db,htmlspecialchars($_POST['username'])); 
    $password = mysqli_real_escape_string($db,htmlspecialchars($_POST['password']));

    if($username !== "" && $password !== "")
    {
        $requete = "SELECT count(*) FROM etudiant where 
              mail = '".$username."' and mdp = '".$password."' ";
        $exec_requete = mysqli_query($db,$requete);
        $reponse      = mysqli_fetch_array($exec_requete);
        $count = $reponse['count(*)'];
        if($count==1)
        {

            $requete = "SELECT * FROM etudiant where 
                  mail = '".$username."' and mdp = '".$password."' ";
            $exec_requete = mysqli_query($db,$requete);
            $reponse      = mysqli_fetch_array($exec_requete);
            // var_dump($reponse);die();
            session_start ();
            $_SESSION['id'] = $reponse['0'];
            $_SESSION['username'] = $reponse['1'];
            $_SESSION['prenom'] = $reponse['2'];
            $_SESSION['mail'] = $reponse['3'];
            $_SESSION['password'] = $reponse['4'];
           header('Location: index2.php');
        }
        else
        {
           header('Location: login.php?erreur=1'); 
        }
    }
    else
    {
       header('Location: login.php?erreur=2');
    }
}
else
{
   header('Location: login.php');
}
mysqli_close($db);
?>
<?php
include("fonction.php");
?>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    </head>
    <center>
  <div class="contener">
    <div class="row">
    <div class="col-12">
<br/>
<h2 align="middle"> Inscription </h2>
<br> 
<form method="post" action="">
<table border="0">
<tr><legend> Nom :</legend>
    <legend> <input type="text" name="nom"></legend>
</tr>

<tr><legend> Prénom :</legend>
    <legend> <input type="text" name="prenom"></legend>
</tr>

<tr><legend> Adresse mail :</legend>
    <legend> <input type="text" class="form-control" name="mail"></legend>
</tr>

<tr><legend> Mot de passe :</legend>
    <legend> <input type="text" class="form-control" name="mdp" required pattern="^[A-Za-z0-9]+$"></legend>
</tr>
<p>
<tr> <legend>
<input align="middle" type="submit" name="Valider" href="log-in.php" value="Inscription">
    </legend>
<p>
</p>

<a href="index.php>"> <img src="img/retour.png"class="btn btn-primary"   align="center" role="button" width="2.5%" > </img></a>

</tr>
</table>
</form>
</div>
</div>
</div>
</center>
    <?php
        if (isset($_POST['Valider']))
        {
            insertEtudiant($_POST);
            echo "<br/> Insertion du compte réussie </br>";
        }

    ?>
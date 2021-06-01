<html>
<head>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<style>
    body {
  color: white;
}
     body {background-color: black;}
</style>
</head>
<body>
    <div class="contener">
    <div class="row">
    <div class="col-12">
<form class="box" action="verification.php" method="post" name="login">
<center>
                        <br> <h1 class="box-title">Connexion</h1> </br>
<br>
        <tr>
                                            <legend> Username:</legend>
                <input type="text" class="box-input" name="username" placeholder="Mail de l'utilisateur">
        </tr>
</br>
<br>
        <tr>
                                            <legend> Mot de passe:</legend>
                    <input type="password" class="box-input" name="password" placeholder="Mot de passe">
        </tr>
</br>
<br><input type="submit" value="LOGIN" class="box-button"></br>
<br>
<a href="index.php"> <img src="img/retour.png"class="btn btn-primary"   align="center" role="button" width="2.5%" > </img></a>
</br>
<p class="box-register">Vous êtes nouveau ici? <a href="sign-in.php">S'inscrire</a></p>

 <?php
                if(isset($_GET['erreur'])){
                    $err = $_GET['erreur'];
                    if($err==1 || $err==2)
                        echo "<p style='color:red'>Utilisateur ou mot de passe incorrect</p>";
                }
 ?></p>
 </center>
</form>
</div>
</div>
</div>
</body>
</html>
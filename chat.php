<?php 
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Notre super chat !</title>
  <link rel="stylesheet" href="css/app.css">
 <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
  <header>
    <h1 style="text-align: center;">Le chat du réseaux des anciens !</h1>
  </header>
  <?php 

  ?>
  <section class="chat">
    <div class="messages">
       <?php 
       $db = new PDO('mysql:host=localhost;dbname=ecoleg;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);
       global $db;

  // 1. On requête la base de données pour sortir les 500 derniers messages
  $resultats = $db->query("SELECT * FROM messages ORDER BY created_at DESC LIMIT 500");
  // 2. On traite les résultats

  $messages = $resultats->fetchAll();
  // var_dump($messages);die();
  // 3. On affiche les données sous forme de JSON
  $tab=count($messages);
  for ($i=0;$i< $tab;$i++){ 
     echo "<span class='date'> à  ".$messages[$i]['created_at'].", </span>
          <span class='author'>  l'id  ".$messages[$i]['IdEtudiant']." à écrit </span> : 
          <span class='content'>".$messages[$i]['content']."</span>
          </br>";
        
    }
  ?>
  </div>
    </div>
    <form action="handler.php" method="POST" class="user-inputs">
      <input type="hidden" name="id" id="id" value="<?php echo $_SESSION['id'];?>">
      <input type="text" name="author" id="author" value="<?php echo $_SESSION['username']." ".$_SESSION['prenom']."";?>">
      <input type="text" id="content" name="content" placeholder="Ecris ta demande ici !">
      <button type="submit" placeholder="" value="Envoyez!">Envoyez !</button>
    </form>
<p>
  <p>
  <a href="index2.php"><button class="btn btn-primary" type="submit">Retour</button></a>

  </section>

  <!-- <script src="js/app.js"></script> -->
</body>
</html>
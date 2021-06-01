<?php
// var_dump($_POST);die();
/**
 * Connexion simple à la base de données via PDO !
 */
$db = new PDO('mysql:host=localhost;dbname=ecoleg;charset=utf8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, 
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
]);

/**
 * On doit analyser la demande faite via l'URL (GET) afin de déterminer si on souhaite récupérer les messages ou en écrire un
 */
$task = "list";

if(isset($_POST)){
  postMessage();
  // getMessages();
} else {
}

/**
 * Si on veut récupérer, il faut envoyer du JSON
 */
// function getMessages(){
//   global $db;

//   // 1. On requête la base de données pour sortir les 500 derniers messages
//   $resultats = $db->query("SELECT * FROM messages ORDER BY created_at DESC LIMIT 500");
//   // 2. On traite les résultats

//   $messages = $resultats->fetchAll();
//   // 3. On affiche les données sous forme de JSON
//   echo json_encode($messages);
// }
/**
 * Si on veut écrire au contraire, il faut analyser les paramètres envoyés en POST et les sauver dans la base de données
 */
function postMessage(){
  global $db;
  // 1. Analyser les paramètres passés en POST (author, content)
  
  if(!array_key_exists('id', $_POST) || !array_key_exists('content', $_POST)){

    echo json_encode(["status" => "error", "message" => "One field or many have not been sent"]);
    return;

  }

  $author = $_POST['id'];
  $content = $_POST['content'];
  // date_default_timezone_set('europe/paris');



  // 2. Créer une requête qui permettra d'insérer ces données
  $requête ="INSERT INTO messages (IdEtudiant, content) values ('".$author."', '".$content."');";
  // var_dump($requête);die();
$query = $db->prepare($requête);
  $query->execute();


  // 3. Donner un statut de succes ou d'erreur au format JSON
    header('Location: chat.php');
}
/**
 * Voilà c'est tout en gros.
 */
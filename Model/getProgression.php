<?php

header("Content-Type: text/plain"); // Utilisation d'un header pour spécifier le type de contenu de la page.

$urlUser = (isset($_GET["urlUser"])) ? $_GET["urlUser"] : NULL;
////////////////Action
require('../Model/autoload.php'); // class autoading
require('../Model/dbconnexion.php'); // database connexion


if ($urlUser) {
	////////////////Récupérer progression sous forme de Json string
  // We create a manager for character manipulation
  $manager = new UserDataManager($db);
  // We get all the characters in the database
  if ($manager->exists($_GET['urlUser'])) // If the user exists, we get it
  {
    $user = $manager->get($_GET['urlUser']);
    $id = $user->id();
    $progression = $user->text01_progression();
    $name = $user->user();
  	//echo "Test json";
  	echo '{"progression":"'.$progression.'","name":"'.$name.'"}';
  }

} else {
	echo "FAIL";
}

// doit sortir en texte
//{"key":"value","key":"value","key":"value","key":"value"}

?>

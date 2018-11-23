<?php
session_start() ;
error_reporting(E_ALL);

include ('config.php');
$query = "insert into CLIENT (prenom, nom, motdepasse, sexe, email, tel, date_naissance) values (prenom, nom, motdepasse, sexe, email, tel, date_naissance);";
$req = DB::get()->prepare($query);

// Utilisation d'un try... catch pour captuer et gérer proprement les erreurs potentielles.
try {
	$req->execute(array(
		'prenom' => $_POST['prenom'],
		'nom' => $_POST['nom'],
		'motdepasse' => $_POST['motdepasse'],
		'sexe' => $_POST['sexe'],
		'email' => $_POST['email'],
		'tel' => $_POST['tel'],
		'date_naissance' => $_POST['date_naissance'],
		));
		// redirection
		header('location: ./client.php');
} catch(PDOException $erreur) {
echo "Erreur ".$erreur->getMessage();
}

?>
</html>


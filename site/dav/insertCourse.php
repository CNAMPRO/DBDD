<?php
session_start() ;
error_reporting(E_ALL);

include ('config.php');
$req = DB::get()->prepare("insert into course (code, name, description) values (:code, :name, :description)");
try {
	$req->execute(array(
		'code' => $_POST['code'],
		'name' => $_POST['name'],
		'description' => $_POST['description']
		));
		// redirection
		header('location: ./clients.php');
} catch(PDOException $erreur) {
echo "Erreur ".$erreur->getMessage();
}

?>
</html>


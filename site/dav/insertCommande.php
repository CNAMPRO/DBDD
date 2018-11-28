<?php
session_start() ;
error_reporting(E_ALL);

include ('config.php');
$req = DB::get()->prepare("insert into Commande (ref_produit, nb_produit_commande) values (:ref_produit, :nb_produit_commande)");
try {
	$req->execute(array(
		'ref_produit' => $_POST['ref_produit'],
		'nb_produit_commande' => $_POST['nb_produit_commande']
		));
		header('location: ./products.php');
} catch(PDOException $erreur) {
echo "Erreur ".$erreur->getMessage();
}

?>
</html>


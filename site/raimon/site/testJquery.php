
<?php
include ('config.php');
$req = DB::get()->prepare("insert into ENREGISTRER(num_cli, num_prd, nbProduit_pan) values (:client, :produit, 1)");


$idClient= $_GET['idClient'];
$idPrd= $_GET['idPrd'];

try {
	$req->execute(array(
		'client' => $idClient,
		'produit' => $idPrd
		));
} catch(PDOException $erreur) {
	echo "Erreur ".$erreur->getMessage();
}
echo "id".$idClient;
?>
</html>


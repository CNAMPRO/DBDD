
<?php
include ('config.php');
$req = DB::get()->prepare("insert into ENREGISTRER(num_cli, num_prd, nbProduit_pan) values (:client, :produit, 1)");


$idClient= $_POST['idClient'];
$idPrd= $_POST['idPrd'];

//$requestPanier = DB::get()->query("SELECT * FROM ENREGISTRER WHERE num_cli=1 AND num_prd = 1");

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


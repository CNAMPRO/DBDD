
<?php
include ('config.php');
$idClient= $_POST['idClient'];
$req = DB::get()->prepare("insert into COMMANDE (date_cde, prixht_cde, num_cli) values (NOW(), :prix, :client)");
$requestPanier = DB::get()->query("SELECT * FROM ENREGISTRER WHERE num_cli=".$idClient);
$prix = 0;
while($data = $requestPanier->fetch()) {
		$idPrd = $data['num_prd'];
		$requestPrd = DB::get()->query("SELECT prixht_prd FROM PRODUIT WHERE num_prd=".$idPrd);
		$dataPrix = $requestPrd->fetch();
		$prix += $dataPrix['prixht_prd'];
}
	try {
	$req->execute(array(
		'prix' => $prix,
		'client' => $idClient
		));
	} catch(PDOException $erreur) {
		echo "Erreur ".$erreur->getMessage();
	}
?>


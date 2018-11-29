<html>
<?php
session_start() ;
error_reporting(E_ALL);
print_r($_POST['data']);

$data = isset($_POST['data']) ? $_POST['data'] :"";

include ('config.php');
$query = "insert into COMMANDE (date, id_client) values (:date, :id_client);";
$req = DB::get()->prepare($query);
$id = 0;
try {
	$req->execute(array(
		'date' => '2018/11/29',
		'id_client' => 1
        ));
        $id = DB::get()->lastInsertId();
} catch(PDOException $erreur) {
echo "Erreur ".$erreur->getMessage();
}


foreach($data as $ligneCommande){
 $queryL = "insert into DETAILS_COMMANDE (ref_commande, ref_produit, nb_produit_commande) values (:ref_commande, :ref_produit, :nb_produit_commande)";
 $req = DB::get()->prepare($queryL);
 try {
     $req->execute(array(
         'ref_commande' => $id,
         'ref_produit' => $ligneCommande['id'],
         'nb_produit_commande' => $ligneCommande['nb']
         ));
 } catch(PDOException $erreur) {
 echo "Erreur ".$erreur->getMessage();
 }



}






?>	

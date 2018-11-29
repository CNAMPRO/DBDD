<html>
<?php
session_start() ;
error_reporting(E_ALL);
print_r($_POST['data']);

$data = isset($_POST['data']) ? $_POST['data'] :"";

include ('config.php');
$query = "insert into COMMANDE (date, id_client) values (:date, :id_client);";
try {
	$req->execute(array(
		'date' => '2018/11/29',
		'id_client' => 1
		));
} catch(PDOException $erreur) {
echo "Erreur ".$erreur->getMessage();
}







?>	


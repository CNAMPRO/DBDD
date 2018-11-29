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

        echo $id;
        echo $id;
        echo $id;
        echo $id;
} catch(PDOException $erreur) {
echo "Erreur ".$erreur->getMessage();
}







?>	

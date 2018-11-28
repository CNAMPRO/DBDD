<?php
// initialisation de la session
// INDISPENSABLE À CETTE POSITION SI UTILISATION DES VARIABLES DE SESSION.
session_start() ;
error_reporting(E_ALL);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>Tous les clients </title>
       <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
       <link rel="stylesheet" media="screen" type="text/css" title="style_tab" href="css/default.css" />
   </head>

<body>

<?php
include ('config.php');
$request = DB::get()->query('select * from get_client_fidele();');
?>
<?php
$client_Id = $request->fetch(); // recupération de l'id du client le plus fidèle


// Exploitation d'id recupéré
$finalRequest = DB::get()->query('select * from client where id = ' . $client_Id[0]);
$result = $finalRequest->fetch();

?>
	<table>
		<caption>Liste des clients</caption>
		<thead>
			<tr>
				<th>Prénom</th>
				<th>Nom</th>
				<th>Email</th>
				<th>Sexe</th>
				<th>Tel</th>
				<th>DDN</th>
			</tr>
		</thead>
	<tbody>
<?php
if($result != null){ ?>
	<tr>
		<td><?php echo	$result['prenom']; ?></td> <!-- 'code' est une colonne de la BDD. -->
		<td><?php echo	$result['nom']; ?></td>
		<td><?php echo	$result['email']; ?></td>
		<td><?php echo	$result['sexe']; ?></td>
		<td><?php echo	$result['tel']; ?></td>
		<td><?php echo	$result['date_naissance']; ?></td>
	</tr>
<?php }; ?>
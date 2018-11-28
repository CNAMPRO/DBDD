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


// On appelle la méthode statique get() de la classe DB qui renvoit une instance du PDO.
$request = DB::get()->query('select * from produit;');
?>
	<table>
		<caption>Liste des produits</caption>
		<thead>
			<tr>
				<th>ref_produit</th>
				<th>nom</th>
				<th>prix</th>
				<th>nb</th>
			</tr>
		</thead>
	<tbody>
<?php
// On récupère les données. Chaque ligne est sockée dans le tableau data.
while($data = $request->fetch()) {
	?>
    <table method="post" action="commande.php">
	<tr>
        <td><input type="text" name="" value=<?php $data['ref_produit']?>></td>
		<td><?php echo	$data['nom']; ?></td>
		<td><?php echo	$data['prix']; ?></td>
        <td><input type="text" name="" value=<?php $data['nb_produit_commande']?>></td>
        <td> <input type="submit" value="Commander"></td>
	</tr>
    </table>
	<?php
}
$request->closeCursor(); // ne pas oublier de fermer le curseur.
?>
</tbody>
</table>
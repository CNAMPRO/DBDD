<?php
// initialisation de la session
// INDISPENSABLE À CETTE POSITION SI UTILISATION DES VARIABLES DE SESSION.
session_start() ;
error_reporting(E_ALL);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" >
   <head>
       <title>Produit</title>
       <meta http-equiv="Content-Type" content="text/html; charset=utf8" />
       <link rel="stylesheet" media="screen" type="text/css" title="style_tab" href="css/default.css" />
   </head>

<body>

<?php
include ('config.php');
// On appelle la méthode statique get() de la classe DB qui renvoit une instance du PDO.
$request = DB::get()->query('select * from produit natural join type');
?>
	<table>
		<caption>Liste des produit</caption>
		<thead>
			<tr>
				<th>Description</th>
				<th>Prix</th>
				<th>Nombre en stock</th>
				<th>Type</th>
			</tr>
		</thead>
	<tbody>
<?php
// On récupère les données. Chaque ligne est sockée dans le tableau data.
$numProduit = $data['num_prd'];
$request2 = DB::get()->query("select * from getNoteProduit(".$numProduit.")");
$noteProduit = "";
while($data = $request2->fetch()) {
	$noteProduit = $data['getnoteproduit']
}
while($data = $request->fetch()) {
	?>
	<tr>
		<td><?php echo	$data['libelle_prd']; ?></td>
		<td><?php echo	$data['prixht_prd']; ?></td>
		<td><?php echo	$data['nbstock_prd']; ?></td>
		<td><?php echo	$data['libelle_type']; ?></td></tr>
		<td><?php echo	$noteProduit; ?></td></tr>
	<?php
}
$request->closeCursor(); // ne pas oublier de fermer le curseur.
?>
</tbody>
</table>

<!-- Toutes les données du formulaire seront envoyées à la page 'insertCourse.php' avec la méthode POST. -->
<form method="post" action="insertProduit.php">
	<table><caption>Ajout d'un produit</caption>
		<tr><td>description : </td><td><textarea name="description" rows="5" cols="40"></textarea></td></tr> </br>
		<tr><td>Prix : </td><td><input type="number" name="prix" /></td></tr></br>
		<tr><td>nombre en stock : </td><td><input type="number" name="stock" /></br>
		<tr><td>num Type : </td><td><input type="number" name="type" /></tr></br>  
		<tr><td></td><td><input type="submit" value="Valider" /></tr></br>
	</table>
</form>
</body>
</body>

</html>

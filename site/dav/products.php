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
	<tr>
		<td><?php echo	$data['ref_produit']; ?></td> <!-- 'code' est une colonne de la BDD. -->
		<td><?php echo	$data['nom']; ?></td>
		<td><?php echo	$data['prix']; ?></td>
		<td><?php echo	$data['nb']; ?></td>
	</tr>
	<?php
}
$request->closeCursor(); // ne pas oublier de fermer le curseur.
?>
</tbody>
</table>

<!-- Toutes les données du formulaire seront envoyées à la page 'insertCourse.php' avec la méthode POST. -->
<form method="post" action="insertClient.php">
	<table><caption>Ajout d'un Client</caption>
		<tr><td>Prénom : </td><td><input type="text" name="prenom" /></td></tr> </br>
		<tr><td>nom : </td><td><input type="text" name="nom" /></td></tr></br>
		<tr><td>email : </td><td><input type="text" name="email" /></td></tr></br>
		<tr><td>mot de passe : </td><td><input type="password" name="motdepasse" /></td></tr></br>
		<tr><td>Tel : </td><td><input type="text" name="tel" /></td></tr></br>
		<tr><td>Sexe : </td><td><input type="text" name="sexe" /></td></tr></br>
		<tr><td>DateNaissance : </td><td><input type="text" name="date_naissance" /></td></tr></br>

		<tr><td></td><td><input type="submit" value="Valider" /></tr></br>
	</table>
</form>
</body>
</html>

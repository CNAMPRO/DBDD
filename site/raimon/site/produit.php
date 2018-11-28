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

$requestClient = DB::get()->query('select * from client');
$request = DB::get()->query('select num_prd,libelle_prd,prixht_prd,nbstock_prd,libelle_type, (select * from getNoteProduit(num_prd)) as note from produit natural join type');
?>
	<table>
		<caption>Vous êtes connecté en temps que</caption>
		<thead>
			<tr>
				<th>Nom</th>
				<th>Prénom</th>
				<th>Email</th>
				<th>Sexe</th>
				<th>Date de naissance</th>
				<th>Date de dernière connexion</th>
				<th>Date d'inscription</th>
			</tr>
		</thead>
	<tbody>
<?php
// On récupère les données. Chaque ligne est sockée dans le tableau data.

$data = $requestClient->fetch()
	?>
	<tr>
		<td><?php echo	$data['nom_cli']; ?></td>
		<td><?php echo	$data['prenom_cli']; ?></td>
		<td><?php echo	$data['email_cli']; ?></td>
		<td><?php echo	$data['sexe_cli']; ?></td>
		<td><?php echo	$data['ddn_cli']; ?></td>
		<td><?php echo	$data['dtlastconnexion_cli']; ?></td>
		<td><?php echo	$data['dtinscription_cli']; ?></td>
	</tr>
	<?php
$requestClient->closeCursor(); // ne pas oublier de fermer le curseur.
?>
	<table>
		<caption>Liste des produit</caption>
		<thead>
			<tr>
				<th>Description</th>
				<th>Prix</th>
				<th>Type</th>
				<th>Note</th>
				<th>Quantite</th>
			</tr>
		</thead>
	<tbody>
<form method="post" action="insertCommande.php">
<?php
// On récupère les données. Chaque ligne est sockée dans le tableau data.

while($data = $request->fetch()) {
	if($data['nbstock_prd'] > 0){
		?>
		<tr>
			<td style="display:none;"><input type="number" name="id"/><?php echo	$data['num_prd']; ?></td></td>
			<td><?php echo	$data['libelle_prd']; ?></td>
			<td><?php echo	$data['prixht_prd']; ?></td>
			<td><?php echo	$data['libelle_type']; ?></td>
			<td><?php echo	$data['note']; ?></td>
			<td>><input type="number" name="quantite" /></td>
		</tr>
		<?php
	}
}
$request->closeCursor(); // ne pas oublier de fermer le curseur.
?>
<input type="submit" value="Valider la commande" />
</form>
</tbody>
</table>

</body>

</html>

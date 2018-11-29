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
   <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E=" crossorigin="anonymous"></script>
   <script>
   $(document).on('click', '.submit', function(){
	   var id = $(this).data('id');
	   var nb = $(this).parent().parent().find('input').get(1).value;
	   var nom = $(this).data('nom');
	   $("#maCommande").append('<div class="produitCommande" id="'+id+'" data-nb="'+nb+'"> '+nom+' x ' + nb+'</div>');
   });


$(document).on('click', '#ENVOYER', function(){
var data = {};
var maCde = $(".produitCommande").each(function(el){
	console.log(el);	
});
});

   </script>
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
                <th>Commander</th>
			</tr>
		</thead>
	<tbody>
<?php
// On récupère les données. Chaque ligne est sockée dans le tableau data.
while($data = $request->fetch()) {
	?>
    <table method="post"  action="insertCommande.php">
	<tr>
        <td><input type="text" name="ref_produit" value="<?php echo htmlspecialchars($data['ref_produit']); ?>" /></td>
		<td><?php echo	$data['nom']; ?></td>
		<td><?php echo	$data['prix']; ?></td>
        <td><input type="text" name="nb_produit_commande" value="<?php echo htmlspecialchars($data['nb']); ?>"    /></td>
        <td> <input type="submit" value="Commander" data-id="<?php echo htmlspecialchars($data['ref_produit']); ?>" data-nb="<?php echo htmlspecialchars($data['nb']); ?>" data-nom="<?php echo htmlspecialchars($data['nom']); ?>" class="submit"></td>
	</tr>
    </table>
	<?php
}
$request->closeCursor(); // ne pas oublier de fermer le curseur.
?>

<div id="maCommande">
</div>
<div> <button id="ENVOYER"></button></div>


</tbody>
</table>




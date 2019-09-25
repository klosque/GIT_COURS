<?php

include("connexion.php");
/*if (isset($_POST['Envoyer']))
{
	 $tab_data[] = ($_POST('nom'),$_POST('prenom'),$_POST('tel')) ;
	foreach( $tab_data as $var)
	{
		echo $var.'<br/>';
	}
	 
}*/

$link=connect();

//récupérer DATA
/*
$sql = "SELECT * FROM user";

$stmt = $link->prepare($sql);
$stmt->execute();

$result = $stmt->fetchAll();
print_r($result);
*/





session_start();

//$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

if(!isset($_SESSION['data']))
{
$_SESSION['data']= [];
}

if (test($_POST)) 
{
	$user = [ $_POST['nom'],$_POST['prenom'],$_POST['tel']];
	//var_dump($user);
	//Insérer DATA
	$data = [
		'nom'=> $_POST['nom'],
		'prenom'=> $_POST['prenom'],
		'tel'=> $_POST['tel'],
	];

$sql = "INSERT INTO user (id,nom,prenom,tel)
VALUES (null,:nom,:prenom,:tel)";

$stmt = $link->prepare($sql);
$stmt->execute($data);


header('Location: list_user.php');

}

?>
<html>
<head></head>
<body>
	


		<form action="" method="POST">
			<label for="nom">NOM:</label><br />
			<input id="nom" type="text" required="yes" name="nom"><br />


			<label for="prenom">PRENOM:</label><br />
			<input id="prenom" type="text" required="yes" name="prenom"><br />


			<label for="tel">TEL:</label><br />
			<input id="tel" type="text" required="yes" name="tel"><br />

			<input type="submit" name="Envoyer" /><br />

		</form>		
</body>
</html>

<?php

function test($post)
{
	if (isset($post['Envoyer']))
	{
		//if (!empty($post['nom']) && !empty($post['prenom']) && !empty($post['email'])) 
		//{
			return true;
		//}
	
		//return false;

	}
	return false;


}

?>

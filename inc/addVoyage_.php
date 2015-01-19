<?php
if(!isset($isIndex))die('');
else if(!Admin::isConnected())header('Location: admin_signin');
else
{
	if(isset($_POST['title']) && isset($_POST['cities']) && isset($_POST['d_depart']) && isset($_POST['d_retour']) && isset($_POST['description']) &&
		!empty($_POST['title']) && !empty($_POST['cities']) && !empty($_POST['d_depart']) && !empty($_POST['d_retour']) && !empty($_POST['description']))
	{
		$title = clean($_POST['title']);
		$description = clean($_POST['description']);
		$cities = explode(',',clean($_POST['cities']));
		$d_depart = clean($_POST['d_depart']);
		$d_retour = clean($_POST['d_retour']);
		$query = mysql_query("select max(id) as max from voyages",$mysqlC);
		if($row = mysql_fetch_assoc($query))
			$vid = $row['max'] + 1;
		else
			$vid = 1;

		$depart = date_create($d_depart);
		$retour = date_create($d_retour);
		$interval = date_diff($retour, $depart);
		if(settype($interval->format('%R%a'),'integer')>=0)
		{
			$query = mysql_query("insert into voyages(title,description,dateDepart,dateRetour) values('$title','$description','$d_depart','$d_retour')",$mysqlC);

			foreach ($cities as $city)
			{
				$query2 = mysql_query("insert into cities_voyages(idVoyage,idCity) values('$vid','$city')",$mysqlC);
			}

			if($query)//voyage inserée
			{
				echo "voyage inserée..";
				timedRedirect('editVoyage/'.$vid);
			}
			else//
			{
				echo "erreur voyage non inserée..";
				timedRedirect('addVoyage');
			}
		}
		else//dete depart > retour
		{

		}
	}
	else
	{
		echo "veuillez remplir le formulaire";
		timedRedirect('/addVoyage');
	}
}
?>
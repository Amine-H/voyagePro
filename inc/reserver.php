<?php
if(!isset($isIndex))die('');
else if(!isset($params[0]))die('');
else if(!User::isConnected())header('Location: /signin');
else
{
$vid=settype($params[0],'integer');
$query = mysql_query("select * from voyages where id='$vid'",$mysqlC);
if(mysql_num_rows($query) == 0)
{
	header('Location: voyages');
}
else//all is good, let's get this guy a reservation
{
	if(User::reserver($vid,$mysqlC))//all is good, what's under this will be static html
	{?>
	<div>
		Reussi! reservation effectué
	</div>
	<?php }
	else//what's under this will be static html(simple error message)
	{?>
	<div>
		Erreur, reservation impossible!
	</div>
	<?php }
}
}
?>
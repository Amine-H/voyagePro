<?php
if(!isset($isIndex))die('');
else if(!isset($params[0]))die('');
else
{
$vid=settype($params[0],'integer');
$query = mysql_query("select * from voyages where id='$vid'",$mysqlC);
if(mysql_num_rows($query) == 1)
{$row=mysql_fetch_assoc($query);
?>
<div id='voyage'>
	<div class='dateDepart'><?php echo $row['dateDepart'];?></div>
	<div class='titre'><?php echo $row['title'];?></div>
	<div class='gallerie'>
		<?php
		$query2 = mysql_query("select * from gallerie where voyage='".$row['id']."'",$mysqlC);
		while ($gallerie = mysql_fetch_assoc($query2))
		{?>
		<div class='image'><img src='<?php echo VP_HOME."gallery/".$gallerie['image'];?>' title="<?php echo $gallerie['title'];?>"></div>
		<?php }?>
	</div>
	<div class='villes'>
		<?php
		$query3 = mysql_query("select name from cities,cities_voyages where cities_voyages.idCity=cities.id and cities_voyages.idVoyage='".$row['id']."'",$mysqlC);
		while ($cities = mysql_fetch_assoc($query3))
		{?>
		<div class='ville'><?php echo $cities['name'];?></div>
		<?php }?>
	</div>
	<div class='description'><?php echo $row['description'];?></div>
	<div id='reserver'><a class='button' href='<?php echo "/reserver/".$vid;?>'>Reserver</a></div>
</div>
<?php
}
else
{
?>
<div id='no-voyage-found'>
	Voyage non trouvée!
</div>
<?php
}
}
?>
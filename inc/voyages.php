<?php
if(!isset($isIndex))die('');
else
{?>
<script type="text/javascript">
	$('.top-nav .voyages').addClass('active');
</script>
<div class="content">
<?php if(Admin::isConnected()){ ?>
<div id="Admin-controls">
    <a class="button" href="/addVoyage">Ajouter un voyage</a>
</div>
<?php } ?>
<div id="search-controls">
    <form id="search-form" action="/voyages" method="POST">
        <input type="search" id="query" name="query" value="<?php echo @clean($_POST['query'])?>">
        <input class="button" type="submit" id="query" value="Rechercher">
    </form>
</div>
<div id='voyages' class="content-grids">
<?php
if(isset($_POST['query'])){
    $search_query=clean($_POST['query']);
    $query = mysql_query("select * from voyages where (title like '%$search_query%' OR description like '%$search_query%')",$mysqlC);
}
else{
    $query = mysql_query("select * from voyages",$mysqlC);
}
while ($row=mysql_fetch_assoc($query))
{?>
	<div class='voyage grid'>
		<div class='dateDepart'><h3>Date:</h3><?php echo $row['dateDepart'];?></div>
		<div class='titre'><h3>Titre:</h3><?php echo $row['title'];?></div>
		<div class='gallerie'>
			<?php
			$query2 = mysql_query("select * from gallerie where voyage='".$row['id']."'",$mysqlC);
			if ($gallerie = mysql_fetch_assoc($query2))
			{?>
			<div class='image'><img src='/gallery/<?php echo $gallerie['image'];?>' title="<?php echo $gallerie['title'];?>"></div>
			<?php }?>
		</div>
		<div class='villes'><h3>Villes:</h3>
			<?php
			$query3 = mysql_query("select name from cities,cities_voyages where cities_voyages.idCity=cities.id and cities_voyages.idVoyage='".$row['id']."'",$mysqlC);
			while ($cities = mysql_fetch_assoc($query3))
			{?>
			<?php echo $cities['name'];?>
			<?php }?>
		</div>
		<div class='description'><h3>Description:</h3><?php echo $row['description'];?></div>
        <a class="button" href="/voyage/<?php echo $row['id'];?>" target='_blank'>plus d'informations</a>
        <?php if(Admin::isConnected()){ ?>
        <a class="button" href="/editVoyage/<?php echo $row['id']; ?>">Modifier</a>
        <a class="button red" href="/deleteVoyage/<?php echo $row['id']; ?>">Supprimer</a>
        <?php } ?>
	</div>
<?php }?>
</div>
</div>
<?php }?>
<?php
if(!isset($isIndex))die('');
else
{
?>
<script type="text/javascript">
	$('.top-nav .acceuil').addClass('active');
</script>
<div class="content-grids">
<?php
$query = mysql_query("select * from voyages",$mysqlC);
while ($row=mysql_fetch_assoc($query))
{
	$query2 = mysql_query("select * from gallerie where voyage='".$row['id']."'",$mysqlC);
?>
	<div class="grid">
        <h3><?php echo $row['title']; ?></h3>
		<a href="/voyage/<?php echo $row['id'];?>" target='_blank'>
			<?php 
			if(mysql_num_rows($query2)>0)
			{$img=mysql_fetch_assoc($query2);?>
			<img src="/img/<?php echo $img['image'];?>" title="<?php echo $row['title']?>"/>
			<?php }
			else
			{?>
			<img src="/img/v_default.jpg" title="<?php echo $row['title']?>" />
			<?php } ?>
		</a>
		<?php
		$query3=mysql_query("select name from cities,cities_voyages where cities_voyages.idCity=cities.id and cities_voyages.idVoyage='".$row['id']."'");
		$cities=array();$i=0;
		while($city=mysql_fetch_assoc($query3)['name'])
			{$cities[$i++]=$city;}
		$cities=implode(', ',$cities);
		?>
        <h3>Villes</h3><?php echo $cities; ?>
        <h3>Description</h3>
		<p><?php echo substr($row['description'],0,300);?></p>
		<a class="button" href="/voyage/<?php echo $row['id'];?>" target='_blank'>plus d'informations</a>
	</div>
</div>
<?php } ?>
<?php } ?>
<div class="clear"></div>
<div class="specials">
	<div class="specials-heading">
		<h5></h5><h3>Trouver nous</h3><h5></h5>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
	<div class="specials-grids">
		<div class="special-grid" style='text-align:left;font-weight:bold;font-size:1.2em;'>
			<img src="web/images/grids-img1.jpg" alt='put map here'/>
			<p>Adresse:<?php echo DB::getParam('adresse',$mysqlC);?></p>
			<p>Tel:<?php echo DB::getParam('tel',$mysqlC);?></p>
		</div>
		<div class="special-grid">
			<img src="web/images/grids-img2.jpg" title="image-name" alt='put fb followers script here'/>
			<a href="//<?php echo DB::getParam('fbpage',$mysqlC);?>">Rejoigner nous sur facebook</a>
		</div>
		<div class="special-grid spe-grid">
			<img src="web/images/grids-img2.jpg" title="image-name" alt='put twitter followers script here'/>
			<a href="//<?php echo DB::getParam('twitter',$mysqlC);?>">Rejoigner nous sur twitter</a>
		</div>
		<div class="clear"></div>
	</div>
	<div class="clear"></div>
</div>
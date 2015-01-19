<?php
if(!isset($isIndex))die('');
else if(!Admin::isConnected())header('Location: /admin_signin');
else if(!isset($params[0]))die('');
else
{
	$vid=clean($params[0]);
	$query=mysql_query("select * from voyages where id='$vid'",$mysqlC);
	if(mysql_num_rows($query) == 1)
	{
		$row=mysql_fetch_assoc($query);
?>
	<script src="/js/ckeditor/ckeditor.js"></script>
	<div id='edit-voyage'>
	<form method='POST' action='editVoyage_'>
        <fieldset>
            <legend>Modifier voyage</legend>
		<div>
			<label for='title'>Titre</label>
			<input type='text' id='title' name='title' value='<?php echo $row['title'];?>'>
		</div>
		<div>
			<input type='button' value='ajouter Ville' onclick='javascript:addCity();'>
			<select type='text' id='city'>
			<?php $selectedCitites=DB::fetchSelectedCities($vid,$mysqlC);?>
			</select>	
		</div>
		<div>
			<label>Villes Selectionné</label>
			<input type='text' id='cities' readonly="readonly" value="<?php echo implode(',',$selectedCitites['name']);?>">
			<input type='hidden' id='cities_hidden' name='cities' value="<?php echo implode(',',$selectedCitites['id']);?>">		
		</div>
		<div>
			<label for='d_depart'>Date de depart</label>
			<input type='date' id='d_depart' name='d_depart' value='<?php echo $row['dateDepart'];?>'>
		</div>
		<div>
			<label for='d_retour'>Date de retour</label>
			<input type='date' id='d_retour' name='d_retour' value='<?php echo $row['dateRetour'];?>'>
		</div>
		<div style='max-width:700px;'>
			<textarea id='description' name='description' class="ckeditor"><?php echo $row['description'];?></textarea>
		</div>
			<input class ="button" type='submit' value='Publier'>
        </fieldset>
	</form>
	</div>
<?php
	}
	else
	{
?>
		ce voyage n'exist plus!
<?php
		timedRedirect('/voyages');
	}
}
?>
<?php
if(!isset($isIndex))die('');
else if(!Admin::isConnected())header('Location: /admin_signin');
else
{
?>
<script src="/js/ckeditor/ckeditor.js"></script>
<div id='add-voyage'>
    <fieldset>
        <legend>Ajouter un voyage</legend>
	<form method='POST' action='/addVoyage_'>
		<div>
			<label for='title'>Titre</label>
			<input type='text' id='title' name='title'>
		</div>
		<div>
			<input type='button' value='ajouter Ville' onclick='javascript:addCity();'>
			<select type='text' id='city'>
			<?php DB::printCities($mysqlC);?>
			</select>	
		</div>
		<div>
			<label>Villes Selectionné</label>
			<input type='text' id='cities' readonly="readonly">
			<input type='hidden' id='cities_hidden' name='cities'>		
		</div>
		<div>
			<label for='d_depart'>Date de depart</label>
			<input type='date' id='d_depart' name='d_depart'>
		</div>
		<div>
			<label for='d_retour'>Date de retour</label>
			<input type='date' id='d_retour' name='d_retour'>
		</div>
		<div style='max-width:700px;'>
			<textarea id='description' name='description' class="ckeditor"></textarea>
		</div>
			<input class="button" type='submit' value='Publier'>
	</form>
    </fieldset>
</div>
<?php
}
?>
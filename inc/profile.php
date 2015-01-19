<?php
if(!isset($isIndex))die('');
else if(!User::isConnected())header('Location: main');
else
{
?>
<script type="text/javascript">
	$('.top-nav .profile').addClass('active');
	function showError(error)
	{
		alert(error);
	}
	function isValidEmail(email)
	{
		part1=email.substring(0,email.indexOf('@'));
		part2=email.substring(email.indexOf('@')+1,email.indexOf('.'));
		part3=email.substring(email.indexOf('.')+1);

		if(part1.length<2 || part2.length<2 || part3.length<2)
			return 0;

		return 1;
	}
	function modifier()
	{
		var firstname=document.getElementById('firstname').value;
		var lastname=document.getElementById('lastname').value;
		var email=document.getElementById('email').value;
		var old_password=document.getElementById('old_password').value;
		var password=document.getElementById('password').value;
		var password2=document.getElementById('password2').value;
		//validate
		if(firstname.length > 30 || firstname.length < 3)
			showError("le prenom doit contenir entre 3-30 caractères");
		else if(lastname.length > 30 || lastname.length < 3)
			showError("le nom doit contenir entre 3-30 caractères");
		else if(email.length > 40 || email.length < 7)
			showError("l'email doit contenir entre 7-30 caractères");
		else if(!isValidEmail(email))
			showError("adresse email invalid");
		else if(old_password.length > 20 || old_password.length < 5)
			showError("le mot de passe doit contenir entre 5-20 caractères");
		else if(password != password2)
			showError("mots de passe non identiques");
		else if(password.length > 20 || password.length < 5)
			showError("le mot de passe doit contenir entre 5-20 caractères");
		else//submit
			document.getElementById('form').submit();
	}
</script>
<form action='profile_' method='POST' id='form' onsubmit="javascript:modifier();">
	<table>
		<tr>
			<td><label for='firstname'>Prenom</label></td>
			<td><input type='text' id='firstname' name ='firstname' value="<?php echo User::getAttrib('firstname',$mysqlC);?>"></td>
		</tr>
		<tr>
			<td><label for='lastname'>Nom</label></td>
			<td><input type='text' id='lastname' name ='lastname' value="<?php echo User::getAttrib('lastname',$mysqlC);?>"></td>
		</tr>
		<tr>
			<td><label for='email'>Email</label></td>
			<td><input type='email' id='email' name ='email' value="<?php echo User::getAttrib('email',$mysqlC);?>"></td>
		</tr>
		<tr>
			<td><label for='phone'>Tel</label></td>
			<td><input type='text' id='phone' name ='phone' value="<?php echo User::getAttrib('tel',$mysqlC);?>"></td>
		</tr>
		<tr>
			<td><label for='old_password'>Mot de passe actuel</label></td>
			<td><input type='text' id='old_password' name ='old_password'></td>
		</tr>
		<tr>
			<td><label for='password'>Nouveau mot de passe</label></td>
			<td><input type='text' id='password' name ='password'></td>
		</tr>
		<tr>
			<td><label for='password2'>Confirmer le mot de passe</label></td>
			<td><input type='text' id='password2' name ='password2'></td>
		</tr>
		<tr>
			<td colspan='2'><input type='button' value='Modifier' onclick='javascript:modifier();'></td>
		</tr>
	</table>
</form>
<?php } ?>
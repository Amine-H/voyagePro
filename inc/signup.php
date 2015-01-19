<?php
if(!isset($isIndex))die('');
else if(User::isConnected())header('Location: main');
else
{
?>
<script type="text/javascript">
	function isValidEmail(email)
	{
		var part1=email.substring(0,email.indexOf('@'));
		var part2=email.substring(email.indexOf('@')+1,email.indexOf('.'));
		var part3=email.substring(email.indexOf('.')+1);

		if(part1.length<2 || part2.length<2 || part3.length<2)
			return 0;

		return 1;
	}
	function signupError(msg)
	{
		document.getElementById('errorMsg').innerHTML=msg;
	}
	function validate()
	{
		var firstname=document.getElementById('firstname').value;
		var lastname=document.getElementById('lastname').value;
		var email=document.getElementById('email').value;
		var email2=document.getElementById('email2').value;
		var password=document.getElementById('password').value;
		var password2=document.getElementById('password2').value;
		//validate
		if(firstname.length > 30 || firstname.length < 3)
			signupError("le prenom doit contenir entre 3-30 caractères");
		else if(lastname.length > 30 || lastname.length < 3)
			signupError("le nom doit contenir entre 3-30 caractères");
		else if(email != email2)
			signupError("emails non identiques");
		else if(email.length > 40 || email.length < 7)
			signupError("l'email doit contenir entre 7-30 caractères");
		else if(!isValidEmail(email))
			signupError("adresse email invalid");
		else if(password != password2)
			signupError("mots de passe non identiques");
		else if(password.length > 20 || password.length < 5)
			signupError("le mot de passe doit contenir entre 5-20 caractères");
		else//submit
			document.getElementById('form').submit();
	}
</script>
<form action='signup_' method='POST' id='form'>
<table>
	<tr>
		<td><label for='lastname'>Nom</label></td>
		<td><input type='text' name='lastname' id='lastname'></td>
	</tr>
	<tr>
		<td><label for='firstname'>Prenom</label></td>
		<td><input type='text' name='firstname' id='firstname'></td>
	</tr>
	<tr>
		<td><label for='email'>Email</label></td>
		<td><input type='email' name='email' id='email'></td>
	</tr>
	<tr>
		<td><label for='email2'>Confirmer l'Email</label></td>
		<td><input type='email' name='email2' id='email2'></td>
	</tr>
	<tr>
		<td><label for='password'>Mot de passe</label></td>
		<td><input type='password' name='password' id='password'></td>
	</tr>
	<tr>
		<td><label for='password2'>Confirmer le Mot de passe</label></td>
		<td><input type='password' name='password2' id='password2'></td>
	</tr>
	<tr>
		<td colspan='2'><input type='button' value="S'enregistrer" onclick='javascript:validate();'></td>
	</tr>
</table>
</form>
<div id='errorMsg'></div>
<?php } ?>
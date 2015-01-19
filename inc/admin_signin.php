<?php
if(!isset($isIndex))die('');
else if(Admin::isConnected())header('Location: /admin');
else
{
?>
<div id='wrapper'>
	<div id='container'>
		<div id='admin-signin'>
			<form action='admin_signin_' method='POST'>
				<table>
					<tr>
						<td colspan='2' style='text-align:center;font-size:30px;border:2px dashed black;'>Connecter Vous</td>
					</tr>
					<tr>
						<td><label for='login'>Login</label></td>
						<td><input type='text' id='login' name='login'></td>
					</tr>
					<tr>
						<td><label for='password'>Mot de passe</label></td>
						<td><input type='password' id='password' name='password'></td>
					</tr>
					<tr>
						<td colspan='2'><input type='submit' id = 'login-btn' value='Connecter'></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>
<?php
}
?>
<?php
if(!isset($isIndex))die('');
else if(User::isConnected())header('Location: main');
else
{
?>
<script type="text/javascript">
	$('.top-nav .connecter').addClass('active');
	function signin()
	{
		var email=document.getElementById('email').value;
		var password=document.getElementById('password').value;

		if(email.length < 41 && email.length > 6 &&
			password.length < 21 && password.length > 6)
		{
			document.getElementById('form').submit();
		}

	}
</script>

<div id="signin-wrapper">
    <div id="signin-container">
        <fieldset>
            <legend>Connecter</legend>
            <form action='/signin_' method='POST' id='form'>
                <table>
                    <tr>
                        <td><label for='email'>Email</label></td>
                        <td><input type='email' name='email' id='email'></td>
                    </tr>
                    <tr>
                        <td><label for='password'>Mot de passe</label></td>
                        <td><input type='password' name='password' id='password'></td>
                    </tr>
                    <tr>
                        <td colspan='2'><a href='/forgot_pass'>j'ai oublié le mot de passe</a></td>
                    </tr>
                    <tr>
                        <td colspan='2'><input type='button' class="button" value='Connecter' id='btn_signin' onclick='javascript:signin();'></td>
                    </tr>
                </table>
            </form>
        </fieldset>
    </div>
</div>
<?php } ?>
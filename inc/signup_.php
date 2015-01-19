<?php
if(!isset($isIndex))die('');
else if(User::isConnected())header('Location: main');
else
{
	$firstname=clean(strtolower($_POST['firstname']));
	$lastname=clean(strtolower($_POST['lastname']));
	$email=clean(strtolower($_POST['email']));
	$email2=clean(strtolower($_POST['email2']));
	$password=clean($_POST['password']);
	$password2=clean($_POST['password2']);

	if(strlen($firstname) > 30 || strlen($firstname) < 3 || strlen($lastname) > 30 ||
		strlen($lastname) < 3 || $email != $email2 || strlen($email) > 40 ||
		strlen($email) < 7 || $password != $password2 || strlen($password) > 20 ||
		strlen($password) < 5)
	{
		header('Location: signup');
	}
	else
	{
		$query=mysql_query("select * from users where email='$email'");
		if(mysql_num_rows($query)==1)
		{
			echo "un etulisateur utilise ce email.";
		}
		else
		{
			User::signup(array('firstname'=>$firstname,
								'lastname'=>$lastname,
								'email'=>$email,
								'password'=>$password),$mysqlC);
			header('Location: voyages');
		}
	}
}

?>
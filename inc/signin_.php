<?php
if(!isset($isIndex))die('');
else if(User::isConnected())header('Location: main');
else if(!isset($_POST['email']))header('Location: signin');
else
{
	$email=clean(strtolower($_POST['email']));
	$password=saltedMD5(clean($_POST['password']));

	$query=mysql_query("select * from users where email='$email' and password='$password'",$mysqlC);

	if(mysql_num_rows($query)==1)//credentials are ok
	{
		$row=mysql_fetch_assoc($query);
		User::signIn(array('id' => $row['id'],
			'firstname' => $row['firstname'],
			'lastname' => $row['lastname']));

		header("Location: voyages");
	}
	else
	{
		echo "authentification impossible!<br>";
        timedRedirect('/signin');
	}
}

?>
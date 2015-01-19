<?php
if(!isset($isIndex))die('');
else if(Admin::isConnected())header('Location: /admin');
else if(!isset($_POST['login']) || !isset($_POST['password']))header('Location: /admin_signin');
else//all is well let's now check for credentials
{
	$login=clean(strtolower($_POST['login']));
	$password=saltedMD5(clean($_POST['password']));
	$query = mysql_query("select * from admin where ((username='$login' or email='$login') and password='$password')",$mysqlC);

	if(mysql_num_rows($query)==1)//credentials are ok
	{
		$row = mysql_fetch_assoc($query);
		Admin::signIn(array('admin_id'=>$row['id'],'admin_username'=>$row['username']));
		echo "welcome".Admin::getUsername();
		timedRedirect('admin');
	}
	else
	{
		echo "bad credentials";
		timedRedirect('signin');
	}
}
?>
<?php
if(!isset($isIndex))die('');
else if(!User::isConnected())die('');
else
{
	User::signout();
}
header('Location: main');

?>
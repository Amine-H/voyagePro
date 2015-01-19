<?php
if(!isset($isIndex))die('');
else if(!Admin::isConnected())die('');
else
{
	Admin::signout();
}
header('Location: main');
?>
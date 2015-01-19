<?php
if(!isset($isIndex))die('');
else if(!Admin::isConnected())header('Location: admin_signin');
else
{
?>
//code here

<?php
}
?>
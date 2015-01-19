<?php
if(!isset($isIndex))die('');
else if(!isset($params[0]))die('');
else
{
	$uid=settype($params[0],'integer');
	$query=mysql_query("select id,firstname,lastname from users where id='$uid'",$mysqlC);

	if(mysql_num_rows($query)==1)
	{
		$row=mysql_fetch_assoc($query);
		print_r($row);
	}
}

?>
<?php

function saltedMD5($str)
{
	return md5($str.VP_PWD_SALT);
}

function timedRedirect($location)//this is not timed at all for now..
{
	echo "<script>setTimeout(function(){window.location='$location'},1000);</script>";
	echo "<a href='$location'>si vous etes pas rediriger cliquer ici</a>";
}

class User
{
	public static function isConnected()
	{
		return isset($_SESSION['id']);
	}
	public static function signout()
	{
		session_unset();
		session_destroy();
	}
	public static function signIn($array)
	{
		foreach ($array as $key => $value)
		{
			$_SESSION[$key]=$value;
		}
	}
	public static function signUp($array,$connection)
	{
		$firstname = $array['firstname'];
		$lastname = $array['lastname'];
		$email = $array['email'];
		$password=saltedMD5($array['password']);
		$query=mysql_query("insert into users(firstname,lastname,email,password) values('$firstname','$lastname','$email','$password')",$connection);
	}
	public static function reserver($vid,$connection)
	{
		$query = mysql_query("insert into reservations(idUser,idVoyage,attended) values('".$_SESSION['id']."','$vid','0')");
	}
	public static function getFullName()
	{
		if(isset($_SESSION['id']))
			return ucfirst($_SESSION['firstname'])." ".ucfirst($_SESSION['lastname']);
		else
			return '';
	}
	public static function getAttrib($attr,$connection)
	{
		if(User::isConnected() and $attr != 'password')
		{
			$query = mysql_query("select $attr from users where id='".$_SESSION['id']."'");
			return mysql_fetch_assoc($query)[$attr];
		}
		return '';
	}
}

class Admin
{
	public static function isAdminPage($action)
	{
		$admin_pages = array('admin','admin_signin','admin_signout','admin_signin_','addVoyage','addVoyage_','editVoyage','editVoyage_');
		return in_array($action,$admin_pages);
	}
	public static function isConnected()
	{
		return isset($_SESSION['admin_id']);
	}
	public static function signout()
	{
		session_unset();
		session_destroy();
	}
	public static function signIn($array)
	{
		foreach ($array as $key => $value)
		{
			$_SESSION[$key]=$value;
		}
	}
	public static function getUsername()
	{
		return $_SESSION['admin_username'];
	}
}


class DB
{
	public static function printCities($connection)
	{
		$query=mysql_query('select * from cities',$connection);
		while($row=mysql_fetch_assoc($query))
		{
			$id=$row['id'];
			$name=$row['name'];
			?>
				<option value='<?php echo $id;?>'><?php echo $name;?></option>
			<?php
		}
	}
	public static function fetchSelectedCities($vid,$connection)
	{
		$returnArray = array('id'=>array(),'name'=>array());$i=0;
		$query=mysql_query("select cities.id as id,name,0 as included from cities,cities_voyages where cities.id=cities_voyages.idCity and cities_voyages.idVoyage!='$vid' union select cities.id as id,name,1 as included from cities,cities_voyages where cities.id=cities_voyages.idCity and cities_voyages.idVoyage='$vid'",$connection);
		while ($row=mysql_fetch_assoc($query))
		{
			$id=$row['id'];
			$name=$row['name'];
			if($row['included'])
			{
				$returnArray['id'][$i]=$id;
				$returnArray['name'][$i++]=$name;
			}
			else
			{
				?>
				<option value='<?php echo $id;?>'><?php echo $name;?></option>
				<?php
			}
		}
		return $returnArray;
	}
	public function loadDbParams($connection)
	{
		$query=mysql_query("select * from params",$connection);
		while($row=mysql_fetch_assoc($query)){$dbParams[$row['param']]=$row['value'];}	
		return $dbParams;
	}
	public function getParam($param,$connection)
	{
		$query=mysql_query("select * from params where param='$param'",$connection);
		if($row=mysql_fetch_assoc($query))
			return $row['value'];
		else
			return '';
	}
}



function clean($str)
{
	return mysql_real_escape_string($str);
}

?>

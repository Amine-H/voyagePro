<!DOCTYPE html>
<?php
	$isIndex=true;
	session_start();
	require_once('inc/vars.php');
	require_once('inc/functions.php');
	require_once('inc/db.php');
	$dbParams=DB::loadDbParams($mysqlC);
	$routes = array('main',
					'admin',
					'admin_signin',
					'admin_signin_',
					'admin_signout',
					'addVoyage',
					'addVoyage_',
					'editVoyage',
					'deleteVoyage',
					'search',
					'contact',
					'signin',
					'signin_',
					'signup',
					'signup_',
					'signout',
					'forgot_pass',
					'profile',
					'profile_',
					'error',
					'reserver',
					'voyage',
					'voyages',
					'maintenance');
	$requestURI = explode('/',$_SERVER['REQUEST_URI']);
	$scriptName = explode('/',$_SERVER['SCRIPT_NAME']);

	for($i= 0;$i < sizeof($scriptName);$i++)
	{
		if($requestURI[$i] == $scriptName[$i])
		{
			unset($requestURI[$i]);
		}
	}
	$requestURI = array_values($requestURI);
	@$action = $requestURI[0];
	$params = array_slice($requestURI,1);

	if(empty($action))
	{
		$action = "main";
	}
?>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		</script>
		<title><?php echo WEBSITE_NAME;?></title>
		<?php
			if(Admin::isAdminPage($action))
			{?>
<script src="/js/admin-script.js"></script>
<link rel="stylesheet" type="text/css" href="/css/admin-style.css">
			<?php }
			else
			{?>
<script src="/js/jquery.min.js"></script>
<script src="/js/script.js"></script>
<script src="/js/responsiveslides.min.js"></script>
<link rel="stylesheet" type="text/css" href="/css/style.css">
<script>
$(function () {
	$("#slider1").responsiveSlides({
	maxwidth: 2500,
	speed: 600
	});
});
</script>
			<?php }?>
<link rel="stylesheet" type="text/css" media="screen and (max-width: 480px)" href="/css/mobile/style.css">
<link rel="stylesheet" type="text/css" media="screen and (max-width: 480px)" href="/css/mobile/responsiveslides.css">
<link rel="stylesheet" type="text/css" media="screen and (min-width: 481px)" href="/css/web/style.css">
<link rel="stylesheet" type="text/css" media="screen and (min-width: 481px)" href="/css/web/responsiveslides.css">
</head>
<body>
<div class="header">
<div class="wrap">
	<div class="logo">
		<a href="index.html"><img src="/img/logo.png" title="logo" /></a>
	</div>
	<div class="top-nav">
		<ul>
			<li class='acceuil'><a href="/">Acceuil</a></li>
			<li class='voyages'><a href="/voyages">Voyages</a></li>
			<?php if(!User::isConnected() && !Admin::isConnected()){?>
			<li class='connecter'><a href="/signin">Connecter</a></li>
			<?php }else if(!Admin::isConnected()){?>
			<li class='profile'><a href="/profile">Profile</a></li>
			<?php }?>
			<li class='contact'><a href="/contact">Contact</a></li>
			<?php if(User::isConnected()){?>
			<li><a href="/signout">deconnecter</a></li>
			<?php }?>
            <?php if(Admin::isConnected()){?>
			<li><a href="/admin_signout">deconnecter</a></li>
			<?php }?>
		</ul>
	</div>
	<div class="clear"></div>
</div>
</div>
<div class="clear"></div>
<div id='content_wrapper' class='content'>
	<div class='wrap'>
	<?php
	if(in_array($action,$routes))
	{
		if(isset($dbParams['isLive']) && $dbParams['isLive']==1)
			require_once("/inc//".$action.".php");
		else
			require_once("/inc/maintenance.php");
	}
	else
	{
		require_once("/inc/error.php");
	}
	?>
		</div>
</div>
<div class="clear"> </div>
<div class="copy-right">
	<p>Copyright VoyagePro 2014</p>
</div>
</body>
</html>

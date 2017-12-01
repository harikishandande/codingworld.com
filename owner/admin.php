<?php
	session_start();
	include_once('../includes/article.php');
	include_once('../includes/connection.php');
	if(isset($_SESSION['owner']))
	{ 
?>
<html>
	<head>
		<title>: <?php echo $_SESSION['username']; ?> :: Admin panel :</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
		<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
		<!--script src="js/less-1.3.3.min.js"></script-->
		<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
		<link href="../admin/css/bootstrap.css" rel="stylesheet">
		<link href="../admin/css/bootstrap-responsive.min.css" rel="stylesheet">
		<link href="../admin/css/style.css" rel="stylesheet">
		<style>
		body{
		color:#fff;
		}
		</style>
		<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
		<!--[if lt IE 9]>
		<script src="js/html5shiv.js"></script>
		<![endif]-->

		<!-- Fav and touch icons -->
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="../admin/img/apple-touch-icon-144-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="../admin/img/apple-touch-icon-114-precomposed.png">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="../admin/img/apple-touch-icon-72-precomposed.png">
		<link rel="apple-touch-icon-precomposed" href="../admin/img/apple-touch-icon-57-precomposed.png">
		<link rel="shortcut icon" href="../admin/img/favicon.png">
  
		<script type="text/javascript" src="../admin/js/jquery.min.js"></script>
		<script type="text/javascript" src="../admin/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../admin/js/scripts.js"></script>
	</head>
	<body>
		<div class="container-fluid">
			<div class="adminhead well">
						<h3 style="color:black;">Proffesors</h3>
					</div>	
			<div class="row-fluid">
				<div class="span12">
					<ul class="nav nav-tabs">	 
						<li><a href="adduser.php"><i class="icon-plus-sign"></i>Add Proffesor</a></li>
						<li><a href="viewuser.php"><i class="icon-remove-sign"></i>View Proffesor</a></li>
						<li><a href="subjectselect.php"><i class="icon-picture"></i>subject image</a></li>
					</ul>
				</div>
			</div>
		</div>
	</body>
</html>
<?php
	}
?>
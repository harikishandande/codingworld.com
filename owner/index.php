<?php
	session_start();
	include_once('../includes/article.php');
	include_once('../includes/connection.php');
	if(isset($_SESSION['owner']))
	{
?>
<html>
	<head>
		<title>:: <?php echo $_SESSION['username']; ?> :: Owner panel ::</title>
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
  		<style>
			body{
				color:#fff;
			}
		</style>
		<script type="text/javascript" src="../admin/js/jquery.min.js"></script>
		<script type="text/javascript" src="../admin/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../admin/js/scripts.js"></script>
	</head>
	<body>
		<div class="container-fluid">
			<div class="adminhead well">
				<h3 style="color:black;">Admin Panel</h3>
			</div>	
			<div class="row-fluid">
				<div class="span12">
					<ul class="nav nav-tabs">	 
						<li><a href="mastertechnology.php"><i class="icon-map-marker"></i>Master Technology</a></li>
						<li><a href="contactus.php"><i class="icon-comment"></i>Contact Us</a></li>
						<li><a href="moderator.php"><i class="icon-user"></i>Moderators</a></li>
						<li><a href="admin.php"><i class="icon-user"></i>Proffesors</a></li>
						<li><a href="labprograms.php"><i class="icon-th-list"></i>Lab Programs</a></li>
						<li><a href="logout.php"><i class="icon-share"></i>Logout</a></li>
					</ul>
				</div>
			</div>
		</div>
	</body>
</html>
<?php
	}
	else
	{
		if(isset($_POST['username'], $_POST['password']))
		{
			$username = $_POST['username'];
			$password = $_POST['password'];
			if(empty($username) or empty($password))
			{
				$error='All fields are required !';
			}
			else
			{
				$query = $pdo -> prepare("SELECT * FROM owner WHERE username = ? AND password= ?");
				$query->bindValue(1, $username);
				$query->bindValue(2, $password);
				$query->execute();
				$num = $query->rowCount();
				if($num==1)
				{	
					$_SESSION['username'] = $username;
					$_SESSION['owner'] = true;
					header('Location: index.php');
					exit();
				}

				else
				{
					$error = 'Incorrect details';
				}
			}
		}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>:: Login :: Owner panel ::</title>
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
		<style>
					body, .login-submit, .login-submit:before, .login-submit:after {
  background: #373737 url("../img/bg.pn") 0 0 repeat;
}

.login {
  position: relative;
  margin: 80px auto;
  width: 400px;
  padding-right: 32px;
  font-weight: 300;
  color: #a8a7a8;
  text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.8);
}
.login p {
  margin-bottom: 0px;
}

input, button, label {
  font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-size: 15px;
  font-weight: 300;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}

input[type=text], input[type=password] {
  padding: 0 10px;
  width: 250px;
  height: 40px;
  color: #bbb;
  text-shadow: 1px 1px 1px black;
  background: rgba(0, 0, 0, 0.16);
  border: 0;
  border-radius: 5px;
  -webkit-box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.06);
  box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.06);
}

input[type=text]:focus, input[type=password]:focus {
  color: white;
  background: rgba(0, 0, 0, 0.1);
  outline: 0;
}

label {
  float: left;
  width: 100px;
  line-height: 40px;
  padding-right: 10px;
  font-weight: 100;
  text-align: right;
  letter-spacing: 1px;
}

.login-submit {
  position: absolute;
  top: 13px;
  right: 50px;
  width: 48px;
  height: 48px;
  padding: 8px;
  border-radius: 32px;
  -webkit-box-shadow: 0 0 4px rgba(0, 0, 0, 0.35);
  box-shadow: 0 0 4px rgba(0, 0, 0, 0.35);
}

.login-submit:before, .login-submit:after {
  content: '';
  z-index: 1;
  position: absolute;
}

.login-submit:after {
  top: -4px;
  bottom: -4px;
  right: -4px;
  width: 36px;
}

.login-button {
  position: relative;
  z-index: 2;
  width: 48px;
  height: 48px;
  padding: 0 0 48px;
  /* Fix wrong positioning in Firefox 9 & older (bug 450418) */
  text-indent: 120%;
  white-space: nowrap;
  overflow: hidden;
  background: none;
  border: 0;
  border-radius: 24px;
  cursor: pointer;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.2), 0 1px rgba(255, 255, 255, 0.1);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.2), 0 1px rgba(255, 255, 255, 0.1);
  /* Must use another pseudo element for the gradient background because Webkit */
  /* clips the background incorrectly inside elements with a border-radius.     */
}

.login-button:before {
  content: '';
  position: absolute;
  top: 5px;
  bottom: 5px;
  left: 5px;
  right: 5px;
  background: #00a2d3;
  border-radius: 24px;
  background-image: -webkit-linear-gradient(top, #00a2d3, #0d7796);
  background-image: -moz-linear-gradient(top, #00a2d3, #0d7796);
  background-image: -o-linear-gradient(top, #00a2d3, #0d7796);
  background-image: linear-gradient(to bottom, #00a2d3, #0d7796);
  -webkit-box-shadow: inset 0 0 0 1px #00a2d3, 0 0 0 5px rgba(0, 0, 0, 0.16);
  box-shadow: inset 0 0 0 1px #00a2d3, 0 0 0 5px rgba(0, 0, 0, 0.16);
}
.login-button:active:hover:before {
  background: #0591ba;
  background-image: -webkit-linear-gradient(top, #0591ba, #00a2d3);
  background-image: -moz-linear-gradient(top, #0591ba, #00a2d3);
  background-image: -o-linear-gradient(top, #0591ba, #00a2d3);
  background-image: linear-gradient(to bottom, #0591ba, #00a2d3);
}
.login-button:after {
  content: '';
  position: absolute;
  top: 15px;
  left: 12px;
  width: 25px;
  height: 19px;
  background: url("arrow.png") 0 0 no-repeat;
}

				</style>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<?php 
					if(isset($error))
					{ ?>
						<h4 style ="color:#ff0000;text-align:center"><?php echo $error; ?> </h4>
			  <?php } ?>
			  		<p style="text-align:center;color:#0099cc;margin-bottom:-40px;"><b>Owner Panel</b></p>
					<form method="post" action="index.php" class="login" autocomplete="off">
						<p>
							<label for="login">Username:</label>
							<input type="text" name="username" id="login" placeholder="username">
						</p>
						<p>
							<label for="password">Password:</label>
							<input type="password" name="password" id="password" placeholder="password">
						</p>
						<p class="login-submit">
							<button type="submit" class="login-button">Login</button>
						</p>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>		
	<?php
	}
	?>
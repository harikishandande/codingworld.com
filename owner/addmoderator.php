<?php
include_once('../includes/connection.php');
include_once('../includes/article.php');
	if(isset($_POST['submit']))
	{ 
		$username = $_POST['username'];  
		$password = $_POST['password']; 
		if(empty($username) or empty($password))
		{
	 		$error = 'All fields are required !';
		}
		else
		{
			$subject = $_POST['subject'];
			include_once('../includes/article.php');
			$article =  new Article;
			$articles = $article->fetch_subject($subject);	
			$sid = $articles['id'];
			$pid = $articles['pid'];
			
			$query = $pdo -> prepare("SELECT * FROM moderators WHERE username = ?");
				$query->bindValue(1, $username);
				$query->execute();
				$num = $query->rowCount();
				if($num==0)
				{	
					$query = $pdo->prepare('INSERT INTO moderators(username,password,pid,sid) VALUES (?,?,?,?)');
						$query->bindValue(1, $username);
						$query->bindValue(2, $password);
						$query->bindValue(3, $pid);
						$query->bindValue(4, $sid);
						$result = $query->execute();
					if(!$result)
					{
						$error = 'This subject already has a moderator !';
					}
					else
					{	
						$success = 'Moderator added successfully !';
					}
				}
				else
				{
					$error = 'moderator already exist';
				}
			
		}
	}
?>
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
  
		<script type="text/javascript" src="../admin/js/jquery.min.js"></script>
		<script type="text/javascript" src="../admin/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../admin/js/scripts.js"></script>
	</head>
	<body>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="adminhead well">
					<h3 style="color:black;">Add Moderators</h3>
				</div>	
			<div class="row-fluid">
				<div class="span3">
				</div>
				<div class="span6">
				<?php
				if(isset($error))
					{ ?>
						<h4 style ="color:#ff0000;text-align:center"><?php echo $error; ?> </h4>
			  <?php } ?>
			  <?php
				if(isset($success))
					{ ?>
						<h4 style ="color:green;text-align:center"><?php echo $success; ?> </h4>
			  <?php } ?>
				<form action="addmoderator.php" method="post">
					<div class="control-group">
						<div class="controls">
							<input class="span12" type="text" name="username" placeholder="username"/>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<input class="span12" type="text" name="password" placeholder="password"/>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<select name="subject" class="course span12">
								<option><<<  SELECT Subject  >>></option>
									<?php
									include_once('../includes/article.php');
									include_once('../includes/connection.php');
									$article =  new Article;
									$articles = $article->fetch_subjects();	
									foreach($articles as $article)
									{
									?>	
								<option value="<?php echo $article['subject'];?>" ><?php echo $article['subject'];?></option>	
							  <?php } ?>
							</select>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<button class="btn btn-success btn-large btn-block" name="submit" type="submit" value="Add Article">Add moderator</button>
						</div>
					</div>
				</form>
				</div>
				<div class="span3">
				</div>
				</div>
			</div>
		</div>
  </body>
</html>
<?php 
	}
?>

 

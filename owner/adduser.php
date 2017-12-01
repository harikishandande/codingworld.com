<?php
session_start();
include_once('../includes/connection.php');
include_once('../includes/article.php');
	if(isset($_SESSION['owner']))
	{
		if(isset($_POST['submit']))
		{
			$sname = $_POST['sname'];  
			$uname = $_POST['uname'];  
			$password = $_POST['password'];  
			$subject = $_POST['subject'];
			if(empty($sname) or empty($uname) or empty($password) or empty($subject))
			{
				$error='All fields are required !';
			}
			else
			{
				$username = $sname . $uname;
				$query = $pdo->prepare('INSERT INTO proffesors(sname,uname,username,password) VALUES (?,?,?,?)');
					$query->bindValue(1, $sname);
					$query->bindValue(2, $uname);
					$query->bindValue(3, $username);
					$query->bindValue(4, $password);
					$query->execute();
				$query = $pdo->prepare('INSERT INTO subjects(sname,subject,pid,subject_timestamp) VALUES (?,?,(SELECT id FROM proffesors WHERE username = ?),?)');
					$query->bindValue(1, $sname);
					$query->bindValue(2, $subject);
					$query->bindValue(3, $username);
					$query->bindValue(4, time());
					$result = $query->execute();
				if(!$result)
					$error='User already exist Choose another name !';
				else
					$success='User added successfully !';
			}
		}
		
?>			<html>
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
					<div class="adminhead well">
						<h3 style="color:black;">Add Proffesors</h3>
					</div>
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
						<div class="row-fluid">
					
						<div class="span12">
							<div class="span3">
							</div>
							<div class="span6">
								<form action="adduser.php" method="post">
									<div class="control-group">
										<div class="controls">
											<input class="span3" style="text-transform:uppercase;" type="text" name="sname" placeholder="Sname"/>
											&nbsp;&nbsp;&nbsp;<input class="span9" type="text" name="uname" placeholder="uname"/>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<input class="span12" type="text" name="password" placeholder="password"/>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<input class="span12" type="text" name="subject" placeholder="subject name"/>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<button class="btn btn-success btn-large btn-block" name="submit" type="submit" value="Add Article">Add User & Subject</button>
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
	else
	{
		   header('Location: index.php');
	}
?>

 

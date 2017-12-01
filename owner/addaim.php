<?php
    session_start();
   include_once('../includes/connection.php');
   	    if(isset($_POST['aim'], $_POST['fullaim']))
   	    {
   	    	$aim = $_POST['aim'];
   	    	$fullaim = $_POST['fullaim'];
   	    	
   	    		$query = $pdo->prepare('INSERT INTO lp_aims(aim,fullaim,lp_subid,aim_timestamp) VALUES (?,?,?,?)');
   	    		$query->bindValue(1, $aim);
   	    		$query->bindValue(2, $fullaim);
   	    		$query->bindValue(3, $_SESSION['subid']);
   	    		$query->bindValue(4, time());
   	    		$query->execute();

   	    		header('Location: index.php');
   	    }
 ?>   
<?php
	$_SESSION['subid'] = $_GET['id']; 
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
		<script src="../ckeditor/ckeditor.js"></script>
	</head>
	<body>
		<div class="container-fluid">
			<div class="adminhead well">
				<h3 style="color:black;">Add Lab-Subject Aim</h3>
			</div>	
			<div class="row-fluid">
				<div class="span12">
					<form action="addaim.php" method="post" autocomplete="off">
						<div class="control-group">
							<div class="controls">
								<input class="span12" name="aim" id="aim" type="text" placeholder="Short Aim" />
							</div>
						</div>		
						<div class="control-group">
							<div class="controls">
								<textarea name="fullaim" class="span12" rows="8" type="text" placeholder="Long Aim" ></textarea>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<div class="row-fluid">
									<div class="span4">
									</div>
									<div class="span4">
										<button type="submit" name="submit" class="btn btn-success btn-large btn-block" >Add Program</button>
									</div>
									<div class="span4">
									</div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>
<?php
	
?>

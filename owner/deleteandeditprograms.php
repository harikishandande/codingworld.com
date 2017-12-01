<?php
	session_start();
	include_once('../includes/connection.php');
	include_once('../includes/article.php');
	$article = new Article;
    if(isset($_GET['deleteall']))
	{
		$id = $_GET['deleteall'];
		$query = $pdo->prepare('DELETE FROM lp_aims WHERE id=?');
			$query->bindValue(1, $id);
			$query->execute();
		$query = $pdo->prepare('DELETE FROM lp_newmethods WHERE lp_aimid = ?');
			$query->bindValue(1, $id);
			$query->execute();
			header('Location: labprograms.php ');
 	}
	if(isset($_GET['deletemethod']))
	{
		$id = $_GET['deletemethod'];
		$query = $pdo->prepare('DELETE FROM lp_newmethods WHERE id = ?');
			$query->bindValue(1, $id);
			$query->execute();
			header('Location: labprograms.php ');
	}
	if (isset($_GET['editallid'])) 
	{
		if(isset($_POST['aim'], $_POST['fullaim'])) 
		{
			$id = $_GET['editallid'];
			$data = $article->fetch_aimtoedit($id);
			$aim = $_POST['aim'];
			$fullaim = $_POST['fullaim'];
			$sql = "UPDATE lp_aims SET aim = :aim, fullaim = :fullaim WHERE id = :editallid";
			$query = $pdo->prepare($sql);
				$query->bindValue(":aim", $aim);
				$query->bindValue(":fullaim", $fullaim);
				$query->bindValue(":editallid", $id);
				$result = $query->execute();
				header('Location: labprograms.php ');
		}
	}
	if (isset($_GET['editmethodid']))
	{
		if(isset($_POST['methodaim'], $_POST['program'])) 
		{
			$id = $_GET['editmethodid'];
			$data = $article->fetch_progtoedit($id);
			$methodaim = $_POST['methodaim'];
			$program = $_POST['program'];
			$sql = "UPDATE lp_newmethods SET methodaim = :methodaim, program = :program WHERE id = :editmethodid";
			$query = $pdo->prepare($sql);
				$query->bindValue(":methodaim", $methodaim);
				$query->bindValue(":program", $program);
				$query->bindValue(":editmethodid", $id);
				$result = $query->execute();	
				header('Location: labprograms.php ');
		}
	}
	if(isset($_GET['editall']))
	{
		$id = $_GET['editall'];
		$data = $article->fetch_aimtoedit($id);
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
				<h3 style="color:black;">Edit Lab-Program Aim</h3>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<form action="deleteandeditprograms.php?editallid=<?php echo $data['id']; ?>" method="post">
						<div class="control-group">
							<div class="controls">
								<input class="span12" type="text" name="aim" value="<?php echo $data['aim']; ?>">
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<textarea name="fullaim">
									<?php echo $data['fullaim']; ?>
								</textarea>
								<script>
									// This call can be placed at any point after the
									// <textarea>, or inside a <head><script> in a
									// window.onload event handler.
									// Replace the <textarea id="editor"> with an CKEditor
									// instance, using default configurations.
									CKEDITOR.replace( 'fullaim' );
								</script>
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
		</div>
	  </body>
<?php
	}
?>
 <?php
	if(isset($_GET['editmethod']))
	{
		$id = $_GET['editmethod'];
		$data = $article->fetch_progtoedit($id);
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
		<script src="../ckcode/ckeditor.js"></script>
	</head>
	<body>
		<div class="container-fluid">
			<div class="adminhead well">
				<h3 style="color:black;">Edit Lab-Program</h3>
			</div>
			<div class="row-fluid">
				<div class="span12">
					<form action="deleteandeditprograms.php?editmethodid=<?php echo $data['id']; ?>" method="post">
						<div class="control-group">
							<div class="controls">
								<input class="span12" type="text" name="methodaim" value="<?php echo $data['methodaim']; ?>">
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<textarea class="span12" name="program">
									<?php echo $data['program']; ?>
								</textarea>
								<script>
									// This call can be placed at any point after the
									// <textarea>, or inside a <head><script> in a
									// window.onload event handler.
									// Replace the <textarea id="editor"> with an CKEditor
									// instance, using default configurations.
									CKEDITOR.replace( 'program' );
								</script>
							</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<div class="row-fluid">
									<div class="span4">
									</div>
									<div class="span4">
										<button class="btn btn-success btn-large btn-block" type="submit" name="submit" >Update</button>
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
<?php
}
?>
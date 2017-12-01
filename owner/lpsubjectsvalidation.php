<?php
	session_start();
	include_once('../includes/connection.php');
	include_once('../includes/article.php');
	$article = new Article;
	$articles = $article->fetch_lpsuball();
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
			<div class="adminhead well">
				<h3 style="color:black;">Select Lab-Subject</h3>
			</div>	
			<div class="row-fluid">
				<div class="span12">				
					<div class="accordion" id="accordion-1995">
						<?php 
							$article =  new Article;
							$articles = $article->fetch_lpsuball();	
							foreach($articles as $article)
							{
								static $i=0;
						?>		<div class="accordion-group">
									<div class="accordion-heading">
									<a class="accordion-toggle" href="lpvalidation.php?id=<?php echo $article['id']; ?>"><?php echo $article['lpsubject'];?></a>
									</div>
								</div>
								<?php $i++;
							}?>
					</div>
			</div>
		</div>
	</body>
</html>
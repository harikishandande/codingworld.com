<?php
	session_start();
	include_once('../includes/connection.php');
	include_once('../includes/article.php');
	$article = new Article; 
	if(isset($_SESSION['owner'])) 
	{
        if(isset($_GET['mid'])) 
		{
                $mid = $_GET['mid'];
                $query = $pdo->prepare('DELETE FROM moderators WHERE id = ?');
                $query->bindValue(1, $mid);
                $query->execute();
                header('Location: deletemoderator.php');
        }
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
	<body>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<div class="adminhead well">
						<h3 style="color:black;">View and Delete Moderators</h3>
					</div>	
						<div class="accordion" id="accordion-1995">
							<?php 
								$article =  new Article;
								$articles = $article->fetch_mall();	
								foreach($articles as $article)
								{
									static $i=0;
							?>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a class="last btn btn-danger" href="deletemoderator.php?mid=<?php echo $article['id'];?>" >Delete</a>
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-1995" href="#accordion-element-<?php echo $i;?>"><?php echo $article['username'];?></a>
										</div>
										<div id="accordion-element-<?php echo $i;?>" class="accordion-body collapse">
											<div class="accordion-inner">
												<h4>Moderator id : <?php echo $article['id']; ?></h4>
													
												<h4>Moderator name : <?php echo $article['username']; ?></h4>
													
												<h4>Moderator passward : <?php echo $article['password']; ?></h4>
																
												<h4>Proffesorid : <?php echo $article['pid']; ?></h4>
												
												<h4>Subjectid : <?php echo $article['sid']; ?></h4>
											</div>
										</div>
									</div>
								<?php $i++;
								}?>
						</div>
				</div>
			</div>
		</div>
  </body>
</html>
<?php 
	}
?>

 

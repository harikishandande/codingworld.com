<?php
	session_start();
	include_once('../includes/connection.php');
	include_once('../includes/article.php');
	$article = new Article;
	if(isset($_SESSION['owner']))
	{
        if(isset($_GET['pid']))
		{
                $id = $_GET['pid'];
                $query = $pdo->prepare('DELETE FROM proffesors WHERE id = ?');
                $query->bindValue(1, $id);
                $query->execute();
				
                header('Location: viewuser.php');
        }
		if(isset($_GET['sid'])) 
		{
                $id = $_GET['sid'];
                $query = $pdo->prepare('DELETE FROM subjects WHERE id = ?');
                $query->bindValue(1, $id);
                $query->execute();
				
				$query = $pdo->prepare('DELETE FROM units WHERE sid = ?');
                $query->bindValue(1, $id);
                $query->execute();
				
				$query = $pdo->prepare('DELETE FROM topics WHERE sid = ?');
                $query->bindValue(1, $id);
                $query->execute();
				
				$query = $pdo->prepare('DELETE FROM comments WHERE sid = ?');
                $query->bindValue(1, $id);
                $query->execute();
				
				$query = $pdo->prepare('DELETE FROM syllabus WHERE sid = ?');
                $query->bindValue(1, $id);
                $query->execute();
				
				$query = $pdo->prepare('DELETE FROM moderators WHERE sid = ?');
                $query->bindValue(1, $id);
                $query->execute();
                header('Location: viewuser.php');
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
						<h3 style="color:black;">View and Delete Proffesors</h3>
					</div>	
						<div class="accordion" id="accordion-1994">
							<?php 
								$article =  new Article;
								$articles = $article->fetch_pall();	
								foreach($articles as $article)
								{ static $i=0;
							?>
								<div class="accordion-group">
									<div class="accordion-heading">
										<a class="last btn btn-danger" href="viewuser.php?pid=<?php echo $article['id'];?>" >Delete</a>
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-1994" href="#accordion-element-<?php echo $i;?>"><?php echo $article['username'];?></a>
									</div>
									<div id="accordion-element-<?php echo $i;?>" class="accordion-body collapse">
										<div class="accordion-inner">
											<h4>proffesor id : <?php echo $article['id']; ?></h4>
											
											<h4>proffesor name : <?php echo $article['name']; ?></h4>
											
											<h4>proffesor username : <?php echo $article['username']; ?></h4>
												
											<h4>proffesor passward : <?php echo $article['password']; ?></h4>
															
											<h4>proffesor position : <?php echo $article['position']; ?></h4>

											<h4>proffesor image : <?php echo $article['user_img']; ?></h4>

										</div>
									</div>
								</div>
								<?php $i++;
								}?>
						</div>
						<br/>
						<div class="accordion" id="accordion-1995">
							<?php 
								$article =  new Article;
								$articles = $article->fetch_sall();	
								foreach($articles as $article)
								{
								static $i=0;
							?>
									<div class="accordion-group">
										<div class="accordion-heading">
											<a class="last btn btn-danger" href="viewuser.php?sid=<?php echo $article['id'];?>" >Delete</a>
											<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-1995" href="#accordion-element-<?php echo $i;?>"><?php echo $article['subject'];?></a>
										</div>
										<div id="accordion-element-<?php echo $i;?>" class="accordion-body collapse">
											<div class="accordion-inner">
												<h4>Subject id : <?php echo $article['id']; ?></h4>
													
												<h4>Subject name : <?php echo $article['subject']; ?></h4>
													
												<h4>Subject pid : <?php echo $article['pid']; ?></h4>
																
												<h4>Subject image : <?php echo $article['subject_img']; ?></h4>
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

 

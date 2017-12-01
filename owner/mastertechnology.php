<?php
session_start();
include_once('../includes/connection.php');
include_once('../includes/article.php');

if(isset($_SESSION['owner'])) {
        if(isset($_GET['id'])) {
                $id = $_GET['id'];
                $query = $pdo->prepare('DELETE FROM mt_enroll WHERE id = ?');
                $query->bindValue(1, $id);
                $query->execute();
                header('Location: mastertechnology.php');
        }
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
			color:#ffffff;
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
					<div class="adminhead well">
						<h3 style="color:black;">View MT Enrolls</h3>
					</div>	
					<div class="accordion" id="accordion-1994">
					<?php
						include_once('../includes/connection.php');
						include_once('../includes/article.php');
						$user = new Article;
						$users = $user->fetch_mtenrolls();
						foreach($users as $user)
						{	static $i=1;
					?>
								<div class="accordion-group">
									<div class="accordion-heading">
										<a class="last btn btn-danger" href="mastertechnology.php?id=<?php echo $user['id'];?>" >Delete</a>
										<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-1994" href="#accordion-element-<?php echo $i;?>"><?php echo $user['name'];?></a>
									</div>
								<?php
									$guest = $user['name'];
									include_once('../includes/connection.php');
									include_once('../includes/article.php');
									$article = new Article;
									$articles = $article->fetch_mtenroll($guest);
									foreach($articles as $article)
									{
								?>
									<div id="accordion-element-<?php echo $i;?>" class="accordion-body collapse">
										<div class="accordion-inner">
														<h4>Name : <?php echo $article['name']; ?></h4>
													
														<h4>Email : <?php echo $article['email']; ?></h4>
													
														<h4>Phone : <?php echo $article['phone']; ?></h4>
													
														<h4>Course Type : <?php echo $article['coursetype']; ?></h4>
													
														<h4>Course : <?php echo $article['course']; ?></h4>
										</div>
									</div>
									<?php }?>
								</div>
			<?php $i++;}?>
				 	</div>
			</div>	 					
		</div>
  </body>
</html>
 <?php }
?>

 

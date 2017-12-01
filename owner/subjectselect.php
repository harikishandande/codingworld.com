<?php
	session_start();
	include_once('../includes/connection.php');
	include_once('../includes/article.php');
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
		<style>
		body{
		color:#fff;
		}
		
.course-box {
  float:center;
  height:232px;
  width:100%;
  display:inline-block;
}
.course-box .mask {
  background: #fff;
  border-radius: 15px;
  box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.45);
  color: #353535;
  display: block;
  font-size: small;
  overflow: hidden;
  transition: box-shadow 0.2s;
}
.course-box .mask:hover {
  box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.7);
  text-decoration:none;
  
}
.course-thumb img{
 background-size:1;
  width:100%;
 height:300px;
}
.course-box .mask .title {
  text-align:center;
  display: block;
  font-size: 20px;
  line-height: 1.3;
  min-height: 30px;
  overflow: hidden;
  padding: 10px;
  font-weight: bold;
  border-bottom: 1px solid rgba(126, 126, 126, 0.3);
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
						<h3 style="color:black;">Select Subject To Change Image</h3>
					</div>	
						<div class="accordion" id="accordion-1994">
							<?php
								$article = new Article;
								$articles = $article->fetch_allsub();
								foreach($articles as $article)
								{ 
									$subject = $article['subject'];
									$sname = $article['sname'];
							?>
								<li class="course-box span6">
									<a href="upload/upload.php?sname=<?php echo $sname;?>"class="mask">
										<div class="course-thumb">
											<img class="course-thumb" src="../subjectimages/<?php echo $article['subject_img']; ?>"/>
										</div>
										<div class="title">
											<?php echo $subject; ?>
										</div>
									</a>
								</li>
								<?php
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
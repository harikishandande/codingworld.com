<?php
	session_start();
	$newcontent = 0;
	$newheading = 0;
	$nono = 0;
	include_once('../includes/connection.php');
	include_once('../includes/article.php');
	if(isset($_SESSION['owner']))
	{ 
		if(isset($_POST['valid']))
		{
			$id = $_GET['id'];
			$pid = $_GET['pid'];
			$query = $pdo->prepare('UPDATE lp_newmethods SET status = 1 WHERE id = ?;');
				$query->bindValue(1, $pid);
				$query->execute();
				header("Location: lpvalidation.php?id=$id");
				$success = 'Validated successfully !';
		}

?>
<!DOCTYPE html>
<html lang="en">
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
	
		<link href="../admin/css/bootstrap.min.css" rel="stylesheet">
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
		<script src="../ckeditor/ckeditor.js"></script>
	</head>
	<body>
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="adminhead well">
				<h3 style="color:black;">Lab-Programs</h3>
			</div>	
				<?php
				include_once('../includes/connection.php');
				include_once('../includes/article.php');
				$lp_subid = $_GET['id'];
				$_SESSION['lp_subid'] = $lp_subid;
				$article = new Article;
				$articles = $article->fetch_prog($lp_subid);
				?>
			<div class="row-fluid">
			<?php 
				if(isset($error))
				{ ?>
					<h4 style ="color:red;text-align:center"><?php echo $error; ?> </h4>
		  <?php }  
				if(isset($success))
				{ ?>
					<h4 style ="color:green;text-align:center"><?php echo $success; ?> </h4>
		  <?php } ?>  
				<div class="accordion" id="accordion-1994">
				<?php 
				static $mheading=1;
				foreach ($articles as $article)
				{	static $mheading=1;
				?>
				<div class="accordion-group">
					<div class="accordion-heading">
						 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-1994" href="#accordion-element-<?php echo $mheading; ?>"><?php echo $article['aim']; ?></a>
					</div>			
					<div id="accordion-element-<?php echo $mheading; ?>" class="accordion-body collapse">
						<div class="accordion-inner">
							<div class="span12">
								<div class="span12">
									<div class="span12">
										<h5> Aim </h5>
										<pre><?php echo $article['fullaim']; ?></pre>
									</div>
								</div>
								<?php
							    $noofsolutions = 0;
								$id=$article['id'];
								include_once('../includes/connection.php');
								include_once('../includes/article.php');
								$program = new Article;
								$programs = $program->fetch_program($id);
								foreach ($programs as $program)
							    { 
								    $noofsolutions = $noofsolutions+1;
								}
								?>
								<div class="tabbable" id="tabs">
									<ul class="nav nav-pills">
										<?php 
										foreach ($programs as $program)
										{   static $sheading=0;
											static $nono=0;
											?>
											
											<?php 
											if($sheading==$nono) { ?><li class="active <?php if(!$program['status']){ echo "btn-danger";}?> "><?php }
											else { ?><li class="<?php if(!$program['status']){ echo "btn-danger";}?>"><?php } ?>
												<a href="#panel-<?php echo $sheading; ?>" data-toggle="tab"><?php echo $program['methodaim']; ?></a>
											</li>
											<?php	$sheading++; 
										} ?>
									</ul>
									<div class="tab-content">
										<?php 
										foreach ($programs as $program)
										{   static $scontent=0;
											?>
											<?php if($scontent==$nono) { ?><div class="tab-pane active" id="panel-<?php echo $scontent; ?>"><?php }
											else { ?><div class="tab-pane" id="panel-<?php echo $scontent; ?>"><?php } ?>
												<div class="row-fluid">
													<div class="span12">
												<?php	if(!$program['status'])
														{
												?>			<div class="alert" style="color:red;">
																<h4 style="color:red;">
																	Warning!
																</h4> <strong>We can't gaurenty that, this program is true!</strong> Program need to be verified.
															</div>
															<form class="form" action="lpvalidation.php?id=<?php echo $lp_subid; ?>&pid=<?php echo $program['id']; ?>" method="POST" enctype="multipart/form-data">
																<div class="input-append">
																	<button class="btn btn-danger" name="valid" type="submit">Validate !</button>
																</div>
															</form>
															
															<a class="last btn btn-danger"  href="deleteandeditprograms.php?deletemethod=<?php echo $program['id']; ?>">Delete</a>
															<a class="lastbefore btn btn-info"  href="deleteandeditprograms.php?editmethod=<?php echo $program['id']; ?>">Edit</a>
												<?php		echo $program['program']; ?>
												<?php	}
														else
														{
															echo $program['program']; ?>
												<?php	}	?>
													</div>
												</div>
											</div>
											<?php	$scontent++; 
										}$nono=$nono + $noofsolutions;?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php	$mheading++;
				}
					$_SESSION['mheading'] = $mheading; 
				?>	
			</div>
		</div>
	</div>
		</div>
	</div>
	</body>
</html>
<?php }?>
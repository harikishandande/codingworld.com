<?php
	session_start();
	$newcontent = 0;
	$newheading = 0;
	$nono = 0;
	include_once('includes/connection.php');
	include_once('includes/article.php');
	if(isset($_POST['submitsearch']))
   	{
		$search = $_POST['search'];
		if(empty($search))
		{
			$error = 'No value received to search !';
		}
		else
		{
			$sresult = new Article;
			$sresults = $sresult->fetch_search($search);
			if(empty($sresults))
			{
				$error = 'No record found !';
			}
		}
	}
   	if(isset($_POST['submit']))
   	{	
		$value = $_SESSION['mheading'];
		for($i=1;$i<$value;$i++)
		{	
			$programname = $_SESSION["prog$i"];
			echo $programname;
			if(isset($_POST["$programname"]))
			{
				break;
			}
		}
		$programname = $_SESSION["prog$i"];
   	  	$name = $_POST['name'];
   	   	$email = $_POST['email'];
   	   	$newmethod = $_POST['newmethod'];
   		$program = $_POST["$programname"];
		$aimid = $_GET['id'];
		$lp_subid = $_SESSION['lp_subid'];
		if(empty($name) or empty($email) or empty($newmethod) or empty($program))
		{
			$error = 'All fields are required !';
		}
		else
		{	$query = $pdo->prepare('INSERT INTO lp_newmethods(name,email,methodaim,program,lp_aimid,lp_subid,program_timestamp) VALUES (?,?,?,?,?,?,?)');
				$query->bindValue(1, $name);
				$query->bindValue(2, $email);
				$query->bindValue(3, $newmethod);
				$query->bindValue(4, $program);
				$query->bindValue(5, $aimid);
				$query->bindValue(6, $lp_subid);
				$query->bindValue(7, time());
				$query->execute();
				session_destroy();
				header('Location: labprograms.php');
				$success = 'Method added successfully But if we found any errors we republish it !';
		}
   	}
	else
	{
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Lab Programs | Coding World</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->
	
	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	
  <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
  <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
  <![endif]-->

  <!-- Fav and touch icons -->
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
  <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
  <link rel="shortcut icon" href="img/favicon.png">
  
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	<script src="ckcode/ckeditor.js"></script>
</head>
<body>
<div class="container-fluid">
	<div class="row-fluid">
		<div id="headerSection">
			<div class="navbar">
				<div class="nav-collapse">
					<ul class="nav">
						<a href="http://www.codingworld.in/"><span class="master">CODING WORLD<span></a>
						<li><a href="index.php">HOME</a></li>
						<li><a href="mastertechnology.php">MASTER TECHNOLOGY</a></li>
						<li class="active"><a href="labprograms.php">LAB PROGRAMS</a></li>
						<li><a href="materials.php">MATERIALS</a></li>
						<li><a href="contactus.php">CONTACT US</a></li>
					</ul>
				</div>
				<button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
			</div>
		</div>
	</div>
	<div class="top">
	<?php 
		if(isset($sresult))
		{
	?>	<div class="row-fluid">
			<h4 style="color:green">Searched results</h4>
				<div class="accordion" id="accordion-1994">
				<?php 
				static $mheading=1;
				foreach ($sresults as $sresult)
				{	static $mheading=1;
				?>
				<div class="accordion-group">
					<div class="accordion-heading">
						 <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion-1994" href="#accordion-element-<?php echo $mheading; ?>"><?php echo $sresult['aim']; ?></a>
					</div>			
					<div id="accordion-element-<?php echo $mheading; ?>" class="accordion-body collapse">
						<div class="accordion-inner">
							<div class="span12">
								<div class="span12">
									<div class="span9">
										<h5> Aim </h5>
										<pre><?php echo $sresult['fullaim']; ?></pre>
									</div>
									<div class="span3">
										<h5> Addss </h5>
									</div>
								</div>
								<?php
							    $noofsolutions = 0;
								$id=$sresult['id'];
								include_once('includes/connection.php');
								include_once('includes/article.php');
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
										    static $newheading=1000000;
											static $nono=0;
											?>
											
											<?php 
											if($sheading==$nono) { ?><li class="active"><?php }
											else { ?><li><?php } ?>
												<a href="#panel-<?php echo $sheading; ?>" data-toggle="tab"><?php echo $program['methodaim']; ?></a>
											</li>
											<?php	$sheading++; 
										} ?>
											<li>
												<a class="btn-danger" href="#panel-<?php echo $newheading; ?>" data-toggle="tab">New Method</a>
											</li>
										<?php $newheading++; ?>
									</ul>
									<div class="tab-content">
										<?php 
										foreach ($programs as $program)
										{   static $scontent=0;
										    static $newcontent=1000000;
											?>
											<?php if($scontent==$nono) { ?><div class="tab-pane active" id="panel-<?php echo $scontent; ?>"><?php }
											else { ?><div class="tab-pane" id="panel-<?php echo $scontent; ?>"><?php } ?>
												<div class="row-fluid">
													<div class="span9">
												<?php	if(!$program['status'])
														{
												?>			<div class="alert" style="color:red;">
																<h4 style="color:red;">
																	Warning!
																</h4> <h5 style="color:green;">Program Submitted by user.</h5><strong>We can't gaurenty that, this program is correct!</strong> Program needs to be verified.
															</div>
														<?php echo $program['program']; ?>
												<?php	}
														else
														{
												?>
														<?php echo $program['program']; ?>
												<?php	}	?>
													</div>
													<div class="span3">
														addss
													</div>
												</div>
											</div>
											<?php	$scontent++; 
										}$nono=$nono + $noofsolutions;?>
										<div class="tab-pane" id="panel-<?php echo $newcontent; ?>">
											<div class="row-fluid">
												<div class="span9">
													<form class="form" action="lpinsubject.php?id=<?php echo $sresult['id']; ?>" method="POST" enctype="multipart/form-data">
														<div class="control-group">
															 <label class="control-label" for="inputName">Name</label>
															<div class="controls">
																<input class="span12" name="name" id="inputName" type="text" required />
															</div>
														</div>
														<div class="control-group">
															 <label class="control-label" for="inputEmail">Email</label>
															<div class="controls">
																<input class="span12" name="email" id="inputEmail" type="email" required />
															</div>
														</div>
														<div class="control-group">
															 <label class="control-label" for="inputText">Method Type</label>
															<div class="controls">
																<input class="span12" name="newmethod" id="inputText" type="text" required />
															</div>
														</div>
														<div class="control-group">
															 <label class="control-label" for="inputMessage">program (Note: Please Click <img src="ckcode/plugins/pbckcode/icons/pbckcode.png" /> to Enter SourseCode.)</label>
															<div class="controls">
																<?php $_SESSION["prog$mheading"] = "program$newcontent";?>
																<textarea class="span12 program" name="program<?php echo $newcontent;?>" id="textarea" style="height: 250px; width: 100%;"></textarea>
																<script>
																	// This call can be placed at any point after the
																	// <textarea>, or inside a <head><script> in a
																	// window.onload event handler.

																	// Replace the <textarea id="editor"> with an CKEditor
																	// instance, using default configurations.
																	CKEDITOR.replace( 'program<?php echo $newcontent;?>' );
																</script>
															</div>
														</div>
														<div class="control-group">
															<div class="controls">
																<div class="row-fluid">
																		<button type="submit" name="submit" class="btn btn-large btn-success btn-block">Submit Method</button>						
																</div>
															</div>
														</div>
													</form>
												</div>
												<div class="span3">
													addss
												</div>
											</div>
										</div>
										<?php $newcontent++; ?>
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
<?php   } ?>
				<?php
				include_once('includes/connection.php');
				include_once('includes/article.php');
				$lp_subid = $_GET['id'];
				$_SESSION['lp_subid'] = $lp_subid;
				$article = new Article;
				$articles = $article->fetch_prog($lp_subid);
				?>
			<div class="top" style="align:center;">
				<form class="form-search" action="lpinsubject.php?id=<?php echo $lp_subid; ?>" method="POST" enctype="multipart/form-data"> 
					<div class="input-append">
						<input class="search-query span6" name="search" id="appendedInputButton" type="text"/>
						<button type="submit" name="submitsearch" class="btn btn-info">Search</button>
					</div>
				</form>
			</div>
				<div class="row-fluid">
				<?php 
					if(isset($error))
					{ ?>
						<h4 style ="color:red;text-align:center"><?php echo $error; ?> </h4>
			  <?php }  ?>
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
									<div class="span9">
										<h5> Aim </h5>
										<pre><?php echo $article['fullaim']; ?></pre>
									</div>
									<div class="span3">
										<h5> Addss </h5>
									</div>
								</div>
								<?php
							    $noofsolutions = 0;
								$id=$article['id'];
								include_once('includes/connection.php');
								include_once('includes/article.php');
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
										    static $newheading=1000000;
											static $nono=0;
											?>
											
											<?php 
											if($sheading==$nono) { ?><li class="active"><?php }
											else { ?><li><?php } ?>
												<a href="#panel-<?php echo $sheading; ?>" data-toggle="tab"><?php echo $program['methodaim']; ?></a>
											</li>
											<?php	$sheading++; 
										} ?>
											<li>
												<a class="btn-danger" href="#panel-<?php echo $newheading; ?>" data-toggle="tab">New Method</a>
											</li>
										<?php $newheading++; ?>
									</ul>
									<div class="tab-content">
										<?php 
										foreach ($programs as $program)
										{   static $scontent=0;
										    static $newcontent=1000000;
											?>
											<?php if($scontent==$nono) { ?><div class="tab-pane active" id="panel-<?php echo $scontent; ?>"><?php }
											else { ?><div class="tab-pane" id="panel-<?php echo $scontent; ?>"><?php } ?>
												<div class="row-fluid">
													<div class="span9">
												<?php	if(!$program['status'])
														{
												?>			<div class="alert" style="color:red;">
																<h4 style="color:red;">
																	Warning!
																</h4> <h5 style="color:green;">Program Submitted by user.</h5><strong>We can't gaurenty that, this program is correct!</strong> Program needs to be verified.
															</div>
														<?php echo $program['program']; ?>
												<?php	}
														else
														{
												?>
														<?php echo $program['program']; ?>
												<?php	}	?>
													</div>
													<div class="span3">
														addss
													</div>
												</div>
											</div>
											<?php	$scontent++; 
										}$nono=$nono + $noofsolutions;?>
										<div class="tab-pane" id="panel-<?php echo $newcontent; ?>">
											<div class="row-fluid">
												<div class="span9">
													<form class="form" action="lpinsubject.php?id=<?php echo $article['id']; ?>" method="POST" enctype="multipart/form-data">
														<div class="control-group">
															 <label class="control-label" for="inputName">Name</label>
															<div class="controls">
																<input class="span12" name="name" id="inputName" type="text" required />
															</div>
														</div>
														<div class="control-group">
															 <label class="control-label" for="inputEmail">Email</label>
															<div class="controls">
																<input class="span12" name="email" id="inputEmail" type="email" required />
															</div>
														</div>
														<div class="control-group">
															 <label class="control-label" for="inputText">Method Type</label>
															<div class="controls">
																<input class="span12" name="newmethod" id="inputText" type="text" required />
															</div>
														</div>
														<div class="control-group">
															 <label class="control-label" for="inputMessage">program (Note: Please Click <img src="ckcode/plugins/pbckcode/icons/pbckcode.png" /> to Enter SourseCode.)</label>
															<div class="controls">
																<?php $_SESSION["prog$mheading"] = "program$newcontent";?>
																<textarea class="span12 program" name="program<?php echo $newcontent;?>" id="textarea" style="height: 250px; width: 100%;"></textarea>
																<script>
																	// This call can be placed at any point after the
																	// <textarea>, or inside a <head><script> in a
																	// window.onload event handler.

																	// Replace the <textarea id="editor"> with an CKEditor
																	// instance, using default configurations.
																	CKEDITOR.replace( 'program<?php echo $newcontent;?>' );
																</script>
															</div>
														</div>
														<div class="control-group">
															<div class="controls">
																<div class="row-fluid">
																		<button type="submit" name="submit" class="btn btn-large btn-success btn-block">Submit Method</button>						
																</div>
															</div>
														</div>
													</form>
												</div>
												<div class="span3">
													addss
												</div>
											</div>
										</div>
										<?php $newcontent++; ?>
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

<div id="footerSection">
	<div class="row-fluid">
		<div class="span2">
			<h5>NAV Menu</h5>
			<a href="index.php">HOME</a>
			<a href="mastertechnology.php">MASTER TECHNOLOGY</a>
			<a href="labprograms.php">LAB PROGRAMS</a>
			<a href="materials.php">MATERIALS</a>
			<a href="contactus.php">CONTACT US</a>
		</div>
		<div class="span4">
			<h5>OUR Proffesors</h5>
			<?php
				include_once('includes/connection.php');
				include_once('includes/article.php');
				$article = new Article;
				$articles = $article->fetch_prof();
			?>
			<?php foreach ($articles as $article)
			{  	
			?>
				<a class="circle" href="#" style="margin:5px 10px 5px 0px;" class="pull-left"><img  src="userimages/<?php echo $article['user_img']; ?>" class="media-object" alt='' /></a>
			<?php
			}
			?>
		</div>
		<div class="span3">
			<h5>OUR Moderators</h5>
			<?php
				include_once('includes/connection.php');
				include_once('includes/article.php');
				$article = new Article;
				$articles = $article->fetch_moder();
			?>
			<?php foreach ($articles as $article)
			{  	
			?>
				<a class="circle" href="#" style="margin:5px 10px 5px 0px;" class="pull-left"><img  src="moderatorimages/<?php echo $article['moderator_img']; ?>" class="media-object" alt='' /></a>
			<?php
			}
			?>
		</div>
		<div id="socialMedia" class="span3 pull-right">
			<h5>SOCIAL MEDIA </h5>
			<a href="https://www.facebook.com/pages/Coding-world/348153538631470"><img width="60" height="60" src="img/facebook.png" title="facebook" alt="facebook"/></a>
			<a href="#"><img width="60" height="60" src="img/twitter.png" title="twitter" alt="twitter"/></a>
			<a href="https://www.youtube.com/user/codingworld1"><img width="60" height="60" src="img/youtube.png" title="youtube" alt="youtube"/></a>
		</div> 
	</div>
		<a class="pull-right" href="https://www.codingworld.in" style="font-size:16px;"><span style="color:#0099cc;font-weight:bold;font-size:18px;">&copy;</span> CodingWorld.in</a>
</div>
</body>
</html>
<?php
	}
?>
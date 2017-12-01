<?php 
include_once('includes/connection.php');
if(isset($_POST['submit']))
{	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$language=$_POST['language'];
	$program_aim=$_POST['program_aim'];
	if(empty($name) or empty($email) or empty($language) or empty($program_aim))
	{
		$error="All fields are required !";
	}
	else
	{	global $pdo; 
		$query = $pdo -> prepare('INSERT INTO suggested_aim (name,email,language,program_aim) VALUES (?,?,?,?)');
			$query -> bindValue(1,$name);
			$query -> bindValue(2,$email);
			$query -> bindValue(3,$language);
			$query -> bindValue(4,$program_aim);
			$query -> execute();
		$success="Submitted successfully !";
	}
}
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
	<style rel="stylesheet">
	.course-box 
	{
		float:center;
		height:100px;
		width:320px;
		display:inline-block;
		margin-right: 20px;
		margin-bottom: 20px;
	}
	.course-thumb 
	{
		background-size:1;
		width:320px;
		height:170px;
	}
	</style>
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
		<div class="row-fluid">
			<div class="span7">
				<div class="materials">
					<?php
					session_start();
					include_once('includes/connection.php');
					include_once('includes/article.php');
					$article = new Article;
					$articles = $article->fetch_lpsuball();
					
				?>
		  <?php foreach ($articles as $article)
				{       	
		  ?>			<div class="course-box">
							<a href="lpinsubject.php?id=<?php echo $article['id']; ?>" class="mask">
							<div class="title">
								<?php echo $article['lpsubject']; ?>
							</div>
							<div class="content">
							 
							</div>
							<div class="instructors">
								
								<div class="teacher">
									<div class="ins-job-title ellipsis">
										
									</div>
								</div>
							</div>
							</a>
						</div>
				<?php 
				}
				?>	
				</div>
			</div>
			<div class="span5">
			<div class=" hero-unit well">
			<?php 
					if(isset($error))
					{ ?>
						<h4 style ="color:red;text-align:center"><?php echo $error; ?> </h4>
			  <?php }  
					if(isset($success))
					{ ?>
						<h4 style ="color:green;text-align:center"><?php echo $success; ?> </h4>
			  <?php } ?>
			<h3>Suggest new aim</h3>
				<form class="form" action="labprograms.php" method="POST" enctype="multipart/form-data">
					<div class="control-group">
						<label class="control-label" for="inputName">Name</label>
						<div class="controls">
							<input class="span12" name="name" id="inputName" type="text" required/>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">Email</label>
						<div class="controls">
							<input class="span12" name="email" id="inputEmail" type="email"/>
						</div>
					</div>
					<div class="row-fluid">
						<div class="control-group">
							<label class="control-label" for="inputMobile">Select Programming Language</label>
							<div class="controls">
								<select name="language" class="subject span12">
									<option selected="selected">--Select Programming Language--</option>
								  <?php foreach ($articles as $article)
										{       
								  ?>		<option><?php echo $article['lpsubject']; ?></option>
								  <?php } ?>	
								</select>
							</div>
						</div>
					</div>
					<div class="control-group">
						<label class="control-label" for="inputEmail">Program Aim</label>
						<div class="controls">
							<textarea class="span12" name="program_aim" id="textarea" style="height:100px" required></textarea>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<button type="submit" name="submit" class="btn btn-success">Submit</button>
						</div>
					</div>
				</form>
			</div>
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

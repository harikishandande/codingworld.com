<?php 
include_once('includes/connection.php');
if(isset($_POST['submit']))
{	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$message=$_POST['message'];
	
	if(empty($name) or empty($email) or empty($message))
	{
		$error="All fields are required!!";
	}
	else
	{	global $pdo; 
		$query = $pdo -> prepare('INSERT INTO contactus (name,email,message) VALUES (?,?,?)');
			$query -> bindValue(1,$name);
			$query -> bindValue(2,$email);
			$query -> bindValue(3,$message);
			$query -> execute();
		$success="Submitted successfully!!";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Contact Us | Coding World</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

	<!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
	<!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
	<!--script src="js/less-1.3.3.min.js"></script-->
	<!--append ‘#!watch’ to the browser URL, then refresh the page. -->

	<link href="css/bootstrap.css" rel="stylesheet">
	<link href="css/bootstrap.min.css" rel="stylesheet">
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
						<li><a href="labprograms.php">LAB PROGRAMS</a></li>
						<li><a href="materials.php">MATERIALS</a></li>
						<li class="active"><a href="contactus.php">CONTACT US</a></li>
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
			<div class="span6">
				<?php 
				if(isset($error))
				{ ?>
					<h4 style ="color:red;text-align:center"><?php echo $error; ?> </h4>
		  <?php }  
				if(isset($success))
				{ ?>
					<h4 style ="color:green;text-align:center"><?php echo $success; ?> </h4>
		  <?php } ?>  
				<form class="form" action="contactus.php" method="POST" enctype="multipart/form-data">
					<div class="control-group">
						 <label class="control-label" for="inputName">Name</label>
						<div class="controls">
							<input class="span12" name="name" id="inputName" type="text" />
						</div>
					</div>
					<div class="control-group">
						 <label class="control-label" for="inputEmail">Email</label>
						<div class="controls">
							<input class="span12" name="email" id="inputEmail" type="email"/>
						</div>
					</div>
					<div class="control-group">
						 <label class="control-label" for="inputMessage">Message</label>
						<div class="controls">
							<textarea class="span12" name="message" id="textarea" rows="3" style="height:200px"></textarea>
						</div>
					</div>
					<div class="control-group">
						<div class="controls">
							<button type="submit" name="submit" class="btn btn-success btn-large">Send Message</button>
						</div>
					</div>
				</form>
			</div>
			<div class="span6">
				<div class="row-fluid">
					<div class="span12">
						<address> <strong>Master Technology, Inc.</strong><br /> #403, AVR complex<br /> Balaji colony, Tirupathi 524001<br /> <abbr title="Phone">P:</abbr> (123) 456-7890</address>
						<div class="media well">
							<a href="#" style="width:15%;height:15%;" class="pull-left"><img  src="img/harsha.jpg" class="media-object" alt='' /></a>
							<div class="media-body">
								<h4 class="media-heading">
									T Harsha
								</h4> In building this website, I have gained a lot of experience in all aspects. I enjoyed a lot while working with this project. 
							</div>
						</div>
						<div class="media well">
							<a href="#" style="width:15%;height:15%;" class="pull-right"><img  src="img/kishan.jpg" class="media-object" alt='' /></a>
							<div class="media-body">
								<h4 class="media-heading">
									D Hari Kishan
								</h4> Its my dream to build a website since from my B-tech 1st year. Now we succeeded in building a beautiful website for my friends.
							</div>
						</div>
					</div>
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

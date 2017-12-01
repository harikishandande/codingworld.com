<?php 
include_once('includes/connection.php');
if(isset($_POST['submit']))
{	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$coursetype=$_POST['coursetype'];
	$course=$_POST['course'];
	if(empty($name) or empty($email) or empty($phone) or empty($coursetype) or empty($course))
	{
		$error="All fields are required !";
	}
	else
	{	global $pdo; 
		$query = $pdo -> prepare('INSERT INTO mt_enroll (name,email,phone,coursetype,course) VALUES (?,?,?,?,?)');
			$query -> bindValue(1,$name);
			$query -> bindValue(2,$email);
			$query -> bindValue(3,$phone);
			$query -> bindValue(4,$coursetype);
			$query -> bindValue(5,$course);
			$query -> execute();
		$success="Submitted successfully !";
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Register | Master Technology | Coding World</title>
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
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
	<script type="text/javascript">
			$(document).ready(function()
			{
			$(".course").change(function()
			{
			var data=$(this).val();
			var dataString = 'data='+ data;

			$.ajax
			({
			type: "POST",
			url: "ajax_city.php",
			data: dataString,
			cache: false,
			success: function(html)
			{
				alert(html);
			} 
			});

			});
			});
	</script>
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
						<li class="active"><a href="mastertechnology.php">MASTER TECHNOLOGY</a></li>
						<li><a href="labprograms.php">LAB PROGRAMS</a></li>
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
		<div id="myCarousel" class="carousel slide">
			<div class="carousel slide" id="carousel-1993">
				<ol class="carousel-indicators">
					<li class="active" data-slide-to="0" data-target="#carousel-1993">
					</li>
					<li data-slide-to="1" data-target="#carousel-1993">
					</li>
					<li data-slide-to="2" data-target="#carousel-1993">
					</li>
					<li data-slide-to="3" data-target="#carousel-1993">
					</li>
				</ol>
				<div class="carousel-inner">
					<div class="item active">
						<img alt="" src="img/carousel/six.png">
						<div class="carousel-caption">
							
						</div>
					</div>
					<div class="item">
						<img alt="" src="img/carousel/seven.png">
						<div class="carousel-caption">
							
						</div>
					</div>
					<div class="item">
						<img alt="" src="img/carousel/eight.png">
						<div class="carousel-caption">
							
						</div>
					</div>
					<div class="item">
						<img alt="" src="img/carousel/five.png">
						<div class="carousel-caption">
							
						</div>
					</div>
				</div>
				<a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
				<a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
			</div>
		</div>
		</div>
	</div>
	<div class="#">
		<div class="row-fluid">
			<div class="span6">
					<div class="tabbable" id="tabs-216040">
						<ul class="nav nav-pills">
							<li class="active">
								<a class="btn-success" href="#panel-1" data-toggle="tab">Career Courses</a>
							</li>
							<li>
								<a class="btn-info" href="#panel-2" data-toggle="tab">Crash Courses</a>	
							</li>
							<li>
								<a class="btn-warning" href="#panel-3" data-toggle="tab">Backlog Recovery</a>	
							</li>
						</ul>
						<div class="tab-content">
							<div class="tab-pane active" id="panel-1">
								<h3>Career Courses</h3>
								<p class="lead">
								Career courses are good at giving fundamental and advanced concepts in programming, Useful for people who are
								are trying to work in Real-time projects along with IT industry. We are ready to provide projects and guidelines for 
								your workspace to full fill your Resume.
								</p>
								<strong>Courses Period : </strong>45 Days to 60 Days.
								<br/><br/><strong>Courses for : </strong>B-Tech, M-Tech, MCA, Any higher Degree.
								<p>
									<a class="btn btn-success" style="float:right" href="career.php">View details »</a>
								</p>
							</div>
							<div class="tab-pane" id="panel-2">
								<h3>Crash Courses</h3>
								<p class="lead">
								Crash courses are for programmers who face problems in getting better knowledge in ERA of programming and fundamentals.
								For courses like HTML/CSS, Crash course is enough in gaining good skills. C fundamentals is good for 10<sup>th</sup> and 
								Intermediate students.
								</p>
								<strong>Courses Period : </strong>15 Days to 30 Days.
								<br/><br/><strong>Courses for : </strong>8<sup>th</sup> Standard to Intermediate, B-Tech, M-Tech, Any higher Degree.
								<p>
									<a class="btn btn-info" style="float:right" href="crash.php">View details »</a>
								</p>
							</div>
							<div class="tab-pane" id="panel-3">
								<h3>Backlog Recovery</h3>
								<p class="lead">
								I'm tired of helping my friends in completing their BackLogs (Failed Subjects). This is very new course for Engineering 
								students.We are ready to provide special classes for the students in completing their pending subjects.
								Subjects are selected by the students concern. Its a TWO months course after getting results. Also, we took FIVE days to revise
								each and every topic during your precious exam time. We also suggest to try far-coming subjects than before.
								</p>
								<strong>Courses Period : </strong>60+ Days and 5 Days.
								<br/><br/><strong>Courses for : </strong>All Engineering students.
								<p>
									<a class="btn btn-warning" style="float:right" href="backlog.php">View details »</a>
								</p>
							</div>
						</div>
					</div>
			</div>
			<div class="span6 hero-unit well">
			<?php 
					if(isset($error))
					{ ?>
						<h4 style ="color:red;text-align:center"><?php echo $error; ?> </h4>
			  <?php }  
					if(isset($success))
					{ ?>
						<h4 style ="color:green;text-align:center"><?php echo $success; ?> </h4>
			  <?php } ?>
			<h3>Enroll Your Course</h3>
				<form class="form" action="register.php" method="POST" enctype="multipart/form-data">
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
							 <label class="control-label" for="inputMobile">Phone</label>
							<div class="controls">
								<input class="span12" name="phone" id="inputEmail" type="number"/>
							</div>
						</div>
						<div class="row-fluid">
								<div class="control-group">
									 <label class="control-label" for="inputMobile">Select Type Of Course</label>
									<div class="controls">
										<select name="coursetype" class="course span12">
											<option selected="selected">--Select Course Type--</option>
											<?php
											include('db.php');
											$sql=mysql_query("select id,data from data where weight='1'");
											while($row=mysql_fetch_array($sql))
											{
												$data=$row['data'];
												echo '<option value="'.$data.'">'.$data.'</option>';
											} ?>
										</select>
									</div>
								</div>
								<div class="control-group">
									 <label class="control-label" for="inputMobile">Select Course</label>
									<div class="controls">
										<select name="course" class="subject span12">
											<option selected="selected">--Select Course--</option>
										</select>
									</div>
								</div>
						</div>
						<div class="control-group">
							<div class="controls">
								<button type="submit" name="submit" class="btn btn-success">Enroll</button>
							</div>
						</div>
				</form>
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
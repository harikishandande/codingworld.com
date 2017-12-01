<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Home | Coding World</title>
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
  
  	<link href="jquery.mCustomScrollbar.css" rel="stylesheet" />

  
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/scripts.js"></script>
	
<script>
$('.carousel').carousel({
  interval: 2000
})
</script>
<style>
	.recenttitle{	margin-left:25px;}
	.recent{	border:1px dashed #26beff;}
.vertical{height:220px;  padding:0px 35px 15px 5px; -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px;margin-bottom:10px;}
 
	.horizontal{ width:100%; height:355px; padding:0px 35px 15px 5px; -webkit-border-radius:5px; -moz-border-radius:5px; border-radius:5px; }
	.horizontal .images_container{width:1000px; }
</style>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
	<script>!window.jQuery && document.write(unescape('%3Cscript src="js/minified/jquery-1.9.1.min.js"%3E%3C/script%3E'))</script>
	<!-- custom scrollbars plugin -->
	<script src="jquery.mCustomScrollbar.concat.min.js"></script>
	<script>
		(function($){
			$(window).load(function(){
				/* custom scrollbar fn call */
				$(".content_1").mCustomScrollbar({
					scrollButtons:{
						enable:true
					}
				});
				$(".content_2").mCustomScrollbar({
					scrollInertia:150
				});
				$(".vertical").mCustomScrollbar({
					scrollInertia:600,
					autoDraggerLength:false
				});
				$(".content_4").mCustomScrollbar({
					set_height:"85%",
					mouseWheel:false
				});
				$(".horizontal").mCustomScrollbar({
					horizontalScroll:true,
					scrollButtons:{
						enable:true
					},
					theme:"dark-thin"
				});
				$(".content_6").mCustomScrollbar({
					horizontalScroll:true,
					advanced:{
						autoExpandHorizontalScroll:true
					}
				});
				$(".content_7").mCustomScrollbar({
					set_width:"95%",
					scrollButtons:{
						enable:true
					},
					theme:"light-2"
				});
				$(".content_8").mCustomScrollbar({
					callbacks:{
						onScroll:function(){
							onScrollCallback();
						},
						onTotalScroll:function(){
							onTotalScrollCallback();
						},
						onTotalScrollOffset:40,
						onTotalScrollBack:function(){
							onTotalScrollBackCallback();
						},
						onTotalScrollBackOffset:20
					}
				});
				
				/* 
				demo fn 
				functions below are for demo and examples
				*/
				$(".demo_functions a[rel='append-new']").click(function(e){
					e.preventDefault();
					$(".content_6 .images_container").append("<img src='demo_files/mcsThumb1.jpg' class='new' />");
					$(".content_6 .images_container img").load(function(){
						$(".content_6").mCustomScrollbar("update");
					});
				});
				$(".demo_functions a[rel='prepend-new']").click(function(e){
					e.preventDefault();
					$(".content_6 .images_container").prepend("<img src='demo_files/mcsThumb8.jpg' class='new' />");
					$(".content_6 .images_container img").load(function(){
						$(".content_6").mCustomScrollbar("update");
					});
				});
				$(".demo_functions a[rel='append-new-scrollto']").click(function(e){
					e.preventDefault();
					$(".content_6 .images_container").append("<img src='demo_files/mcsThumb1.jpg' class='new' />");
					$(".content_6 .images_container img").load(function(){
						$(".content_6").mCustomScrollbar("update");
						$(".content_6").mCustomScrollbar("scrollTo","right");
					});
				});
				$(".demo_functions a[rel='scrollto']").click(function(e){
					e.preventDefault();
					$(".content_6").mCustomScrollbar("scrollTo","#mcs_t_5");
				});
				$(".demo_functions a[rel='remove-last']").click(function(e){
					e.preventDefault();
					$(".content_6 .images_container img:last").remove();
					$(".content_6").mCustomScrollbar("update");
				});
				$(".demo_functions a[rel='toggle-width']").click(function(e){
					e.preventDefault();
					$(".content_6").toggleClass("toggle_width");
					$(".content_6").mCustomScrollbar("update");
				});
				$(".demo_functions a[rel='scrollto-par-5']").click(function(e){
					e.preventDefault();
					$(".content_7").mCustomScrollbar("scrollTo","#par-5");
				});
				$(".demo_functions a[rel='increase-height']").click(function(e){
					e.preventDefault();
					$(".content_7").animate({height:1100},"slow",function(){
						$(this).mCustomScrollbar("update");
					});
				});
				$(".demo_functions a[rel='decrease-height']").click(function(e){
					e.preventDefault();
					$(".content_7").animate({height:350},"slow",function(){
						$(this).mCustomScrollbar("update");
					});
				});
				var content_7_height=$(".content_7").height();
				$(".demo_functions a[rel='reset-height']").click(function(e){
					e.preventDefault();
					if($(".content_7").height()!=content_7_height){
						$(".content_7").animate({height:content_7_height},"slow",function(){
							$(this).mCustomScrollbar("update");
						});
					}
				});
				$(".demo_functions a[rel='scrollto-bottom']").click(function(e){
					e.preventDefault();
					$(".content_7").mCustomScrollbar("scrollTo","bottom");
				});
				$(".demo_functions a[rel='scrollto-top']").click(function(e){
					e.preventDefault();
					$(".content_7").mCustomScrollbar("scrollTo","top");
				});
				$(".demo_functions a[rel='scrollto-par-1st']").click(function(e){
					e.preventDefault();
					$(".content_7").mCustomScrollbar("scrollTo","first");
				});
				function onScrollCallback(){
					$(".callback_demo .callback_demo_output").html("<em>Scrolled... Content top position: "+mcs.top+"</em>").children("em").delay(1000).fadeOut("slow");
				}
				function onTotalScrollCallback(){
					if($(".appended").length<1){
						$(".content_8 .mCSB_container").append("<p class='appended'><img src='demo_files/mcsImg1.jpg' /></p>");
					}else{
						$(".callback_demo .callback_demo_output").html("<em>Scrolled to bottom. Content top position: "+mcs.top+"</em>").children("em").delay(1000).fadeOut("slow");
					}
					$(".content_8 .mCSB_container img").load(function(){
						$(".content_8").mCustomScrollbar("update");
						$(".callback_demo .callback_demo_output").html("<em>New image loaded...</em>").children("em").delay(1000).fadeOut("slow");
					});
				}
				function onTotalScrollBackCallback(){
					$(".callback_demo .callback_demo_output").html("<em>Scrolled to top. Content top position: "+mcs.top+"</em>").children("em").delay(1000).fadeOut("slow");
				}
				$(".callback_demo a[rel='scrollto-bottom']").click(function(e){
					e.preventDefault();
					$(".content_8").mCustomScrollbar("scrollTo","bottom");
				});
			});
		})(jQuery);
	</script>
	<style rel="stylesheet">
	.course-box 
	{
		float:center;
		height:232px;
		width:304px;
		display:inline-block;
		margin-right: 20px;
		margin-bottom: 20px;
	}
	.course-thumb 
	{
		background-size:1;
		width:304px;
		height:170px;
	}
	</style>
</head>
<body>
<div class="container-fluid">
	<div class="row-fluid">
		<div id="headerSection">
			<div class="navbar">
				<div class="nav-collapse">
					<ul class="nav">
						<a href="http://www.codingworld.in/"><span class="master">CODING WORLD</span></a>
						<li class="active"><a href="index.php">HOME</a></li>
						<li><a href="mastertechnology.php">MASTER TECHNOLOGY</a></li>
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
						<img alt="" src="img/carousel/two.png"/>
						<div class="carousel-caption">
						</div>
					</div>
					<div class="item">
						<img alt="" src="img/carousel/nine.png"/>
						<div class="carousel-caption">
						</div>
					</div>
					<div class="item">
						<img alt="" src="img/carousel/ten.png"/>
						<div class="carousel-caption">
						</div>
					</div>
					<div class="item">
						<img alt="" src="img/carousel/eleven.png"/>
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
	<div class="row-fluid">
		<div class="row-fluid">
			<div class="#">
			<div class="span9 recent">
				<h3 class="recenttitle">Recently Added Programs</h3>
				<div class="span12 vertical content">
					
					<div class="row-fluid">
						<?php
						include_once('includes/connection.php');
						include_once('includes/article.php');
						$article = new Article;
						$articles = $article->fetch_proghome();
						?>
					<div class="accordion" id="accordion-1994">
					<?php 
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
												<h5> Aim </h5>
												<pre><?php echo $article['fullaim']; ?></pre>
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
													static $nono=0;
													?>
													<li>
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
													<div class="tab-pane" id="panel-<?php echo $scontent; ?>">
														<div class="row-fluid">
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
				<h3 class="recenttitle">Recently Added subjects</h3>
				<div class="span12 horizontal content">
				<div class="materials images_container">
					<?php
					include_once('includes/connection.php');
					include_once('includes/article.php');
					$article = new Article;
					$articles = $article->fetch_subjects();
				?>
				<?php foreach ($articles as $article)
				{  	$subject = $article['subject'];
				?>
						<li class="course-box">
							<a href="insubject.php?subject=<?php echo $subject; ?>" class="mask">
							<div class="course-thumb">
								<img class="course-thumb" src="subjectimages/<?php echo $article['subject_img']; ?>"/>
							</div>
							<div class="title">
								<?php echo $subject; ?>
							</div>
							<?php
								include_once('includes/connection.php');
								include_once('includes/article.php');
								$user = new Article;
								$users = $user->fetch_proffesors($subject);
							?>
							<?php foreach ($users as $user)
							{  	
								if($article['pid'] == $user['id'])
								{
							?>
							<div class="instructors">
								<img class="ins-thumb" src="userimages/<?php echo $user['user_img']; ?>" >
								<div class="teacher">
									<div class="ins-name ellipsis">
										<?php echo $user['username']; ?>
									</div>
									<div class="ins-job-title ellipsis">
										<?php echo $user['position']; ?>
									</div>
								</div>
							</div>
							<?php 
								}
							}
							?>	
							</a>
						</li>
				<?php 
				}
				?>	
				</div>
			</div>
			</div>
				<div class="span3">
					<h3>Adds</h3>
					
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
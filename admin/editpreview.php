<?php
	session_start();
	include_once('../includes/connection.php');
	include_once('../includes/article.php');
	if(isset($_SESSION['logged_in']))
	{
?>
<!DOCTYPE html>
<html lang="en">
    
<!-- Mirrored from owwwlab.com/faculty/ by HTTrack Website Copier/3.x [XR&CO'2013], Wed, 20 Nov 2013 11:28:31 GMT -->
<head>
		<title>:: <?php echo $_SESSION['username']; ?> :: <?php echo $_SESSION['subject']; ?> ::</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="author" content="owwwlab.com">



        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

        <meta name="description" content="A theme for faculty profile page" />
        <meta name="keywords" content="faculty profile, theme,css, html, jquery, transition, transform, 3d, css3" />

        <link rel="shortcut icon" href="http://owwwlab.com/favicon.ico">

        <!--CSS styles-->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/font-awesome.min.css">  
        <link rel="stylesheet" href="css/perfect-scrollbar-0.4.5.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
        <link rel="stylesheet" href="css/style.css">
        <link id="theme-style" rel="stylesheet" href="css/styles/default.css">

        
        <!--/CSS styles-->
        <!--Javascript files-->
        <script type="text/javascript" src="js/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="js/TweenMax.min.js"></script>
        <script type="text/javascript" src="js/jquery.touchSwipe.min.js"></script>
        <script type="text/javascript" src="js/jquery.carouFredSel-6.2.1-packed.js"></script>
        
        <script type="text/javascript" src="js/modernizr.custom.63321.js"></script>
        <script type="text/javascript" src="js/jquery.dropdownit.js"></script>

        <script type="text/javascript" src="js/jquery.stellar.min.js"></script>
        <script type="text/javascript" src="js/ScrollToPlugin.min.js"></script>

        <script type="text/javascript" src="js/bootstrap.min.js"></script>

        <script type="text/javascript" src="js/jquery.mixitup.min.js"></script>

        <script type="text/javascript" src="js/masonry.min.js"></script>

        <script type="text/javascript" src="js/perfect-scrollbar-0.4.5.with-mousewheel.min.js"></script>

        <script type="text/javascript" src="js/magnific-popup.js"></script>
        <script type="text/javascript" src="js/custom.js"></script>

        <!--/Javascript files-->

        <!--Custom Styles for demo only-->
        <!--/Custom Styles-->
    </head>
    <body>

        <div id="wrapper">
		
            <a href="#sidebar" class="mobilemenu"><i class="icon-reorder"></i></a>
			
            <div id="sidebar">
                <div id="main-nav">
                    <div id="nav-container">
                        <div id="profile" class="clearfix">
                            <div class="title">
								<?php
							   include_once('../includes/connection.php');
							   include_once('../includes/article.php');
							   $username = $_SESSION['username'];
							   $article = new Article;
							   $articles = $article->fetch_proffesor($username);
							?>
							<?php foreach ($articles as $article) { ?>
								
								<div class="circle-center" style="background-image: url('../userimages/<?php echo $article['user_img']; ?>')">
								<br><br><br><br><br><br><br><br>
								</div>
								
								<?php } ?>
                                <h2><?php echo $_SESSION['username']; ?></h2>
                            </div>
                        </div>
                        <ul id="navi">
                            <li>
                              <a href="add.php"><div class="text">Add Topic</div></a>
                            </li> 
                            <li>
                              <a href="order/selectorder.php"><div class="text">Arrange Topic</div></a>
                            </li>
                            <li>
                              <a href="editpreview.php" class="currentmenu"><div class="text">Edit Topic</div></a>
                            </li>
                            <li>
                              <a href="delete.php"><div class="text">Delete Topic</div></a>
                            </li>
                            <li>
                              <a href="messages.php"><div class="text">Messages</div></a>
                            </li>
							<li>
                              <a href="user.php"><div class="text">Prof Settings</div></a>
                            </li>
							<li>
                              <a href="logout.php"><div class="text">Logout</div></a>
                            </li>
                        </ul>
                    </div>        
                </div>
            </div>
            <div id="main">
                <div id="biography" class="page home" data-pos="home">
                    <div class="pageheader">
                        <div class="headercontent">
                            <div class="section-container">
                                
                                <div class="row">
                                    <h1>Edit Topic</h1>
                                </div>
                            </div>
									
                        </div>
                    </div>
					<div class="container-fluid">
						<div class="row-fluid">
							<div class="span12">
									<?php
										include_once('../includes/connection.php');
										include_once('../includes/article.php');
										$article = new Article;
										$subject = $_SESSION['subject'];
										$articles = $article->fetch_units($subject);
									?>
									<?php 
									foreach ($articles as $article)
									{	$unit = $article['unit'];
									?>
										<div class="unitprev well">
											<h4><?php echo $unit; ?></h4>
										</div>
										<div class="accordion" id="accordion-1994">
									<?php
										include_once('../includes/connection.php');
										include_once('../includes/article.php'); 
										$topic = new Article;
										$topics = $topic->fetch_topics($unit);
										foreach($topics as $topic)
										{
									?>		<div class="accordion-group">
												<div class="accordion-heading">
													<a class="last btn btn-info" href="edit.php?id=<?php echo $topic['id']; ?>" >Edit Topic</a>
													<span class="accordion-toggle" data-parent="#accordion-1994"><?php echo $topic['topic']; ?></span>
												</div>
											</div>
								<?php 	} ?>
										</div>
							<?php	} ?>
										
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </body>
</html>
<?php
	}
	else
	{
	   	 header("Location: index.php");
	}
	?>
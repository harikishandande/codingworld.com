<?php
	session_start();
	include_once('../includes/connection.php');
	include_once('../includes/article.php');

	if(isset($_SESSION['moderator'])) 
	{	
		if(isset($_POST['submit']))
		{
			$unit = $_POST['unit'];
			$uno = $_SESSION['uno'];
			$sid = $_SESSION['sid'];
			$query = $pdo->prepare('INSERT INTO units(unit,uno,sid) VALUES (?,?,?)');
				$query->bindValue(1, $unit);
				$query->bindValue(2, $uno);
				$query->bindValue(3, $sid);
				$result = $query->execute();
				if(!$result)
					
			header("Location: fixunits.php");
		}
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
                                <h2><?php echo $_SESSION['username']; ?></h2>
                            </div>
                        </div>
						<?php
								include_once('../includes/connection.php');
								include_once('../includes/article.php');
								$username = $_SESSION['username']; 
								$article1 = new Article;
								$subjectid = $article1->fetch_moderators($username);
								$sid = $subjectid['sid'];
								$article2 = new Article;
								$subject = $article2->fetch_subjectusingid($sid);
								$_SESSION['subject'] =$subject['subject'];
						?>
                        <ul id="navi">
                            <li>
                              <a href="messages.php"><div class="text">Messages</div></a>
                            </li>
							 <li>
                              <a href="fixunits.php" class="currentmenu"><div class="text">Fix Units</div></a>
                            </li>
                            <li>
                              <a href="syllabus.php"><div class="text">Syllabus</div></a>
                            </li>
							<li>
                              <a href="moderator.php"><div class="text">Moderator Settings</div></a>
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
                                    <h1>Submit Unit Titles</h1>
                                </div>
                            </div>
									
                        </div>
                    </div>
					<div class="container-fluid">
						<form action="fixunits.php" method="post">
							<?php
								$subject = $_SESSION['subject'];
								include_once('../includes/connection.php');
								include_once('../includes/article.php');
								$article = new Article;
								$articles = $article->fetch_units($subject);
								$number = 0;
								$_SESSION['sid'] = $sid;
								foreach($articles as $article)
								{	
									if($article['uno'] <= 8)
									{	$number = $number +1;	}
								}	
									$count=0;
									if($number < 8)
									{	$count = 8 - $number;	}
									
									if($count > 0)
									{	$temp = $number;
										$_SESSION['uno'] = $temp+1;
										for($i=0;$i<$count;$i++)
										{	
							?>				<form action="fixunits.php" method="post" autocomplete="off">
												<div class="accordion-heading">
													<div class="span12">
														<input style="text-transform:uppercase;" class="span10" type="text" name="unit" placeholder="Unit<?php echo $temp+1;?>"/>
														<button class="last btn btn-success" name="submit" type="submit" >Add Unit</button>	
													</div>
												</div>		
											</form> 
							<?php			$temp++;
										}
									}
									else
									{
										echo "<h3>All Units are submitted.</h3>";
									}
							?>					
					</div>
				</div>
			</div>
		</div>
    </body>
</html>
<?php 
	}
?>
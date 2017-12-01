<?php
	session_start();
	include_once('../includes/connection.php');
	include_once('../includes/article.php');

	if(isset($_SESSION['moderator'])) 
	{	
		if(isset($_POST['submit']))
		{
			$message = $_POST['message'];
			$mid = 1;
			$pid = 0;
			$sid = $_SESSION['sid'];
			$query = $pdo->prepare('INSERT INTO comments(mstatus,pstatus,message,sid) VALUES (?,?,?,?)');
				$query->bindValue(1, $mid);
				$query->bindValue(2, $pid);
				$query->bindValue(3, $message);
				$query->bindValue(4, $sid);
				$query->execute();
			header("Location: messages.php");
		}
		else
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
		<link href="css/chat.css" rel="stylesheet">

        
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
                        <ul id="navi">
                            <li>
                              <a href="messages.php" class="currentmenu"><div class="text">Messages</div></a>
                            </li>
							 <li>
                              <a href="fixunits.php"><div class="text">Fix Units</div></a>
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
                                    <h1>View Conversation</h1>
                                </div>
                            </div>
									
                        </div>
                    </div>
					<ul class="chats row-fluid">	
					<?php
						$username = $_SESSION['username'];
						include_once('../includes/connection.php');
						include_once('../includes/article.php');
						$article = new Article;
						$articles = $article->fetch_moderators($username);
						$sid = $articles['sid'];

						$_SESSION['sid'] = $sid;
						$user = new Article;
						$users = $user->fetch_comments($sid);
						foreach($users as $user)
						{	$mid = $user['mstatus'];
							$pid = $user['pstatus'];
							$message = $user['message'];
							if($mid)
							{
						?>		
								<li class="in">
								  <img class="avatar" alt="" src="../moderatorimages/<?php echo $articles['moderator_img']; ?>">
								  <div class="message">
									<span class="arrow">
									</span>
									<a href="#" class="name">
									  Moderator
									</a>
									<span class="date-time">
									  
									</span>
									<span class="body">
										<?php echo $message; ?>    
									</span>
								  </div>
								</li>
						
							<?php 
							}
							else
							{?>	
							<li class="out">
                              <img class="avatar" alt="" src="../userimages/proffesor.jpg">
                              <div class="message">
                                <span class="arrow">
                                </span>
                                <a href="#" class="name">
                                  Proffesor
                                </a>
                                <span class="date-time">
                                  
                                </span>
                                <span class="body">
									<?php echo $message; ?>    
								</span>
                              </div>
                            </li>
							
					<?php   }
						}?>
						<form action="messages.php" method="post">
								<li class="in">
								  <img class="avatar" alt="" src="../userimages/proffesor.jpg">
								  <div class="message">
									<span class="arrow">
									</span>
									<a href="#" class="name">
									  Moderator
									</a>
									<span class="date-time">
									  
									</span>
									<span class="body">
										<textarea class="span12" name="message" id="textarea" style="margin-top:5px;height:250px" ></textarea>
									</span>
									<div class="control-group">
										<div class="controls">
											 <button class="btn btn-success btn-large" name="submit" type="submit" >Comment</button>
										</div>
									</div>
								  </div>
								</li>					
						</form> 					
					</ul>
				</div>
			</div>
		</div>
    </body>
</html>
<?php 
		}
	}
?>
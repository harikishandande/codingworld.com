<?php
	session_start();
	include('../../includes/connection.php');
	include('../../includes/article.php');
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
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/font-awesome.min.css">  
        <link rel="stylesheet" href="../css/perfect-scrollbar-0.4.5.min.css">
        <link rel="stylesheet" href="../css/magnific-popup.css">
        <link rel="stylesheet" href="../css/style.css">
        <link id="theme-style" rel="stylesheet" href="../css/styles/default.css">

        
        <!--/CSS styles-->
        <!--Javascript files-->
        <script type="text/javascript" src="../js/jquery-1.10.2.js"></script>
        <script type="text/javascript" src="../js/TweenMax.min.js"></script>
        <script type="text/javascript" src="../js/jquery.touchSwipe.min.js"></script>
        <script type="text/javascript" src="../js/jquery.carouFredSel-6.2.1-packed.js"></script>
        
        <script type="text/javascript" src="../js/modernizr.custom.63321.js"></script>
        <script type="text/javascript" src="../js/jquery.dropdownit.js"></script>

        <script type="text/javascript" src="../js/jquery.stellar.min.js"></script>
        <script type="text/javascript" src="../js/ScrollToPlugin.min.js"></script>

        <script type="text/javascript" src="../js/bootstrap.min.js"></script>

        <script type="text/javascript" src="../js/jquery.mixitup.min.js"></script>

        <script type="text/javascript" src="../js/masonry.min.js"></script>

        <script type="text/javascript" src="../js/perfect-scrollbar-0.4.5.with-mousewheel.min.js"></script>

        <script type="text/javascript" src="../js/magnific-popup.js"></script>
        <script type="text/javascript" src="../js/custom.js"></script>
		<script type="text/javascript" src="../js/jquery.min.js"></script>
		<script type="text/javascript" src="../js/bootstrap.min.js"></script>
		<script type="text/javascript" src="../js/scripts.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.js"></script>
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.js"></script>
		
        <!--/Javascript files-->

        <!--Custom Styles for demo only-->
        <!--/Custom Styles-->
		<style>
		ul {
			padding:0px;
			margin: 0px;
		}
		#response {
			padding:10px;
			background-color:#9F9;
			border:2px solid #396;
			margin-bottom:20px;
			border-radius:20px;
		}
		#list li {
			margin: 0 0 3px;
			padding:8px;
			background-color:#333;
			color:#fff;
			list-style: none;
		}
		</style>
		<script type="text/javascript">
		$(document).ready(function(){ 	
			  function slideout(){
		  setTimeout(function(){
		  $("#response").slideUp("slow", function () {
			  });
			
		}, 2000);}
			
			$("#response").hide();
			$(function() {
			$("#list ul").sortable({ opacity: 0.8, cursor: 'move', update: function() {
					
					var order = $(this).sortable("serialize") + '&update=update'; 
					$.post("updateList.php", order, function(theResponse){
						$("#response").html(theResponse);
						$("#response").slideDown('slow');
						slideout();
					}); 															 
				}								  
				});
			});

		});	
		</script>

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
							   include_once('../../includes/connection.php');
							   include_once('../../includes/article.php');
							   $username = $_SESSION['username'];
							   $article = new Article;
							   $articles = $article->fetch_proffesor($username);
							?>
							<?php foreach ($articles as $article) { ?>
								
								<div class="circle-center" style="background-image: url('../../userimages/<?php echo $article['user_img']; ?>')">
								<br><br><br><br><br><br><br><br>
								</div>
								
								<?php } ?>
                                <h2><?php echo $_SESSION['username']; ?></h2>
                            </div>
                        </div>
                       <ul id="navi">
                            <li>
                              <a href="../add.php"><div class="text">Add Topic</div></a>
                            </li> 
                            <li>
                              <a href="../order/selectorder.php" class="currentmenu" ><div class="text">Arrange Topic</div></a>
                            </li>
                            <li>
                              <a href="../editpreview.php"><div class="text">Edit Topic</div></a>
                            </li>
                            <li>
                              <a href="../delete.php"><div class="text">Delete Topic</div></a>
                            </li>
                            <li>
                              <a href="../messages.php"><div class="text">Messages</div></a>
                            </li>
							<li>
                              <a href="../user.php"><div class="text">Prof Settings</div></a>
                            </li>
							<li>
                              <a href="../logout.php"><div class="text">Logout</div></a>
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
                                    <h1>Select Topic to Arrange</h1>
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="container-fluid">
						<div class="row-fluid">
							<div class="span12">
								<div id="list">
									<div id="response">
									</div>
									<ul>
										<?php		
											$unit = $_GET['unit'];
											$subject = $unit;
											$article = new Article;
											$articles = $article->fetch_topics($subject);
											foreach ($articles as $article)
											{
												$id = $article['id'];
												$text = $article['topic'];	
										?>
												<li id="arrayorder_<?php echo $id ?>"> <?php echo $text; ?>
													<div class="clear"></div>
												</li>
									  <?php } ?>
									</ul>
								</div>
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
	   	 header("Location: ../index.php");
	}
?>
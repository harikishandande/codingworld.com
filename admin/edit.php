<?php
	session_start();
	include_once('../includes/connection.php');
	include_once('../includes/article.php');
	$article = new Article;
	if(isset($_SESSION['logged_in']))
	{
		if(isset($_GET['id']))
		{
			$id = $_GET['id'];
			$data = $article->fetch_topic($id);
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
		<script src="../ckeditor/ckeditor.js"></script>

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
                              <a href="add.php"><div class="icon icon-user"></div><div class="text">Add Topic</div></a>
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
                                    <h1>Edit Topic For The Selected Unit</h1>
                                </div>
                            </div>
									
                        </div>
                    </div>
					<div class="container-fluid">
						<div class="row-fluid">
							<div class="span12">
								<form action="update.php?id=<?php echo $_GET['id']; ?>" method="post">
									<div class="control-group">
										<div class="controls">
											<input class="span12" type="text" name="topic" value="<?php echo $data['topic']; ?>"/>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<textarea name="content">
												<?php echo $data['topic_content']; ?>
											</textarea>
											<script>
														// This call can be placed at any point after the
														// <textarea>, or inside a <head><script> in a
														// window.onload event handler.

														// Replace the <textarea id="editor"> with an CKEditor
														// instance, using default configurations.
														CKEDITOR.replace( 'content' );
											</script>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<div class="row-fluid">
												<div class="span4">
												</div>
												<div class="span4">
													 <button class="btn btn-success btn-large btn-block" type="submit" value="Update">Update Topic</button>
												</div>
												<div class="span4">
												</div>
											</div>
										</div>
									</div>
								</form>	
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
    </body>
</html>
<?php	}
	}
	else
	{
	   	 header("Location: index.php");
	}
	?>
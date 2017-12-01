<?php
	session_start();
	include_once('../includes/connection.php');
	include_once('../includes/article.php');

	if(isset($_SESSION['moderator'])) 
	{	
		if(isset($_POST['submit']))
		{	
			$array=$_POST['topics'];
			$id = $_POST['unit'];
			if(empty($array) or empty($id))
			{
				$error="All fields are required !";
			}
			else
			{
				foreach($array as $topics)
				{
					if(strlen($topics)>0)
					{
						$query = $pdo->prepare('INSERT into syllabus(topic,uid)values(?,?)');
							$query->bindValue(1, $topics);
							$query->bindValue(2, $id);
							$query->execute();
							
							header('Location: syllabus.php');
					}
				}
			}

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
		<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
			<script type="text/javascript" src="reCopy.js"></script>
			<script type="text/javascript">
				$(function(){
				var removeLink = ' <a class="btn btn-danger btn-mini" href="#" onclick="$(this).parent().slideUp(function(){ $(this).remove() }); return false">remove</a>';
				$('a.add').relCopy({ append: removeLink});	
				});
			</script>
			<style type="text/css">
				body{ font-family:Arial, Helvetica, sans-serif; font-size:13px; }
				.remove {color:#cc0000}
				.input{ border: solid 1px #006699; padding:3px}
			</style>
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
                                <h3>Stanford University</h3>
                            </div>
                        </div>
                       <ul id="navi">
                            <li>
                              <a href="messages.php"><div class="text">Messages</div></a>
                            </li>
							 <li>
                              <a href="fixunits.php"><div class="text">Fix Units</div></a>
                            </li>
                            <li>
                              <a href="syllabus.php" class="currentmenu"><div class="text">Syllabus</div></a>
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
                                    <h1>Set Syllabus</h1>
                                </div>
                            </div>
									
                        </div>
                    </div>
					<div class="container-fluid">
						<div class="span12">
								<?php 
									if(isset($error))
									{ ?>
										<h4 style ="color:red;text-align:center"><?php echo $error; ?> </h4>
							  <?php }  ?>	
								<form action="syllabus.php" method="post">
									<div class="control-group">
										<div class="controls">
											<select name="unit" class="course span12">
												<option><<<  SELECT UNIT  >>></option>
											<?php
											$subject = $_SESSION['subject'];
											include_once('../includes/article.php');
											include_once('../includes/connection.php');
											$article =  new Article;
											$articles = $article->fetch_userunits($subject);	
											foreach($articles as $article)
											{
											?>	
												<option value="<?php echo $article['id'];?>"><?php echo $article['unit'];?></option>
									  <?php } ?>
											</select>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<div class="clone"> 
												<input class="input span12" type="text" name="topics[]" placeholder="New Topic Title"/>
											</div>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											<div>
												<a href="#" class="add btn btn-info btn-mini" rel=".clone">Add More</a>
											</div>
										</div>
									</div>
									<div class="control-group">
										<div class="controls">
											 <button class="btn btn-success btn-large" name="submit" type="submit" >Submit</button>
										</div>
									</div>						
								</form>
						</div>
					</div>
				</div>
			</div>
		</div>
    </body>
</html>
<?php
		}
	}
	else
	{
	   	 header("Location: index.php");
	}
	?>
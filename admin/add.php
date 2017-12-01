<?php
   session_start();
   include_once('../includes/connection.php');
   if(isset($_SESSION['logged_in']))
   {
   	    if(isset($_POST['submit']))
   	    {	?>
				<?php
				$uid = $_POST['id'];
				$topic = $_POST['topic'];
				$content = $_POST['content'];
				$subject = $_SESSION['subject'];
				$sid = $_SESSION['sid'];

   	    	if(empty($uid) or empty($topic) or empty($content))
   	    	{
   	    		$error = 'All fields are required !';
   	    	}
   	    	else
   	    	{
   	    		$query = $pdo->prepare('INSERT INTO topics(topic,topic_content,topic_timestamp,uid,sid) VALUES (?,?,?,?,?)');
   	    		$query->bindValue(1, $topic);
   	    		$query->bindValue(2, $content);
   	    		$query->bindValue(3, time());
				$query->bindValue(4, $uid);
				$query->bindValue(5, $sid);
   	    		$query->execute();
				$status = 1;
				$sql = "UPDATE units SET status = ? WHERE  id = ?";
				$query = $pdo->prepare($sql);
				$query->bindValue("1", $status);
				$query->bindValue("2", $uid);
				$query->execute();
				$success='Topic added successfully !';
   	    	}
   	    }
 ?>
<!DOCTYPE html>
<html>
				<head>
					<title>:: <?php echo $_SESSION['username']; ?> :: <?php echo $_SESSION['subject']; ?> ::</title>
					<meta charset="utf-8">
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
					
					<!--popup  -->
						<!-- jQuery Custombox JS -->
						<script src="src/jquery.custombox.js"></script>

						<!-- Demo page JS -->
						<script src="demo/js/demo.js"></script>

						<!-- jQuery Custombox CSS -->
						<link rel="stylesheet" href="src/jquery.custombox.css">

						<!-- Demo page CSS -->
						<link rel="stylesheet" href="demo/css/demo.css">

						<script>
							if ( $(window).width() > 360 ) {
								SyntaxHighlighter.all();
							}
						</script>
					<!--popup  closed-->
					<!-- Fav and touch icons -->
					<link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
					<link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
					<link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
					<link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
					<link rel="shortcut icon" href="img/favicon.png">
			  
					<script type="text/javascript" src="js/jquery.min.js"></script>
					<script type="text/javascript" src="js/scripts.js"></script>
					<script src="../ckeditor/ckeditor.js"></script>
        <link rel="stylesheet" href="css/font-awesome.min.css">  
        <link rel="stylesheet" href="css/perfect-scrollbar-0.4.5.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">
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
							   $subject = $_SESSION['subject'];
							   $article = new Article;
							   $articles = $article->fetch_proffesor($username);
							?>
							<?php foreach ($articles as $article) { ?>
								
								<div class="circle-center" style="background-image: url('../userimages/<?php echo $article['user_img']; ?>')">
								</div>
								
								<?php } ?>
                                <h2><?php echo $_SESSION['username']; ?></h2>
                            </div>
                        </div>
                         <ul id="navi">
                            <li>
                              <a href="add.php" class="currentmenu"><div class="text">Add Topic</div></a>
                            </li> 
                            <li>
                              <a href="order/selectorder.php"><div class="text">Arrange Topic</div></a>
                            </li>
                            <li>
                              <a href="editpreview.php"><div class="text">Edit Topic</div></a>
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
                                    <h1>Add Topic</h1>
                                </div>
                            </div>
									
                        </div>
                    </div>
					<div class="container-fluid">
						<div class="row-fluid">
							<div class="span12">
									<?php 
										if(isset($error))
										{ ?>
											<h4 style ="color:#ff0000;text-align:center"><?php echo $error; ?> </h4>
								  <?php } ?>
										<?php 
										if(isset($success))
										{ ?>
											<h4 style ="color:green;text-align:center"><?php echo $success; ?> </h4>
								  <?php } ?>
									<form action="add.php" method="post" autocomplete="off">
										<div class="control-group">
											<div class="controls">
												<div class="span12">
													<div class="span3"></div>
													<div class="span6" style="margin-bottom:20px;">
														<a href="#modal" id="sign" role="button"  class="span12 btn btn-large btn-info list-group-item" >
															<?php echo $_SESSION['subject']; ?> Syllabus
														</a>
													</div>
													<div class="span3"></div>
												</div>
											</div>
										</div>
 <!-- Modal -->
    <div id="modal" style="display: none;" class="modal-example-content">
        <div class="modal-example-header">
            <button type="button" class="close" onclick="$.fn.custombox('close');">&times;</button>
            <h4><b><?php echo $_SESSION['subject']; ?></b></h4>
        </div>
        <div class="modal-example-body">
			<?php
				$subject = $_SESSION['subject'];
				include_once('../includes/connection.php');
				include_once('../includes/article.php');
				$article = new Article;
				$articles = $article->fetch_units($subject);	
				foreach($articles as $article)
				{
			?>		<h4><?php echo $article['uno'];?>.<?php echo $article['unit'];?></h4>
			<?php	
					$uid = $article['id'];
					$topic =  new Article;
					$topics = $topic->fetch_syllabustopics($uid);
					foreach($topics as $topic)
					{	
						$top = $topic['topic'];
						$rep = new Article;
						$repeat = $rep->check_topics($uid);
						$val = 0;
						foreach($repeat as $rep)
						{
							$rtopic = $rep['topic'];
							if($rtopic == $top)
							{	
								$val = 1;
								break;
							}
						}
						if($val)
						{
					?>		<strong><?php echo $top;?></strong> ,
				<?php	}
						else
						{
					?>		<a href="add.php?uid=<?php echo $uid ; ?>&topic=<?php echo $top ; ?>" ><strong><?php echo $top;?></strong></a> ,
				<?php	}
					}
				} ?>
        </div>
		<div class="modal-footer">
			<button type="button" class="btn btn-primary" onclick="$.fn.custombox('close');">Okay !</button>
		</div>
    </div>

										<div class="control-group">
											<div class="controls">
												<select name="id" class="course span12">
													<option><<<  SELECT UNIT  >>></option>
												<?php
												$subject = $_SESSION['subject'];
												include_once('../includes/article.php');
												include_once('../includes/connection.php');
												$article =  new Article;
												$articles = $article->fetch_userunits($subject);	
												foreach($articles as $article)
												{	
												?>	<option value="<?php echo $article['id']; ?>" ><?php echo $article['unit'];?></option>
										  <?php }
													if(isset($_GET['uid']))
													{	
														$uid = $_GET['uid'];
														$user = new Article;
														$users = $user->fetch_unitusingid($uid);
												?>
														<option selected="selected" id="disabledInput" value="<?php echo $uid; ?>" ><?php echo $users['unit'];?></option>
											<?php   } ?>
												</select>
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
										<?php	if(isset($_GET['topic']))
												{
										?>
													<input class="span12" id="disabledInput" type="text" name="topic" value="<?php echo $_GET['topic']; ?>"/>
										<?php	}
												else
												{
												?>
													<input class="span12" type="text" name="topic" placeholder="Topic Title"/>
										<?php	} ?>
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<textarea name="content"></textarea>
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
														 <button class="btn btn-success btn-large btn-block" name="submit" type="submit" value="Add Article">Add Topic</button>
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
<?php
	}
	else
	{
	   	 header("Location: index.php");
	}
	?>
	
	
	<!-- jQuery Custombox JS -->
    <script src="src/jquery.custombox.js"></script>

    <!-- Demo page JS -->
    <script src="demo/js/demo.js"></script>

    <script>
        if ( $(window).width() > 360 ) {
            SyntaxHighlighter.all();
        }
    </script>
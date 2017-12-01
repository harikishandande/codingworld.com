<?php
	session_start();
	include_once('../includes/connection.php');
	include_once('../includes/article.php');
	if(isset($_SESSION['logged_in']))
	{
		$oldusername = $_SESSION['username'];
		
		if(isset($_POST['uname'], $_POST['password'], $_POST['name'], $_POST['position'])) 
		{
			$sname = $_SESSION['sname'];
			$uname = $_POST['uname'];
			$password = $_POST['password'];
			$fullname = $_POST['name'];
			$position = $_POST['position'];
		   if (empty($sname) or empty($uname) or empty($password) or empty($fullname) or empty($position)) 
			{
				$error = 'All fields are required!';
			}
			else 
			{   $newusername = $sname . $uname;
				$sql = "UPDATE proffesors SET uname = ?, username = ?, password = ?, name = ?, position = ? WHERE username = ?";
				$query = $pdo->prepare($sql);

				$query->bindValue("1", $uname);
				$query->bindValue("2", $newusername);
				$query->bindValue("3", $password);
				$query->bindValue("4", $fullname);
				$query->bindValue("5", $position);
				$query->bindValue("6", $oldusername);
				$result = $query->execute();
				if(!$result)
				{
					$error = 'Change of uname is illegal, The name you changed is already exist ! !';
					$success = 'Pic another name !';
				}
				else
				{
					if($oldusername != $newusername)
					{
						session_destroy();
						header('Location: ../materials.php');
					}
				}
			}
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
                              <a href="editpreview.php"><div class="text">Edit Topic</div></a>
                            </li>
                            <li>
                              <a href="delete.php"><div class="text">Delete Topic</div></a>
                            </li>
                            <li>
                              <a href="messages.php"><div class="text">Messages</div></a>
                            </li>
							<li>
                              <a href="user.php" class="currentmenu"><div class="text">Prof Settings</div></a>
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
                                    <h1>Proffesor Profile</h1>
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
									<?php
							   include_once('../includes/connection.php');
							   include_once('../includes/article.php');
							   $username = $_SESSION['username'];
							   $article = new Article;
							   $articles = $article->fetch_proffesor($username);
							?>
					<?php   foreach ($articles as $article) 
							{ ?>
								<a href="upload/upload.php">
								<div class="circle" style="background-image: url('../userimages/<?php echo $article['user_img']; ?>')">
								<br><br><br><br><br><br><br><br>
								<strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;upload image</strong>		
								</div>
								</a>
							  <?php $_SESSION['sname'] = $article['sname'];?>
									<form action="user.php" method="post">
										<div class="control-group">
											<div class="controls">
												<input class="span3" type="text" name="sname" value="<?php echo $article['sname'];?>" disabled />
												&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input class="span6" type="text" name="uname" value="<?php echo $article['uname'];?>"/>
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<input class="span9" type="text" name="password" value="<?php echo $article['password'];?>"/>
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<input class="span9" type="text" name="name" value="<?php echo $article['name'];?>"  placeholder="full name" />
											</div>
										</div>
										<div class="control-group">
											<div class="controls">
												<input class="span9" type="text" name="position" value="<?php echo $article['position'];?>"  placeholder="position" />
											</div>
										</div>
					<?php 	} ?>	
										<div class="control-group">
											<div class="controls">
												<div class="row-fluid">
													<div class="span5">
													</div>
													<div class="span4">
														 <button class="btn btn-success btn-large btn-block" name="submit" type="submit" value="update">Update</button>
													</div>
													<div class="span3">
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
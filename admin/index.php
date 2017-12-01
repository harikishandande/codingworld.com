<?php
	session_start();
	include_once('../includes/article.php');
	include_once('../includes/connection.php');
	if(isset($_SESSION['logged_in']))
	{
?>
<!DOCTYPE html>
<html lang="en">
    
<head>
		<?php
			include_once('../includes/connection.php');
		    include_once('../includes/article.php');
			$username=$_SESSION['username'];
		    $article = new Article;
		    $articles = $article->fetch_usersubject($username);
			$_SESSION['subject'] = $articles['subject'];
			$_SESSION['sid'] = $articles['id'];
		?>
		<title>:: <?php echo $_SESSION['username']; ?> :: Admin panel ::</title>
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
        <link rel="stylesheet" href="css/sprites.css">
		
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
								</div>
								<?php } ?>
                                <h2><?php echo $_SESSION['username']; ?></h2>
                            </div>
                        </div>
                        <ul id="navi">
                            <li>
                              <a href="add.php"><span class="icon icon-pencil2"></span><div class="text">Add Topic</div></a>
                            </li> 
                            <li>
                              <a href="order/selectorder.php"><span class="icon icon-menu"></span><div class="text">Arrange Topic</div></a>
                            </li>
                            <li>
                              <a href="editpreview.php"><span class="icon icon-compose"></span><div class="text">Edit Topic</div></a>
                            </li>
                            <li>
                              <a href="delete.php"><span class="icon icon-trash2"></span><div class="text">Delete Topic</div></a>
                            </li>
                            <li>
                              <a href="messages.php"><span class="icon icon-envelope2"></span><div class="text">Messages</div></a>
                            </li>
							<li>
                              <a href="user.php"><span class="icon icon-user4"></span><div class="text">Prof Settings</div></a>
                            </li>
							<li>
                              <a href="logout.php"><span class="icon icon-logout"></span><div class="text">Logout</div></a>
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
                                    <h1>Welcome <?php echo $_SESSION['username']; ?>...!!</h1>
                                </div>
                            </div>
                        </div>
                    </div>
				</div>
			</div>
		</div>
    </body>
</html> <?php }
 else
 {
 	if(isset($_POST['username'], $_POST['password']))
    {
    	$username = $_POST['username'];
    	$password = $_POST['password'];
    	if(empty($username) or empty($password))
    	{
    		$error='All fields are required !';
    	}
    	else
    	{
    		$query = $pdo -> prepare("SELECT * FROM proffesors WHERE username = ? AND password= ?");
    		$query->bindValue(1, $username);
    		$query->bindValue(2, $password);
			$query->execute();
    		$num = $query->rowCount();
    		if($num==1)
    		{
				$_SESSION['username'] = $username;
    			$_SESSION['logged_in'] = true;
				
    			header('Location: index.php');
    			exit();
    		}
    		else
    		{
    			$error = 'Incorrect details !';
    		}
    	}
    }
?>
<!DOCTYPE html>
	<html lang="en">
		<head>
			<meta charset="utf-8">
			<title>:: Login :: Admin panel ::</title>
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
<style>
body, .login-submit, .login-submit:before, .login-submit:after 
{
	background: #373737 url("../img/bg.pn") 0 0 repeat;
}
.login 
{
  position: relative;
  margin: 80px auto;
  width: 400px;
  padding-right: 32px;
  font-weight: 300;
  color: #a8a7a8;
  text-shadow: 1px 1px 0 rgba(0, 0, 0, 0.8);
}
.login p 
{
  margin-bottom: 0px;
}
input, button, label 
{
  font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-size: 15px;
  font-weight: 300;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
input[type=text], input[type=password] 
{
  padding: 0 10px;
  width: 250px;
  height: 40px;
  color: #bbb;
  text-shadow: 1px 1px 1px black;
  background: rgba(0, 0, 0, 0.16);
  border: 0;
  border-radius: 5px;
  -webkit-box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.06);
  box-shadow: inset 0 1px 4px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.06);
}
input[type=text]:focus, input[type=password]:focus 
{
  color: white;
  background: rgba(0, 0, 0, 0.1);
  outline: 0;
}
label
{
  float: left;
  width: 100px;
  line-height: 40px;
  padding-right: 10px;
  font-weight: 100;
  text-align: right;
  letter-spacing: 1px;
}
.login-submit 
{
  position: absolute;
  top: 13px;
  right: 50px;
  width: 48px;
  height: 48px;
  padding: 8px;
  border-radius: 32px;
  -webkit-box-shadow: 0 0 4px rgba(0, 0, 0, 0.35);
  box-shadow: 0 0 4px rgba(0, 0, 0, 0.35);
}
.login-submit:before, .login-submit:after 
{
  content: '';
  z-index: 1;
  position: absolute;
}
.login-submit:after 
{
  top: -4px;
  bottom: -4px;
  right: -4px;
  width: 36px;
}
.login-button 
{
  position: relative;
  z-index: 2;
  width: 48px;
  height: 48px;
  padding: 0 0 48px;
  /* Fix wrong positioning in Firefox 9 & older (bug 450418) */
  text-indent: 120%;
  white-space: nowrap;
  overflow: hidden;
  background: none;
  border: 0;
  border-radius: 24px;
  cursor: pointer;
  -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.2), 0 1px rgba(255, 255, 255, 0.1);
  box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.2), 0 1px rgba(255, 255, 255, 0.1);
  /* Must use another pseudo element for the gradient background because Webkit */
  /* clips the background incorrectly inside elements with a border-radius.     */
}
.login-button:before 
{
  content: '';
  position: absolute;
  top: 5px;
  bottom: 5px;
  left: 5px;
  right: 5px;
  background: #00a2d3;
  border-radius: 24px;
  background-image: -webkit-linear-gradient(top, #00a2d3, #0d7796);
  background-image: -moz-linear-gradient(top, #00a2d3, #0d7796);
  background-image: -o-linear-gradient(top, #00a2d3, #0d7796);
  background-image: linear-gradient(to bottom, #00a2d3, #0d7796);
  -webkit-box-shadow: inset 0 0 0 1px #00a2d3, 0 0 0 5px rgba(0, 0, 0, 0.16);
  box-shadow: inset 0 0 0 1px #00a2d3, 0 0 0 5px rgba(0, 0, 0, 0.16);
}
.login-button:active:hover:before 
{
  background: #0591ba;
  background-image: -webkit-linear-gradient(top, #0591ba, #00a2d3);
  background-image: -moz-linear-gradient(top, #0591ba, #00a2d3);
  background-image: -o-linear-gradient(top, #0591ba, #00a2d3);
  background-image: linear-gradient(to bottom, #0591ba, #00a2d3);
}
.login-button:after 
{
  content: '';
  position: absolute;
  top: 15px;
  left: 12px;
  width: 25px;
  height: 19px;
  background: url("img/arrow.png") 0 0 no-repeat;
}
</style>
</head>
	<body>
		<div class="container-fluid">
			<div class="row-fluid">
				<div class="span12">
					<?php 
					if(isset($error))
					{ ?>
						<h4 style ="color:#ff0000;text-align:center"><?php echo $error; ?> </h4>
			  <?php } ?>
						<p style="text-align:center;color:#0099cc;margin-bottom:-40px;"><b>Admin Panel</b></p>
						<form method="post" action="index.php" class="login" autocomplete="off">
						<p>
							<label for="login">Username:</label>
							<input type="text" name="username" id="login" placeholder="username"/>
						</p>
						<p>
							<label>Password:</label>
							<input type="password" name="password" id="password" placeholder="password">
						</p>
						<p class="login-submit">
							<button type="submit" class="login-button">Login</button>
						</p>
						</form>
				</div>
			</div>
		</div>
	</body>
</html>
<?php
}
?>
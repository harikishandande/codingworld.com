<?php
 session_start();
 include_once('../includes/article.php');
 include_once('../includes/connection.php');
 if(isset($_SESSION['owner']))
 { ?>
 
 <html>
  <head>
    <title>: Admin panel :</title>
	<link rel="stylesheet" href="style.css"/>
	
	<link rel="stylesheet" href="login/css/style.css">
	  <link href="http://netdna.bootstrapcdn.com/font-awesome/3.1.1/css/font-awesome.min.css" rel="stylesheet" />
	<link href="css/css.css" rel="stylesheet" />
	<link href="../css/style.css" rel="stylesheet">
	<link href="icomoon/style.css" rel="stylesheet">
	
  </head>
  <header>
      <a href="index.html" class="logo">
        <img src="../userimages/logo.png" alt="Logo"/>
      </a>
      <div class="user-profile">
        <a data-toggle="dropdown" class="dropdown-toggle">
          <img src="../userimages/user.jpg" alt="Profile-Image">
          <span class="caret"></span>
        </a>
      </div>
	  <?php
				
				 include_once('../includes/connection.php');
				 include_once('../includes/article.php');
				 
				    $article = new Article;
					$articles = $article->o_teacher_notifications();
					$o_teacher_notifications = 0;
				?>
				
				<?php foreach ($articles as $article)
				{
				    $o_teacher_notifications = $o_teacher_notifications+1;
				}
				?>	
      <ul class="mini-nav">
        <a href="#">
		  <li>
          
            <div class="fs1" aria-hidden="true" data-icon="&#xe15c;"></div>
            <span class="info-label">
              5
            </span>
          </li>
		</a>
        <a href="o_teacher_notifications.php"> 
		  <li>
            <div class="fs1" aria-hidden="true" data-icon="&#xe103;"></div>
            <span class="info-label-green">
            <?php echo $o_teacher_notifications; ?> 
            </span>
          </li>
		</a>
        <a href="#"> 
		  <li>
          
            <div class="fs1" aria-hidden="true" data-icon="&#xe004;"></div>
            <span class="info-label-orange">
              9
            </span>
          </li>
		</a>
      </ul>
    </header>
  <body>
  <br><br><br><br>
   <?php
				
	 include_once('../includes/connection.php');
	 include_once('../includes/article.php');
	   $title = $_GET['title'];
		$article = new Article;
		$articles = $article->notificationtopic($title);
		
	?>
	
	<?php foreach ($articles as $article)
	{
		
	?>
	    <strong class="hed"><?php echo $article['title'];?></strong>
		<p>
			<?php echo $article['content'];?>
		</p>
		<a class="btn btn-primary" href="okaynotification.php?title=<?php echo $article['title'];?>">Okay!</a> 
	<?php
	} }
	?>
	</body>
</html>

 

<?php
 session_start();
 include_once('../includes/article.php');
 include_once('../includes/connection.php');
  include_once('header.php');
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
  <body>
  <br><br><br><br>
   <?php
				
	 include_once('../includes/connection.php');
	 include_once('../includes/article.php');
	 
		$article = new Article;
		$articles = $article->o_teacher_notifications();
        foreach ($articles as $article)
	{
		
	?>
	<a href="notificationtopic.php?title=<?php echo $article['title'];?>">
 <div class="o_teacher_notifications">
	<div class="date">

		<span class="mon"><?php echo date('M', $article['timestamp']); ?></span>
		<span class="day"><?php echo date('d', $article['timestamp']); ?></span>
		<div class="bdr1"></div>
		<div class="bdr2"></div>
		
	</div>
	<div class="desc">
		<p>
			<strong class="hed"><?php echo $article['title'];?></strong>
			<span class="des"><b>By: <?php echo $article['username'];?><br>Subject: <?php echo $article['subject'];?></b></span>
		</p>
	</div>
</div>
<a>
<br>
	<?php
	} }
	?>
	</body>
</html>

 

  <head>
	<link href="../css/style.css" rel="stylesheet">
	<link href="icomoon/style.css" rel="stylesheet">
	
		<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/bootstrap-responsive.min.css" rel="stylesheet">
		<script type="text/javascript" src="../js/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap.min.js"></script>

  </head>
  <header>
      <a href="index.php" class="logo">
        <img src="../userimages/logo.png" alt="Logo"/>
      </a>  
      <div class="user-profile">
        <a data-toggle="dropdown" class="dropdown-toggle">
          <img src="../userimages/user.jpg" alt="Profile-Image">
          <span class="caret"></span>
        </a>
        <ul class="dropdown-menu pull-right">
          <li>
            <a class="icon-edit btn" href="#">
              Edit Profile
            </a>
          </li>
          <li>
            <a class="icon-remove-sign btn" href="#">
              Logout
            </a>
          </li>
        </ul>
		
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
			<?php if($o_teacher_notifications>0)
			{ ?>
            <span class="info-label-green">
            <?php echo $o_teacher_notifications; ?> 
            </span>
			<?php } ?>
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
	<br> <br> <br>
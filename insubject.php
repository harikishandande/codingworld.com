<!DOCTYPE html>
<html lang="en">
    <head>
		<meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
        <title>Materials-<?php echo $_GET['subject']; ?></title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"> 
        <meta name="description" content="Responsive Horizontal Layout with jQuery and custom Scrollbars" />
        <meta name="keywords" content="horizontal, scrolling, panels, layout, template, jquery, responsive, custom scrollbar, html5" />
        <meta name="author" content="Codrops" />
        <link rel="shortcut icon" href="../favicon.ico">
		<link rel="stylesheet" type="text/css" href="css/jquery.jscrollpane.custom.css" />
        <link rel="stylesheet" type="text/css" href="css/stylebook.css" />
		<script type="text/javascript" src="js/head.min.js"></script>
		<noscript>
			<style>
				@media screen and (max-width: 715px) {
					.hs-content-scroller{
						overflow: visible;
					}
				}
			</style>
		</noscript>
    </head>
<body>
	<div id="hs-container" class="hs-container">
		<div class="codrops-top">
            <a href="materials.php"><< subjects</a>
        </div>
		<aside class="hs-menu" id="hs-menu">
			<div class="hs-headline">
				<h1 style=""><?php echo $_GET['subject']; ?></h1>
			</div>
			<nav>
				<?php
				session_start();
				include_once('includes/connection.php');
				include_once('includes/article.php');
				$article = new Article;
				$subject = $_GET['subject'];
				if(isset($_GET['subject']))
				{
					$articles = $article->fetch_units($subject);	
					
					foreach($articles as $article)
					{
						$unit = $article['unit'];
						$uno = $article['uno'];
						$status = $article['status'];
					?>		
				<?php	if($status == 1)
						{
				?>
						<ul class="unit" >
							<span><?php echo $uno; ?>.<?php echo $unit; ?></span>
						</ul>
				<?php   } ?>
					<?php	
						$uid = $article['id'];
						$topic =  new Article;
						$topics = $topic->check_topics($uid);
						foreach($topics as $topic)
						{	
							$top = $topic['topic'];
					?>		<a href="insubject.php?subject=<?php echo $subject; ?>&tid=<?php echo $topic['id']; ?>">
								<li class="topic" >
									<span><?php echo $top;?></span>
								</li>
							</a>
				<?php	}
					} 
				?>
			</nav>
		</aside>
		<a href="#hs-menu" class="hs-totop-link">Go to the top</a>
		<div class="hs-content-scroller">
			<div class="hs-content-wrapper">
				<article class="hs-content" id="introduction">
					<div class="hs-inner">
						<?php
							if(isset($_GET['tid']))
							{
								include_once('includes/connection.php');
								include_once('includes/article.php');
								$article = new Article;
								$tid = $_GET['tid'];
								$data = $article->fetch_content($tid);
						?>

						<body>
							<div class="container">
								<h1 style="margin: 0px 200px 20px -17px;font-size:40px;"><?php echo $data['topic']; ?></h1>
								<h4 style="margin-top:-15px;"><b>Published On:</b> <?php echo date('l F d, Y', $data['topic_timestamp']); ?> </h4>
								<p style="margin-top:-25px;"><?php echo $data['topic_content']; ?></p>
							</div>
						</body>
					</div>
				</article>
			</div><!-- hs-content-wrapper -->
		</div><!-- hs-content-scroller -->
    </div>
							 <?php
							}
							else
							{?>
							<body>
								<div class="container">
									<?php   include_once('includes/connection.php');
											include_once('includes/article.php');
											$article = new Article;
											$articles = $article->fetch_proffesors($subject); 
											foreach ($articles as $article)
											{
									?>
												<img class="circle" src="userimages/<?php echo $article['user_img']; ?>" >
												<h1 style="margin: 0px 200px 20px -17px;font-size:40px;"><?php echo $subject; ?></h1>
												<h4 style="margin-top:-15px;"><b>Published By:</b><?php echo $article['name']; ?></h4>
											<?php
											}
												$subject = $_GET['subject'];
												include_once('includes/connection.php');
												$article = new Article;
												$articles = $article->fetch_units($subject);	
												foreach($articles as $article)
												{
													$unit = $article['unit'];
													$uno = $article['uno'];
													$status = $article['status'];
											?>		<br/><br/>
											<?php	if($status == 1)
													{
											?>			<h3 style="font-size:20px;margin-top:-5px;"><?php echo $uno; ?>.<?php echo $unit; ?></h3>
											<?php   } ?>
											<?php	
													$uid = $article['id'];
													$topic =  new Article;
													$topics = $topic->check_topics($uid);
													foreach($topics as $topic)
													{	
														$top = $topic['topic'];
											?>			
														<a href="insubject.php?subject=<?php echo $subject; ?>&tid=<?php echo $topic['id']; ?>">
															<h5 style="font-size:18px;margin-top:5px;margin-bottom:0px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $top;?></h5>
														</a>
														
											<?php	}
												} ?>
								</div>
							</body>
								<?php
								}

				}?>
</body>
</html>
<script>
			head.js(
				{ jquery : "http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" },
				{ mousewheel : "js/jquery.mousewheel.js" },
				{ mwheelIntent : "js/mwheelIntent.js" },
				{ jScrollPane : "js/jquery.jscrollpane.min.js" },
				{ history : "js/jquery.history.js" },
				{ stringLib : "js/core.string.js" },
				{ easing : "js/jquery.easing.1.3.js" },
				{ smartresize : "js/jquery.smartresize.js" },
				{ page : "js/jquery.page.js" }
			);
</script>

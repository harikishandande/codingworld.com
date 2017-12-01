<?php
	include_once('../includes/connection.php');
	include_once('../includes/article.php');
	$article = new Article;
	if (isset($_GET['id'])) 
	{
		$id = $_GET['id'];
		$data = $article->fetch_topic($id);
		
		if(isset($_POST['topic'], $_POST['content'])) 
		{
			$topic = $_POST['topic'];
			$content = $_POST['content'];

			if (empty($topic) or empty($content))
			{
				$error = 'All fields are required !';
			}
			else 
			{
				$sql = "UPDATE topics SET topic = :topic, topic_content = :content, topic_timestamp = :timestamp WHERE id = :id";
				$query = $pdo->prepare($sql);
				$query->bindValue(":topic", $topic);
				$query->bindValue(":content", $content);
				$query->bindValue(":timestamp", time());
				$query->bindValue(":id", $id);
				try 
				{
				  $result = $query->execute();
				} 
				catch(PDOException $e)
				{
					echo $e->getCode() . " - " . $e->getMessage();
				}
				if($result) 
				{
				  header('Location: editpreview.php');
				}
			}
		}
	}
?>
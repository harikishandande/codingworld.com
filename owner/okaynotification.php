<?php  
session_start();
include_once('../includes/connection.php');
include_once('../includes/article.php');
 
$article = new Article;
 
if(isset($_SESSION['owner'])) {
        if(isset($_GET['title'])) {
                $title = $_GET['title'];
                $query = $pdo->prepare('DELETE FROM o_teacher_notifications WHERE title = ?');
                $query->bindValue(1, $title);
 
                $query->execute();
 
                header('Location: o_teacher_notifications.php');
        }
 }
?>
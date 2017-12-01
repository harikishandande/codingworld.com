<?php
try
{
  $pdo = new PDO('mysql:host=localhost;dbname=coding_world','root','123');
}
catch(PDOException $e)
{
  exit('Database error.');
}
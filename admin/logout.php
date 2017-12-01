<?php
   session_start();
   session_destroy();
   header('Location: ../materials.php');
?>
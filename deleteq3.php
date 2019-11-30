<?php

session_start();

if(!isset($_SESSION['vuser']))
{
  header('Location: /home.php');
}
else
{

$pid = trim($_GET['id']);
     
   if (!get_magic_quotes_gpc()){
    $pid = addslashes($pid);
    
  }
      
  include('../db_con.php');

  $query = "delete from saveq3 where cid='$pid'";
  $result= $db->query($query);
  
  
  $db->close();
  header('Location: /teams/load4.php');
  
}  
?>
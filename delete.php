<?php  
 require_once './connection_info_Historic.php';

 $connect = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
 $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


 $sql = "DELETE FROM members WHERE SequenceNumber = '".$_POST["id"]."'";  
 if($connect->exec($sql))  
 {  
      echo 'Data Deleted';  
 }  
 ?>
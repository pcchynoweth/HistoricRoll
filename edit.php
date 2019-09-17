<?php  
 require './connection_info_Historic.php';

 $connect = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
 $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $SequenceNumber = $_POST["id"];  
 $text = $_POST["text"];  
 $column_name = $_POST["column_name"];  
 $sql = "UPDATE members SET ".$column_name."='".$text."' WHERE SequenceNumber='".$SequenceNumber."'";  
 if($connect->exec($sql))  
 {  
      echo 'Data Updated';  
 }  
 ?>
<?php  
 require_once './connection_info_Historic.php';

 $connect = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
 $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

 $sql = "INSERT INTO members (SequenceNumber, RollNumber, Name, Status) VALUES ('".$_POST["SequenceNumber"]."', '".$_POST["RollNumber"]."', '".$_POST["Name"]."','".$_POST["Status"]."')";  
 if($connect->exec($sql))  
 {  
      echo 'Data Inserted';  
 }  
?> 
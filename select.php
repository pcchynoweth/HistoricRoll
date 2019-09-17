<?php  
 require_once './connection_info_Historic.php';
try {
 $connect = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
 $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
 $sql = "SELECT SequenceNumber, Name, Status, SequenceNumber, RollNumber FROM members ORDER BY Name ASC";  
 $stmt = $connect->prepare($sql);
 $stmt->execute();
 $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
 $output = '';
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="5%">Seq</th>  
                     <th width="40%">Name</th>  
                     <th width="5%">Status</th>  
                     <th width="5%">Sequence Number</th>  
                     <th width="5%">Roll Number</th>  
                </tr>';  
 if($result) {  
      foreach ($result as $row)  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["SequenceNumber"].'</td>  
                     <td class="Name" data-id1="'.$row["SequenceNumber"].'" contenteditable>'.$row["Name"].'</td> 
                     <td class="Status" data-id2="'.$row["SequenceNumber"].'" contenteditable>'.$row["Status"].'</td>  
                     <td class=SequenceNumber" data-id3="'.$row["SequenceNumber"].'" contenteditable>'.$row["SequenceNumber"].'</td> 
                     <td class="RollNumber" data-id4="'.$row["SequenceNumber"].'" contenteditable>'.$row["RollNumber"].'</td>  
                     <td><button type="button" name="delete_btn" data-id5="'.$row["SequenceNumber"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>  
                <td id="Seq" contenteditable></td>  
                <td id="Name" contenteditable></td>  
                <td id="Status" contenteditable></td>  
                <td id="SequenceNumber" contenteditable></td> 
                <td id="RollNumber" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '<tr>  
                          <td colspan="4">Data not Found</td>  
                     </tr>';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>
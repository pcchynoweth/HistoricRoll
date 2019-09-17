<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style01.css">
<?php
require_once './connection_info_Historic.php'
?>
</head>
<body>
<?php
try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE  ";
    $sql .= '`members` ';
    $sql .= "SET `Status` = ";
    $sql .= '$_GET["v"]';
    $sql .= "WHERE `SequenceNumber` LIKE ";
    $sql .= '$_GET["k"]';
    
//    var_dump($sql);
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "<table id='members'>
<tr>
<th>Name</th>
<th>Status</th>
<th>SequenceNumber</th>
<th>RollNumber</th>
</tr>";
foreach ($result as $row) {
    echo "<tr>";
    foreach ($row as $key => $item) {
        echo "<td>$item</td>";
    }
    echo "</tr>";
}
echo "</table>";
?>
</body>
</html>
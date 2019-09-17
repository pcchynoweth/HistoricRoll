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
$field = "Status";
$value = "%%ctive";
if ($_GET["f"]) $field = $_GET["f"];
if ($_GET["q"]) $value = $_GET["q"];
try {
    $conn = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "<h1 id=\"members\">Membership List</h1>";
    $sql = "SELECT `Name`, `Status`, `SequenceNumber`, `RollNumber`  FROM ";
    $sql .= '`members` WHERE ';
    $sql .= $field;
    $sql .= " LIKE '";
    $sql .= $value;
    $sql .= "' ORDER BY `Status`, `Name`";
 // var_dump($sql);
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
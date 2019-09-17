<html>
<head>
<meta charset="utf-8">
<title>Show Current Membership</title>

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
    echo "<h1 id=\"members\">Membership List</h1>";
    $sql = "SELECT `SequenceNumber`, `RollNumber`, `Name`, `Status`  FROM ";
    $sql .= "`members` WHERE `Status` REGEXP '^[In]*[Aa]ctive' ";
    $sql .= "ORDER BY `Status` ASC, `Name` ASC";
 
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
echo"<table id=\"members\">";
echo "<tr><th>Seq Number</th><th>Roll Number</th><th>Name</th><th>Status</th></tr>\n";
foreach ($result as $row) {
	echo "<tr>";
	foreach ($row as $key => $item) {
		echo "<td>$item</td>\n";
	}
    echo "</tr>\n";
}
echo "<tr><td colspan='4' align='right'><font size='-2' color='green'>This tool brought to you by PCC!</font></td></tr>\n";
echo "</table><br />";
?>

<a href="javascript:window.print()">Print</a> this page
</body>
<html>


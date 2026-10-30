<?php
$conn = new mysqli('localhost', 'root', '', 'puskesmas2');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$output = "";
$result = $conn->query("SHOW TABLES");
if ($result) {
    while ($row = $result->fetch_row()) {
        $table = $row[0];
        $output .= "=== TABLE: $table ===\n";
        $res = $conn->query("SHOW CREATE TABLE `$table`");
        if ($res) {
            $row_create = $res->fetch_assoc();
            $output .= $row_create['Create Table'] . "\n\n";
        }
    }
} else {
    $output .= "Error listing tables.\n";
}

$conn->close();
file_put_contents('schema_output.txt', $output);
echo "Done";
?>

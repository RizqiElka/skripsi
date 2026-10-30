<?php
$conn = new mysqli('localhost', 'root', '', 'puskesmas2');
$tables = ['pendaftaran', 'reminder', 'tenaga_medis', 'artikel', 'konsultasi', 'peringatan', 'stunting_results'];

foreach($tables as $table) {
    echo "--- TABLE: $table ---\n";
    $res = $conn->query("SHOW CREATE TABLE $table");
    if($res) {
        $row = $res->fetch_assoc();
        echo $row['Create Table'] . "\n\n";
    }
}
$conn->close();
?>

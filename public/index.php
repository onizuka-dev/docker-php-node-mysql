<?php
$mysqli = mysqli_connect("db", "dbuser", "654321", "dbname");

if (!$mysqli) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

$recordSet = $mysqli->query("SELECT * FROM users");

$result = [];

while ($row = mysqli_fetch_array($recordSet)) {
    $result = [
        "email" => $row["email"],
        "password" => sha1($row["password"])
    ];
}

mysqli_close($mysqli);

echo json_encode($result);

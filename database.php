<?php

$hostName = "localhost";
$dbUser = "root";
$dbPassword = "root";
$dbName = "tempo_for_uni";
$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);
if (!$conn) {
    die("Something went wrong;");
}

?>
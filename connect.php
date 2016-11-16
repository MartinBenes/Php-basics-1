<?php
$servername = "xxx";
$username = "xxx";
$password = "xxx";
$dbname = "xxx";

// Vytvořím a zkontroluji spojení s DB
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Spojení neklaplo, protože " . $conn->connect_error);
}

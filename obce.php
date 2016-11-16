<?php
require_once("connect.php");
if (isset($_GET['okres']) && is_numeric($_GET['okres'])) {
    $kod = $_GET['okres'];
}
else die("Chybný kraj ...");

 //   include_once("header.php");

// Pošlu SQL dotaz
$sql = "SELECT nazev FROM obec WHERE okres_kod='$kod' ";
$result = $conn->query($sql);
// Zpracuji výsledek
if ($result->num_rows > 0) {
    echo "<ol>";
    while($row = $result->fetch_assoc()) {
        echo "<li> {$row['nazev']} </li> \n";
    }
    echo "</ol>";
} else {
    echo "Chybný kraj ...";
}
require("footer.php");

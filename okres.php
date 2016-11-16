<?php
require_once("connect.php");
if (isset($_GET['kraj']) && is_numeric($_GET['kraj'])) {
    $kraj_kod = $_GET['kraj'];
    $headers = true;
}
else if (isset($_GET['krajAjax']) && is_numeric($_GET['krajAjax'])) {
    $kraj_kod = $_GET['krajAjax'];
    $headers = false;
}
else die("Chybný kraj ...");

if ($headers) {
    include_once("header.php");
}
// Pošlu SQL dotaz
$sql = "SELECT nazev, okres_kod FROM okres WHERE kraj_kod='$kraj_kod' ";
$result = $conn->query($sql);
// Zpracuji výsledek
if ($result->num_rows > 0) {
    echo "<ol>";
    while($row = $result->fetch_assoc()) {
        echo "<li> <a onmouseover='zobrazObce({$row['okres_kod']})'
                           href='#'>{$row['nazev']} </a></li> \n";
    }
    echo "</ol>";
} else {
    echo "Chybný kraj ...";
}
require("footer.php");

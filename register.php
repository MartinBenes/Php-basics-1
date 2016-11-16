<?php

session_start();
require_once "pripojeni.php";
include "hlavicka.html";
?>

<b> Ukladam do databaze</b>
email: <?= $_POST['email']?>
a heslo: <? $_POST['heslo']?>

<?php

$insertSQL = Insert Into lusers VALUES(:email, :heslo);
$ins = $pripojeni->prepare($insertSQL);
$ins ->bindParam(':email', $_POST['email']);
$hesloHash = sha1($_POST['heslo'].$_POST['email']);
$ins->bindParam(':heslo', $hesloHash);
$ins->execute();
include "paticka.php";


?>


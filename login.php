<?php

session_start();
require_once "pripojeni.php";
include "hlavicka.html";


SELECT COUNT(*)
FROM users
WHERE email = $email AND heslo = $hash

// wrací 1 nebo 0 - email je unique, může tam být jen jednou


?>


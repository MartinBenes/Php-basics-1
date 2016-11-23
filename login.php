<?php

session_start();
require_once "connect.php";





// wrací 1 nebo 0 - email je unique, může tam být jen jednou



try {
    $error = 'Error';
    



    			$loginSQL = "SELECT COUNT(*)
							 FROM users
							 WHERE email = $email 
							 AND heslo = $hesloHash";
				$dotaz = $pripojeni->prepare($loginSQL);
				$dotaz ->bindParam(':email', $_POST['email']);
				$hesloHash = sha1($_POST['heslo'].$_POST['email']);
				$dotaz->bindParam(':heslo', $hesloHash);
				$dotaz->execute();
				$vysledek = $dotaz->fetch();
				print_r($vysledek)
				if(vysledek[0] == 1) ($_SESSION['user'] == $_POST['email'];);
			else echo "";

$cookie_name = "user";
setcookie($cookie_name, $email, time() + (86400 * 30), "/"); // 86400 = 1 den




    // Code following an exception is not executed.
    echo 'Never executed';

} catch (PDOException $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}





?>


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
				print_r($vysledek);
				if(vysledek[0] == 1) ($_SESSION['user'] == $_POST['email'];);
			else throw new exception('Neplatné přihlášení')


} catch (exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}





?>


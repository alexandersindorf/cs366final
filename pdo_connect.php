<?php

$user = 'johnsonkl07';
$pass = 'kj9114'; 
$dsn='mysql:host=washington.uww.edu;dbname=cs366-2241_johnsonkl07';
try {
    $db = new PDO($dsn, $user, $pass);

} catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
}



?>
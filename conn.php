<?php 
$pdo = new PDO('mysql:host=localhost;dbname=ecff', 'root', '');
if(!$pdo){
    die("Fatal Error: Connection Failed!");
}

?>
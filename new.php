<?php 
$pdo = new PDO('mysqli:host=localhost; dbname= intro_db','root','');
$statement = $pdo->prepare('INSERT INTO users (email, username, password')
?>
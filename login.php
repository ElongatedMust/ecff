<?php
$pdo = new PDO('mysql:host=localhost;dbname=intro_db', 'root', '');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

if (isset($_POST['submit'])) {
    $statement = $pdo->prepare('SELECT * FROM users WHERE email = :email');
    $statement->bindValue(':email', $_POST['email']);
    if ($statement->execute()) {
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        if ($user === false) {
            echo 'Invalid email address';
        } else {
            if (password_verify($_POST['password'], $user['password'])) {
                echo 'Welcome '.$user['username'];
            } else {
                echo 'Incorrect password';
            }
        }
    } else {
        echo 'Unable to retrieve user data';
    }
} 
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form action="" method="post">
        <label for="email">Email</label>
        <input type="email" name="email" id="email" required><br>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" required><br>
        <button type="submit" name="submit">Login</button>
    </form>
</body>
</html>

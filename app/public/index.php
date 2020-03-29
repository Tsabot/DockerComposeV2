<?php 
$db_connection = pg_connect("host=postgres dbname=testapp user=root password=root");
$result = pg_query($db_connection, "SELECT * FROM users");
$users = [];
while ($user = pg_fetch_object($result)) {
    array_push($users, $user);
}

if($_POST["user_name"]){
    $nextUserId = count($users) + 1;

    $username = $_POST["user_name"];
    pg_query($db_connection, "INSERT INTO users (user_id, user_name) VALUES ('$nextUserId' ,'$username')");
    $_POST["user_name"] = null;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yes ENFIN</title>
</head>
<body>
    <h1>Enfin YES bravo page d'accueil dak</h1>
    <nav>
        <ul>
            <li><a href='/'>HOME</a></li>
            <li><a href='/test.php'>Seconde page</a></li>
        </ul>
    </nav>
    <h2>Liste des utilisateurs</h2>
    <ul>
    <?php
    if(!empty($users)){

    foreach ($users as $user) {
        ?>
        <li><?php echo $user->user_name; ?></li>
        <?php
    }}
    ?>
    </ul>
    <form method="post">
        <p>Votre nom : <input type="text" name="user_name" /></p>
        <p><input type="submit" value="OK"></p>
    </form>
</body>
</html>
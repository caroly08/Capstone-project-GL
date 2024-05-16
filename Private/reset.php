<?php
require_once "../includes/dbh.inc.php";
require_once "../includes/config_sessioninc.php";
require_once "../includes/login_view.inc.php";

$query = "SELECT * FROM users;";

$stmt = $pdo ->prepare ($query);

$stmt -> execute();

$results = $stmt ->fetchAll(PDO::FETCH_ASSOC);

$pdo= null;
$stmt = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>User Edit</title>
</head>

<body>
<header>
        <nav >
            <div class ="logo">GL </div>

            <div class="nav-items">
                <a href="../index.php">Home</a>
                <a href="../Public/about.php"  >About</a>
                <a href="../Public/signup.php" >Sign Up</a>
                <a href="../Public/login.php">Log In</a>
            </div>
        </nav>
</header>


    <?php 
    if (!isset($_SESSION["user_id"])) { 
    echo " <h2> Access Denied! </h2>";
} else { ?>

<div class="edituser"> 
    <form action="../includes/reset.inc.php" method="post">
    <label for="UID"> </label>
    <p>Key in UID of user you wish to reset password</p>
        <input type="text" name="UID" placeholder="UID on file">
        <br>
        <br>
        <label for="pass"></label>
        <input type="password" name="pass" placeholder="New Password">
        <br>
                <button>Submit</button>      
    </form>
    </div>
<?php }?>
    
<a href="admin.php"><button>Back to Homepage</button></a>

   
</body>
</html>
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
    <form action="../includes/edit.inc.php" method="post">
    <label for="UID"> </label>
    <p>Key in UID of user you wish to edit</p>
        <input type="text" name="UID" placeholder="UID on file">
        <br>
        <br>
        <label for="usertype">Account Type</label>
        <br>
        <select name="acctype" >
            <option value="">Please Select</option>
            <option value="ngo">NGO</option>
            <option value="vol">Volunteer</option>
            <option value="admin">Admin</option>
        </select>
        <br>
        <label for="name"></label>
        <input type="text" name="name" placeholder="Name / NGO Name">
        <br>
        <label for="email"> </label>
        <input type="email" name="email" placeholder="Email">
        <br><br><br>
        <h3>* NGO ONLY </h3>
        <label for="area"> </label>
        <input type="text" name="area" placeholder="Area of Concern">
        <br><br><br>
        <h3>* Volunteer ONLY </h3>
        <label for="hrav"> </label>
        <input type="text" name="hrav" placeholder="Hr avilable per week">
        <br>

        <label for="bkgrd">Criminal History </label>
        <br>
        <select name="bkgrd" >
            <option value="">Please Select</option>
            <option value="No">None</option>
            <option value="Yes">Yes</option>
        </select>
        <br>
        <label for="link"> </label>
        <input type="text" name="link" placeholder="LinkedIn Page">
        <br><br>

        <button>Submit</button>      
    </form>
    </div>
<?php }?>
    
<a href="admin.php"><button>Back to Homepage</button></a>

   
</body>
</html>
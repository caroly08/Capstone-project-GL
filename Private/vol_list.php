<?php
require_once "../includes/dbh.inc.php";
require_once "../includes/config_sessioninc.php";
require_once "../includes/login_view.inc.php";

$query = "SELECT * FROM users WHERE acctype = 'vol';";

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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <title>List of Volunteers</title>
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
<div class="listpage">
<?php 
    if (!isset($_SESSION["user_id"])) { 
    echo "Access Denied!";
} else { ?>

<div class="container mt-4">
        <h2 style="background: #323232;
    padding:1rem; color:antiquewhite">Available Volunteers on file:</h2>
        <table class="table table-bordered" style="background: #323232;
    padding:1rem; color:antiquewhite">
            <thead>
            <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Weekly Available Hrs</th>
            <th>Criminal History</th>
            <th>LinkedIn</th>
                </tr>
            </thead>
            <tbody>
                <?php
               
               if (empty($results)) {
                echo "<p> No Volunteer available </p>";
            }
       
            else {
                foreach ($results as $row) {
                        echo "<tr>";
                        echo "<td>" . $row['Name'] . "</td>";
                        echo "<td>". "<a href='mailto:".$row["Email"]."?subject=Referral from GL &body= Hi, I got your info from Guardian Link and wish to connect'>".$row["Email"]."</a>" ."</td>";     
                        echo "<td>" . $row["HrAv"]. "</td>";
                        echo "<td>" . $row["bkgrd"] . "</td>";
                        echo "<td>" . $row["link"] . "</td>";
                        echo "</tr>";
                    }
                } 
                ?>
            </tbody>
        </table>
    </div>
    <div class="loginmenu" >
    <a href="volhome.php"><button>Back to Homepage</button></a>
    <?php }?>
    </div>
    </div>
</body>
</html>
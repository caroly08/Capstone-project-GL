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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/main.css">
    <title>List of NGOs</title>
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
    echo " <h2> Access Denied! </h2>";
} else { ?>

<div class="container mt-4" style="padding:6rem 8rem">
        <h2 style="background: #323232;
    padding:1rem; color:goldenrod">Current Users on file:</h2>
    <br><br>
        <table class="table table-bordered" style="background: #323232;
    padding:1rem; color:white">
            <thead>
            <tr>
                <th>UID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Account Type</th>
                <th>Criminal History</th>
                <th>User Name</th>

            </tr>
            </thead>
            <tbody>
                <?php
               
               if (empty($results)) {
                echo "<p> No current users </p>";
            }
       
            else {
                foreach ($results as $row) {
                        echo "<tr>";
                        echo "<td>" . $row['UID'] . "</td>";
                        echo "<td>" . $row['Name'] . "</td>";
                        echo "<td>". "<a href='mailto:".$row["Email"]."?subject=Referral from GL &body= Hi, I got your info from Guardian Link and wish to connect'>".$row["Email"]."</a>" ."</td>";    
                        echo "<td>" . $row["acctype"]. "</td>";
                        echo "<td>" . $row["bkgrd"]. "</td>";
                        echo "<td>" . $row["user"]. "</td>";
                        echo "</tr>";
                    }
                } 
                ?>
            </tbody>
        </table>
    </div>
    <div class="loginmenu" >
        <a href="../public/signup.php"><button> Add User </button></a>
        <a href="edit.php"><button>Edit User</button></a>
        <a href="reset.php"><button>Reset Password</button></a>
        
    <a href="admin.php"><button>Back to Homepage</button></a>

    </div>
    <div class="deletef" >
    <form action="../includes/admindelete.inc.php" method="POST">
            <label for="UID"></label>
            <input type="text" name="UID" placeholder="UID for deletion">
            <button>Delete User</button>
        </form>
    </div>
    <?php }?>
    
    </div>
   
</body>
</html>
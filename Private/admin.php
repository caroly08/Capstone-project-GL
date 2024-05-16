<?php
require_once "../includes/dbh.inc.php";
require_once "../includes/config_sessioninc.php";
require_once "../includes/login_view.inc.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Admin Home</title>
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

    <br><br>

    <div class="homepage" >
    
    <?php
            output_username();
?>
<?php 
    if (!isset($_SESSION["user_id"])) { 
    echo " Please Log In!";
} else { ?>
<br>
    
    <p >Admin Home Page</p>
    

      <div class="loginmenu" >
    
    <form action="../includes/logout.inc.php" method="post">
<button >Log out</button>  
</form>

<form action="../includes/delete.inc.php" method="post">
<button >Delete Account</button>  
</form>

<a href="user_list.php"><button>User List</button></a>


</div> 
</div> 

   <?php }?>
          
</body>
</html>
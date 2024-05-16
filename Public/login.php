<?php
require_once "../includes/config_sessioninc.php";
require_once "../includes/login_view.inc.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Log In Page</title>
</head>

<body >
    <header>

        <nav>
            <div class ="logo" > GL </div>
        
            <div class="nav-items">
                <a href="../index.php">Home</a>
                <a href="about.php"  >About</a>
                <a href="signup.php" >Sign Up</a>
                <a href="login.php">Log In</a>
            </div>
        </nav>

    </header>


<div class="login" >
<h2>Please Login</h2>
<br>

    <form action="../includes/login.inc.php" method="post">
        <input type="text" name="user" placeholder="Username">
        <br>
        <input type="password" name="pass" placeholder="Password">
        <br><br>
        <button>Log In</button>  
    
</form>
    <br>
    <a href="mailto:admin@GLink.com?Subject=Forgot Password &body= My User name: (fill in data)" style="background-color: white;"> Forgot password? Email Admin</a>

    
<?php
check_login_errors();
?>

</body>
</html>
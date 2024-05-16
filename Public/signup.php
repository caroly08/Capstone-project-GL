<?php
require_once "../includes/config_sessioninc.php";
require_once "../includes/signup_view.inc.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/main.css">
    <title>Signup Page</title>
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

    <div class="signup" >

    <br>
        <h3>Complete Form below to Sign Up </h3>
        <br>
    <form action="../includes/signup.inc.php" method="post">
        <h3>Basic Info </h3> <p> * Required</p>
        <label for="user"> </label>
        <input type="text" name="user" placeholder="User Name">
        <br>
        <label for="pass"> </label>
        <input type="password" name="pass" placeholder="Password">
        <br>
        <label for="usertype">Account Type</label>
        <br>
        <select name="usertype" >
            <option value="">Please Select</option>
            <option value="ngo">NGO</option>
            <option value="vol">Volunteer</option>
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
<?php
check_signup_errors();

?>

    </div>
    

</body>
</html>
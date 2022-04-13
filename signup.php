<?php session_start()?>
<?php include 'conn.php';?>
<?php

// $aemail=$info['email'];
// echo $aemail['name'];

if (isset($_POST["signup"])) {
    //getting value from form
    $username=mysqli_real_escape_string($conn,$_POST['userName']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $password=mysqli_real_escape_string($conn,$_POST['password']);
    $conPassword=mysqli_real_escape_string($conn,$_POST['conPassword']);
    $pass=password_hash($password,PASSWORD_BCRYPT);
    //selecting email from database
    $sqli="SELECT * FROM `account` where email='$email'";
    $res=mysqli_query($conn,$sqli);
    $nemail=mysqli_num_rows($res);
    $_SESSION['username']=$username;
    if ($nemail>0) {
        echo 'Email already exist!!!';
        
    }else{
        if ($password===$conPassword) {
            $uInfo="INSERT INTO `account` (`sno`, `name`, `email`, `password`) VALUES (NULL, '$username', '$email', '$pass');
            ";
            $insert=mysqli_query($conn,$uInfo);
            header('location:home.php');
        }
           
        
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
</head>
<style>
.container{
    height: 100vh;
    display: flex;
    
    justify-content: center;
    align-items: center;

}
.input{
    width: 51vh;
    height: 5vh;
    padding: 5px;
    margin: 3px;
}
.form{
    height: 70vh;
    width: 60vh;
    background-color: rgb(228, 228, 228);
    /* box-shadow: 2px 2px 10px rgb(112, 110, 110); */
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    
    font-size:1.2rem ;
}
.btn{
    margin: 5px;
    padding: 5px 10px;
    width: 51vh;
    background-color: rgb(52, 96, 219);
    color: white;
    font-size: 1.3rem;
}
</style>
<body>
    
<div class="container">
<div class="form">
    <form action="/phptut/signinpro/signup.php" method="post">
    <div>

        <input type="text" name="userName" placeholder="Username" class="input" required>
    </div>
    <div>
        <input type="text" name="email" placeholder="Email" class="input" required>

    </div>
    <div>
        <input type="password" name="password" placeholder="Password" class="input" required>

    </div>
    <div>

        <input type="password" name="conPassword" placeholder="Confirm password" class="input" required>
    </div>
    <div>
        <!-- <input type="submit" value="Sign Up" name="signup"> -->
        <button type="submit" name="signup" class="btn">Sign Up</button>
    </div>
    <div>
    <p>Have an account? <a href="signin.php">Login</a></p>

    </div>
    </form>
    


</div>
</div>

</body>
</html>
<?php session_start() ?>
<?php include 'conn.php';?>
<?php
if (isset($_POST['signin'])) {
    $email=$_POST['email'];
    $pass=$_POST['password'];
   $select="SELECT*FROM `account` where email='$email'";
   $result=mysqli_query($conn,$select);
   $info=mysqli_fetch_assoc($result);
   $hashPass=$info['password'];
   $_SESSION['username']=$info['name'];
   if ($info) {
       $pass_verify=password_verify($pass,$hashPass);
       if ($pass_verify) {
           
           header('location:home.php');
       }else{
           echo "Password Incorrect";
       }
   }
   else{
       echo"Incorrect Email";
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
    background-color:rgb(228, 228, 228);
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
    <form action="" method="post">
    
    <div>
        <input type="text" name="email" placeholder="Email" class="input" required>

    </div>
    <div>
        <input type="password" name="password" placeholder="Password" class="input" required autocomplete="off">

    </div>
    
    <div>
        <!-- <input type="submit" value="Sign Up" name="signup"> -->
        <button type="submit" name="signin" class="btn">Sign In</button>
    </div>
    <div>
    <p>Create an account? <a href="signup.php">Sign Up</a></p>

    </div>
    </form>
</body>
</html>
<?php session_start()?>
<?php 
if(!isset($_SESSION['username'])){
    header('location:signin.php');
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
    a{
        height: 3vh;
        width: 8vh;
        background-color: tomato;
        border-radius: 3px;
        color: white;
        text-decoration: none;
        padding: 5px 12px;
        font-size: 1.2rem;
    }
</style>
<body>
    <h1>
        This is the home of the page
    </h1>
    <h1>hello  <?php echo $_SESSION['username'] ?></h1>
    <div>
        <a href="logout.php">Logout</a>
    </div>

</body>
</html>
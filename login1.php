
<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="Style2.css">
<title>LOGIN PAGE</title>
</head>
<body>
    <div class ="container">
        <h1>Login Detail</h1>
        <form  action ="#" method = "POST">
        <div class = "form">
            <input type = "text" name ="username" class = "textfield" placeholder = "Username">

            <input type = "password" name ="password" class = "textfield" placeholder = "Password">

            <div class ="forgetpass"><a href="#" class ="link" onclick = "message()"> Forget Password?</a></div>
             
            <input type ="submit" name = "submit" value ="Login" class = "btn">

            <div class = "signup">New member ?<a href="#"  class ="link">SignUp here</a>

            </div>
        </div>
    </div>
    </form>
    <script>

     function message() {
        alert("Think more");
     }
    </script>
</body>
</html>

<?php
include("Connect.php");

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];
      
    $query = "SELECT * FROM `student` WHERE Email = '$username' && ID = '$password' ";

    $result = mysqli_query($conn,$query);

     $total = mysqli_num_rows($result);
     //echo $total;

    if(!$result)
    {
    die("Query failed".mysqli_error);
    }

   if($total == 1)
   {
      // echo"Password and username matched ";

      $_SESSION['user_name']=$username;
        header('location:index1.php');
   }
   else{
    echo "login failed";
   }



}






?>
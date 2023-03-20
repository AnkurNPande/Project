<?php include('Connect.php');?>
<?php
    session_start();
  ?>
<?php
  
if(isset($_GET['id'])){
    $ID = $_GET['id'];



   $username=$_SESSION['user_name'];

   if($username == true)
   {

   }
   else
   {
    header('location:login1.php');
   }
   
 $query = "delete from `student` where `id` = '$ID'";

 $result = mysqli_query($conn,$query);


 if(!$result){
    die("query failed".mysqli_error());
 }
 else{
    header('location: index1.php?delete_msg = you have deleted the record.');

 }



}


?>
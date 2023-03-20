<?php include ('Header1.php'); ?>
<?php include ('Connect.php'); ?>
<?php
    session_start();
   
    

  ?>

<?php
   
   if(isset($_GET['id'])){
    $id = $_GET['id'];
   
    $username=$_SESSION['user_name'];

    if($username == true)
    {

    }
    else
    {
     header('location:login1.php');
    }
   $query = "select * from `student` where `ID` = '$id'";

   $result = mysqli_query($conn,$query);

   if(!$result){
    die("query failed".mysqli_error());

   }
   else
   {
        $row = mysqli_fetch_assoc($result);

        
   }
   }


?>






<?php

if(isset($_POST['update_students'])){

    if(isset($_GET['id_new'])){
        $idnew = $_GET['id_new'];
    }

    $fname = $_POST['l_Name'];
    $fEmail = $_POST['l_Email'];
    $fphonenumber = $_POST['l_phonenumber'];
    $fAddress = $_POST['l_Address'];

 
    $username=$_SESSION['user_name'];

   if($username == true)
   {

   }
   else
   {
    header('location:login1.php');
   }
   
    $query = "update `student` set `Name` = '$fname' , `Email` = '$fEmail' , `phonenumber`= '$fphonenumber',`Address` = '$fAddress' where `ID` = $idnew";

    $result = mysqli_query($conn,$query);
    if(!$result){
        die("query failed".mysqli_error());

    }
    else{
    header('location:Index1.php?update_msg=successfully updated');
    }


}

?>
  

  
 <form action="Update1.php?id_new=<?php echo $id; ?>" method="post">

<div class="form-group">
            
            <div class="form-group">
                <label for ="l_Name">Name</label>
                <input type= "text" name = "l_Name" class ="form-control"value = "<?php echo $row['Name'] ?>">
            </div>
            <div class="form-group">
                <label for ="l_Email">Email</label>
                <input type= "text" name = "l_Email" class ="form-control"value = "<?php echo $row['Email'] ?>">
            </div>
            <div class="form-group">
                <label for ="l_phonenumber">phonenumber</label>
                <input type= "text" name = "l_phonenumber" class ="form-control"value = "<?php echo $row['phonenumber'] ?>">
            </div> <div class="form-group">
                <label for ="l_Address">Address</label>
                <input type= "text" name = "l_Address" class ="form-control"value = "<?php echo $row['Address'] ?>">
            
            </div>
            <input type="submit" class="btn btn-success" name = "update_students" value = "UPDATE">
            </form>
           
  <?php include ("Footer1.php"); ?>
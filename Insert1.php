


<?php

 include 'Connect.php'; 


if(isset($_POST['add_students']))
{
   
 
  $l_Name = $_POST['l_Name'];
  $l_Email = $_POST['l_Email'];
  $l_phonenumber = $_POST['l_phonenumber'];
  $l_Address =$_POST['l_Address'];


  if( empty($l_Name)||empty($l_Email)||empty($l_phonenumber)||empty($l_Address)) 
  {
     header('location:index1.php?message=You need to fill all data!');
  }

  else
  {
    $sql = "INSERT INTO `student` (`Name`,`Email`,`phonenumber`,`Address`) VALUES 
      ('$l_Name','$l_Email','$l_phonenumber','$l_Address')";

    

   $result= mysqli_query($conn, $sql);

   if(!$result)
   {
      die("query failed".mysqli_error);
   }
   
   else{
    header('location:index1.php?message=Data added successfully!');
   }     
   

  }
  
  

     


}


?>
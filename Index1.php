  
  <?php
    session_start();
    echo"Welcome ".$_SESSION['user_name'];
  ?>
  
  
  
  <?php include ("Header1.php"); ?>
  <?php include ("Connect.php"); ?>

         <div class="box">
        <h2>ALL STUDENTS</h2>
        <button class = "btn btn-primary"data-toggle="modal" data-target="#exampleModal">ADD STUDENTS</button>
        </div>
        <table class= "table table-hover table-bordered table-striped">
        <thead>
             <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>phonenumber</th>
                <th>Address</th>
                <th>Update</th>
                <th>Delete</th>
             </tr>
        </thead>
        <tbody>
                  <?php
                    $username=$_SESSION['user_name'];

                   if($username == true)
                   {

                   }
                   else
                   {
                    header('location:login1.php');
                   }

                   $query = "select * from student";

                  $result = mysqli_query($conn,$query); 

                  if(!$result){
                    die("query failed".mysqli_error);
                  }
                  else
                  {
                    while($rows=mysqli_fetch_assoc($result))
                    {
                            ?>

                            <tr>
                                <td><?php echo $rows["ID"]; ?> </td>
                                <td><?php echo $rows["Name"]; ?> </td>
                                <td><?php echo $rows["Email"]; ?> </td>
                                <td><?php echo $rows["phonenumber"]; ?> </td>
                                <td><?php echo $rows["Address"]; ?> </td>
                                 <td><a href ="Update1.php?id=<?php echo $rows["ID"];?>" class = "btn btn-success">Update</a></td>
                                 <td><a href ="Delete1.php?id=<?php echo $rows["ID"];?>" class = "btn btn-danger">Delete</a></td>
                            </tr>
                         



                         <?php
                    }
                  }

                   ?>
        </tbody>
    </table>
   <a href = "logout1.php" ><input type = "submit" name = "" value = "LOGOUT" style="background: green; color: white; height:35px ; width:100px; margin_top: 20px;"></a>


    <?php
           if(isset($_GET['message']))
           echo "<h6>".$_GET['message']."</h6>";
    ?>
     <?php
           if(isset($_GET['insert_msg']))
           echo "<h5>".$_GET['insert_msg']."</h5>";
    ?>
     <?php
           if(isset($_GET['delete_msg']))
           echo "<h6>".$_GET['delete_msg']."</h6>";
    ?>
  
    
    <form action ="Insert1.php" method ="POST">
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ADD STUDENTS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
           
            <div class="form-group">
                <label for ="l_Name">Name</label>
                <input type= "text" name = "l_Name" class ="form-control">
            </div>
            <div class="form-group">
                <label for ="l_Email">Email</label>
                <input type= "text" name = "l_Email" class ="form-control">
            </div>
            <div class="form-group">
                <label for ="l_phonenumber">phonenumber</label>
                <input type= "text" name = "l_phonenumber" class ="form-control">
            </div> <div class="form-group">
                <label for ="l_Address">Address</label>
                <input type= "text" name = "l_Address" class ="form-control">
            </div>
           
           
            
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-success"name = "add_students" value="ADD">

      </div>
    </div>
  </div>
</div>
</form>
   <?php include ("Footer1.php"); ?>

   
<?php

include_once 'connectdb.php';
session_start();

include_once"header.php";


# if SAVE button is clicked
if(isset($_POST['btnsave'])){

  # variable = value of text field
  $username=$_POST['txtname'];
  $useremail=$_POST['txtemail'];
  $userpassword=$_POST['txtpassword'];
  $userrole=$_POST['txtselect_option'];
  

  $insert=$pdo->prepare("insert into tbl_user (username, useremail, userpassword, role) values(:name, :email, :password, :role)");

  $insert->bindParam(':name', $username);
  $insert->bindParam(':email', $useremail);
  $insert->bindParam(':password', $userpassword);
  $insert->bindParam(':role', $userrole);

  if($insert->execute()){
    echo 'Insert successfully the user into the database';

  }else{
    echo 'Error inserting the user into the database';

  }

}
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Registration</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <!--  <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Starter Page</li>-->
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        
           

          <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Registration</h5>
              </div>
              <div class="card-body">

              <div class="row">


              <div class="col-md-4">

              <form action="" method="post">
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="text" class="form-control" placeholder="Enter name" name="txtname">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" class="form-control" placeholder="Enter email" name="txtemail">
                  </div>


                  <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" class="form-control" placeholder="Password" name="txtpassword">
                  </div>
             

                  <div class="form-group">
                        <label>Role</label>
                        <select class="form-control" name="txtselect_option">
                          <option value="" disabled selected>Select role</option>
                          <option>Admin</option>
                          <option>User</option>
                          
                        </select>
                      </div>



                <div class="card-footer">
                  <button type="submit" class="btn btn-primary" name="btnsave">Save</button>
                </div>
              </form>
              </div>


              <div class="col-md-8">
              <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <td>#</td>
                  <td>Name</td>
                  <td>Email</td>
               <!-- <td>Password</td> -->
                  <td>Role</td>
                  <td>Delete</td>
                </tr>
              </thead>
              <tbody>
                <!-- SELECT QUERY inside PHP code-->
                <?php 
                 $select = $pdo->prepare("select * from tbl_user order by userid ASC");
                # $select = $pdo->prepare("select * from tbl_user order by userid desc");
                $select->execute();

                while($row=$select->fetch(PDO::FETCH_OBJ))
                {
                  echo'
                  <tr>
                    <td>'.$row->userid.'</td>
                    <td>'.$row->username.'</td>
                    <td>'.$row->useremail.'</td>
                    <!-- <td>'.$row->userpassword.'</td> -->
                    <td>'.$row->role.'</td>
                  </tr>';
                }
                ?>
              </tbody>
              </table>


              </div>

                
              </div>
            </div>
            </div>
           
         
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include_once"footer.php";
?>

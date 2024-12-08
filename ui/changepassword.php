<?php


include_once 'connectdb.php';
session_start();


include_once"header.php";



// 1) Step 1: When user clicks on update password button, we extract user passwords from input fields and store them in variables


if(isset($_POST['btnupdate'])){

$oldpassword_txt=$_POST['txt_oldpassword'];
$newpassword_txt=$_POST['txt_newpassword'];
$rnewpassword_txt=$_POST['txt_rnewpassword'];


// cho $oldpassword_txt."-".$newpassword_txt."-".$rnewpassword_txt;



// 2) Step 2: using SELECT query we extract DB records according to useremail

$email = $_SESSION['useremail'];

$select = $pdo->prepare("select * from tbl_user where useremail='$email'");

$select->execute();
$row=$select->fetch(PDO:: FETCH_ASSOC);

echo $row['useremail'];
echo $row['username'];


}















?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Change password</h1>
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
        <div class="row">
          <div class="col-lg-12">


                 <!-- Horizontal Form -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Change password</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form class="form-horizontal" action="" method="post">
                <div class="card-body">
                 
                <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Old password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputPassword3" placeholder="Old password" name="txt_oldpassword">
                    </div>
                  </div>


                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">New password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputPassword3" placeholder="New password" name="txt_newpassword">
                    </div>
                  </div>

                  <div class="form-group row">
                    <label for="inputPassword3" class="col-sm-2 col-form-label">Repeat new password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" id="inputPassword3" placeholder="Repeat new password" name="txt_rnewpassword">
                    </div>
                  </div>
                 
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info"name="btnupdate">Update password</button>
             
                </div>
                <!-- /.card-footer -->
              </form>
            </div>
            <!-- /.card -->
           
          </div>
          <!-- /.col-md-6 -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php
include_once"footer.php";
?>

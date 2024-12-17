<?php


include_once 'connectdb.php';
session_start();

include_once"header.php";
?>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Category</h1>
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
       


      
      <div class="card card-warning card-outline">
              <div class="card-header">
                <h5 class="m-0">Category Form</h5>
              </div>
              <div class="card-body">

              <div class="row">


              <div class="col-md-4">

              <form action="" method="post">
                
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                    <input type="text" class="form-control" placeholder="Enter category" name="txtcategory">
                  </div>


             


                <div class="card-footer">
                  <button type="submit" class="btn btn-warning" name="btnsave">Save</button>
                </div>
              </form>
              </div>


              <div class="col-md-8">
              <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <td>#</td>
                  <td>Category</td>
                  <td>Edit</td>
                  <td>Delete</td>
                
                </tr>
              </thead>
              <tbody>
                <!-- SELECT QUERY inside PHP code-->
               <!-- <?php 
               #  $select = $pdo->prepare("select * from tbl_user order by userid ASC");
                # $select = $pdo->prepare("select * from tbl_user order by userid desc");
              #  $select->execute();

              #  while($row=$select->fetch(PDO::FETCH_OBJ))
              #  {
              #    echo'<tr>
              #      <td>'.$row->userid.'</td>
              #      <td>'.$row->username.'</td>
               #     <td>'.$row->useremail.'</td>
               #     <!-- <td>'.$row->userpassword.'</td> -->
               #     <td>'.$row->role.'</td>

               #     <td>
               #     <a href="registration.php?id='.$row->userid.'" class="btn btn-danger">
               #       <i class="fa fa-trash-alt"></i>
               #     </a>
                #    </td>
                #  </tr>';
               # }
                ?> -->
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

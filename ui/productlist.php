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
            <h1 class="m-0">Product List</h1>
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
           

          <div class="card card-primary card-outline">
              <div class="card-header">
                <h5 class="m-0">Product List</h5>
              </div>
              <div class="card-body">
                


              <table class="table table-striped table-hover">
              <thead>
                <tr>
                  <td>Barcode</td>
                  <td>Product</td>
                  <td>Categroy</td>
                  <td>Description</td>
                  <td>Stock</td>
                  <td>Purchaseprice</td>
                  <td>Saleprice</td>
                  <td>Image</td>
                  <td>Print Barcode</td>

                  <td>View</td>
                  <td>Edit</td>
                  <td>Delete</td>
                </tr>
              </thead>
              <tbody>
                <!-- SELECT QUERY inside PHP code-->
                <?php 
                 $select = $pdo->prepare("select * from tbl_product order by pid ASC");
               
                $select->execute();

                while($row=$select->fetch(PDO::FETCH_OBJ))
                {
                  echo'
                  <tr>
                    <td>'.$row->barcode.'</td>
                    <td>'.$row->product.'</td>
                    <td>'.$row->category.'</td>
                    <td>'.$row->description.'</td>
                    <td>'.$row->stock.'</td>

                    <td>'.$row->purchaseprice.'</td>
                    <td>'.$row->saleprice.'</td>
                    <td>'.$row->image.'</td>

                    <td>
                    <a href="registration.php?id='.$row->pid.'" class="btn btn-danger">
                      <i class="fa fa-trash-alt"></i>
                    </a>
                    </td>

                     <td>
                    <a href="registration.php?id='.$row->pid.'" class="btn btn-danger">
                      <i class="fa fa-trash-alt"></i>
                    </a>
                    </td>

                     <td>
                    <a href="registration.php?id='.$row->pid.'" class="btn btn-danger">
                      <i class="fa fa-trash-alt"></i>
                    </a>
                    </td>

                     <td>
                    <a href="registration.php?id='.$row->pid.'" class="btn btn-danger">
                      <i class="fa fa-trash-alt"></i>
                    </a>
                    </td>
                  </tr>';
                }
                ?>
              </tbody>
              </table>




              </div>
            </div>

           
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



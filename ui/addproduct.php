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
            <h1 class="m-0">Add Product</h1>
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
                <h5 class="m-0">Product</h5>
              </div>
             

              <form action="" method="post">
              <div class="card-body">
              <div class="row">

             
              <div class="col-md-6">

              <div class="form-group">
                    <label>Barcode</label>
                    <input type="text" class="form-control" placeholder="Enter barode" name="txtbarcode" required>
                  </div>
              
              <div class="form-group">
                    <label>Product name</label>
                    <input type="text" class="form-control" placeholder="Enter product name" name="txtproductname" required>
                  </div>
            

                  <div class="form-group">
                        <label>Category</label>
                        <select class="form-control" name="txtselect_option" required>
                          <option value="" disabled selected>Select role</option>
                          <option>Admin</option>
                          <option>User</option>
                          
                        </select>
                      </div>

                 <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" placeholder="Enter description" name="txtdescription" rows="4" required>
                    </textarea> 
                  </div>
            

              </div>

              <div class="col-md-6">
                
              <div class="form-group">
                    <label>Stock quantity</label>
                    <input type="number" min="1" step="any" class="form-control" placeholder="Enter stock quantity" name="txtstock" required>
                  </div>

                  <div class="form-group">
                    <label>Purchase price</label>
                    <input type="number" min="1" step="any" class="form-control" placeholder="Enter purchase price" name="txtpurchaseprice" required>
                  </div>

                  <div class="form-group">
                    <label>Sale price</label>
                    <input type="number" min="1" step="any" class="form-control" placeholder="Enter sale price" name="txtsaleprice" required>
                  </div>

                  <div class="form-group">
                    <label>Product image</label>
                    <input type="file" class="input-group" name="productimage" required>
                    <p>Upload image</p>
                  </div>

              </div>

              </div>

              </div>
              <div class="card-footer">
                <div class="text-center">
                  <button type="submit" class="btn btn-primary" name="btnsave">Save product</button>
                </div>
                </div>
            </form>




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

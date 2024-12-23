<?php


include_once 'connectdb.php';
session_start();

include_once"header.php";


if(isset($_POST['btnsave'])){


$barcode=$_POST['txtbarcode'];
$product=$_POST['txtproductname'];
$category=$_POST['txtselect_option'];
$description=$_POST['txtdescription'];
$stock=$_POST['txtstock'];
$purchaseprice=$_POST['txtpurchaseprice'];
$saleprice=$_POST['txtsaleprice'];



$f_name=$_FILES['myfile']['name'];
$f_tmp=$_FILES['myfile']['tmp_name'];

#$store="upload/".$f_name; // folder name

/*
// move the uploaded file from temporary location to "upload" folder
if(move_uploaded_file($f_tmp,$store)){
echo 'file is uploaded';
}
*/

// display image size in bytes
// echo $f_size=$_FILES['myfile']['size'];


// echo $f_extension = explode(".",$f_name);

// $f_extension = explode(".",$f_name);
// print_r($f_extension);

# check type of file
$f_size=$_FILES['myfile']['size'];
$f_extension=explode('.',$f_name);


// display image extension
// echo $f_extension=end($f_extension);

$f_extension=strtolower(end($f_extension));

# echo $f_newfile=uniqid().'.'.$f_extension;
$f_newfile=uniqid().'.'.$f_extension;
$store="productimages/".$f_newfile;

# check image extension
if($f_extension=='jpg' || $f_extension=='jpeg' || $f_extension=='png' || $f_extension=='gif'){
    # echo 'File uploaded successfully';

    # check image size
    if($f_size>=1000000) # greater than 1mega byte
    {
        # echo 'Your file max size should be 1 Mb';
        $_SESSION['status']="Your file max size should be 1 Mb"; 
        $_SESSION['status_code']="warning";
    }
    else{ // <1Mb
        if(move_uploaded_file($f_tmp,$store)){
                # echo 'File uploaded successfully';
               $productimage=$f_newfile; # fetch image name
                if(empty($barcode)) # when barcode field is empty
                {
                  $_SESSION['status']="We'll write code here to generate barcode automatically"; 
                  $_SESSION['status_code']="warning";
                }else{
                  // insert data into database
                  $insert=$pdo->prepare("insert into tbl_product(barcode, product, category, description, stock, purchaseprice, saleprice, image) 
               values(:barcode, :product, :category, :description, :stock, :pprice, :saleprice, :img)");

                  // bindParam to avoid sql injections
                  $insert->bindParam(':barcode',$barcode);
                  $insert->bindParam(':product',$product);
                  $insert->bindParam(':category',$category);
                  $insert->bindParam(':description',$description);
                  $insert->bindParam(':stock',$stock);
                  $insert->bindParam(':pprice',$purchaseprice);
                  $insert->bindParam(':saleprice',$saleprice);
                  $insert->bindParam(':img',$productimage);

                  if($insert->execute()){
                    $_SESSION['status']="Product inserted successfully"; 
                    $_SESSION['status_code']="success";
                  }else{
                    $_SESSION['status']="Product insertion failed"; 
                    $_SESSION['status_code']="error";
                  }
                }
        }
    }
}

else{
# echo 'Only jpg, png and gif files are supported';

$_SESSION['status']="Only jpg, jpeg, png and gif files are supported"; 
$_SESSION['status_code']="warning";
}





}


// get barcode value from field





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
             

              <form action="" method="post" enctype="multipart/form-data">
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
                          <option value="" disabled selected>Select category</option>
                          
                         <?php
                         $select = $pdo->prepare("select * from tbl_category order by catid desc");
                         $select->execute();

                        while($row=$select->fetch(PDO::FETCH_ASSOC)) {
                          extract($row);
                          ?>
                        <option><?php echo $row['category'];?></option>
                      <?php
                        }
                         ?>


                        </select>
                      </div>

                 <div class="form-group">
                    <label>Description</label>
                    <textarea class="form-control" placeholder="Enter description" name="txtdescription" rows="4" required></textarea> 
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
                    <input type="file" class="input-group" name="myfile" required>
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


<?php
  if(isset($_SESSION['status']) && $_SESSION['status']!='') {
  ?>
  <script>

      Swal.fire({
        icon: '<?php echo $_SESSION['status_code'];?>',
        title: '<?php echo $_SESSION['status'];?>'
      });

  </script>
  <?php
  unset($_SESSION['status']);
  }
?>

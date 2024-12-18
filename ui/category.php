<?php


include_once 'connectdb.php';
session_start();

include_once"header.php";


# if save button is set
if(isset($_POST['btnsave'])){

$category = $_POST['txtcategory'];

# if category field is empty: show error message
if(empty($category)){
    $_SESSION['status']="Category field is empty"; 
    $_SESSION['status_code']="warning";
}else{
    # insert a new category in database
    $insert = $pdo->prepare("insert into tbl_category (category) values(:cat)");
    $insert->bindParam(':cat', $category);

    if($insert->execute()){
        $_SESSION['status']="Category added successfully"; 
        $_SESSION['status_code']="success";
    }else{
        $_SESSION['status']="Category insertion failed";  
        $_SESSION['status_code']="warning";
    }
}
}





# if save button is set
if(isset($_POST['btnupdate'])){

  $category = $_POST['txtcategory'];
  $id = $_POST['txtcatid']; # from hidden text field
  
  # if category field is empty: show error message
  if(empty($category)){
      $_SESSION['status']="Category field is empty"; 
      $_SESSION['status_code']="warning";
  }else{
      # update category
      $update = $pdo->prepare("update tbl_category set category=:cat where catid=".$id);
      $update->bindParam(':cat', $category);
  
      if($update->execute()){
          $_SESSION['status']="Category updated successfully"; 
          $_SESSION['status_code']="success";
      }else{
          $_SESSION['status']="Category update failed";  
          $_SESSION['status_code']="warning";
      }
  }
  }
  
  

  if(isset($_POST['btndelete'])){

    $delete = $pdo->prepare("delete from tbl_category where catid=".$_POST['btndelete']);

    if($delete->execute()){
      $_SESSION['status']="Category deleted successfully"; 
      $_SESSION['status_code']="success";

    }else{
      $_SESSION['status']="Category deletion failed";  
      $_SESSION['status_code']="warning";

    }



  }else{

  }

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
              <form action="" method="post">
              <div class="row">


<?php

# if edit button is set: left form changes, else : insert a new record
if(isset($_POST['btnedit'])){

  # fetch category id using Edit button
$select = $pdo->prepare("select * from tbl_category where catid =".$_POST['btnedit']);

# execute query
$select->execute();

# if select variable is getting any value then show edit form
if($select){

  $row = $select->fetch(PDO::FETCH_OBJ);

 # left form changes
  echo'  <div class="col-md-4">
            
  <div class="form-group">
    <label for="exampleInputEmail1">Category</label>

    <input type="hidden" class="form-control" placeholder="Enter category" value="'.$row->catid.'" name="txtcatid">
    <input type="text" class="form-control" placeholder="Enter category" value="'.$row->category.'" name="txtcategory">
  </div>

<div class="card-footer">
  <button type="submit" class="btn btn-info" name="btnupdate">Update</button>
</div>

</div>

';

}


# if select variable is empty then stick with the insertion form
}else{

echo'  <div class="col-md-4">
    
  <div class="form-group">
    <label for="exampleInputEmail1">Category</label>
    <input type="text" class="form-control" placeholder="Enter category" name="txtcategory">
  </div>

<div class="card-footer">
  <button type="submit" class="btn btn-warning" name="btnsave">Save</button>
</div>

</div>

';
}

?>







             


              <div class="col-md-8">
              <table id="table_category" class="table table-striped table-hover">
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
               <?php 
                $select = $pdo->prepare("select * from tbl_category order by catid ASC");
               
                $select->execute();

                while($row=$select->fetch(PDO::FETCH_OBJ))
                {
                  echo'<tr>
                    <td>'.$row->catid.'</td>
                    <td>'.$row->category.'</td>
                 

                   <td>
                    <button type="submit" class="btn btn-primary" value="'.$row->catid.'" name="btnedit">Edit</button>
                  </td>

                   <td>
                    <button type="submit" class="btn btn-danger" value="'.$row->catid.'" name="btndelete">Delete</button>
                  </td>
                </tr>';
                }
                ?>
              </tbody>
<tfoot>
<tr>
                  <td>#</td>
                  <td>Category</td>
                  <td>Edit</td>
                  <td>Delete</td>
                
                </tr>


</tfoot>

              </table>


              </div>

                
              </div>
            </form>

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



<script>

$(document).ready( function () {
    $('#table_category').DataTable();
} );

</script>
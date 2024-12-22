<?php
if (isset($_POST['submit'])){

# echo $_FILES['myfile'];
// echo "<pre>";
// print_r($_FILES['myfile']);

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
$store="upload/".$f_newfile;

# check image extension
if($f_extension=='jpg' || $f_extension=='png' || $f_extension=='gif'){
    # echo 'File uploaded successfully';

    # check image size
    if($f_size>=1000000) # greater than 1mega byte
    {
        echo 'Your file max size should be 1 Mb';
    }
    else{ // <1Mb
        if(move_uploaded_file($f_tmp,$store)){

                echo 'File uploaded successfully';
        }
    }
}

else{
echo 'Only jpg, png and gif files are supported';
}





}



?>






<!DOCTYPE html>
<html lang = "en">

<head>
    <meta charset="UTf-8">
    <title>Files</title>
</head>

<body>

<form action="" method="post" enctype="multipart/form-data">

<p>
<input type="file" name="myfile"/>
</p>

<p>
<input type="submit" value="upload" name="submit"/>
</p>


</form>


</body>

</html>
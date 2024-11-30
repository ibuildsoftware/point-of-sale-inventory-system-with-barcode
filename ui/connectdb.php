<?php


try{

    $pdo = new PDO('mysql:host=localhost;dbname=pos_barcode_db','root','');


}catch(PDOException $e){ 

    // display error message
    echo $e->getMessage();
}


// display success message
echo 'connection success';


?>
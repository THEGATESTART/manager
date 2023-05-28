<?php

    include 'connect.php';

    $str_filename = "";
    $bool_hasnewupload = false;
        if(file_exists($_FILES['imgUpload']['tmp_name']) || is_uploaded_file($_FILES['imgUpload']['tmp_name'])) {
    $bool_hasnewupload = true;
		$str_filename = $_FILES['imgUpload']['name'];
	}

	$str_sql = "Update product_tb Set ";
	$str_sql .= "product_name = '" . $_POST['pdName'] . "',";
        $str_sql .= "product_detail = '" . $_POST['pdDetail'] . "',";
    if(strlen($str_filename) > 0) {
		$str_sql .= "product_image = '" . $str_filename  . "',";
	}
	$str_sql .= "product_price = '" . $_POST['pdPrice'] . "' ";
    $str_sql .= "Where product_id = '" . $_POST['product_id'] . "' ";

	if ( mysqli_query($con,$str_sql) ) {
		//echo "Save OK !";
		if($bool_hasnewupload) {
		    $str_uploadfile = "img/" . $str_filename;
                  //echo $str_uploadfile;
	
            if (move_uploaded_file($_FILES['imgUpload']['tmp_name'], $str_uploadfile)) {
                echo "Upload OK";
            } else {
                echo "Upload Error";
            }		
		}	
		header("location:manager.php");
		exit;
	} else {
		echo "Save Error ! : " . $str_sql;
	}

?>

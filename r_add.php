<?php

    include 'connect.php';

         $str_filename = "";
         $bool_hasnewupload = false;
         if(file_exists($_FILES['imgUpload']['tmp_name']) || is_uploaded_file($_FILES['imgUpload']['tmp_name'])) {
        $bool_hasnewupload = true;
		$str_filename = $_FILES['imgUpload']['name'];
	}

	$str_sql = "insert into product_tb(product_name,product_detail,product_img,product_price) values(";
	    $str_sql .= "'" . $_POST['pdName'] . "',";
        $str_sql .= "'" . $_POST['pdDetail'] . "',";
        $str_sql .= "'" . $str_filename . "',";
	    $str_sql .= "'" . $_POST['pdPrice'] . "')";

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
		header("location:add.php");
		exit;
	} else {
		echo "Save Error ! : " . $str_sql;
	}

?>

<?php

	if(isset($_POST['moreBut'])) {
		header("location:add.php");
	} elseif (isset($_POST['btnsearch'])) {
		$str_qs = "";
		if(isset($_POST['txtsearch'])) {
			$str_kw = $_POST['txtsearch'];
			$str_qs = "?kw=" . $str_kw;
		}
		header("location:manager.php" . $str_qs);
	} elseif (isset($_POST['btnedit'])) {
		$str_id = "";
		if(isset($_POST['product_id'])) {
			$str_id = $_POST['product_id'];
		}
		header("location:edit.php?id=" . $str_id);
	} elseif (isset($_POST['btndel'])) {
		$str_id = "";
		if(isset($_POST['product_id'])) {
			$str_id = $_POST['product_id'];
		}
		header("location:delete.php?id=" . $str_id);
	} else {
		header("location:labmanager.php");
	}

	exit;

?>

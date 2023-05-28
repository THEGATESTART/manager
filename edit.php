<?php include 'connect.php';

    //--Conenct DB Start-------------------
    $str_id = "";
    if( isset( $_GET['id'] ) ) {
        $str_id = $_GET['id'];
    }
    
    $sqlGet = "select * from product_tb where product_id = ".$str_id."";
    $sqlRs = mysqli_query($con,$sqlGet);

    if(!$row = mysqli_fetch_array($sqlRs)) {
		header("location:manager.php");
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <title>ADD</title>
</head>
<body>
    <div class="header">
        <div class="container">
            <div class="logo">
                <h1>ADMIN</h1>
            </div>
        </div>
    </div>
    <div class="container">
        <section class="addProduct">
            <h1>แก้ไขข้อมูล</h1>
            <form action="r_edit.php" method="POST" class="formInsert" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>ชื่อสินค้า</td>
                        <td><input type="text" name="pdName" value="<?= $row['product_name'] ?>"></td>
                    </tr>
                    <tr>
                        <td>รายละเอียด</td>
                        <td><textarea name="pdDetail" id="" cols="50" rows="8"><?= $row['product_detail'] ?></textarea></td>
                    </tr>
                    <tr>
                        <td>ราคา</td>
                        <td><input type="text" name="pdPrice" value="<?= $row['product_price'] ?>"></td>
                    </tr>
                    <tr>
                        <td>รูปภาพ</td>
                        <td>
                            <img src="img/<?= $row['product_img'] ?>" alt="">
                            <input type="file" name="imgUpload"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <input type="submit" name="btnsave" class="btnSave">
                            <input type="text" name="product_id" id="" value="<?= $row['product_id'] ?>">
                        </td>
                    </tr>
                </table>    
            </form>
        </section>
    </div>
</body>
</html>
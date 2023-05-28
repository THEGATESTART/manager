<?php include 'connect.php';

//--Get KW From URL Start-------------------
$str_kw = "";
$str_condition = "";
if( isset( $_GET['kw'] ) ) {
    $str_kw = $_GET['kw'];
    $str_condition = " Where (product_name like '%" . $str_kw  . "%')";
$str_condition .= " or (product_detail like '%" . $str_kw  . "%')";
$str_condition .= " or (product_price like '%" . $str_kw  . "%')";
}
//--Get KW From URL Stop-------------------	

//--Load DB Start-------------------

$str_sql = "Select * From product_tb" . $str_condition;

$sqlRs = mysqli_query($con,$str_sql);

//--Load DB Stop-------------------

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/reset.css">
    <title>Manager</title>
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
        <div class="searchForm">
            <form action="r_manager.php" method="post" name="frmdata">
                <div class="searchInfo">
                    <label for="search">คำค้นหา</label>
                    <input type="search" name="txtsearch" id="search" value="<?= $str_kw ?>">
                    <input type="submit" value="ค้นหา" class="searchBut" name="btnsearch">
                </div>
                <div class="addInfo">
                        <input type="submit" value="เพิ่ม" class="moreBut" name="moreBut">
                </div>
            </form>
            <div class="clear"></div>
        </div>
        <div class="showInfo">
            <table>
                <tr>
                    <th>ลำดับ</th>
                    <th>รูป</th>
                    <th>ชื่อสินค้า</th>
                    <th>ราคา</th>
                    <th>การกระทำ</th>
                </tr>
                <?php while ($row = mysqli_fetch_array($sqlRs)) { ?>
                <tr>
                    <td><?= $row['product_id'] ?></td>
                    <td><img src="img/<?= $row['product_img'] ?>" alt="" class="showProducts"></td>
                    <td><?= $row['product_name'] ?></td>
                    <td><?= number_format($row['product_price']).' บาท' ?></td>
                    <td>
                        <form action="r_manager.php" method="post" name="frmdata">
                            <div class="actionBut">
                                <div class="edit">
                                    <input type="submit" value="แก้ไข" class="fixBut" name="btnedit">
                                </div>
                                <div class="delete">
                                    <input type="submit" value="ลบ" class="delBut" name="btndel">
                                </div>
                                <input type="text" name="product_id" id="" value="<?= $row['product_id'] ?>">
                                <div class="clear"></div>
                            </div>
                        </form>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    
</body>
</html>
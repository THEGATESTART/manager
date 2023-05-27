<?php include 'connect.php'; ?>

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
            <div class="searchInfo">
                <label for="search">คำค้นหา</label>
                <input type="search" name="search" id="search">
                <input type="submit" value="ค้นหา" class="searchBut">
            </div>
            <div class="addInfo">
                <input type="submit" value="เพิ่ม" class="moreBut">
            </div>
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
                        <div class="actionBut">
                            <div class="edit">
                                <input type="submit" value="แก้ไข" class="fixBut">
                            </div>
                            <div class="delete">
                                <input type="submit" value="ลบ" class="delBut">
                            </div>
                            <div class="clear"></div>
                        </div>
                    </td>
                </tr>
                <?php } ?>
            </table>
        </div>
    </div>
    
</body>
</html>
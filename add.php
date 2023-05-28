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
            <h1>เพิ่มข้อมูล</h1>
            <form action="r_add.php" method="POST" class="formInsert" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>ชื่อสินค้า</td>
                        <td><input type="text" name="pdName"></td>
                    </tr>
                    <tr>
                        <td>รายละเอียด</td>
                        <td><textarea name="pdDetail" id="" cols="50" rows="8"></textarea></td>
                    </tr>
                    <tr>
                        <td>ราคา</td>
                        <td><input type="text" name="pdPrice"></td>
                    </tr>
                    <tr>
                        <td>รูปภาพ</td>
                        <td><input type="file" name="imgUpload"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" name="btnsave" class="btnSave"></td>
                    </tr>
                </table>    
            </form>
        </section>
    </div>
</body>
</html>
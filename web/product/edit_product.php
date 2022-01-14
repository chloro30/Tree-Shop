<?php
    $_POST['no'];
   
    // $conn = mysqli_connect('localhost','root','1234','treeshop');
    $conn = mysqli_connect('localhost','root','1005','treeshop');
    // $conn = mysqli_connect('localhost','tree5432','q1w2e3r4!','tree5432'); //dothome phpmyAdMin 연결
    
    $sql = "SELECT * FROM product
            WHERE no={$_POST['no']};
            ";
    // echo $sql;

    $result = mysqli_query($conn,$sql);
    // var_dump($result);
    $row = mysqli_fetch_array($result);
    // var_dump($row);
    
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>상품 수정하기</title>
    <style>
        h1 {
            text-align: center;
        }
        table {
            border-collapse: collapse;
            width: 528px;
            margin: 0 auto;
        }
        table, td {
            border: 1px solid #ccc;
        }
        td {
            padding: 16px;
        }
        td:nth-child(1) {
            text-align: center;
        }
        #writer {
            cursor: not-allowed;
        }
    </style>
</head>
<body>
    <a href="../../index.php">홈으로</a>
    <h1>상품 수정하기</h1>
    <form action="../../process/product/product_update_process.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="writer_hidden" value="<?=$row['writer']?>">
        <input type="hidden" name="no" value="<?=$_POST['no']?>">
        <table>
            <tr>
                <td>상품 번호</td>
                <td><?=$row['no']?></td>
            </tr>
            <tr>
                <td>작성자</td>
                <td><input type="text" name="writer" id="writer" value="<?=$row['writer']?>" disabled></td>
            </tr>
            <tr>
                <td>제목</td>
                <td><input type="text" name="title" value="<?=$row['title']?>"></td>
            </tr>
            <tr>
                <td>가격</td>
                <td><input type="number" name="price" value="<?=$row['price']?>"></td>
            </tr>
            <tr>
                <td>이미지 등록</td>
                <td><input type="file" name="file_img"></td>
            </tr>
            <tr>
                <td>내용</td>
                <td><textarea name="desc" cols="50" rows="20"><?=$row['description']?></textarea></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="수정하기">
                    <input type="reset" value="초기화">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
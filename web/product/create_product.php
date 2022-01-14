<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>상품 등록</title>
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
    </style>
</head>
<body>
    <?php
        //세션 체크하기
        session_start();
        $userName = $_SESSION['userName'];
    ?>
    <a href="../../index.php">홈으로</a>
    <h1>상품 등록하기</h1>
    <form action="../../process/product/product_create_process.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="writer_hidden" value="<?=$userName?>">
        <table>
            <tr>
                <td>작성자</td>
                <td><input type="text" name="writer" value="<?=$userName?>" disabled></td>
            </tr>
            <tr>
                <td>제목</td>
                <td><input type="text" name="title"></td>
            </tr>
            <tr>
                <td>가격</td>
                <td><input type="number" name="price"></td>
            </tr>
            <tr>
                <td>이미지 등록</td>
                <td><input type="file" name="file_img"></td>
            </tr>
            <tr>
                <td>내용</td>
                <td><textarea name="desc" cols="50" rows="20"></textarea></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" value="글쓰기">
                    <input type="reset" value="초기화">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>
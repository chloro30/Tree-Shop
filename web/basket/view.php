<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>장바구니</title>
    <!-- Bootstrap -->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>
<a href="../../index.php">홈으로</a>

<?php
    // $conn = mysqli_connect('localhost','root','1234','treeshop');
    $conn = mysqli_connect('localhost','root','1005','treeshop'); //학원 비번 다름
    // $conn = mysqli_connect('localhost','tree5432','q1w2e3r4!','tree5432'); //dothome phpmyAdMin 연결
    $sql = "SELECT * FROM basket
            ORDER BY no DESC;
           ";

    // echo $sql;
    $result = mysqli_query($conn,$sql);

?>
    <div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>상품 이미지</th>
                    <th>상품명</th>
                    <th>가격</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row = mysqli_fetch_array($result)){
                        // 가격 자릿수 , 추가
                        $price = number_format($row['price']);
                            echo "<tr>";
                            echo "<td><a href='../product/view_product.php?no={$row['no']}'><img src=\"../../{$row['imgsrc']}\" width='100px'></a></td>";
                            echo "<td><a href='../product/view_product.php?no={$row['no']}'>{$row['title']}</a></td>";
                            echo "<td>{$price}원</td>";
                            echo "</tr>";
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>